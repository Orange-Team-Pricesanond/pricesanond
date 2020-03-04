<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon.png') }}" >
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon@2x.png') }}" >
    <title>Personal</title>

    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('asset/css/material-icons.css') }}" >

    <link rel="stylesheet" href="{{ asset('asset/css/sidebar-main.css') }}" >
    <link rel="stylesheet" href="{{ asset('asset/css/sidebar-themes.css') }}" >
    <link rel="stylesheet" href="{{ asset('asset/css/styles2.css') }}" >
    <link rel="stylesheet" href="{{ asset('asset/css/simplebar.css') }}" >
    
    <link rel="stylesheet" href="{{ asset('asset/css/dropzone.css') }}" >
    <link rel="stylesheet" href="{{ asset('asset/css/cropper.css') }}" >

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
        .btn-secondary, .badge-secondary {
            background-color: #F2F4F6;
            color: #778CA2;
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
                <div class="work-pane on-simple-bar">
                    <div class="work-tab">
                        <div></div>
                        <div>
                            <button onclick="openpreson('')" class="btn-c material-icons open-person" title="Add new">add_circle</button>
                        </div>
                    </div>
                    <div class="work-con">
                     @include('personal.list-personal')
                    </div>
                </div>

                @include('personal.side-person')

            </div>

        </main>
        <!-- page-content -->

    </div>
    <!-- page-wrapper -->


    <!-- site popup -->
    @include('layout.popup.pop-client')
    
    <!-- site scripts -->
    <script src="{{ asset('asset/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('asset/js/popper.min.js') }}"></script>
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <script src="{{ asset('asset/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('asset/js/sidebar-main.js') }}"></script>
   
    <script src="{{ asset('asset/js/script.js') }}"></script>
    <script src="{{ asset('asset/js/dropzone') }}"></script>
    <script src="{{ asset('asset/js/cropperjs') }}"></script>
    <!-- sweetalert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script type="text/javascript" src="{{ asset('asset/DataTables/datatables.min.js')}}"></script>

    <script>
         $(document).ready(function(){
            // Add new element
            $(".add").click(function(){

                 // Finding total number of elements added
                 var total_element = $(".add_code").length;

                // last <div> with element class id
                var lastid = $(".add_code:last").attr("id");
                var split_id = lastid.split("_");

                var nextindex = Number(split_id[1]) + 1;
                var max = 20;
                var idv = nextindex; 
                var int = nextindex-1;
                var tem = nextindex+1;

                // Check total number elements
                if(total_element < max ){
                    // Adding new div container after last occurance of element class
                    $(".add_code:last").after("<div class='add_code col-md-12' id='div_"+ nextindex +"'></div>");
                    // Adding element to <div>
                    
                    var table = '<div class="col-md-12">';
                        table += '<div class="form-group">';
                            table += '<label>code</label>';
                            table += ' <input name="code[]" id="code" type="text" class="form-control">';
                        table += '</div>';
                    table += '</div>';

                    table += '<div class="col-md-12">';
                        table += '<div class="form-group">';
                            table += '<label>Rate</label>';
                            table += ' <input name="rates[]" id="rates" type="text" class="form-control">';
                        table += '</div>';
                    table += '</div>';
                    table += '<button type="button" class="remove" id="remove_'+nextindex+'" style="background-color: #ffffff00;border-color: #f0f8ff00;"><span class="more material-icons md-12">delete</span></button>';

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

    </script>

    <script>
        $(document).ready(function() {
            $('.tbpersonal').DataTable( 
                {
                scrollY: true,
			  	scrollCollapse: true,
                "ajax": '{{url("getPersonal")}}',
                columns : [
		        	{ data : 'Pic' },
		        	{ data : 'Name' },
		        	{ data : 'Role' },
		        	{ data : 'Email' },
		        	{ data : 'Phone' },
		        	{ data : 'Status' },
                    { data : 'action' },
		        ],
                }
             );
        });

        $( ".selectStatus" ).change(function() {
            $('.tbpersonal').DataTable().destroy();
			searchpn($(this).val());
		});
        
        function searchpn()
        {
            var token = $('meta[name="csrf-token"]').attr('content');
            var status = document.getElementById("status").value; 
            var name = document.getElementById("name").value; 

            $('.tbpersonal').DataTable( {
                scrollY: true,
			  	scrollCollapse: true,
                "ajax": {
			    "url": '{{url("getPersonal")}}',
			   	"type": 'GET',       
			    "data": {
			        "status": status,
			        "name": name,
			        "_token": token,
			    },
			  },
              columns : [
		        	{ data : 'Pic' },
		        	{ data : 'Name' },
		        	{ data : 'Role' },
		        	{ data : 'Email' },
		        	{ data : 'Phone' },
		        	{ data : 'Status' },
                    { data : 'action' },
		        ],
            } );
        }

        function delete_personal(id){
            var token = $('meta[name="csrf-token"]').attr('content');

			swal({
				title: "Item will be removed from Time Sheet!",
				buttons: true,
				dangerMode: true,
			})
				.then((willDelete) => {
					if (willDelete) {
							$.ajax({
								url: '{{url("deletepersonal")}}',
								type: "get",
								data : {id:id},
								datatype: "text",
                                success: function (data) {
                                    swal({
                                        title: "Deleted!",
                                        text: "Your row has been deleted.",
                                        type: "success",
                                        allowOutsideClick: false,
                                    });
                                    location.reload();
								},error: function(err){
									alert(err);
								}
							});
					}
				});
        }

        function clone_personal(id)
        {
            document.getElementById("side_person_clone_"+id+"").classList.add('active');
        }
   
    </script>

    <script>
        function openpreson(index){
            if(index == ""){
                document.getElementById("side_person").classList.add('active');
            }else{
                document.getElementById("side_person_"+index+"").classList.add('active');
            }

        }
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#profile-img-tag').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#profile-img").change(function(){
            readURL(this);
        });

    </script>


    <script id="rendered-js">
        Dropzone.options.myDropzone = {
        url: '/user/',
        // addRemoveLinks: true,
        maxFiles: 1,
        init: function() {
            this.on("maxfilesexceeded", function(file) {
                this.removeAllFiles();
                this.addFile(file);
            });
        },
            
        transformFile: function (file, done) {

            var myDropZone = this;

            // Create the image editor overlay
            var editor = document.createElement('div');
            editor.style.position = 'fixed';
            editor.style.left = 0;
            editor.style.right = 0;
            editor.style.top = 0;
            editor.style.bottom = 0;
            editor.style.zIndex = 9999;
            editor.style.backgroundColor = '#000';

            // Create the confirm button
            var confirm = document.createElement('button');
            confirm.style.position = 'absolute';
            confirm.style.right = '10px';
            confirm.style.top = '10px';
            confirm.style.zIndex = 9999;
            confirm.style.padding = '5px 10px';
            confirm.style.border = '0';
            confirm.style.borderRadius = '4px';
            confirm.textContent = 'Confirm';
            confirm.addEventListener('click', function () {

            // Get the canvas with image data from Cropper.js
            var canvas = cropper.getCroppedCanvas({
                width: 256,
                height: 256 });

            // Turn the canvas into a Blob (file object without a name)
            canvas.toBlob(function (blob) {

                // Update the image thumbnail with the new image data
                myDropZone.createThumbnail(
                blob,
                myDropZone.options.thumbnailWidth,
                myDropZone.options.thumbnailHeight,
                myDropZone.options.thumbnailMethod,
                false,
                function (dataURL) {

                // Update the Dropzone file thumbnail
                myDropZone.emit('thumbnail', file, dataURL);

                // Return modified file to dropzone
                done(blob);
                });

            });

            // Remove the editor from view
            editor.parentNode.removeChild(editor);

            });
            editor.appendChild(confirm);

            // Load the image
            var image = new Image();
            image.src = URL.createObjectURL(file);
            editor.appendChild(image);

            // Append the editor to the page
            document.body.appendChild(editor);

            // Create Cropper.js and pass image
            var cropper = new Cropper(image, {
            aspectRatio: 1
            });

        } };
        //# sourceURL=pen.js
    </script>


</body>
</html>