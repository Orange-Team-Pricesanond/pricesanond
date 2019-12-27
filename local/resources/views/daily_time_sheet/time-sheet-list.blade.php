<div class="card border-0">
    <div class="card-header py-4 bg-white d-flex justify-content-between">
        <div class="d-flex">
            <div class="input-group input-group-sm mr-2">
                <div class="input-group-prepend">
                    <div class="input-group-text border-0 material-icons">date_range</div>
                </div>
                <input type="date" class="form-control" value="SEP 1 – SEP 30, 2019">
            </div>
            <div class="input-group input-group-sm mr-2">
                <div class="input-group-prepend">
                    <div class="input-group-text border-0 material-icons">info</div>
                </div>
                <select class="form-control">
                    <option selected>All</option>
                    <option>Draft</option>
                    <option>Submitted</option>
                </select>
            </div>
        </div>
        <div>
            <input type="text" class="form-control form-control-sm">
        </div>
    </div>
    <div class="card-body">
        <table id="list_sm" class="listed table table-hover display responsive nowrap w-100">
            <thead>
                <tr>
                    <th width="30">#</th>
                    <th>File No.</th>
                    <th>Client Name</th>
                    <th>Matter</th>
                    <th>Contact Person Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
             <?php $i = 1; ?>
                @foreach($yellowfile as $val)
                <?php
                    $client_name = DB::table('tb_clients')->where('id_ct',$val->id_ct_yf)->first();
                    $partner_name = DB::table('tb_partner')->where('pt_id',$val->yf_partner)->first();
                    $count = DB::table('tb_timesheet')->where('ts_id_yf',$val->id_yf)->count();
                ?>
                <tr>
                    <td><a href="{{url('timeseetview')}}/{{$val->id_yf}}">{{$i}}</a></td>
                    <td><a href="{{url('timeseetview')}}/{{$val->id_yf}}">{{ $val->yf_fileno }}</a></td>
                    <td><a href="{{url('timeseetview')}}/{{$val->id_yf}}">{{ $client_name->ct_fn }}</a></td>
                    <td><a href="{{url('timeseetview')}}/{{$val->id_yf}}">{{ $partner_name->pt_name }}</a></td>
                    <td><a href="{{url('timeseetview')}}/{{$val->id_yf}}">{{ $val->yf_mtt }}</a></td>
                    <td><a href="{{url('timeseetview')}}/{{$val->id_yf}}">{{ ( $count > 0 ? "Complete" : "Padding") }}</a></td>
                </tr>
                <?php $i++; ?>
                @endforeach 
            </tbody>
        </table>

    </div>
</div>