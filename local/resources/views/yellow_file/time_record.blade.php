<?php
    $total_a = 0;
    $total_b = 0;
    $total_c = 0;
    $total_d = 0;
    $total_e = 0;
    $total_f = 0;
    $last_total = 0;

    $rate_a = 0;
    $rate_b = 0;
    $rate_c = 0;
    $rate_d = 0;
    $rate_e = 0;
    $rate_f = 0;
?>
{{$_getID->id_yf}}
<table id="list_sm" class="listed table table-hover display responsive nowrap w-100">
    <thead>
        <tr>
            <th width="30">#</th>
            <th>Date</th>
            <th>From</th>
            <th>To</th>
            <th>Code</th>
            <th class="text-right text-blue">A</th>
            <th class="text-right text-green">B</th>
            <th class="text-right text-orange">C</th>
            <th class="text-right text-pink">D</th>
            <th class="text-right text-purple">E</th>
            <th class="text-right text-grey">F</th>
            <th>Work performed</th>
        </tr>
    </thead>
    <tbody>
    <?php $i= 1 ;?>    
    @foreach ($record as $_record)
    <?php 
        $arrays = explode(':', $_record->ts_total_time); 
        $total = intval($arrays[0]).".".$arrays[1];
        $yellow = DB::table('tb_yellowfiles')->where('id_yf',$_record->ts_id_yf)->first();

        if($_record->ts_reate_work == 'A')
        {
            $total_a += $total;
            $rate_a = $yellow->yf_rates_a;
        }
        elseif($_record->ts_reate_work == 'B')
        {   
            $total_b += $total;
            $rate_b = $yellow->yf_rates_b;
        }
        elseif($_record->ts_reate_work == "C")
        {
            $total_c += $total;
            $rate_c = $yellow->yf_rates_c;
        }
        elseif($_record->ts_reate_work == "D")
        {
            $total_d += $total;
            $rate_d = $yellow->yf_rates_d;
        }
        elseif($_record->ts_reate_work == "E")
        {   
            $total_e += $total;
            $rate_e = $yellow->yf_rates_e;
        }else{ // F
            $total_f += $total;
            $rate_f = $yellow->yf_rates_f;
        }
     ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td> {{ date('d/m/Y', strtotime($_record->created_at)) }} </td>
            <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$_record->ts_form)->format('h:i')}}</td>
            <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$_record->ts_to)->format('h:i')}}</td>
            <td>{{$_record->ts_law_id}}</td>
            <td class="text-right text-blue">{{ ($_record->ts_reate_work == "A") ? $total : "-" }}</td>
            <td class="text-right text-green">{{ ($_record->ts_reate_work == "B") ? $total : "-" }}</td>
            <td class="text-right text-orange">{{ ($_record->ts_reate_work == "C") ? $total : "-" }}</td>
            <td class="text-right text-pink">{{ ($_record->ts_reate_work == "D") ? $total : "-" }}</td>
            <td class="text-right text-purple">{{ ($_record->ts_reate_work == "E") ? $total : "-" }}</td>
            <td class="text-right text-grey">{{ ($_record->ts_reate_work == "F") ? $total : "-" }}</td>
            <td>
                <div>{{$_record->ts_woek}}</div>
            </td>
        </tr>
        <?php $i++; ?>
    @endforeach

        <tr class="bg-light">
            <td>#</td>
            <td colspan="4">TOTAL HOURS</td>
            <td class="text-right text-blue">{{ ($total_a == 0) ? "-" : $total_a }}</td>
            <td class="text-right text-green">{{ ($total_b == 0) ? "-" : $total_b }}</td>
            <td class="text-right text-orange">{{ ($total_c == 0) ? "-" : $total_c }}</td>
            <td class="text-right text-pink">{{ ($total_d == 0) ? "-" : $total_d }}</td>
            <td class="text-right text-purple">{{ ($total_e == 0) ? "-" : $total_e }}</td>
            <td class="text-right text-grey">{{ ($total_f == 0) ? "-" : $total_f }}</td>
            <td>HOURS</td>
        </tr>
        <tr class="bg-light">
            <td>#</td>
            <td colspan="4">HOURLY RATE</td>
            <td class="text-right text-blue">{{ ($total_a == 0) ? "-" : $rate_a }}</td>
            <td class="text-right text-green">{{ ($total_b == 0) ? "-" : $rate_b }}</td>
            <td class="text-right text-orange">{{ ($total_c == 0) ? "-" : $rate_c }}</td>
            <td class="text-right text-pink">{{ ($total_d == 0) ? "-" : $rate_d }}</td>
            <td class="text-right text-purple">{{ ($total_e == 0) ? "-" : $rate_e }}</td>
            <td class="text-right text-grey">{{ ($total_f == 0) ? "-" : $rate_f }}</td>
            <td>USD</td>
        </tr>
        <tr class="bg-light">
            <td>#</td>
            <td colspan="4">SUBTOTAL</td>
            <td class="text-right text-blue">{{ ($total_a == 0) ? "-" : number_format(($total_a/60)*$rate_a ,2) }} <?php ($total_a == 0) ? "" : $last_total += number_format(($total_a/60)*$rate_a ,2); ?></td>
            <td class="text-right text-green">{{ ($total_b == 0) ? "-" : number_format(($total_b/60)*$rate_b ,2) }} <?php ($total_b == 0) ? "" : $last_total += number_format(($total_b/60)*$rate_b ,2); ?></td>
            <td class="text-right text-orange">{{ ($total_c == 0) ? "-" : number_format(($total_c/60)*$rate_c) }} <?php ($total_c == 0) ? "" : $last_total += number_format(($total_c/60)*$rate_c ,2); ?></td>
            <td class="text-right text-pink">{{ ($total_d == 0) ? "-" : number_format(($total_d/60)*$rate_d) }} <?php ($total_d == 0) ? "" : $last_total += number_format(($total_d/60)*$rate_d ,2); ?></td>
            <td class="text-right text-purple">{{ ($total_e == 0) ? "-" : number_format(($total_e/60)*$rate_e) }} <?php ($total_e == 0) ? "" : $last_total += number_format(($total_e/60)*$rate_e ,2); ?></td>
            <td class="text-right text-grey">{{ ($total_f == 0) ? "-" : number_format(($total_f/60)*$rate_f) }} <?php ($total_f == 0) ? "" : $last_total += number_format(($total_f/60)*$rate_f ,2); ?></td>
            <td>USD</td>
        </tr>
        <tr class="bg-light">
            <td>#</td>
            <td colspan="4">TOTAL VALUE</td>
            <td colspan="6" class="text-right text-red"><strong>{{$last_total}}</strong></td>
            <td>USD</td>
        </tr>

    </tbody>
</table>