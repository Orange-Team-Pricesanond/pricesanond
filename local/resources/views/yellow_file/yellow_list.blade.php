<div class="card border-0">
    
    <div class="card-body">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="30">#</th>
                    <th>File No.</th>
                    <th>Client Name</th>
                    <th>Matter</th>
                    <th>Contact Person Name</th>
                    <th>Status</th>
                    <th width="30" class="text-center"><i class="material-icons md-14">more_vert</i></th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach ($yellowfile as $val)
            <?php
                $client_name = DB::table('tb_clients')->where('id_ct',$val->id_ct_yf)->first();
                $partner_name = DB::table('tb_partner')->where('pt_id',$val->yf_partner)->first();
                $count = DB::table('tb_timesheet')->where('ts_id_yf',$val->id_yf)->count();
            ?>
                <tr>
                    <td data-toggle="modal" data-target="#pop_yellow_file{{$val->id_yf}}" data-value="{{$val->id_yf}}"> {{$i}} </td>
                    <td data-toggle="modal" data-target="#pop_yellow_file{{$val->id_yf}}" data-value="{{$val->id_yf}}">{{ $val->yf_fileno }}</td>
                    <td data-toggle="modal" data-target="#pop_yellow_file{{$val->id_yf}}" data-value="{{$val->id_yf}}">{{ $client_name->ct_fn }}</td>
                    <td data-toggle="modal" data-target="#pop_yellow_file{{$val->id_yf}}" data-value="{{$val->id_yf}}">{{ $partner_name->pt_name }}</td>
                    <td data-toggle="modal" data-target="#pop_yellow_file{{$val->id_yf}}" data-value="{{$val->id_yf}}">{{ $val->yf_mtt }}</td>
                    <td data-toggle="modal" data-target="#pop_yellow_file{{$val->id_yf}}">{{ ( $count > 0 ? "Complete" : "Padding") }}</td>
                    <td class="text-center">
                        <span class="more material-icons md-14" id="ac_dts_1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">more_vert</span>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ac_dts_1">
                            <a class="dropdown-item" href="#">Submit</a>
                            <a class="dropdown-item" href="{{ url('deleteYellow') }}/{{$val->id_yf}}">Delete</a>
                        </div>
                    </td>
                </tr>
                <?php $i++; ?>
            @endforeach
            </tbody>
        </table>

    </div>
</div>

 
   