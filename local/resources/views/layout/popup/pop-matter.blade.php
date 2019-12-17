<div class="modal fade" id="pop_matter" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="material-icons">info</i> Matter list</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="list_sm" class="listed table table-hover display responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th width="30">#</th>
                            <th width="30">#</th>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Matter</th>
                            <th>Country</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @foreach( $join as $val)
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="chk-matt_{{$i}}" class="custom-control-input">
                                    <label class="custom-control-label" for="chk-matt_{{$i}}"></label>
                                </div>
                            </td>
                            <td> {{$i}} </td>
                            <td> {{ $val->ct_no }} </td>
                            <td>{{ $val->ct_fn }}</td>
                            <td>{{ $val->yf_mtt }}</td>
                            <td>{{ $val->ct_country }}</td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                    </tbody>
                </table>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Confirm</button>
            </div>
        </div>
    </div>
</div>