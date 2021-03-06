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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/material-icons.css') }}">
    
    <link rel="stylesheet" href="{{ asset('asset/css/sidebar-main.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/simplebar.css') }}">
   
    <link rel="stylesheet" href="{{ asset('asset/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/cropper.css') }}">
    
    <!-- datetime picker -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/>

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
    /* add disable */
    .disabledbutton {
        pointer-events: none;
        opacity: 0.4;
    }

    .bootstrap-datetimepicker-widget .timepicker-hour, .bootstrap-datetimepicker-widget .timepicker-minute, .bootstrap-datetimepicker-widget .timepicker-second {
        width: 54px;
        font-weight: bold;
        font-size: 2.2em !important;
        margin: 0;
    }


    [data-title] {
    outline: red dotted 1px; /*optional styling*/
    font-size: 30px; /*optional styling*/
    
    position: relative;
    cursor: help;
    }

    [data-title]:hover::before {
    content: attr(data-title);
    position: absolute;
    bottom: -26px;
    display: inline-block;
    padding: 3px 6px;
    border-radius: 2px;
    background: #000;
    color: #fff;
    font-size: 12px;
    font-family: sans-serif;
    white-space: nowrap;
    }
    [data-title]:hover::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 8px;
    display: inline-block;
    color: #fff;
    border: 8px solid transparent;	
    border-bottom: 8px solid #000;
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
                <!-- <div class="docs-pane"> -->
                <div style="position: relative;display: block;align-items: center;justify-content: space-between;max-width: 95%;margin: 0 auto;">
                    <div class="py-2">
                        <form method="post" action="{{ url('timesheetInsert') }}">
                            {{ csrf_field() }} 
                            <input type="hidden" id="id" name="id" value="{{ Auth::user()->id }}">
                            <input type="hidden" id="random" name="random" value="{{ $random }}">
                            <div class="card shadow-on">                                
                                <div class="card-body">
                                    <table id="list_sm" class="listed table table-hover display responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                            <th style="width: 1%;">#</th>
                                                <th style="width: 15%;">Date</th>
                                                <th style="width: 10%;">File No.</th>
                                                <th style="width: 10%;">Code</th>
                                                <th style="width: 7%;">From</th>
                                                <th style="width: 7%;">To</th>
                                                <th style="width: 7%;">Total</th>
                                                <th style="width: 32%;">Work Performed</th>
                                                <th class="text-center"><i class="material-icons md-12">settings</i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $a=0; ?>
                                                <tr class="clonefile" id="div_<?php echo $a; ?>"></tr>
                                        </tbody>
                                    </table>

                                </div>
                                <div id="allButton" name="allButton" class="card-footer py-4 bg-white text-right">
                                    <button type="submit" id="status" name="status" value="1" class="btn btn-primary ml-3">SAVE</button>
                                    <button type="submit" id="status" name="status" value="4" class="btn btn-primary ml-3">SEND</button>
                                </div>
                            </div>
                        </form>

                        <datalist id="masterfiles">
                            @foreach ($yellow as $_value)
                            <?php 
                                $cilents = DB::table('tb_clients')->where('id_ct',$_value->id_ct_yf)->first();
                            ?>
                            <option value="{{ $_value->yf_fileno }}">{{$_value->yf_mtt }} / {{$cilents->ct_fn}}</option>
                            @endforeach
                        </datalist>
                        
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
    <!-- textarea Auto Size -->
    <script src="{{ asset('asset/js/autosize.js') }}"></script>

    <script src="{{ asset('asset/js/dropzone') }}"></script>
    <script src="{{ asset('asset/js/cropperjs') }}"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-markdown/2.10.0/js/bootstrap-markdown.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-markdown/2.10.0/js/bootstrap-markdown.min.js"></script> -->
    
    <!-- sweetalert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    
    <!-- datetime picker -->
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

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
                        table += '<td><input type="date" id="ts_date'+nextindex+'" name="ts_date[]" class="form-control" style="max-width: 90%;"></td>';
                        table += '<div><input" id="ts_no'+nextindex+'" name="ts_no[]" type="text" class="form-control" disabled /></div>';
                        table += '<td><input type="text" onChange="selectTime('+nextindex+'),confirm('+nextindex+')" autocomplete="off" list="masterfiles" id="master_'+nextindex+'" name="master_name[]" class="form-control"></td>';
                        table += '<td><div><input id="ts_law_id'+nextindex+'" name="ts_law_id[]" type="text" class="form-control" style="max-width: 150px;" /></div></td>';
                        table += '<td><div><input id="ts_form'+nextindex+'" name="ts_form[]" type="text" class="form-control datetimepicker" ref="'+nextindex+'" /></div></td>';
                        table += '<td><div><input id="ts_to'+nextindex+'" name="ts_to[]" type="text" class="form-control datetimepicker" ref="'+nextindex+'" onblur="calculate('+nextindex+')" /></div></td>';
                        table += '<td><div><input id="ts_total_time'+nextindex+'" name="ts_total_time[]" type="text" class="form-control form-control-sm border-0 rounded-0 bg-transparent"></div></td>';
                        table += '<td><textarea style="margin-top: 0px;margin-bottom: 0px;height: 49px;" class="form-control textarea" id="ts_woek'+nextindex+'" name="ts_woek[]"></textarea></td>';
                        table += '<td style=" width: 150px; ">';
                            table += '<button type="button" onclick="add_list('+nextindex+')" style="background-color: #ffffff00;border-color: #f0f8ff00;"><i class="material-icons"> add_box </i></button>';
                            table += '<button type="button" onclick="copy_list('+nextindex+')" style="background-color: #ffffff00;border-color: #f0f8ff00;"><i class="material-icons">filter_none</i></button>';
                            table += '<button type="button" class="remove" id="remove_'+nextindex+'" style="background-color: #ffffff00;border-color: #f0f8ff00;"><i class="material-icons"> delete </i></button>';
                        table += '</td>';
                    
                        $("#div_" + nextindex).append(table);
                    }
                    $('.remove').click(function(){
                    var id = this.id;

                    var split_id = id.split("_");
                    var deletenextindex = split_id[1];
                    // Remove <div> with id
                    $("#div_" + deletenextindex).remove();
                    });
            });   
        });
        function add_list(element)
        {
            console.log("Add List start->");

            var getdate = $('#ts_date'+element+'').val();

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
                        table += '<td><input type="date" id="ts_date'+nextindex+'" name="ts_date[]" class="form-control" value="'+getdate+'" style="max-width: 90%;"></td>';
                        table += '<div><input" id="ts_no'+nextindex+'" name="ts_no[]" type="text" class="form-control" disabled /></div>';
                        table += '<td><input type="text" onChange="selectTime('+nextindex+'),confirm('+nextindex+')" autocomplete="off" list="masterfiles" id="master_'+nextindex+'" name="master_name[]" class="form-control"></td>';
                        table += '<td><div><input id="ts_law_id'+nextindex+'" name="ts_law_id[]" type="text" class="form-control" /></div></td>';
                        table += '<td><div><input id="ts_form'+nextindex+'" name="ts_form[]" type="text" class="form-control datetimepicker" ref="'+nextindex+'" /></div></td>';
                        table += '<td><div><input id="ts_to'+nextindex+'" name="ts_to[]" type="text" class="form-control datetimepicker" ref="'+nextindex+'" onblur="calculate('+nextindex+')" /></div></td>';
                        table += '<td><div><input id="ts_total_time'+nextindex+'" name="ts_total_time[]" type="text" class="form-control form-control-sm border-0 rounded-0 bg-transparent"></div></td>';
                        table += '<td><textarea style="margin-top: 0px;margin-bottom: 0px;height: 49px;" class="form-control textarea" id="ts_woek'+nextindex+'" name="ts_woek[]"></textarea></td>';
                        table += '<td style=" width: 150px; ">';
                            table += '<button type="button" onclick="add_list('+nextindex+')" style="background-color: #ffffff00;border-color: #f0f8ff00;"><i class="material-icons"> add_box </i></button>';
                            table += '<button type="button" onclick="copy_list('+nextindex+')" style="background-color: #ffffff00;border-color: #f0f8ff00;"><i class="material-icons">filter_none</i></button>';
                            table += '<button type="button" class="remove" id="remove_'+nextindex+'" style="background-color: #ffffff00;border-color: #f0f8ff00;"><i class="material-icons"> delete </i></button>';
                        table += '</td>';
                
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
        }
        function copy_list(element)
        {
            console.log("Copy List start->");

            var date = $('#ts_date'+element+'').val();
            var no = $('#ts_no'+element+'').val();
            var master = $('#master_'+element+'').val();
            var law = $('#ts_law_id'+element+'').val();
            var form = $('#ts_form'+element+'').val();
            var to = $('#ts_to'+element+'').val();
            var total = $('#ts_total_time'+element+'').val();
            var work = $('#ts_woek'+element+'').val();
            
            var total_element = $(".clonefile").length;
            // last <div> with element class id
            var lastid = $(".clonefile:last").attr("id");
            var split_id = lastid.split("_");

            var nextindex = Number(split_id[1]) + 1;
            var max = 20;
            var idv = nextindex; 
            var int = nextindex-1;
            var tem = nextindex+1;

            $(".clonefile:last").after("<tr class='clonefile' id='div_"+ nextindex +"'></tr>");
                    // Adding element to <div>
                    var table = '<td>'+nextindex+'</td>';
                        table += '<td><input type="date" id="ts_date'+nextindex+'" name="ts_date[]" class="form-control" value="'+date+'" style="max-width: 90%;"></td>';
                        table += '<div><input" id="ts_no'+nextindex+'" name="ts_no[]" type="text" class="form-control" disabled /></div>';
                        table += '<td><input type="text" onChange="selectTime('+nextindex+'),confirm('+nextindex+')" autocomplete="off" list="masterfiles" id="master_'+nextindex+'" name="master_name[]" class="form-control" value="'+master+'"></td>';
                        table += '<td><div><input id="ts_law_id'+nextindex+'" name="ts_law_id[]" type="text" class="form-control" value="'+law+'"></div></td>';
                        table += '<td><div><input id="ts_form'+nextindex+'" name="ts_form[]" type="text" class="form-control datetimepicker" ref="'+nextindex+'" value="'+form+'"></div></td>';
                        table += '<td><div><input id="ts_to'+nextindex+'" name="ts_to[]" type="text" class="form-control datetimepicker" ref="'+nextindex+'" value="'+to+'" onblur="calculate('+nextindex+')" /></div></td>';
                        table += '<td><div><input id="ts_total_time'+nextindex+'" name="ts_total_time[]" type="text" class="form-control form-control-sm border-0 rounded-0 bg-transparent" value="'+total+'"></div></td>';
                        table += '<td><textarea style="margin-top: 0px;margin-bottom: 0px;height: 49px;" class="form-control textarea" id="ts_woek'+nextindex+'" name="ts_woek[]">'+work+'</textarea></td>';
                        table += '<td style=" width: 150px; ">';
                            table += '<button type="button" onclick="add_list('+nextindex+')" style="background-color: #ffffff00;border-color: #f0f8ff00;"><i class="material-icons"> add_box </i></button>';
                            table += '<button type="button" onclick="copy_list('+nextindex+')" style="background-color: #ffffff00;border-color: #f0f8ff00;"><i class="material-icons">filter_none</i></button>';
                            table += '<button type="button" class="remove" id="remove_'+nextindex+'" style="background-color: #ffffff00;border-color: #f0f8ff00;"><i class="material-icons"> delete </i></button>';
                        table += '</td>';
                    
            $("#div_" + nextindex).append(table);
            $('.remove').click(function(){
                var id = this.id;
                // console.log(id);

                var split_id = id.split("_");
                var deletenextindex = split_id[1];
                // Remove <div> with id
                $("#div_" + deletenextindex).remove();
            });
        }   
        function selectTime(index)
        {
            var master = $('#master_'+index+'').val();
            $.ajax({
                url: '{{url("selectTime")}}',
                type: "get",
                data : {master:master},
                datatype: "text",
                success: function (data) {
                   
                    $('#ts_form'+index+'').datetimepicker({
                        format: 'HH:mm',
                        stepping: data,
                    });
                    $('#ts_to'+index+'').datetimepicker({
                        format: 'HH:mm',
                        stepping: data,           
                    })
                   
                },error: function(err){
					alert(err);
                }
            });
        }
        function confirm(index) // confirm FileNo. (Yellows Files)
        {
            var val = $('#master_'+index+'').val();
            $.ajax({
                url: '{{url("getTextConfirm")}}',
                type: "get",
                data : {val:val},
                datatype: "text",
                success: function (data) {
                    swal({
                        title: "Are you sure ??",
                        text: data, 
                        // icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            // swal("Choose successful!");
                        }else{
                            $('#master_'+index+'').val("");
                        }
                    });

                },error: function(err){
					alert(err);
                }
            });
        }
        function calculate(index)
        {        
            var start = $('#ts_form'+index+'').val();
            var end = $('#ts_to'+index+'').val();
            var Law = $('#ts_law_id'+index+'').val();
            
            start = start.split(":");
            end = end.split(":");
            var startDate = new Date(0, 0, 0, start[0], start[1], 0);
            var endDate = new Date(0, 0, 0, end[0], end[1], 0);
            var diff = endDate.getTime() - startDate.getTime();
            var hours = Math.floor(diff / 1000 / 60 / 60);
            diff -= hours * 1000 * 60 * 60;
            var minutes = Math.floor(diff / 1000 / 60);

            if (endDate>startDate == false) {
               
               console.log("start => "+startDate);
               console.log("start => "+end[0]);

               if (start[0] == '23' && end[0] == '00') {
                   
                    $('#ts_total_time'+index+'').val("01:" + (minutes < 9 ? "0" : "") + minutes);
                    $('#ts_total_time'+index+'').css("color", "orange");
                    
                    /* Check time repeatedly  */
                    var date = $('#ts_date'+index+'').val();
                    var no = $('#ts_no'+index+'').val();
                    var master = $('#master_'+index+'').val();
                    var law = $('#ts_law_id'+index+'').val();
                    var form = $('#ts_form'+index+'').val();
                    var to = $('#ts_to'+index+'').val();
                    var total = $('#ts_total_time'+index+'').val();
                    var work = $('#ts_woek'+index+'').val();
                    var random = $('#random').val();

                    $.ajax({
                        url: '{{url("getBetweentime")}}',
                        type: "get",
                        data : {index:index,date:date,master:master,law:law,form:form,to:to,total:total,work:work,random:random},
                        datatype: "text",
                        success: function (data) {
                            console.log(data);
                            if(data == "False"){
                            
                                swal("Incorrect time filling","","error");
                            
                            }else{

                                if($('#ts_total_time'+index+'').val() != ""){
                                    var fileno = document.getElementById("master_"+index+"").value;
                                    $.ajax({
                                        url: '{{url("selectFixFee")}}',
                                        type: "get",
                                        data : {hours:hours , minutes:minutes , fileno:fileno , Law:Law},
                                        datatype: "text",
                                        success: function (data) {
                                            if(data == 1) {
                                                
                                                swal({
                                                    title: "Excess FixFee!. Do you want to continue using it?",
                                                    buttons: true,
                                                    dangerMode: true,
                                                })
                                                    .then((willDelete) => {
                                                        if (willDelete) { // Yes -> next step
                                                        }else{
                                                            $("#allButton").addClass("disabledbutton");
                                                        }
                                                    });
                                            }

                                        },error: function(err){
                                            swal(err);
                                        }
                                    });
                                }

                            }
                        },error: function(err){
                        alert(err);
                        }
                    });

               }else{
                    swal("Error filling in time slot. Please try again.");
                    $('#ts_to'+index+'').val("");

                    $('#ts_total_time'+index+'').val("ERROR");
                    $('#ts_total_time'+index+'').css("color", "red");
               }

            }else{ // total time is not empty or error

                $('#ts_total_time'+index+'').val((hours < 9 ? "0" : "") + hours + ":" + (minutes < 9 ? "0" : "") + minutes);
                $('#ts_total_time'+index+'').css("color", "blue");
                
                /* Check time repeatedly  */
                var date = $('#ts_date'+index+'').val();
                var no = $('#ts_no'+index+'').val();
                var master = $('#master_'+index+'').val();
                var law = $('#ts_law_id'+index+'').val();
                var form = $('#ts_form'+index+'').val();
                var to = $('#ts_to'+index+'').val();
                var total = $('#ts_total_time'+index+'').val();
                var work = $('#ts_woek'+index+'').val();
                var random = $('#random').val();

                $.ajax({
                    url: '{{url("getBetweentime")}}',
                    type: "get",
                    data : {index:index,date:date,master:master,law:law,form:form,to:to,total:total,work:work,random:random},
                    datatype: "text",
                    success: function (data) {
                        console.log(data);
                        if(data == "False"){
                        
                            swal("Incorrect time filling","","error");
                        }else{

                            if($('#ts_total_time'+index+'').val() != ""){
                                var fileno = document.getElementById("master_"+index+"").value;
                                $.ajax({
                                    url: '{{url("selectFixFee")}}',
                                    type: "get",
                                    data : {hours:hours , minutes:minutes , fileno:fileno , Law:Law},
                                    datatype: "text",
                                    success: function (data) {
                                        if(data == 1) {
                                            
                                            swal({
                                                title: "Excess FixFee!. Do you want to continue using it?",
                                                buttons: true,
                                                dangerMode: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) { // Yes -> next step
                                                    }else{
                                                        $("#allButton").addClass("disabledbutton");
                                                    }
                                                });
                                        }

                                    },error: function(err){
                                        swal(err);
                                    }
                                });
                            }

                        }
                    },error: function(err){
                    alert(err);
                    }
                });

            }           

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