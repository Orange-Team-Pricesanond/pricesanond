
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
.right-for{
    text-align: right;    
    padding-right: 70px;
}
.bold{
    font-weight: bold;
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
                        <h6 class="text-center font-weight-bold m-0">CREDIT NOTE</h6>
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
                                            <div><strong>Interplay (Thailand) Ltd.</strong></div>
                                            <div>LRegent House Building. 10th Floor</div>
                                            <div>183 Ratchadamri Rd., Lumpini</div>
                                            <div>Tax ID# 0105553059967 Head Office</div>

                                            <div class="mb-3">Attention : Khun Kantima Kerr</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="font-weight-bold"><span style="display:inline-block; ">No.</span> :&nbsp;&nbsp;&nbsp;C-2001002</div>
                                            <div class="mb-3 font-weight-bold"><span style="display:inline-block; ">Date </span> :&nbsp;&nbsp;&nbsp;21/01/20</div>
                                            <div class="font-weight-bold"><span style="display:inline-block; ">Reference </span> :&nbsp;&nbsp;&nbsp;11626</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table class="table w-100">
                                        <thead>
                                            <tr>
                                                <th width="80%">Details </th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                   <input class="form-control form-control-sm border-0 rounded-0 bg-transparent" value="PARTIAL CREDIT OF INVOICE NO.I-1911061 (FEE: 3,628.68, VAT: 254.01)">
                                                </td>
                                                <td>
                                                   <input class="form-control form-control-sm border-0 rounded-0 bg-transparent" value="23,850‬.00">
                                                 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                   <input class="form-control form-control-sm border-0 rounded-0 bg-transparent" value="PARTIAL CREDIT OF INVOICE NO.I-1911061 (FEE: 3,628.68, VAT: 254.01)">
                                                </td>
                                                <td>
                                                   <input class="form-control form-control-sm border-0 rounded-0 bg-transparent" value="23,850‬.00">
                                                 </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="card-footer py-4 bg-transparent">
                                        <table  style="width: 100%!important;">
                                            <tbody>
                                               
                                                <tr>
                                                    <td width="75%">Total per above&nbsp;&nbsp;&nbsp;:</td>
                                                    <td >Bath</td>
                                                    <td><input class="right-for form-control form-control-sm border-0 rounded-0 bg-transparent" value="23,850‬.00"></td>
                                                </tr>
                                                <tr>
                                                    <td><p class="bold">( Bath THREE THOUSAND EIGHT HUNDRED EIGHTY TWO AND SIXTY NINE )</p></td>
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