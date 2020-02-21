<div class="card border-0">
    
    <div class="card-body">
        <table class="listed table table-hover ">
            <thead>
                <tr>
                    <th width="30">#</th>
                    <th>ID.</th>
                    <th>Client Name</th>
                    <th>County</th>
                    <th width="30" class="text-center"><i class="material-icons md-14">more_vert</i></th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach ($client as $_client)
                <tr>
                    <td>{{$i}} </td>
                    <td><a href="{{url('viewclient')}}/{{$_client->id_ct}}">{{ $_client->ct_no }} </a></td>
                    <td><a href="{{url('viewclient')}}/{{$_client->id_ct}}">{{ $_client->ct_fn }}</a></td>
                    <td><a href="{{url('viewclient')}}/{{$_client->id_ct}}">{{ $_client->ct_country }}</a></td>
                    <td class="text-center">
                        <span class="more material-icons md-14" id="ac_dts_1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">more_vert</span>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ac_dts_1">
                            <a class="dropdown-item" href="{{ url('deleteclient') }}/{{$_client->id_ct}}">Delete</a>
                        </div>
                    </td>
                </tr>
                <?php $i++; ?>
            @endforeach
            </tbody>
        </table>

    </div>
</div>
