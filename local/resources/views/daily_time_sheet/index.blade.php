<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon.png') }}" >
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon@2x.png') }}" >
    <title>Daily time sheet</title>

    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('asset/css/material-icons.css') }}" >
    <link rel="stylesheet" href="{{ asset('asset/css/jquery.mCustomScrollbar.min.css') }}" >

    <link rel="stylesheet" href="{{ asset('asset/css/sidebar-main.css') }}" >
    <link rel="stylesheet" href="{{ asset('asset/css/sidebar-themes.css') }}" >
    <link rel="stylesheet" href="{{ asset('asset/css/styles.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/DataTables/datatables.min.css') }}"/>

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
                        <nav class="nav nav-tabs" id="time-sheet-tab" role="tablist">
                            <a id="sheet_tab_1" href="#sheet_con_1" aria-controls="sheet_con_1" class="nav-item nav-link active" data-toggle="tab" role="tab" aria-selected="true">YELLOW FILES</a>
                        </nav>
                        <div>
                            <!-- <button class="btn-c material-icons" title="Add item" data-toggle="modal" data-target="#pop_matter">add_circle_outline</button> -->
                            <a href="{{url('timesheetadd')}}"><button class="btn-c material-icons" title="Add Timesheet" >playlist_add</button></a>
                            <!-- <button class="btn-c material-icons" title="Delete selected">delete</button>
                            <button class="btn-c material-icons" title="Submit selected">send</button> -->
                        </div>
                    </div>
                    <div class="work-con">
                        <div class="tab-content" id="time-sheet-tabContent">
                            <div id="sheet_con_1" aria-labelledby="sheet_tab_1" role="tabpanel" class="tab-pane fade show active">
                                @include('daily_time_sheet.time-sheet-list')
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
    @include('layout.popup.pop-matter')

    <!-- site scripts -->
    <script src="{{ asset('asset/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('asset/js/popper.min.js') }}"></script>
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('asset/js/sidebar-main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/DataTables/datatables.min.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        });
    </script>

</body>
</html>