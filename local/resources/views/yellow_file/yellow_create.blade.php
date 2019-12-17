<div class="card border-0">
    <div class="card-header py-4 bg-white d-flex justify-content-between">
        <div>INSTRUCTION FOR OPENING YELLOW FILE</div>
        <div>
            <div class='d-inline-block'>
                <span class="ml-2">File No. </span>
                <span class="text-blue">13314</span>
            </div>
            <div class='d-inline-block'>
                <span class="ml-2">Status : </span>
                <span class="text-green">ACTIVE</span>
            </div>
        </div>
    </div>
    <form method="post" action=" {{ url('yellow_file_submit') }} " enctype="multipart/form-data">
        <div class="card-body">
            {{ csrf_field() }}
                <h6 class="card-title mb-4"><strong>01. File details and Rates</strong></h6>
                <div class="row form-group">
                    <div class="col-lg-4">
                        <label>File name</label>
                        <div class="input-group">
                            <div class="input-group-prepend" data-toggle="modal" data-target="#pop_client_list">
                                <div class="input-group-text border-0">
                                    <i class="material-icons">search</i>
                                </div>
                            </div>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label>Matter</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <label>Partner</label>
                        <select id="yf_partner" name="yf_partner" class="form-control" >
                            <option>Please select</option>
                            @foreach ($partner as $val)
                                <option value="{{ $val->pt_id }}"> {{ $val->pt_name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2">
                        <label>Currency</label>
                        <select id="yf_currency" name="yf_currency" class="form-control" data-live-search="true" title="Please select">
                            <option value="USD">USD</option>
                            <option value="THB">THB</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label>Converter to</label>
                        <select id="yf_currencyter" name="yf_currencyter" class="form-control" data-live-search="true" title="Please select">
                            <option value="THB">THB</option>
                            <option value="USD">USD</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label>Fix Fee</label>
                        <input type="number" min="0" class="form-control" id="yf_fixfee" name="yf_fixfee" placeholder="USD">
                    </div>
                    <div class="col-lg-2">
                        <label>Discount</label>
                        <input type="number" min="0" class="form-control" id="yf_discount" name="yf_discount" placeholder="USD">
                    </div>
                    <div class="col-lg-4">
                        <label class="d-block">Time</label>
                        <div class="custom-control custom-radio custom-control-inline mt-2">
                            <input type="radio" id="time_1" name="yf_time" class="custom-control-input" checked>
                            <label class="custom-control-label" for="time_1">5 Increment</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline  mt-2">
                            <input type="radio" id="time_2" name="yf_time" class="custom-control-input">
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
                            <input type="text" class="form-control" id="yf_rates_a" name="yf_rates_a" />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0">B</div>
                            </div>
                            <input type="text" class="form-control" id="yf_rates_b" name="yf_rates_b" />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0">C</div>
                            </div>
                            <input type="text" class="form-control" id="yf_rates_c" name="yf_rates_c" />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0">D</div>
                            </div>
                            <input type="text" class="form-control" id="yf_rates_d" name="yf_rates_d" />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0">E</div>
                            </div>
                            <input type="text" class="form-control" id="yf_rates_e" name="yf_rates_e" />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0">F</div>
                            </div>
                            <input type="text" class="form-control" id="yf_rates_f" name="yf_rates_f" />
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-8">
                        <label>Remark condition</label>
                        <textarea class="form-control" id="yf_remark" name="yf_remark" rows="3"></textarea>
                    </div>
                </div>

                <hr class="my-5">
                <h6 class="card-title mb-4"><strong>02. Invoice Address</strong></h6>
                <div class="row form-group">
                    <div class="col-lg-4">
                        <label>Branch</label>
                        <select id="yf_branch" name="yf_branch" class="form-control" onchange="changBranch(this.value)" >
                            <option>Please select</option>
                            @foreach ($yellowfile as $val)
                                <option value="{{ $val->ct_ad_id }}"> {{ $val->ct_ad_branch }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label>Company's tax id number</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <label>Invoice name</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4">
                        <label>Country</label>
                        <select class="form-control">
                            <option selected>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label>Province</label>
                        <input type="text" class="form-control" id="yf_provice" name="yf_provice" />
                    </div>
                    <div class="col-lg-4">
                        <label>Postal Code</label>
                        <input type="text" class="form-control" id="yf_code" name="yf_code" />
                    </div>
                </div>
                <div class="row form-group">
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
                </div>
                <div class="row form-group">
                    <div class="col-lg-8">
                        <label>Address</label>
                        <input type="text" class="form-control" id="yf_address" name="yf_address" />
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4">
                        <label>Phone</label>
                        <input type="text" class="form-control" id="yf_phone" name="yf_phone" />
                    </div>
                    <div class="col-lg-4">
                        <label>Fax</label>
                        <input type="text" class="form-control" id="yf_fax" name="yf_fax" />
                    </div>
                    <div class="col-lg-4">
                        <label>Email address</label>
                        <input type="email" class="form-control" id="yf_email" name="yf_email" />
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4">
                        <label>Attention</label>
                        <input type="text" class="form-control" id="yf_atten" name="yf_atten" />
                    </div>
                    <div class="col-lg-4">
                        <label>How to send</label>
                        <input type="text" class="form-control" id="yf_invioctext" name="yf_invioctext" />
                    </div>
                </div>

                <hr class="my-5">
                <h6 class="card-title mb-4"><strong>03. Document delivery location</strong></h6>
                <div class="row form-group">
                    <div class="col-lg-4">
                        <label>Branch</label>
                        <select id="yf_branch" name="yf_branch" class="form-control" onchange="changBranch2(this.value)" >
                            <option>Please select</option>
                            @foreach ($yellowfile as $val)
                                <option value="{{ $val->ct_ad_id }}"> {{ $val->ct_ad_branch }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label>Company's tax id number</label>
                        <input type="number" min="0" class="form-control" id="dy_taxnumber" name="dy_taxnumber" />
                    </div>
                    <div class="col-lg-4">
                        <label>Invoice name</label>
                        <input type="text" class="form-control" id="dy_inv_num" name="dy_inv_num" />
                    </div>
                </div>
                <div class="row form-group">
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
                </div>
                <div class="row form-group">
                    <div class="col-lg-8">
                        <label>Address</label>
                        <input type="text" class="form-control" id="dy_address" name="dy_address" />
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4">
                        <label>Phone</label>
                        <input type="text" class="form-control" id="dy_phone" name="dy_phone" />
                    </div>
                    <div class="col-lg-4">
                        <label>Fax</label>
                        <input type="text" class="form-control" id="dy_fax" name="dy_fax" />
                    </div>
                    <div class="col-lg-4">
                        <label>Email address</label>
                        <input type="email" class="form-control" id="dy_email" name="dy_email" />
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4">
                        <label>Attention</label>
                        <input type="text" class="form-control" id="dy_atten" name="dy_atten" />
                    </div>
                    <div class="col-lg-4">
                        <label>How to send</label>
                        <input type="text" class="form-control" id="dy_invioctext" name="dy_invioctext" />
                    </div>
                </div>

                <hr class="my-5">
                <h6 class="card-title mb-4"><strong>04. Refered by</strong></h6>
                <div class="row form-group">
                    <div class="col-lg-4">
                    <input class="form-control" type="text" id="yf_refer" name="yf_refer" />
                    </div>
                </div>

                <hr class="my-5">
                <h6 class="card-title mb-4"><strong>05. Conflict check completed</strong></h6>
                <div class="row form-group">
                    <div class="col-lg-4">
                        <div class="custom-control custom-radio custom-control-inline mt-2">
                            <input type="radio" id="conflict_1" name="yf_confict" class="custom-control-input">
                            <label class="custom-control-label" for="conflict_1">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline  mt-2">
                            <input type="radio" id="conflict_2" name="yf_confict" class="custom-control-input">
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

<script>
        function changBranch(id){
            console.log(id);
            $.ajax({
                type:'get',
                url:"{{ url('appendAddress') }}",
                data:{id:id},
                dataType:'json',
                success:function(data){
                    $('#yf_road').val(data.ct_ad_road);
                    $('#yf_address').val(data.ct_ad);
                    $('#yf_dis').val(data.ct_ad_area);
                    $('#yf_subdis').val(data.ct_ad_subarea);
                    $('#yf_provice').val(data.ct_ad_province);
                    $('#yf_code').val(data.ct_ad_code);
                    $('#yf_country').val(data.ct_ad_country);
                    $('#yf_phone').val(data.ct_ad_phone);
                    $('#yf_fax').val(data.ct_ad_fax);
                    $('#yf_email').val(data.ct_ad_mail);
                    $('#yf_atten').val(data.ct_ad_atten);
                }
            });
        }
        function changBranch2(id){
            console.log(id);
            $.ajax({
                type:'get',
                url:"{{ url('appendAddress') }}",
                data:{id:id},
                dataType:'json',
                success:function(data){
                    $('#dy_road').val(data.ct_ad_road);
                    $('#dy_address').val(data.ct_ad);
                    $('#dy_dis').val(data.ct_ad_area);
                    $('#dy_subdis').val(data.ct_ad_subarea);
                    $('#dy_provice').val(data.ct_ad_province);
                    $('#dy_code').val(data.ct_ad_code);
                    $('#dy_country').val(data.ct_ad_country);
                    $('#dy_phone').val(data.ct_ad_phone);
                    $('#dy_fax').val(data.ct_ad_fax);
                    $('#dy_email').val(data.ct_ad_mail);
                    $('#dy_atten').val(data.ct_ad_atten);
                }
            });
        }
    </script>