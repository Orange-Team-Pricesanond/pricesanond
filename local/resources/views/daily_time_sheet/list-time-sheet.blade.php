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
    
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/DataTables/datatables.min.css') }}"/>

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
    [type=search] {
        font-size: 1rem;
        color: #495057;
        background-color: #fff;
        border-radius: .25rem;
        border: 1px solid #ced4da; 
    }
    select{
        font-size: 1rem;
        color: #495057;
        background-color: #fff;
        border-radius: .25rem;
        border: 1px solid #ced4da;
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
                            <button class="btn-c material-icons" title="">print</button>
                            <button class="btn-c material-icons" title="">send</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="docs-body on-simple-bar">
                <div class="docs-pane">
                    <div class="w-100 py-2">
                        {{ csrf_field() }} 
                        <input type="hidden" id="id" name="id" value="{{$id}}" >
                        <div class="card border-0">
                            <div class="card-header py-4 bg-white d-flex justify-content-between">
                                <div class="d-flex">
                                    <div class="input-group input-group-sm mr-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text border-0 material-icons">date_range</div>
                                        </div>
                                        <input type="date" id="search_date" name="search_date" class="form-control" />
                                    </div>
                                    <div class="input-group input-group-sm mr-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text border-0 material-icons">info</div>
                                        </div>
                                        <select class="form-control" id="search_status" name="search_status">
                                            <option>All</option>
                                            <option value="1">Draft</option>
                                            <option value="2">Submitted</option>
                                        </select>
                                    </div>
                                    <div class="input-group input-group-sm mr-2">
                                       <i class="material-icons searching" style="margin-top: 6px;">search</i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <table id="list_ts" class="list_ts listed table table-hover display responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th width="30">#</th>
                                            <th>File No.</th>
                                            <th>Code</th>
                                            <th style="padding-left:1.25rem;" width="80">From</th>
                                            <th style="padding-left:1.25rem;" width="80">To</th>
                                            <th style="padding-left:1.25rem;" width="80">Time</th>
                                            <th style="padding-left:1.25rem;">Woek Performed</th>
                                            <th style="padding-left:1.25rem;">total</th>
                                            <th>Rate</th>
                                            <th width="30" class="text-center"><i class="material-icons md-12">delete</i></th>
                                        </tr>
                                    </thead>
                                </table>

                            </div>
                        </div>
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

    <script src="{{ asset('asset/js/jquery-3.3.1.min.js') }}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-markdown/2.10.0/js/bootstrap-markdown.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-markdown/2.10.0/js/bootstrap-markdown.min.js"></script>
    <!-- sweetalert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script type="text/javascript" src="{{ asset('asset/DataTables/datatables.min.js')}}"></script>

    <script>

        $( document ).ready(function() {
            var anwer = <?php echo $anwer; ?>;
            if(anwer == 1){ swal("Warning!", "Exceeds the budget that has been set up!", "warning");}
            
            var token = $('meta[name="csrf-token"]').attr('content');
            var id = document.getElementById("id").value; 
            
            searching(id,token);
        })

        $(".searching").on("click",function() {
            $('.list_ts').DataTable().destroy();
            
            var id = document.getElementById("id").value; 
            var token = $('meta[name="csrf-token"]').attr('content');
            var status = document.getElementById("search_status").value; 
            var date = document.getElementById("search_date").value; 

			searching(id,token,status,date);
		})

        function searching(id,token,status,date)
        {
            console.log(status);
            console.log(date);

            $('.list_ts').DataTable( {
                scrollY: true,
			  	scrollCollapse: true,
                "ajax": {
			    "url": '{{url("showDetaileTimesheet")}}',
			   	"type": 'POST',       
			    "data": {
			        "id": id,
			        "status": status,
			        "date": date,
			        "_token": token,
			    },
			  },
                columns : [
		        	{ data : 'id' },
		        	{ data : 'no' },
		        	{ data : 'code' },
		        	{ data : 'From' },
		        	{ data : 'To' },
		        	{ data : 'Time' },
		        	{ data : 'Woek Performed' },
		        	{ data : 'total' },
		        	{ data : 'Rate' },
		        	{ data : 'delete' },
		        ],
            } );
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