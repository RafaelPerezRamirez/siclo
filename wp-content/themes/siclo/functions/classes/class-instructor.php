<?php

class Instructor{
	public $ID;
	public $timestamp;
	public $nombre;
	public $telefono;
	public $mail;
	public $foto;
	public $permalink;
	public $descripcion;
	public $una_palabra;
	public $circulo;
	public $votos;
	public $promedio;
	public $nacimiento;

	function __construct( $id = false ){
		$data = get_post_meta( $id );

		$this->ID			= $id;
		$this->timestamp    = get_the_date( 'Y-m-d H:i:s', $id );
		$this->nombre		= get_the_title( $this->ID );
		$this->telefono		= isset( $data['telefono'] )		? reset( $data['telefono'] ) : false;
		$this->mail			= isset( $data['mail'] )			? reset( $data['mail'] ) : false;
		$this->foto			= isset( $data['foto_principal'] )	? reset( $data['foto_principal'] ) : false;
		$this->permalink	= get_permalink( $this->ID );
		$this->descripcion	= isset( $data['descripcion'] )	? reset( $data['descripcion'] ) : '';
		$this->una_palabra	= isset( $data['una_palabra'] )	? reset( $data['una_palabra'] ) : '';
		$this->playlist		= isset( $data['playlist'] )		? reset( $data['playlist'] ) : '';
		$this->nacimiento	= isset( $data['nacimiento'] )	? reset( $data['nacimiento'] ) : '';
		$this->circulo		= isset( $data['circulo'] )			? reset( $data['circulo'] ) : reset( get_posts(array(
			'posts_per_page'	=> 1,
			'fields'		=> 'ids',
			'post_type'		=> 'circulo',
		)));
		$this->votos	= isset( $data['total_votos'] ) && isset( $data['suma_votos'] )		? array(
			'total_votos'	=> reset( $data['total_votos'] ),
			'suma_votos'	=> reset( $data['suma_votos'] ),
		) : array(
			'total_votos'	=> 0,
			'suma_votos'	=> 0,
		);
		$this->promedio	= $this->calcular_promedio();

		if( !DESARROLLO && $this->foto !== false ){
			$this->foto = str_replace('http:','https:',$this->foto);
		};
	}
	public function get_array_data(){
		return get_object_vars( $this );
	}
	public function get_foto(){
		if( !$this->foto ){ return; };
		return '<img class="foto_instructor" src="'.$this->foto.'"/>';
	}
	public function get_clases( $inicio = false, $fin = false, $front = false, $analitica = false ){
		$inicio	= $inicio	? $inicio	: strtotime( date_i18n( 'Y-m-d' ) );
		$fin	= $fin		? $fin		: $inicio+ dias(6);
		$status			= $analitica ? array('future','publish') : 'future';
		/*
		mario( formateo_fecha( $inicio ) );
		mario( formateo_fecha( $fin ) );
		*/
		$clases = $format_clases = array();

		$args = array(
			'post_type'			=> 'clase',
			'posts_per_page'	=> -1,
			'order'				=> 'ASC',
			'date_query' => array(
				array(
					'after'     =>  formateo_fecha( $inicio ),
					'before'    =>  formateo_fecha( $fin ),
					'inclusive' => true,
				),
			),
			'post_status'		=> $status,
			'meta_query'		=> array(
				array(
					'key'		=> 'instructor',
					'value'		=> $this->ID,
					'compare'	=> '=',
				),
			),
		);
		if( !$front ){
			$args['fields'] = 'ids';
		};

		$clases = get_posts( $args );
		if( $clases ){
			if( $front ){
				$format_clases = formateo_clases_cal( $clases, $analitica );
			}else{
				foreach( $clases as $id ){
					$format_clases[] = new Clase( $id );
				};
			};
		};
		return $format_clases;
	}
	public function get_calendar( $ID = false, $inicio = false ){
		$args = array(
			'tipo'		=> 'front_end',
			'data_tipo'	=> $this->ID,
			'classe'	=> 'de_instructor',
		);
		if( $ID ){
			$args['ID']	= $ID;
		};
		if( $inicio ){
			$args['fecha_inicio']	=  strtotime( date_i18n( 'Y-m-d' ) )+ dias( $inicio );
		};

		$calendario = new Calendario( $args );

		return $calendario;
	}
	public function imprimir_loop( $return_html = true, $selected = false, $especial=false ){
		$clases = $selected ? 'instructor selected' : 'instructor';

		if(!$especial){
			$html = '<article data-id_instructor="'.$this->ID.'" class="'.$clases.'" data-link="'.$this->permalink.'">';
				$html.= '<figure>'.$this->get_foto().'</figure>';
				$html.= '<h1>'.$this->nombre.'</h1>';
			$html.= '</article>';
		}else{
			$sel= $selected ? " selected" : "";
			$html='<option value="'.$this->ID. '"'.$sel.'>'.$this->nombre.'</option>';
		}

		if( $return_html ){
			echo $html;
		}else{
			return $html;
		};
	}
	public function imprimir_loop_movil(){
		if( !$this->foto ){ return; };
		$html = '<div class="instructor_loop">';
			$html.= $this->get_foto();
			$html.=
			'<div class="info_en_loop">'.
				'<span class="i_name color_blanco azul">'.$this->nombre.'</span>'.
				'<div class="mas_info_prof">'.
					$this->nacimiento.
					'<a class="ir_mas_i_i" href="'.$this->permalink.'">Info</a>'.
				'</div>'.
			'</div>';
		$html.= '</div>';
		return $html;
	}
	public function votar( $valor = 10 ){
		$total_votos	= (int)$this->votos['total_votos']+1;
		$suma_votos		= (int)$this->votos['suma_votos']+$valor;

		$this->votos = array(
			'total_votos'	=> $total_votos,
			'suma_votos'	=> $suma_votos,
		);
		update_post_meta( $this->ID, 'total_votos', $total_votos );
		update_post_meta( $this->ID, 'suma_votos', $suma_votos );

		$this->promedio	= $this->calcular_promedio();
	}
	public function calcular_promedio(){
		if( $this->votos['total_votos'] == 0 ){ return 0;};
		return (int)( (int)$this->votos['suma_votos'] / (int)$this->votos['total_votos'] );
	}
	public function print_estrellas(){
		for( $i = 1;$i<=10;$i++ ){
			$star_s = $this->promedio >= $i ? 'star_s' : '';
			echo '<li class="star_'.$i.' ratings_stars '.$star_s.'" data-valor="'.$i.'"></li>';
		};
	}
	public function imprimir_single(){
		?>
        <div class="pfr">
            <div class="row">
                <div class="col-md-5 foto_instructor_single">
                    <img src="<?= $this->foto;?>" class="img-responsive">
                </div><!--
                --><div class="col-md-7 infoi">
                    <div class="row vertical-align">
                        <div class="col-xs-4 nombre_estrellas_ins">
                            <big class="color_azul"><?= $this->nombre;?></big>
                            <div class="medium"><?= $this->nacimiento;?></div>
<!--                             <ul class="rate" data-instructor="<?= $this->ID;?>"><?php $this->print_estrellas();?></ul> -->
                        </div>
                        <div class="col-xs-8 descripcion_instruct">
                            <div class="medium text-justify"><?= $this->descripcion;?></div>
                        </div>
                    </div><?php /*
                    <hr>
                    <div class="compartir">
                        <span class="botleft"><a href="#"><img src="<?php plantilla()?>/images/botonfb.png"></a></span>
                        <span class="botleft"><a href="#"><img src="<?php plantilla()?>/images/botontw.png"></a></span>
                        <span class="botleft"><a href="#"><img src="<?php plantilla()?>/images/botongl.png"></a></span>
                    </div>
                    <hr>*/?>
                </div>
                <div class="infoi div_cal_i col-md-7">
				<?php
					$calendario = $this->get_calendar();
					$html_cal = $calendario->imprimir( false, '', false, true );
					echo $html_cal;
				?>
                </div>
<!-- 				<iframe style="display:block;" src="//embed.spotify.com/?uri=<?php echo urlencode('spotify:user:siclotunes:playlist:4xz8gsq3DL0kbQoyuVp6Rp')?>&theme=white" width="300" height="380" frameborder="0" allowtransparency="true"></iframe> -->
            </div>
            <hr>
        </div>
        <?php
	}
	private function imprimir_foto_single(){
		echo '<section class="columna_general single_foto_instructor">';
			echo $this->get_foto();
			echo '<img src="'.get('imagen_circulo',1,1,$this->circulo).'" class="circulo_instructor" width="277" height="277"/>';
		echo '</section>';
	}
	private function imprimir_desc(){

		$html = '';
		$html.= '<section class="preguntas_instructor">'.$this->descripcion;
			$html.= '<div class="una_palabra">En una palabra: <strong class="color_r_oscuro">'.$this->una_palabra.'</strong></div>';
		$html.= '</section>';

		echo $html;
	}
	private function proximas_clases(){
		if( !$clases = $this->get_clases() ){ return; };

		echo '<section class="columna_general columna_instructor proximas_clases">';
			echo '<h2 class="color_r_oscuro">Mis Clases: / Calendario</h2>';
			foreach( $clases as $clase ){
				$numero_dia	= date('d',$clase->fecha);
				$titulo		= $numero_dia.date_i18n( ' l', $clase->fecha );

				echo '<div class="clase_cuadrada gris_c" data-link="'.$clase->permalink.'"><strong>'.$titulo.':</strong> '.get_the_title( $clase->get_ubicacion() ).' - '.date_i18n( 'g:i A', $clase->fecha ).'</div>';
			};
		echo '</section>';
	}
	private function mi_musica(){
		if( !$this->playlist ){ return; };
		echo '<section class="columna_general columna_instructor proximas_clases">';
			echo '<h2 class="color_violeta">Mi Música:</h2>';
			echo '<iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/'.$this->playlist.'&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>';
		echo '</section>';
	}
	public function preguntas_back(){
		/*DESC LARGA*/
		$html ='<div class="upcoming_reservations user_billing_data"><h2>Descripción</h2></div>';
		$html.='<textarea class="instructor_single_answer" name="descripcion" placeholder="Escribe la descripción del instructor">';
			$html.= strip_tags( $this->descripcion );
		$html.='</textarea>';
		/*DESC CORTA*/
		$html .='<div class="inxt_inline" >';
			$html.='<input type="text" placeholder="En una palabra:" value="'.$this->una_palabra.'" name="una_palabra" class="input_inst"/>';
			/*SOUNDCLU ID*/
			$html.='<input type="text" placeholder="ID" value="'.$this->playlist.'" name="playlist" class="input_inst"/>';
		$html .='</div>';
		return $html;
	}
	public function imprimir_en_canvas(){
		if( !$this->foto ){ return; };
		$html= "<div class='i_en_c' data-instructor='".$this->ID."' data-general='".json_encode(array(
			$this->nombre,
			$this->permalink,
			$this->nacimiento,
		))."'>";
			$html.= '<img src="'.$this->foto.'" class="foto_i_c" data-link="'.$this->permalink.'"/>';
		$html.= '</div>';
		echo $html;
	}
};
?>
