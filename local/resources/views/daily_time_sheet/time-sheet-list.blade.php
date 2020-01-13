<div class="card border-0">
    <div class="card-header py-4 bg-white d-flex justify-content-between">
        <form method="get">
            <div class="d-flex">
                <div class="input-group input-group-sm mr-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text border-0 material-icons">date_range</div>
                    </div>
                    <input type="date" id="search_date" name="search_date" class="form-control" />
                </div>
                <div class="input-group input-group-sm mr-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text border-0 material-icons">info</div>
                    </div>
                    <select class="form-control" id="search_type" name="search_type">
                        <option selected>All</option>
                        <option value="Padding">Padding</option>
                        <option value="Complete">Complete</option>
                    </select>
                </div>
                <div class="input-group input-group-sm mr-2">
                    <button type="submit" class="btn-c material-icons" title="Search">search</button>
                </div>
            </div>
        </form>
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