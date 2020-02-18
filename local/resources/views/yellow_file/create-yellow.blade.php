<form method="post" action=" {{ url('yellow_file_edit') }} " enctype="multipart/form-data">
<div class="card shadow-on">
    <div class="card-header py-4 bg-transparent d-flex justify-content-between">
        <div>INSTRUCTION FOR OPENING YELLOW FILE</div>
        <div>
            <div class='d-inline-block'>
                <span class="ml-2">File No. </span>
                <span class="text-blue">{{$yellows->yf_fileno}}</span>
            </div>
            <!-- <div class='d-inline-block'>
                <span class="ml-2">Status : </span>
                <span class="text-green">ACTIVE</span>
            </div> -->
        </div>
    </div>
    <div class="card-body">
    {{ csrf_field() }}
        
        <input type="hidden" name="yf_fileno" id="yf_fileno" value="{{ $yellows->yf_fileno }}" >
        <input type="hidden" name="id" id="id" value="{{ Auth::user()->id }}" >
        <input type="hidden" name="id_yf" id="id_yf" value="{{ $yellows->id_yf }}" >
       
        <h6 class="card-title mb-4"><strong>01. File details and Rates</strong></h6>
        <div class="row form-group">
            <div class="col-lg-4">
                <label>File name</label>
                <div class="input-group">
                    <select id="id_ct_yf" name="id_ct_yf" class="form-control select2" style="width:100%; height:37px;">
                        @foreach ($client as $val)
                            <option value="{{ $val->id_ct }}"  {{ ( $val->id_ct == $yellows->id_ct_yf) ? "selected" : "" }}> {{ $val->ct_fn }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <label>Matter</label>
                <input type="text" class="form-control" id="yf_mtt" name="yf_mtt" value="{{$yellows->yf_mtt}}">
            </div>
            <div class="col-lg-4">
                <label>Partner</label>
                <select id="yf_partner" name="yf_partner" class="form-control select2" style="width:100%; height:37px;">
                    @foreach ($partner as $val)
                        <option value="{{ $val->pt_id }}" {{ ( $val->pt_id == $yellows->yf_partner) ? "selected" : "" }}> {{ $val->pt_name }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-lg-3">
                <label>Currency</label>
                <select id="yf_currency" name="yf_currency" class="form-control" data-live-search="true" title="Please select">
                    <option {{ ( $yellows->yf_currency == "USD") ? "selected" : "" }}>USD</option>
                    <option {{ ( $yellows->yf_currency == "TH") ? "selected" : "" }}>THB</option>
                </select>
            </div>
            <div class="col-lg-3">
                <label>Converter to</label>
                <select id="yf_currencyter" name="yf_currencyter" class="form-control" data-live-search="true" title="Please select">
                    <option {{ ( $yellows->yf_currencyter == "USD") ? "selected" : "" }}>USD</option>
                    <option {{ ( $yellows->yf_currencyter == "TH") ? "selected" : "" }}>THB</option>
                </select>
            </div>
            <div class="col-lg-2">
                <label>Fix Fee</label>
                <input type="number" min="0" class="form-control" id="yf_fixfee" name="yf_fixfee" value="{{$yellows->yf_fixfee}}">
            </div>
            <div class="col-lg-2">
                <label>Estimate</label>
                <input type="number" min="0" class="form-control" id="yf_estimate" name="yf_estimate" value="{{$yellows->yf_estimate}}">
            </div>
            <div class="col-lg-2">
                <label>Discount</label>
                <input type="number" min="0" class="form-control" id="yf_discount" name="yf_discount" value="{{$yellows->yf_discount}}">
            </div>
        </div>

        <div class="row form-group">
            <div class="col-lg-3">
                <label class="d-block">Currency Both option</label>
                <div class="custom-control custom-radio custom-control-inline mt-2">
                    <input type="radio" id="both_1" name="yf_bothcurrency" class="custom-control-input" value="1" {{ ( $yellows->yf_bothcurrency == "1" ) ? "checked" : "" }}>
                    <label class="custom-control-label" for="both_1">THB</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline  mt-2">
                    <input type="radio" id="both_2" name="yf_bothcurrency" class="custom-control-input" value="2" {{ ( $yellows->yf_bothcurrency == "2" ) ? "checked" : "" }}>
                    <label class="custom-control-label" for="both_2">Both</label>
                </div>
            </div>

            <div class="col-lg-2">
                <label>Vat</label>
                <input type="number" min="7" class="form-control" id="yf_vat" name="yf_vat" value="{{$yellows->yf_vat}}">
            </div> 
            <div class="col-lg-4">
                <label class="d-block">Time</label>
                <div class="custom-control custom-radio custom-control-inline mt-2">
                    <input type="radio" id="time_1" name="time" class="custom-control-input" value="5" {{ ( $yellows->yf_time == "5" ) ? "checked" : "" }}>
                    <label class="custom-control-label" for="time_1">5 Increment</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline  mt-2">
                    <input type="radio" id="time_2" name="time" class="custom-control-input" value="6" {{ ( $yellows->yf_time == "6" ) ? "checked" : "" }}>
                    <label class="custom-control-label" for="time_2">6 Increment</label>
                </div>
            </div>
            <div class="col-lg-3">
                <label>Group</label>
                <input type="text" min="7" class="form-control" id="yt_group" name="yt_group" value="{{$yellows->yt_group}}">
            </div>
        </div>

        <!-- <div class="row form-group">
            <label class="col-12">Hourly rates</label>            
            <div class="col-lg-2">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text border-0">A</div>
                    </div>
                    <input type="text" class="form-control" id="yf_rates_a" name="yf_rates_a" value="{{$val->yfd_rates_a}}">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text border-0">B</div>
                    </div>
                    <input type="text" class="form-control" id="yf_rates_b" name="yf_rates_b" value="{{$val->yfd_rates_b}}">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text border-0">C</div>
                    </div>
                    <input type="text" class="form-control" id="yf_rates_c" name="yf_rates_c" value="{{$val->yfd_rates_c}}">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text border-0">D</div>
                    </div>
                    <input type="text" class="form-control" id="yf_rates_d" name="yf_rates_d" value="{{$val->yfd_rates_d}}">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text border-0">E</div>
                    </div>
                    <input type="text" class="form-control" id="yf_rates_e" name="yf_rates_e" value="{{$val->yfd_rates_e}}">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text border-0">F</div>
                    </div>
                    <input type="text" class="form-control" id="yf_rates_f" name="yf_rates_f" value="{{$val->yfd_rates_f}}">
                </div>
            </div>
        </div> -->

        @foreach ($detail as $val)
        <div class="row form-group">
            <label class="col-12">Hourly rates</label>            
            <div class="col-lg-2">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text border-0">A</div>
                    </div>
                    <p class="form-control">{{$val->yfd_rates_a}}</p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text border-0">B</div>
                    </div>
                    <p class="form-control">{{$val->yfd_rates_b}}</p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text border-0">C</div>
                    </div>
                    <p class="form-control">{{$val->yfd_rates_c}}</p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text border-0">D</div>
                    </div>
                    <p class="form-control">{{$val->yfd_rates_d}}</p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text border-0">E</div>
                    </div>
                    <p class="form-control">{{$val->yfd_rates_e}}</p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text border-0">F</div>
                    </div>
                    <p class="form-control">{{$val->yfd_rates_f}}</p>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row form-group">
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Invoice name</label>
                    <input type="text" class="form-control" id="yf_inv_num" name="yf_inv_num" value="{{$yellows->yf_inv_num}}">
                </div>
                <div class="form-group">
                    <label>Company's tax id number</label>
                    <input type="text" class="form-control" id="yf_taxnumber" name="yf_taxnumber" value="{{$yellows->yf_taxnumber}}">
                </div>
            </div>
            <div class="col-lg-8">
                <label>Remark condition</label>
                <textarea class="form-control" rows="4" id="yf_remark" name="yf_remark">{{$yellows->yf_remark}}</textarea>
            </div>
        </div>

        <hr class="my-5">
        <h6 class="card-title mb-4"><strong>02. Invoice Address</strong></h6>
        <div class="row form-group">
            <div class="col-lg-4">
                <label>Branch</label>
                <select id="yf_branch" name="yf_branch" onchange="changBranch_new(this.value)" class="form-control select2" style="width:100%; height:38px;">
                @foreach ($address as $val)
                    <option value="{{ $val->ct_ad_id }}" {{ ( $val->yf_branch == $val->ct_ad_id) ? "checked" : "" }}> {{ $val->ct_ad_branch }} </option>
                @endforeach
                </select>
            </div>
            <div class="col-lg-4">
                <label>Invoice name</label>
                <input type="text" class="form-control" id="yf_taxnumber" name="yf_taxnumber" value="{{$yellows->yf_taxnumber}}">
            </div>
            <div class="col-lg-4">
                <label>Company's tax id number</label>
                <input type="text" class="form-control" id="yf_inv_num" name="yf_inv_num" value="{{$yellows->yf_inv_num}}">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-lg-12">
                <label>Address</label>
                <textarea class="form-control" name="yf_address" id="yf_address">{{$yellows->yf_address}}</textarea>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-lg-4">
                <label>Phone</label>
                <input type="text" class="form-control" id="yf_phone" name="yf_phone" value="{{$yellows->yf_phone}}">
            </div>
            <div class="col-lg-4">
                <label>Fax</label>
                <input type="text" class="form-control" id="yf_fax" name="yf_fax" value="{{$yellows->yf_fax}}">
            </div>
            <div class="col-lg-4">
                <label>Email address</label>
                <input type="text" class="form-control" id="yf_email" name="yf_email" value="{{$yellows->yf_email}}">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-lg-4">
                <label>Attention</label>
                <input type="text" class="form-control" id="yf_atten" name="yf_atten" value="{{$yellows->yf_atten}}">
            </div>
            <div class="col-lg-4">
                <label>How to send</label>
                <input type="text" class="form-control" id="yf_invioctext" name="yf_invioctext" value="{{$yellows->yf_invioctext}}">
            </div>
        </div>

        <hr class="my-5">
        <h6 class="card-title mb-4"><strong>03. Document delivery location</strong></h6>
       
        <div class="row form-group">
            <div class="col-lg-6">
                <label>Company's tax id number</label>
                <input type="number" class="form-control" id="dy_taxnumber" name="dy_taxnumber" value="{{$yellows->dy_taxnumber}}">
            </div>
            <div class="col-lg-6">
                <label>Company's name</label>
                <input type="text" class="form-control" id="dy_inv_num" name="dy_inv_num" value="{{$yellows->dy_inv_num}}">
            </div>
        </div>

        <div class="row form-group">
            <div class="col-lg-12">
                <label>Address</label>
                <textarea class="form-control" id="dy_address" name="dy_address">{{$yellows->dy_address}}</textarea>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-lg-4">
                <label>Phone</label>
                <input type="text" class="form-control" id="dy_phone" name="dy_phone" value="{{$yellows->dy_phone}}">
            </div>
            <div class="col-lg-4">
                <label>Fax</label>
                <input type="text" class="form-control" id="dy_fax" name="dy_fax" value="{{$yellows->dy_fax}}">
            </div>
            <div class="col-lg-4">
                <label>Email address</label>
                <input type="text" class="form-control" id="dy_email" name="dy_email" value="{{$yellows->dy_email}}">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-lg-4">
                <label>Attention</label>
                <input type="text" class="form-control" id="dy_atten" name="dy_atten" value="{{$yellows->dy_atten}}">
            </div>
        </div>


        <hr class="my-5">
        <h6 class="card-title mb-4"><strong>04. Refered by</strong></h6>
        <div class="row form-group">
            <div class="col-lg-4">
                <input type="text" class="form-control" id="yf_refer" name="yf_refer" value="{{$yellows->yf_refer}}">
            </div>
        </div>

        <hr class="my-5">
        <h6 class="card-title mb-4"><strong>05. Conflict check completed</strong></h6>
        <div class="row form-group">
            <div class="col-lg-4">
                <div class="custom-control custom-radio custom-control-inline mt-2">
                    <input type="radio" id="conflict_1" name="yf_confict" class="custom-control-input" value="1" {{ ( $val->yf_confict == 1) ? "checked" : "" }}>
                    <label class="custom-control-label" for="conflict_1">Yes</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline  mt-2">
                    <input type="radio" id="conflict_2" name="yf_confict" class="custom-control-input" value="0" {{ ( $val->yf_confict == 0) ? "checked" : "" }}>
                    <label class="custom-control-label" for="conflict_2">No</label>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="page-footer font-small" style=" background-color: cornflowerblue; ">

        <div class="footer-copyright text-right py-3" style=" padding-right: 20px; ">
            <a href="#" class="btn btn-secondary">CANCEL</a>
            <button type="submit" class="btn btn-primary ml-3">SAVE</button>
        </div>
        </div>
        
    </footer>
    <!-- Footer -->
</div>
</form>