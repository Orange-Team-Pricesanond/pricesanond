<div class="card border-0">
    <div class="card-header py-4 bg-white d-flex justify-content-between">
        <div>EDIT RATES YELLOWS FILES</div>        
    </div>
    <form method="post" action=" {{ url('yellow_edit_rate') }} " enctype="multipart/form-data">
        <div class="card-body">
            {{ csrf_field() }}
            
                <div class="row form-group">
                    <div class="col-lg-6">
                        <label class="d-block">Option</label>
                        <select id="option" name="option" class="form-control" style="width:100%; height:37px;" onclick="getData(this)">
                            <option value="1"> Group </option>
                            <option value="2"> Partner </option>
                            <option value="3"> Hold Work </option>
                            <option value="0"> Chang Rate </option>
                        </select>
                    </div>   
                    <div class="col-lg-6">
                        <label class="d-block">Date</label>
                        <input type="date" class="form-control" id="adjust" name="adjust" value="{{$datenow}}">
                    </div>                
                </div>
                <div class="row form-group">  
                <div class="col-lg-4" id="div_chang" style=" display: none; ">
                        <label>Files No.</label>
                        <input type="text" class="form-control" id="file_no" name="file_no" />
                    </div>  
                    <div class="col-lg-4" id="div_group" style=" display: none; ">
                        <label>Group</label>
                        <input type="text" class="form-control" id="group" name="group" />
                    </div>
                    <div class="col-lg-4" id="div_partner" style=" display: none; ">
                        <label>Partner</label>
                        <select id="partner" name="partner" class="form-control select2" style="width:100%; height:37px;">
                            @foreach ($partner as $val)
                                <option value="{{ $val->pt_id }}"> {{ $val->pt_name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>    

                <div class="row form-group">
                    <label class="col-12">Hourly rates</label>
                    <div class="col-lg-2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0">A</div>
                            </div>
                            <input type="text" class="form-control" id="yf_rates_a" name="yf_rates_a" require />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0">B</div>
                            </div>
                            <input type="text" class="form-control" id="yf_rates_b" name="yf_rates_b" require />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0">C</div>
                            </div>
                            <input type="text" class="form-control" id="yf_rates_c" name="yf_rates_c" require />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0">D</div>
                            </div>
                            <input type="text" class="form-control" id="yf_rates_d" name="yf_rates_d" require />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0">E</div>
                            </div>
                            <input type="text" class="form-control" id="yf_rates_e" name="yf_rates_e" require />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0">F</div>
                            </div>
                            <input type="text" class="form-control" id="yf_rates_f" name="yf_rates_f" require />
                        </div>
                    </div>
                </div>
                
        </div>
        
        <div class="card-footer py-4 bg-white text-right">
            <button type="submit" class="btn btn-primary ml-3">SAVE</button>
        </div>
    </form>
</div>



