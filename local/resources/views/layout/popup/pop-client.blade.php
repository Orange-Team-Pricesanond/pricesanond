<div class="modal fade" id="pop_client_list" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="material-icons">info</i> Client list</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <table id="list_sm" class="listed table table-hover display responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th width="30">#</th>
                            <th>ID</th>
                            <th>Client</th>
                            <!-- <th>Matter</th> -->
                            <th>Country</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $clientall = DB::table('tb_clients')->get();
                    $i = 1;
                    foreach ($clientall as $_val){
                    echo '
                        <tr>
                            <td>'.$i.'</td>
                            <td>'.$_val->ct_no.'</td>
                            <td>'.$_val->ct_fn.'</td>
                            <td>'.$_val->ct_country.'</td>
                        </tr>';
                        $i++;
                    } 
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>