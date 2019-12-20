
<div class="card border-0">
    <div class="card-header py-4 bg-white d-flex justify-content-between">
        <div>INSTRUCTION FOR OPENING YELLOW FILE</div>
        <div>
            <div class='d-inline-block'>
                <span class="ml-2">File No. </span>
                <span class="text-blue">{{ $_getID->yf_fileno }}</span>
            </div>
            <div class='d-inline-block'>
                <span class="ml-2">Status : </span>
                <span class="text-green">ACTIVE</span>
            </div>
        </div>
    </div>
    <form method="post" action=" {{ url('yellow_file_edit') }} " enctype="multipart/form-data">
        <div class="card-body">
            {{ csrf_field() }}
            <h6 class="card-title mb-4"><strong>01. File details and Rates</strong></h6>
                <input type="hidden" id="id_yf" name="id_yf" value="{{ $_getID->id_yf }}">
                <input type="hidden" id="yf_fileno" name="yf_fileno" value="{{ $_getID->yf_fileno }}">
                <div class="row form-group">
                    <div class="col-lg-4">
                        <label>File name</label>
                        <div class="input-group">
                            <select id="id_ct_yf" name="id_ct_yf" class="form-control select2" style="width:100%; height:25px;">
                            @foreach ($client as $val)
                                <option value="{{ $val->id_ct }}" {{ ( $val->id_ct == $_getID->id_ct_yf ? "selected" : "") }}> {{ $val->ct_fn }} </option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label>Matter</label>
                        <input type="text" class="form-control" id="yf_mtt" name="yf_mtt" value="{{ $_getID->yf_mtt }}">
                    </div>
                    <div class="col-lg-4">
                        <label>Partner</label>
                        <select id="yf_partner" name="yf_partner" class="form-control select2" style="width:100%; height:25px;">
                            <!-- <option>Please select</option> -->
                            @foreach ($partner as $val)
                                <option value="{{ $val->pt_id }}" {{ ( $val->pt_id == $_getID->yf_partner ? "selected" : "") }}> {{ $val->pt_name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2">
                        <label>Currency</label>
                        <select id="yf_currency" name="yf_currency" class="form-control" data-live-search="true" title="Please select">
                            @foreach ($money as $_money)
                                <option value="{{ $_money->mu_name }}" {{ ( $_getID->yf_currency == $_money->mu_name ? "selected" : "") }}> {{ $_money->mu_name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label>Converter to</label>
                        <select id="yf_currencyter" name="yf_currencyter" class="form-control" data-live-search="true" title="Please select">
                            @foreach ($money as $_money)
                                <option value="{{ $_money->mu_name }}" {{ ( $_getID->yf_currencyter == $_money->mu_name ? "selected" : "") }}> {{ $_money->mu_name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label>Fix Fee</label>
                        <input type="number" min="0" class="form-control" id="yf_fixfee" name="yf_fixfee" value="{{ $_getID->yf_fixfee }}" placeholder="USD">
                    </div>
                    <div class="col-lg-2">
                        <label>Estimate</label>
                        <input type="number" min="0" class="form-control" id="yf_estimate" name="yf_estimate" value="{{ $_getID->yf_estimate }}">
                    </div>
                    <div class="col-lg-2">
                        <label>Discount</label>
                        <input type="number" min="0" class="form-control" id="yf_discount" name="yf_discount" value="{{ $_getID->yf_discount }}" placeholder="USD">
                    </div>
                    <div class="col-lg-4">
                    <label class="d-block">Time</label>
                        <div class="custom-control custom-radio custom-control-inline mt-2">
                            <input type="radio" id="time_1" name="yf_time" class="custom-control-input" value="5" {{ ( $_getID->yf_time == '5' ? "checked" : "") }}>
                            <label class="custom-control-label" for="time_1">5 Increment</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline  mt-2">
                            <input type="radio" id="time_2" name="yf_time" class="custom-control-input" value="6" {{ ( $_getID->yf_time == '6' ? "checked" : "") }}>
                            <label class="custom-control-label" for="time_2">6 Increment</label>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-12">Hourly rates</label>
                    <div class="col-lg-2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0">A</div>
                            </div>
                            <input type="text" class="form-control" id="yf_rates_a" name="yf_rates_a"  value="{{ $_getID->yf_rates_a }}">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0">B</div>
                            </div>
                            <input type="text" class="form-control" id="yf_rates_b" name="yf_rates_b"  value="{{ $_getID->yf_rates_b }}">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0">C</div>
                            </div>
                            <input type="text" class="form-control" id="yf_rates_c" name="yf_rates_c"  value="{{ $_getID->yf_rates_c }}">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0">D</div>
                            </div>
                            <input type="text" class="form-control" id="yf_rates_d" name="yf_rates_d"  value="{{ $_getID->yf_rates_d }}">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0">E</div>
                            </div>
                            <input type="text" class="form-control" id="yf_rates_e" name="yf_rates_e"  value="{{ $_getID->yf_rates_e }}">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0">F</div>
                            </div>
                            <input type="text" class="form-control" id="yf_rates_f" name="yf_rates_f"  value="{{ $_getID->yf_rates_f }}">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-8">
                        <label>Remark condition</label>
                        <textarea class="form-control" id="yf_remark" name="yf_remark" rows="3">{{ $_getID->yf_remark }}</textarea>
                    </div>
                    <div class="col-lg-4">
                        <label>Team</label>
                        <textarea class="form-control" id="yf_team" name="yf_team" rows="3">{{ $_getID->yf_team }}</textarea>
                    </div>
                </div>

                <hr class="my-5">
                <h6 class="card-title mb-4"><strong>02. Invoice Address</strong></h6>
                <div class="row form-group">
                    <div class="col-lg-4">
                        <label>Branch</label>
                        <select id="yf_branch" name="yf_branch" class="form-control select2" onchange="changBranch(this.value)" style="width:100%; height:25px;">
                            <!-- <option>Please select</option> -->
                            @foreach ($address as $val)
                                <option value="{{ $val->ct_ad_id }}" {{ ( $_getID->yf_branch == $val->ct_ad_id ? "selected" : "") }}> {{ $val->ct_ad_branch }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label>Company's tax id number</label>
                        <input type="number" class="form-control" id="yf_taxnumber" name="yf_taxnumber" value="{{ $_getID->yf_taxnumber }}">
                    </div>
                    <div class="col-lg-4">
                        <label>Company's name</label>
                        <input type="text" class="form-control" id="yf_inv_num" name="yf_inv_num"  value="{{ $_getID->yf_inv_num }}">
                    </div>
                </div>
                <!-- <div class="row form-group">
                    <div class="col-lg-4">
                        <label>Country</label>
                        <input type="text" class="form-control" id="yf_country" name="yf_country" />
                    </div>
                    <div class="col-lg-4">
                        <label>Province</label>
                        <input type="text" class="form-control" id="yf_provice" name="yf_provice" />
                    </div>
                    <div class="col-lg-4">
                        <label>Postal Code</label>
                        <input type="text" class="form-control" id="yf_code" name="yf_code" />
                    </div>
                </div> -->
                <!-- <div class="row form-group">
                    <div class="col-lg-4">
                        <label>District / Area</label>
                        <input type="text" class="form-control" id="yf_dis" name="yf_dis" />
                    </div>
                    <div class="col-lg-4">
                        <label>Sub-district / Sub-area</label>
                        <input type="text" class="form-control" id="yf_subdis" name="yf_subdis" />
                    </div>
                    <div class="col-lg-4">
                        <label>Road</label>
                        <input type="text" class="form-control" id="yf_road" name="yf_road" />
                    </div>
                </div> -->
                <div class="row form-group">
                    <div class="col-lg-12">
                        <label>Address</label>
                        <textarea id="yf_address" name="yf_address" class="form-control">{{ $_getID->yf_address }}</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4">
                        <label>Phone</label>
                        <input type="text" class="form-control" id="yf_phone" name="yf_phone" value="{{ $_getID->yf_phone }}">
                    </div>
                    <div class="col-lg-4">
                        <label>Fax</label>
                        <input type="text" class="form-control" id="yf_fax" name="yf_fax" value="{{ $_getID->yf_fax }}">
                    </div>
                    <div class="col-lg-4">
                        <label>Email address</label>
                        <input type="email" class="form-control" id="yf_email" name="yf_email" value="{{ $_getID->yf_email }}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4">
                        <label>Attention</label>
                        <input type="text" class="form-control" id="yf_atten" name="yf_atten" value="{{ $_getID->yf_atten }}">
                    </div>
                    <div class="col-lg-4">
                        <label>How to send</label>
                        <input type="text" class="form-control" id="yf_invioctext" name="yf_invioctext" value="{{ $_getID->yf_invioctext }}">
                    </div>
                </div>

                <hr class="my-5">
                <h6 class="card-title mb-4"><strong>03. Document delivery location</strong></h6>
                <div class="row form-group">
                    <!-- <div class="col-lg-4">
                        <label>Branch</label>
                        <select id="dy_branch" name="dy_branch" class="form-control select2" onchange="changBranch2(this.value)" style="width:100%; height:25px;">
                            @foreach ($address as $val)
                                <option value="{{ $val->ct_ad_id }}"> {{ $val->ct_ad_branch }} </option>
                            @endforeach
                        </select>
                    </div> -->
                    <div class="col-lg-6">
                        <label>Company's tax id number</label>
                        <input type="number" class="form-control" id="dy_taxnumber" name="dy_taxnumber" value="{{ $_getID->dy_taxnumber }}">
                    </div>
                    <div class="col-lg-6">
                        <label>Company's name</label>
                        <input type="text" class="form-control" id="dy_inv_num" name="dy_inv_num" value="{{ $_getID->dy_inv_num }}">
                    </div>
                </div>
                <!-- <div class="row form-group">
                    <div class="col-lg-4">
                        <label>Country</label>
                        <input type="text" class="form-control" id="dy_country" name="dy_country" />
                    </div>
                    <div class="col-lg-4">
                        <label>Province</label>
                        <input type="text" class="form-control" id="dy_provice" name="dy_provice" />
                    </div>
                    <div class="col-lg-4">
                        <label>Postal Code</label>
                        <input type="text" class="form-control" id="dy_code" name="dy_code" />
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4">
                        <label>District / Area</label>
                        <input type="text" class="form-control" id="dy_dis" name="dy_dis" />
                    </div>
                    <div class="col-lg-4">
                        <label>Sub-district / Sub-area</label>
                        <input type="text" class="form-control" id="dy_subdis" name="dy_subdis" />
                    </div>
                    <div class="col-lg-4">
                        <label>Road</label>
                        <input type="text" class="form-control" id="dy_road" name="dy_road" />
                    </div>
                </div> -->
                <div class="row form-group">
                    <div class="col-lg-12">
                        <label>Address</label>
                        <textarea class="form-control" id="dy_address" name="dy_address">{{ $_getID->dy_address }}</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4">
                        <label>Phone</label>
                        <input type="text" class="form-control" id="dy_phone" name="dy_phone" value="{{ $_getID->dy_phone }}">
                    </div>
                    <div class="col-lg-4">
                        <label>Fax</label>
                        <input type="text" class="form-control" id="dy_fax" name="dy_fax" value="{{ $_getID->dy_fax }}">
                    </div>
                    <div class="col-lg-4">
                        <label>Email address</label>
                        <input type="email" class="form-control" id="dy_email" name="dy_email" value="{{ $_getID->dy_email }}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4">
                        <label>Attention</label>
                        <input type="text" class="form-control" id="dy_atten" name="dy_atten" value="{{ $_getID->dy_atten }}">
                    </div>
                    <!-- <div class="col-lg-4">
                        <label>How to send</label>
                        <input type="text" class="form-control" id="dy_invioctext" name="dy_invioctext" />
                    </div> -->
                </div>

                <hr class="my-5">
                <h6 class="card-title mb-4"><strong>04. Document delivery location</strong></h6>
                <div class="row form-group">
                    <!-- <div class="col-lg-4">
                    <input class="form-control" type="text" id="yf_location" name="yf_location" />
                    </div> -->
                    <div class="col-lg-4">
                        <div class="custom-control custom-radio custom-control-inline mt-2">
                            <input type="radio" id="location_1" name="yf_location" class="custom-control-input" value="1" {{ ( $_getID->yf_location == "1" ? "checked" : "") }}>
                            <label class="custom-control-label" for="location_1">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline  mt-2">
                            <input type="radio" id="location_2" name="yf_location" class="custom-control-input" value="0" {{ ( $_getID->yf_location == "0" ? "checked" : "") }}>
                            <label class="custom-control-label" for="location_2">No</label>
                        </div>
                    </div>
                </div>

                <hr class="my-5">
                <h6 class="card-title mb-4"><strong>05. Refered by</strong></h6>
                <div class="row form-group">
                    <div class="col-lg-4">
                    <input class="form-control" type="text" id="yf_refer" name="yf_refer" value="{{ $_getID->yf_refer }}">
                    </div>
                </div>

                <hr class="my-5">
                <h6 class="card-title mb-4"><strong>06. Conflict check completed</strong></h6>
                <div class="row form-group">
                    <div class="col-lg-4">
                        <div class="custom-control custom-radio custom-control-inline mt-2">
                            <input type="radio" id="conflict_1" name="yf_confict" class="custom-control-input" value="1" {{ ( $_getID->yf_confict == "1" ? "checked" : "") }}>
                            <label class="custom-control-label" for="conflict_1">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline  mt-2">
                            <input type="radio" id="conflict_2" name="yf_confict" class="custom-control-input" value="0" {{ ( $_getID->yf_confict == "0" ? "checked" : "") }}>
                            <label class="custom-control-label" for="conflict_2">No</label>
                        </div>
                    </div>
                </div>
        </div>
        
        <div class="card-footer py-4 bg-white text-right">
            <a href="#" class="btn btn-secondary">CANCEL</a>
            <!-- <a href="#" class="btn btn-primary ml-3">SAVE</a> -->
            <button type="submit" class="btn btn-primary ml-3">SAVE</button>
        </div>
    </form>

</div>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/css/bootstrap-select.css"> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/js/bootstrap-select.js"></script> -->


