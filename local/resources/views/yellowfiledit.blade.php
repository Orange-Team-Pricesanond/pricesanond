<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>YELLOW FILE</title>
  </head>
  <body>
  
       
        <form method="post" action=" {{ url('submityellowfile') }} " enctype="multipart/form-data">
 
            <div class="container">
                <div class="row">
                    <div class="col-6" style="padding-top:10px;" >
                        <h3>1. INSTRUCTION FOR OPENING YELLOW FILE</h3>
                        <hr>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="fullname">AMERICAN EXPRESS</label>
                            <select id="id_ct_yf" name="id_ct_yf" class="form-control" data-live-search="true" title="Please select">
                                @foreach ($client as $val)
                                <option value="{{ $val->id_ct }}" {{ ($val->id_ct == $yellows->id_ct_yf ? "selected" : "") }}> {{ $val->ct_fn }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="yf_mtt">Matter</label>
                            <input type="text" class="form-control" id="yf_mtt" name="yf_mtt" value="{{$yellows->yf_mtt}}">
                        </div>
                        <div class="form-group">
                            <label for="yf_currency">Currency</label>
                            <select id="yf_currency" name="yf_currency" class="form-control" data-live-search="true">
                                <option value="USD" {{ ( $yellows->yf_currency == "USD" ? "selected" : "") }}>USD</option>
                                <option value="THB" {{ ( $yellows->yf_currency == "THB"  ? "selected" : "") }}>THB</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tax">Currency</label>
                            <select id="yf_currencyter" name="yf_currencyter" class="form-control" data-live-search="true">
                                <option value="USD" {{ ( $yellows->yf_currencyter == "USD" ? "selected" : "") }}>USD</option>
                                <option value="THB" {{ ( $yellows->yf_currencyter == "THB"  ? "selected" : "") }}>THB</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="invoice">Fix Fee</label>
                            <input type="number" min="0" class="form-control" id="yf_fixfee" name="yf_fixfee" value="{{$yellows->yf_fixfee}}">
                        </div>
                        <div class="form-group">
                            <label for="invoice">Duscount</label>
                            <input type="number"  min="0" class="form-control" id="yf_discount" name="yf_discount" value="{{$yellows->yf_discount}}">
                        </div>
                        <div class="form-group">
                            <label for="invoice">Time</label>
                            <select id="yf_time" name="yf_time" class="form-control" data-live-search="true">
                                <option value="5" {{ ( $yellows->yf_time == "5" ? "selected" : "") }}>5 Increment</option>
                                <option value="6" {{ ( $yellows->yf_time == "6" ? "selected" : "") }}>6 Increment</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="invoice">Hourly Reates a-f</label>
                            <input type="number" min="0" class="form-control" id="invoice" name="yf_rates_a" value="{{$yellows->yf_rates_a}}">
                            <input type="number" min="0" class="form-control" id="invoice" name="yf_rates_b" value="{{$yellows->yf_rates_b}}">
                            <input type="number" min="0" class="form-control" id="invoice" name="yf_rates_c" value="{{$yellows->yf_rates_c}}">
                            <input type="number" min="0" class="form-control" id="invoice" name="yf_rates_d" value="{{$yellows->yf_rates_d}}">
                            <input type="number" min="0" class="form-control" id="invoice" name="yf_rates_e" value="{{$yellows->yf_rates_e}}">
                            <input type="number" min="0" class="form-control" id="invoice" name="yf_rates_f" value="{{$yellows->yf_rates_f}}">
                        </div>
                    </div>

                    <div class="col-6" style="padding-top:10px;" >
                    <h3>2. Invoice Address</h3>
                    <hr>
                        <div class="form-group">
                            <label for="yf_taxnumber">Company's fax id number</label>
                            <input type="number" min="0" class="form-control" id="yf_taxnumber" name="yf_taxnumber" value="{{$yellows->yf_taxnumber}}">
                        </div>
                        <div class="form-group">
                            <label for="yf_taxnumber">Invoice name</label>
                            <input type="text" class="form-control" id="yf_taxnumber" name="yf_inv_num" value="{{$yellows->yf_inv_num}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="yf_address">Address</label>
                            <input type="text" class="form-control" id="yf_address" name="yf_address" value="{{$yellows->yf_address}}">
                        </div>
                        <div class="form-group">
                            <label for="yf_branch">Branch</label>
                            <select id="yf_branch" name="yf_branch" class="form-control" onchange="changBranch(this.value)" >
                            <option>Please select</option>
                            @foreach ($address as $val)
                                <option value="{{ $val->ct_ad_id }}" {{ ( $val->ct_ad_id == $yellows->yf_branch ? "selected" : "") }}> {{ $val->ct_ad_branch }} </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="yf_road">Road</label>
                            <input type="text" class="form-control" id="yf_road" name="yf_road" value="{{$yellows->yf_dis}}">
                        </div>
                        <div class="form-group">
                            <label for="yf_dis">District</label>
                            <input type="text" class="form-control" id="yf_dis" name="yf_dis" value="{{$yellows->yf_dis}}">
                        </div>
                        <div class="form-group">
                            <label for="yf_subdis">Sub-District</label>
                            <input type="text" class="form-control" id="yf_subdis" name="yf_subdis" value="{{$yellows->yf_subdis}}">
                        </div>
                        <div class="form-group">
                            <label for="yf_provice">Provice</label>
                            <input type="text" class="form-control" id="yf_provice" name="yf_provice" value="{{$yellows->yf_provice}}">
                        </div>
                        <div class="form-group">
                            <label for="yf_code">Postal Code</label>
                            <input type="text" class="form-control" id="yf_code" name="yf_code" value="{{$yellows->yf_code}}">
                        </div>
                        <div class="form-group">
                            <label for="yf_country">Country</label>
                            <input type="text" class="form-control" id="yf_country" name="yf_country" value="{{$yellows->yf_country}}">
                        </div>
                        <div class="form-group">
                            <label for="yf_phone">Phone</label>
                            <input type="text" class="form-control" id="yf_phone" name="yf_phone" value="{{$yellows->yf_phone}}">
                        </div>
                        <div class="form-group">
                            <label for="yf_fax">Fax</label>
                            <input type="text" class="form-control" id="yf_fax" name="yf_fax" value="{{$yellows->yf_fax}}">
                        </div>
                        <div class="form-group">
                            <label for="yf_email">Email Address</label>
                            <input type="email" class="form-control" id="yf_email" name="yf_email" value="{{$yellows->yf_email}}">
                        </div>
                        <div class="form-group">
                            <label for="yf_atten">Attention</label>
                            <input type="text" class="form-control" id="yf_atten" name="yf_atten" value="{{$yellows->yf_atten}}">
                        </div>
                        <div class="form-group">
                            <label for="yf_invioctext">How to send an invoice</label>
                            <input type="text" class="form-control" id="yf_invioctext" name="yf_invioctext" value="{{$yellows->yf_invioctext}}">
                        </div>

                </div>                
            </div>    
            <div class="container">
                <div class="row">
                        <div class="col-6" style="padding-top:10px;" >
                        <h3>3. Document delivery location</h3>
                            <hr>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="yf_location_1" name="yf_location" value="1" {{ ( $yellows->yf_location == "1" ? "checked" : "") }}>
                                <label class="form-check-label" for="yf_location_1">
                                    As above
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="yf_location_2" name="yf_location" value="2" {{ ( $yellows->yf_location == "2" ? "checked" : "") }}>
                                <label class="form-check-label" for="yf_location_2">
                                   Other
                                </label>
                            </div>
                        </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                        <div class="col-6" style="padding-top:10px;" >
                        <h3>4. Refered By</h3>
                            <hr>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="yf_refer_1" name="yf_refer" value="1" {{ ( $yellows->yf_refer == "1" ? "checked" : "") }}>
                                <label class="form-check-label" for="yf_refer_1">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="yf_refer_2" name="yf_refer" value="2" {{ ( $yellows->yf_refer == "2" ? "checked" : "") }}>
                                <label class="form-check-label" for="yf_refer_2">
                                   No
                                </label>
                            </div>
                        </div>
                </div>
            </div>
            
            <div class="container">
                <div class="row">
                        <div class="col-6" style="padding-top:10px;" >
                        <h3>5. Confict Check Completed</h3>
                            <hr>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="yf_confict_1" name="yf_confict" value="1" {{ ( $yellows->yf_confict == "1" ? "checked" : "") }}>
                                <label class="form-check-label" for="yf_refer_1">
                                    YES
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="yf_confict_2" name="yf_confict" value="2" {{ ( $yellows->yf_confict == "2" ? "checked" : "") }}>
                                <label class="form-check-label" for="yf_confict_2">
                                   No
                                </label>
                            </div>
                        </div>
                </div>
            </div>
            <div class="clonefile" id="div_1"></div>
            <div class="container" style="padding-top: 5px;"><button type="submit" class="btn btn-primary">Submit</button></div>
       
        </form>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
        function changBranch(id){
            console.log(id);
            $.ajax({
                type:'get',
                url:"{{ url('appendAddress') }}",
                data:{id:id},
                dataType:'json',
                success:function(data){
                    // alert(data.success);
                    console.log(data.ct_ad_road);
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
    </script>
    
    
  </body>
</html>