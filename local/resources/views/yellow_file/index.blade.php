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


</head>

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
                        </nav>
                        <div>
                            <button class="btn-c material-icons" title="Add client" data-toggle="modal" data-target="#pop_client_list">add_circle_outline</button>
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


</body>
</html>