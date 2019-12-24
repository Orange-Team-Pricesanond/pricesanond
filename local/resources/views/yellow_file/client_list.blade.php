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
                    <th>ID.</th>
                    <th>Client Name</th>
                    <th>County</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach ($client as $_client)
                <tr>
                    <td>{{$i}} </td>
                    <td><a href="{{ url('editclient') }}/{{$_client->id_ct}}">{{ $_client->ct_no }}</a></td>
                    <td><a href="{{url('viewclient')}}/{{$_client->id_ct}}">{{ $_client->ct_fn }}</a></td>
                    <td><a href="{{url('viewclient')}}/{{$_client->id_ct}}">{{ $_client->ct_country }}</a></td>
                </tr>
                <?php $i++; ?>
            @endforeach
            </tbody>
        </table>

    </div>
</div>