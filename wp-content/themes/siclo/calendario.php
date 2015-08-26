<div class="navigation">
    <a class="prev" onclick="$('#cont_calendario').load('__plantilla__/procesos/calendario.php?month=__prev_month__&_r=' + Math.random()); return false;"></a>
    <a class="next" onclick="$('#cont_calendario').load('__plantilla__/procesos/calendario.php?month=__next_month__&_r=' + Math.random()); return false;"></a>
    <div class="title" >__cal_caption__</div>
</div>

<table>
    <tr>
        <th class="weekday"><span>d</span></th>
        <th class="weekday"><span>l</span></th>
        <th class="weekday"><span>m</span></th>
        <th class="weekday"><span>x</span></th>
        <th class="weekday"><span>j</span></th>
        <th class="weekday"><span>v</span></th>
        <th class="weekday"><span>s</span></th>
    </tr>
    __cal_rows__
</table>