<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon@2x.png') }}">
    <title>Daily time sheet | Time sheet file</title>

  <!-- site css -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/material-icons.css') }}">
    
    <link rel="stylesheet" href="{{ asset('asset/css/sidebar-main.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/simplebar.css') }}">
   
    <link rel="stylesheet" href="{{ asset('asset/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/cropper.css') }}">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-markdown/2.10.0/css/bootstrap-markdown.min.css">

</head>
<style>
.docs-pane {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    max-width: 1040px;
    width: 100%;
    height: 100%;
    margin: 0 auto;
    padding: 15px;   
}
.docs-head {
    color: #036;
    position: relative;
    border-bottom: 1px solid #f1f1f1;
    z-index: 1;
    background-color: white;
}
.page-wrapper {
    position: relative;
    height: 100vh;
    max-height: 100vh;
    background-color: #f8fafb;
    border-top: 1px solid #f1f1f1;
}
</style>
<body>

    <!-- page-wrapper -->
    <div class="page-wrapper">
        <div class="docs-warp">
            <div class="docs-head shadow-on">
                <div class="docs-pane">
                    <div class="w-25">
                        <a href="{{ url('dailytime') }}"><button class="btn-c material-icons" title="Back">home</button></a>
                    </div>
                    <div class="w-50">
                        <h6 class="text-center font-weight-bold m-0">Time sheet file information</h6>
                    </div>
                    <div class="w-25">
                        <div class="text-right">
                            <button class="add btn-c material-icons" title="Add Timesheet" >playlist_add</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="docs-body on-simple-bar">
                <div class="docs-pane">
                    <div class="w-100 py-2">
                        <form method="post" action="{{ url('timesheetInsert') }}">
                        {{ csrf_field() }} 
                        <input type="hidden" id="id" name="id" value="{{ Auth::user()->id }}" >
                        <div class="card shadow-on">
                            <div class="card-header py-4 bg-white d-flex justify-content-between">
                                <div>DAILY TIME SHEET {{$date}}</div>
                                <div>
                                    <div class='d-inline-block'>
                                        <span class="ml-2">File No. </span>
                                        <span class="text-blue">{{ $yellow->yf_fileno}}</span>
                                    </div>
                                    <div class='d-inline-block'>
                                        <span class="ml-2">Status : </span>
                                        <span class="text-pink"> {{ ($count > 0 ? 'Complete' : 'Padding' ) }} </span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <table id="list_sm" class="listed table table-hover display responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th width="30">#</th>
                                            <th>File No.</th>
                                            <!-- <th>Rate</th> -->
                                            <th>Law</th>
                                            <th style="padding-left:1.25rem;" width="80">From</th>
                                            <th style="padding-left:1.25rem;" width="80">To</th>
                                            <th style="padding-left:1.25rem;" width="80">Time</th>
                                            <th style="padding-left:1.25rem;">Woek Performed</th>
                                            <th width="30" class="text-center"><i class="material-icons md-12">delete</i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $a=0; ?>
                                    <!-- @foreach ($sheet as $value)
                                        <tr>
                                            <td>{{$a}}</td>
                                            <td>{{ $value->ts_no }}</td>
                                            <td>{{ $value->ts_reate_work }}</td>
                                            <td>
                                                <div>{{ $value->ts_law_id }} </div>
                                            </td>
                                            <td>
                                                <p>
                                                    {{ Carbon\Carbon::createFromFormat('H:i:s',$value->ts_form)->format('h:i')}}
                                                </p>
                                            </td>
                                            <td>
                                                <p>
                                                    {{ Carbon\Carbon::createFromFormat('H:i:s',$value->ts_to)->format('h:i')}}
                                                </p>
                                            </td>
                                            <td>
                                                <p>
                                                    {{ Carbon\Carbon::createFromFormat('H:i',$value->ts_total_time)->format('h:i')}}
                                                </p>  
                                            </td>                                        
                                            <td>
                                                <p>{{$value->ts_woek}}</p>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{url('deletetimesheet')}}/{{$value->ts_id}}">
                                                    <button type="button" style="background-color: #ffffff00;border-color: #f0f8ff00;" onclick="deltesheet({{$value->ts_id}})">
                                                        <span class="more material-icons md-12">delete</span>
                                                    </button>
                                                </a> 
                                            </td>
                                        </tr>
                                        @endforeach    -->
                                            <input type="hidden" id="ts_id_yf" name="ts_id_yf" value="{{$id}}">
                                            <tr class="clonefile" id="div_<?php echo $a; ?>"></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer py-4 bg-white text-right">
                                <button type="submit" class="btn btn-primary ml-3">SAVE</button>
                            </div>
                        </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-wrapper -->

   <!-- site scripts -->
   <script src="{{ asset('asset/js/popper.min.js') }}"></script>
    <script src="{{ asset('asset/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('asset/js/sidebar-main.js') }}"></script>
    <script src="{{ asset('asset/js/script.js') }}"></script>

    <script src="{{ asset('asset/js/dropzone') }}"></script>
    <script src="{{ asset('asset/js/cropperjs') }}"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-markdown/2.10.0/js/bootstrap-markdown.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-markdown/2.10.0/js/bootstrap-markdown.min.js"></script>
    <!-- sweetalert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script>
        $(document).ready(function(){
            // Add new element
            $(".add").click(function(){
                
            // Finding total number of elements added
            var total_element = $(".clonefile").length;

            // last <div> with element class id
            var lastid = $(".clonefile:last").attr("id");
            var split_id = lastid.split("_");

            var nextindex = Number(split_id[1]) + 1;
            var max = 20;
            var idv = nextindex; 
            var int = nextindex-1;
            var tem = nextindex+1;

            // Check total number elements
            if(total_element < max ){
                
                // Adding new div container after last occurance of element class
                $(".clonefile:last").after("<tr class='clonefile' id='div_"+ nextindex +"'></tr>");
                // Adding element to <div>

                var table = '<td>'+nextindex+'</td>';
                    // table += '<td><div><input id="ts_no'+nextindex+'" name="ts_no[]" type="text" class="form-control form-control-sm border-0 rounded-0" style="width: 100px;" /></div></td>';
                    table += '<div><input id="ts_no'+nextindex+'" name="ts_no[]" type="text" class="form-control form-control-sm border-0 rounded-0" style="width: 88px;" disabled /></div>';
                    // table += '<td><div><select class="form-control" id="ts_reate_work'+nextindex+'" name="ts_reate_work[]">';
                    // table += '<option value="A">A</option>';
                    // table += '<option value="B">B</option>';
                    // table += '<option value="C">C</option>';
                    // table += '<option value="D">D</option>';
                    // table += '<option value="E">E</option>';
                    // table += '<option value="F">F</option>';
                    // table += '</select></div></td>';
                    table += '<td><input type="hidden" id="ts_reate_work'+nextindex+'" name="ts_reate_work[]" /></td>'

                    table += '<td><div><input id="ts_law_id'+nextindex+'" name="ts_law_id[]" type="number" class="form-control form-control-sm border-0 rounded-0" style="width: 60px;" onchange="calrate('+nextindex+')" /></div></td>';
                    table += '<td><div><input id="ts_form'+nextindex+'" name="ts_form[]" type="time" class="form-control form-control-sm border-0 rounded-0" /></div></td>';
                    table += '<td><div><input id="ts_to'+nextindex+'" name="ts_to[]" type="time" class="form-control form-control-sm border-0 rounded-0" onChange="calculate('+nextindex+')" /></div></td>';
                    table += '<td><div><input id="ts_total_time'+nextindex+'" name="ts_total_time[]" type="text" class="form-control form-control-sm border-0 rounded-0 text-blue bg-transparent"></div></td>';
                    table += '<td><input id="ts_woek'+nextindex+'" name="ts_woek[]" type="text" class="form-control form-control-sm border-0 rounded-0" /></td>';
                    table += '<td><button type="button" class="remove" style="background-color: #ffffff00;border-color: #f0f8ff00;" id="remove_'+nextindex+'"><span class="more material-icons md-12">delete</span></button></td>';
                    $("#div_" + nextindex).append(table);
            }
                $('.remove').click(function(){
                var id = this.id;
                // console.log(id);

                var split_id = id.split("_");
                var deletenextindex = split_id[1];
                // Remove <div> with id
                $("#div_" + deletenextindex).remove();
                });
                
            });                        
        });

        function calrate(id)
        {
            var idlaw = $('#ts_law_id'+id+'').val();
            var yellow = $('#ts_id_yf').val();
            
            console.log("ID LAW => "+idlaw);
            console.log("ID Yellowfile => "+yellow);

            $.ajax({
                url: '{{url("selectLaw")}}',
                type: "get",
                data : {idlaw:idlaw , yellow:yellow},
                datatype: "text",
                success: function (data) {
                    $('#ts_reate_work'+id+'').val(data);
                },error: function(err){
					alert(err);
                }
            });
        }

        function calculate(index)
        {
            var start = $('#ts_form'+index+'').val();
            var end = $('#ts_to'+index+'').val();
           
            start = start.split(":");
            end = end.split(":");
            var startDate = new Date(0, 0, 0, start[0], start[1], 0);
            var endDate = new Date(0, 0, 0, end[0], end[1], 0);
            var diff = endDate.getTime() - startDate.getTime();
            var hours = Math.floor(diff / 1000 / 60 / 60);
            diff -= hours * 1000 * 60 * 60;
            var minutes = Math.floor(diff / 1000 / 60);

            $('#ts_total_time'+index+'').val((hours < 9 ? "0" : "") + hours + ":" + (minutes < 9 ? "0" : "") + minutes);
        }
   
        function deltesheet(id)
        {
            var token = $('meta[name="csrf-token"]').attr('content');

			swal({
				title: "Item will be removed from Time Sheet!",
				buttons: true,
				dangerMode: true,
			})
				.then((willDelete) => {
					if (willDelete) {
							$.ajax({
								url: '{{url("deletetimesheetAjax")}}',
								type: "get",
								data : {id:id},
								datatype: "text",
                                success: function (data) {
                                       if(data == "complete") {
                                            swal(
                                                'Your imaginary file has been deleted!!',
                                                '',
                                                'success'
                                            )
                                        }else{
                                            swal(
                                                'Your imaginary file has been deleted!!',
                                                '',
                                                'error'
                                            )
                                        }
										window.setTimeout('location.reload()', 1000); //Reloads after 2000 seconds
								},error: function(err){
									alert(err);
								}
							});
					}
				});
        }

    </script>
   

</body>
</html>