<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
<style type="text/css">
    [type=search] {
        font-size: 1rem;
        color: #495057;
        background-color: #fff;
        border-radius: .25rem;
        border: 1px solid #ced4da; 
    }
        a {
        text-decoration: none !important;
        color: black;
    } 

</style>
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
                            <a id="sheet_tab_1" href="#sheet_con_1" aria-controls="sheet_con_1" class="nav-item nav-link active" data-toggle="tab" role="tab" aria-selected="true">Daily Time Sheet</a>
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
            $('#list_index').DataTable( 
                {
                scrollY: true,
			  	scrollCollapse: true,
                "ajax": '{{url("showtimesheet")}}',
                columns : [
		        	{ data : 'id' },
		        	{ data : 'ref' },
		        	{ data : 'date' },
		        	{ data : 'code' },
		        	{ data : 'Form' },
		        	{ data : 'To' },
		        	{ data : 'Total' },
                    @php 
                    if(Auth::user()->user_type == 4){
		        	echo "{ data : 'rate' },";
                    }
                    @endphp
		        	{ data : 'work' },
                    { data : 'status' },
                    <?php 
                        if(Auth::user()->user_type == 2){
                        echo "{ data : 'delete' },";
                        }
                    ?>
		        ],
                }
             );
        } );
        $( ".search" ).change(function() {
            $('#list_index').DataTable().destroy();
			search($(this).val());
		})
        function search()
        {
            var token = $('meta[name="csrf-token"]').attr('content');
            var date = document.getElementById("search_date").value; 
            var code = document.getElementById("search_code").value; 
            var ref = document.getElementById("search_ref").value; 

            console.log("date -> " +date);
            console.log("code -> " +code);
            console.log("ref -> " +ref);

            $('#list_index').DataTable( {
                scrollY: true,
			  	scrollCollapse: true,
                "ajax": {
			    "url": '{{url("searchtimesheet")}}',
			   	"type": 'POST',       
			    "data": {
			        "date": date,
			        "code": code,
			        "ref": ref,
			        "_token": token,
			    },
			  },
              columns : [
                    { data : 'id' },
                    { data : 'ref' },
		        	{ data : 'date' },
		        	{ data : 'code' },
		        	{ data : 'Form' },
		        	{ data : 'To' },
		        	{ data : 'Total' },
                    @php 
                    if(Auth::user()->user_type == 4){
		        	echo "{ data : 'rate' },";
                    }
                    @endphp
		        	{ data : 'work' },
                    { data : 'status' },
                    <?php 
                        if(Auth::user()->user_type == 2){
                        echo "{ data : 'delete' },";
                        }
                    ?>
		        ],
            } );
        }

        function selectSorttime(val,index){
            if(val == 5){
                $step = 300;
            }else{
                $step = 360;
            }
            document.getElementById("ts_form_"+index).step = $step; 
            document.getElementById("ts_to_"+index).step = $step; 
        }
        function calculateEdit(index)
        {   
            var s = document.getElementById("ts_form_"+index);
            var e = document.getElementById("ts_to_"+index);
           
            var start = s.value;
            var end = e.value;
           
            start = start.split(":");
            end = end.split(":");
            var startDate = new Date(0, 0, 0, start[0], start[1], 0);
            var endDate = new Date(0, 0, 0, end[0], end[1], 0);
            var diff = endDate.getTime() - startDate.getTime();
            var hours = Math.floor(diff / 1000 / 60 / 60);
            diff -= hours * 1000 * 60 * 60;
            var minutes = Math.floor(diff / 1000 / 60);
            $('#ts_total_time_'+index).val((hours < 9 ? "0" : "") + hours + ":" + (minutes < 9 ? "0" : "") + minutes);
        }
        
    </script>
  
</body>
</html>