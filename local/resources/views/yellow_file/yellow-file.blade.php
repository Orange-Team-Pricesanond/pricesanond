<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon@2x.png') }}">
    <title>Master Data | Yellow file</title>

    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/material-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('asset/css/sidebar-main.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/styles3.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/simplebar.css') }}">

</head>
<style>
    .page-wrapper {
        position: relative;
        height: 100vh;
        max-height: 100vh;
        background-color: #f8fafb;
        border-top: 1px solid #f1f1f1;
    }
    .docs-warp {
        position: relative;
        display: flex;
        flex-direction: column;
        max-width: 100%;
        max-height: 100%;
        height: 100%;
        background: #fff;
        margin: 0;
        pointer-events: auto;
    }
</style>
<body>

    <!-- page-wrapper -->
    <div class="page-wrapper">
        <div class="docs-warp">
            <div class="docs-head shadow-on">
                <div class="docs-pane">
                    <div class="w-25">
                    <a href="{{ url('masterpage') }}"><button class="btn-c material-icons" title="Back" >home</button></a>
                    </div>
                    <div class="w-50">
                        <h6 class="text-center font-weight-bold m-0">Yellow file information</h6>
                    </div>
                    <div class="w-25">
                        <div class="text-right">
                            <!-- <button class="btn-c material-icons" title="">save</button> -->
                            <!-- <button class="btn-c material-icons" title="">delete</button> -->
                            <!-- <button class="btn-c material-icons" title="">print</button> -->
                            <!-- <button class="btn-c material-icons" title="">send</button> -->
                        </div>
                    </div>
                </div>
            </div>                   
            <div class="docs-body on-simple-bar" >
                <div class="docs-pane">
                    <div class="w-100 py-2">
                        <nav class="nav nav-pills" id="yellow-tab" role="tablist">
                            <a id="yellow_tab_1" href="#yellow_con_1" aria-controls="yellow_con_1" class="nav-item nav-link active" data-toggle="tab" role="tab" aria-selected="true">YELLOW FILE</a>
                            <a id="yellow_tab_2" href="#yellow_con_2" aria-controls="yellow_con_2" class="nav-item nav-link" data-toggle="tab" role="tab" aria-selected="false">TIME RECORD</a>
                            <a id="yellow_tab_3" href="#yellow_con_3" aria-controls="yellow_con_3" class="nav-item nav-link" data-toggle="tab" role="tab" aria-selected="false">ACC STATEMENT</a>
                        </nav>

                        <div class="tab-content my-3" id="yellow-tabContent">
                            <div id="yellow_con_1" aria-labelledby="yellow_tab_1" role="tabpanel" class="tab-pane tab1 fade show active">
                                @include('yellow_file.create-yellow')
                            </div>
                            <div id="yellow_con_2" aria-labelledby="yellow_tab_2" role="tabpanel" class="tab-pane tab2 fade">
                                @include('yellow_file.list-time')
                            </div>
                            <div id="yellow_con_3" aria-labelledby="yellow_tab_3" role="tabpanel" class="tab-pane tab3 fade">
                                <!-- @include('yellow_file.list-time') -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-wrapper -->

    <!-- site popup -->
    <?php // include '../../inc/popup/pop-client.php';?>

    <!-- site scripts -->
    <script src="{{ asset('asset/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('asset/js/popper.min.js') }}"></script>
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/js/simplebar.min.js') }}"></script>

    <script src="{{ asset('asset/js/sidebar-main.js') }}"></script>
    <script src="{{ asset('asset/js/script.js') }}"></script>
    
    <script>

    $(document).ready(function(){
        $("#yellow_tab_1").click(function(){
            var tab1 = document.getElementsByClassName('tab1')[0]; 
            var tab2 = document.getElementsByClassName('tab2')[0]; 
            var tab3 = document.getElementsByClassName('tab3')[0]; 
            tab1.style.display = "block";
            tab2.style.display = "none";
            tab3.style.display = "none";
        });
        $("#yellow_tab_2").click(function(){
            var tab1 = document.getElementsByClassName('tab1')[0]; 
            var tab2 = document.getElementsByClassName('tab2')[0]; 
            var tab3 = document.getElementsByClassName('tab3')[0]; 
            tab1.style.display = "none";
            tab2.style.display = "block";
            tab3.style.display = "none";
        });
        $("#yellow_tab_3").click(function(){
            var tab1 = document.getElementsByClassName('tab1')[0]; 
            var tab2 = document.getElementsByClassName('tab2')[0]; 
            var tab3 = document.getElementsByClassName('tab3')[0]; 
            tab1.style.display = "none";
            tab3.style.display = "block";
            tab2.style.display = "none";
            
        });
    });

    function changBranch_new(id){
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
        
    </script>

</body>
</html>