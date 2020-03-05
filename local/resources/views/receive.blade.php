
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon.png') }}" >
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon@2x.png') }}" >
    <title>Master Data | Yellow file</title>

    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('asset/css/material-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('asset/css/sidebar-main.css') }}" >
    <link rel="stylesheet" href="{{ asset('asset/css/styles3.css') }}" >
    <link rel="stylesheet" href="{{ asset('asset/css/simplebar.css') }}" >

</head>

<style>
.table thead th {
    vertical-align: middle;
    border-bottom: 0;
    color: #000;
    font-size: 12px;
}
.table td, .table th {
    border-top: 0px solid #dee2e6;
}
.form-control-sm {
    font-size: .75rem;
}
.no-border{
    border-top: 0px solid; 
    border-top: 0px solid; 
}
</style>

<body>

    <!-- page-wrapper -->
    <div class="page-wrapper">
        <div class="docs-warp">
            <div class="docs-head shadow-on">
                <div class="docs-pane">
                    <div class="w-25">
                        <button class="btn-c material-icons" title="Back" onclick="location.href='index.php';">home</button>
                    </div>
                    <div class="w-50">
                        <h6 class="text-center font-weight-bold m-0">RECEIPT / TEX INVOICE</h6>
                    </div>
                    <div class="w-25">
                        <div class="text-right">
                            <button class="btn-c material-icons" title="">save</button>
                            <button class="btn-c material-icons" title="">print</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="docs-body on-simple-bar"> -->
            <div class="on-simple-bar">
                <div class="docs-pane">
                    <div class="w-100 py-2">
                        <div id="yellow_con_1" aria-labelledby="yellow_tab_1" role="tabpanel" class="tab-pane fade show active">
                            <div class="card shadow-on">
                                <div class="card-header py-4 bg-transparent">
                                    <div class="row">
                                        <div class="col">
                                            <div><strong>DAI (Thailand) Ltd.</strong></div>
                                            <div>LRegent House Building. 10th Floor</div>
                                            <div>183 Ratchadamri Rd., Lumpini</div>
                                            <div>Tax ID# 0105553059967 Head Office</div>

                                            <div class="mb-3">Attention : Mr.Diego Valencia / Ms.Sara Lehman</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="font-weight-bold"><span style="display:inline-block; ">No. เลขที่ :</span> :&nbsp;&nbsp;&nbsp;R-2002035</div>
                                            <div class="mb-3 font-weight-bold"><span style="display:inline-block; ">Date. วันที่ : 18/02/2020</span> :&nbsp;&nbsp;&nbsp;30/09/2019</div>
                                            <div class="font-weight-bold"><span style="display:inline-block; ">Reference.</span> :&nbsp;&nbsp;&nbsp;13397</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table class="table w-100">
                                        <thead>
                                            <tr>
                                                <th colspan="3">Details &nbsp;&nbsp;&nbsp;ค่าบริการทางกฎหมาย</th>
                                                <th></th>
                                                <th style="padding-right:0.8rem">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            <tr style=" border-top: 0px solid; ">
                                                <td colspan="3"><input type="text" class="form-control form-control-sm border-0 rounded-0 bg-transparent" disabled="" value="INVOICE NO. I-1912119 "></td>
                                                <td><input type="text" class="form-control form-control-sm border-0 rounded-0 bg-transparent text-right" disabled="" value="Bath"></td>
                                                <td><input type="text" class="form-control form-control-sm border-0 rounded-0 bg-transparent text-center" disabled="" value="23,850‬.00"></td>
                                            </tr>
                                            <tr style=" border-top: 0px solid; ">
                                                <td colspan="3"><input type="text" class="form-control form-control-sm border-0 rounded-0 bg-transparent" disabled="" value="INVOICE NO. I-1912119 "></td>
                                                <td><input type="text" class="form-control form-control-sm border-0 rounded-0 bg-transparent text-right" disabled="" value="Bath"></td>
                                                <td><input type="text" class="form-control form-control-sm border-0 rounded-0 bg-transparent text-center" disabled="" value="23,850‬.00"></td>
                                            </tr>
                                            <tr style="">
                                                <td colspan="3"><input type="text" class="form-control form-control-sm border-0 rounded-0 bg-transparent" disabled="" value="INVOICE NO. I-1912119 "></td>
                                                <td><input type="text" class="form-control form-control-sm border-0 rounded-0 bg-transparent text-right" disabled="" value="Bath"></td>
                                                <td><input type="text" class="form-control form-control-sm border-0 rounded-0 bg-transparent text-center" disabled="" value="23,850‬.00"></td>
                                            </tr>
                                           
                                            
                                        </tbody>
                                    </table>

                                    <div class="card-footer py-4 bg-transparent">
                                        <table  style="width: 100%!important;">
                                            <tbody>
                                                <tr>
                                                    <td colspan="3" style="border-top: 1px solid #dee2e600!important;">Fee per above</td>
                                                    <td class="text-right" style="border-top: 1px solid #dee2e600!important;"><b>Bath</b></td>
                                                    <td class="text-right" style="border-top: 1px solid #dee2e600!important;padding-right:0.8rem">115,777.53</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" style="border-top: 1px solid #dee2e600!important;">Out of pocket</td>
                                                    <td class="text-right" style="border-top: 1px solid #dee2e600!important;"><b>Bath</b></td>
                                                    <td class="text-right" style="border-top: 1px solid #dee2e600!important;padding-right:0.8rem">1,097.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" style="border-top: 1px solid #dee2e600!important;">Sub total</td>
                                                    <td class="text-right" style="border-top: 1px solid #dee2e600!important;"><b>Bath</b></td>
                                                    <td class="text-right" style="border-top: 1px solid #dee2e600!important;padding-right:0.8rem">11,6874.53</td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3" style="border-top: 1px solid #dee2e600!important;">Value Added Tax</td>
                                                    <td class="text-right" style="border-top: 1px solid #dee2e600!important;"><b>Bath</b></td>
                                                    <td class="text-right" style="border-top: 1px solid #dee2e600!important;padding-right:0.8rem">8,181.22</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" style="border-top: 1px solid #dee2e600!important;">Govt. Fees, Stamp Duty</td>
                                                    <td class="text-right" style="border-top: 1px solid #dee2e600!important;"><b>Bath</b></td>
                                                    <td class="text-right" style="border-top: 1px solid #dee2e600!important;padding-right:0.8rem">130.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" style="border-top: 1px solid #dee2e600!important;">Total Amount Per Above</td>
                                                    <td class="text-right" style="border-top: 1px solid #dee2e600!important;"><b>Bath</b></td>
                                                    <td class="text-right" style="border-top: 1px solid #dee2e600!important;padding-right:0.8rem">125,185.72</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>                            
                            </div>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-wrapper -->

</div>

    <!-- site scripts -->
    <script src="{{ asset('asset/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('asset/js/popper.min.js') }}"></script>
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <script src="{{ asset('asset/js/sidebar-main.js') }}"></script>

</body>
</html>