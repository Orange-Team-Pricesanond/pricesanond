
@foreach($sheet as $_val)
<div class="modal fade" id="pop_matter{{$_val->ts_ref}}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document"> 
        <form method="POST" enctype="multipart/form-data" action="{{ url('edittimesheet') }}" style=" width: 100%; ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="material-icons">build</i> Time Sheet Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ csrf_field() }}

                @php
                    $yw = DB::table('tb_yellowfiles')->where('id_yf',$_val->ts_id_yf)->first();
                @endphp

                <input type="hidden" id="ts_id_yf_{{$_val->ts_ref}}" name="ts_id_yf" value="{{$_val->ts_id_yf}}">
                <input type="hidden" id="ts_ref_{{$_val->ts_ref}}" name="ts_ref" value="{{$_val->ts_ref}}">
                <input type="hidden" id="ts_no{{$_val->ts_ref}}" name="ts_no" value="{{$_val->ts_no}}">
                <input type="hidden" id="id_{{$_val->ts_ref}}" name="id" value="{{ Auth::user()->id }}">
                <input type="hidden" id="ts_total_time_{{$_val->ts_ref}}" name="ts_total_time" value="{{$_val->ts_total_time}}">

                <div class="modal-body">
                    <div class="form-group row">
                        <label for="ts_date" class="col-sm-3 col-form-label" style=" padding-left: 50px; ">Date</label>
                        <div class="col-sm-8">
                        <input type="date" readonly class="form-control" name="ts_date" id="ts_date_{{$_val->ts_ref}}" value="{{$_val->ts_date}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ts_law_id" class="col-sm-3 col-form-label" style=" padding-left: 50px; ">Code</label>
                        <div class="col-sm-8">
                        <input type="number" class="form-control" name="ts_law_id" id="ts_law_id_{{$_val->ts_ref}}" value="{{$_val->ts_law_id}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ts_form" class="col-sm-3 col-form-label" style=" padding-left: 50px; ">Form</label>
                        <div class="col-sm-8">
                        <input type="time" class="form-control" name="ts_form" id="ts_form_{{$_val->ts_ref}}" value="{{$_val->ts_form}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ts_to" class="col-sm-3 col-form-label"style=" padding-left: 50px; ">To</label>
                        <div class="col-sm-8">
                        <input type="time" class="form-control" onChange="calculateEdit({{$_val->ts_ref}})" name="ts_to" id="ts_to_{{$_val->ts_ref}}" value="{{$_val->ts_to}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ts_woek" class="col-sm-3 col-form-label"style=" padding-left: 50px; ">work performed</label>
                        <div class="col-sm-8">
                        <textarea class="form-control" name="ts_woek" id="ts_woek_{{$_val->ts_ref}}">{{$_val->ts_woek}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                        @if(Auth::user()->user_type == $_val->ts_status)
                           <button type="submit" class="btn btn-primary">Save</button>
                        @endif
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
