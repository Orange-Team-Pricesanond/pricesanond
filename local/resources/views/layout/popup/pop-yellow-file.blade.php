<?php        
    $getID = DB::table('tb_yellowfiles')->get();
    foreach($getID as $_getID){
        $logYellowfiles = DB::table('tb_logyellowfile')->where('id_yf', $_getID->id_yf)->orderBy('updated_at', 'desc')->first();
?>

<div class="modal fade" id="pop_yellow_file{{$_getID->id_yf}}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="material-icons">info</i> Yellow file info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <nav class="nav nav-tabs" id="yellow-tab" role="tablist">
                    <a id="yellow_tab_1" href="#yellow_con_1" aria-controls="yellow_con_1" class="nav-item nav-link active" data-toggle="tab" role="tab" aria-selected="true">YELLOW FILE</a>
                    <a id="yellow_tab_2" href="#yellow_con_2" aria-controls="yellow_con_2" class="nav-item nav-link" data-toggle="tab" role="tab" aria-selected="false">TIME RECORD</a>
                </nav>

                <div class="tab-content" id="yellow-tabContent">
                    <div id="yellow_con_1" aria-labelledby="yellow_tab_1" role="tabpanel" class="tab-pane fade show active">
                        @include('yellow_file.yellow_view')
                    </div>
                    <div id="yellow_con_2" aria-labelledby="yellow_tab_2" role="tabpanel" class="tab-pane fade">
                        @include('yellow_file.time_record')
                    </div>
                </div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>

 <?php } ?>