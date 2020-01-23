<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon.png') }}" >
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon@2x.png') }}" >
    <title>Master Data</title>

    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('asset/css/material-icons.css') }}" >
    <link rel="stylesheet" href="{{ asset('asset/css/jquery.mCustomScrollbar.min.css') }}" >

    <link rel="stylesheet" href="{{ asset('asset/css/sidebar-main.css') }}" >
    <link rel="stylesheet" href="{{ asset('asset/css/sidebar-themes.css') }}" >
    <link rel="stylesheet" href="{{ asset('asset/css/styles.css') }}" >

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/DataTables/datatables.min.css') }}"/>

    <style>
    .select2-selection{
        height: 37px !important; 
        font-size: 17px !important;
        padding-top: 4px !important;
    }
    </style>

</head>
<?php
    if (!Auth::check()) {
        echo "<script>window.location.href = 'login2'</script>";
        // exit();
    }
?>
<body>

    <!-- page-wrapper -->
    <div class="page-wrapper light-theme toggled">

        <!-- page-sidebar -->
        @include('layout.sidebar')
        <!-- page-sidebar -->

        <!-- page-content -->
        <main class="page-content">

            <div id="overlay" class="overlay"></div>

            <div class="workspace">
                @include('layout.header')
                <div class="work-pane">
                    <div class="work-tab">
                        <nav class="nav nav-tabs" id="master-tab" role="tablist">
                            <a id="tab_1" href="#con_1" aria-controls="con_1" class="nav-item nav-link active" data-toggle="tab" role="tab" aria-selected="true">Task</a>
                            <a id="tab_2" href="#con_2" aria-controls="con_2" class="nav-item nav-link" data-toggle="tab" role="tab" aria-selected="false">New Task</a>
                            <a id="tab_3" href="#con_3" aria-controls="con_3" class="nav-item nav-link" data-toggle="tab" role="tab" aria-selected="false">Client</a>
                        </nav>
                        <div>
                            <!-- <button class="btn-c material-icons" title="client" data-toggle="modal" data-target="#pop_client_list">add_circle_outline</button> -->
                            <a href="{{ url('insertclient2') }}"><button class="btn-c material-icons">add_circle_outline</button></a>
                            <button class="btn-c material-icons" title="Delete selected">delete</button>
                            <button class="btn-c material-icons" title="Submit selected">send</button>
                        </div>
                    </div>
                    <div class="work-con">
                        <div class="tab-content" id="master-tabContent">
                            <div id="con_1" aria-labelledby="tab_1" role="tabpanel" class="tab-pane fade show active">
                                @include('yellow_file.yellow_list')
                            </div>
                            <div id="con_2" aria-labelledby="tab_2" role="tabpanel" class="tab-pane fade">
                                @include('yellow_file.yellow_create')
                            </div>
                            <div id="con_3" aria-labelledby="3" role="tabpanel" class="tab-pane fade">
                                @include('yellow_file.client_list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <!-- page-content -->

    </div>
    <!-- page-wrapper -->


    <!-- site popup -->
    @include('layout.popup.pop-yellow-file')
    @include('layout.popup.pop-client')

    <!-- site scripts -->
    <script src="{{ asset('asset/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('asset/js/popper.min.js') }}"></script>
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <script src="{{ asset('asset/js/sidebar-main.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script type="text/javascript" src="{{ asset('asset/DataTables/datatables.min.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('.table').DataTable();
            $('.select2').select2();
        });
        function changBranch(id){
            $.ajax({
                type:'get',
                url:"{{ url('appendAddress') }}",
                data:{id:id},
                dataType:'json',
                success:function(data){
                    // $('#yf_road').val(data.ct_ad_road);
                    $('#yf_address').val(data.ct_ad);
                    // $('#yf_dis').val(data.ct_ad_area);
                    // $('#yf_subdis').val(data.ct_ad_subarea);
                    // $('#yf_provice').val(data.ct_ad_province);
                    // $('#yf_code').val(data.ct_ad_code);
                    // $('#yf_country').val(data.ct_ad_country);
                    $('#yf_phone').val(data.ct_ad_phone);
                    $('#yf_fax').val(data.ct_ad_fax);
                    $('#yf_email').val(data.ct_ad_mail);
                    $('#yf_atten').val(data.ct_ad_atten);
                }
            });
        }
        function changBranch2(id){
            $.ajax({
                type:'get',
                url:"{{ url('appendAddress') }}",
                data:{id:id},
                dataType:'json',
                success:function(data){
                    // $('#dy_road').val(data.ct_ad_road);
                    $('#dy_address').val(data.ct_ad);
                    // $('#dy_dis').val(data.ct_ad_area);
                    // $('#dy_subdis').val(data.ct_ad_subarea);
                    // $('#dy_provice').val(data.ct_ad_province);
                    // $('#dy_code').val(data.ct_ad_code);
                    // $('#dy_country').val(data.ct_ad_country);
                    $('#dy_phone').val(data.ct_ad_phone);
                    $('#dy_fax').val(data.ct_ad_fax);
                    $('#dy_email').val(data.ct_ad_mail);
                    $('#dy_atten').val(data.ct_ad_atten);
                }
            });
        }
    </script>
   
</body>
</html>