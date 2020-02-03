<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon@2x.png') }}">
    <title>Master Data | Client file</title>

    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}"></script>
    <link rel="stylesheet" href="{{ asset('asset/css/material-icons.css') }}"></script>
    
    <link rel="stylesheet" href="{{ asset('asset/css/sidebar-main.css') }}"></script>
    <link rel="stylesheet" href="{{ asset('asset/css/styles3.css') }}"></script>
    <link rel="stylesheet" href="{{ asset('asset/css/simplebar.css') }}"></script>
   
    <link rel="stylesheet" href="{{ asset('asset/css/dropzone.css') }}"></script>
    <link rel="stylesheet" href="{{ asset('asset/css/cropper.css') }}"></script>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
 
</style>
<body>
    <!-- page-wrapper -->
    <form method="post" action="{{ url('clientinsertsubmit') }}" enctype="multipart/form-data" >
    <div class="page-wrapper">
        <div class="docs-warp">
            <div class="docs-head shadow-on">
                <div class="docs-pane">
                    <div class="w-25">
                        <button class="btn-c material-icons" title="Back" onclick="location.href='masterpage';">home</button>
                    </div>
                    <div class="w-50">
                        <h6 class="text-center font-weight-bold m-0">Client file information</h6>
                    </div>
                    <div class="w-25">
                        <div class="text-right">
                            <button type="submit" class="btn-c material-icons" title="save">save</button>
                            <button type="button" class="btn-c material-icons" title="print" onClick="window.print()">print</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="docs-body on-simple-bar" style="background-color: #f8fafb;">
                <div class="docs-pane">
                    <div class="w-100 py-2">
                        <div class="card shadow-on">
                            <div class="card-body">
                              {{ csrf_field() }} 
                                <div class="row">   
                                    <div class="col-lg-6">
                                        <h6 class="card-title mb-4">
                                            <strong><i class="material-icons float-left mr-2">insert_photo</i> Profile Image</strong>
                                        </h6>
                                        <div class="form-group" class="dropzone" id="my-awesome-dropzone">
                                            <div class="fallback">
                                                <input type="file" name="images" name="images" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="card-title mb-4">
                                            <strong><i class="material-icons float-left mr-2">person</i> General info</strong>
                                        </h6>
                                        <div class="form-group">
                                            <label>Full name</label>
                                            <input type="text" name="fullname" id="fullname" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Invoice name</label>
                                            <input type="text" name="invoice" id="invoice" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Company's tax id number</label>
                                            <input type="text" class="form-control" id="tax" name="tax" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input type="text" class="form-control" id="country" name="country" required />
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-5">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div>
                                        <h6 class="card-title font-weight-bold"><i class="material-icons float-left mr-2">room</i>Address 1</h6>
                                    </div>
                                    <div>
                                        <button type="button" class="add btn-c material-icons float-right" title="add address">filter_none</button>
                                        <button type="button" class="btn-c material-icons float-right" title="Delete address">delete</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <label>Branch</label>
                                        <input type="text" class="form-control" id="Branch" name="Branch[]" required />
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone[]" required />
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label>Fax</label>
                                        <input type="text" class="form-control" id="Fax" name="Fax[]" required />
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-lg-4 mb-3">
                                        <label>Email address</label>
                                        <input type="text" class="form-control" id="email" name="email[]" required />
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label>Attention</label>
                                        <input type="text" class="form-control" id="attent" name="attent[]" required />
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label>Confict</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="yf_confict_0" name="invoicepotion0" value="1">
                                            <label class="form-check-label" for="yf_confict_0">
                                                YES
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="yf_confict_1" name="invoicepotion0" value="2">
                                            <label class="form-check-label" for="yf_confict_1">
                                            No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label>Address</label>
                                        <textarea class="form-control" id="Address" name="Address[]" ></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label>Country</label>
                                        <textarea class="form-control" id="ct_ad_country" name="ct_ad_country[]" ></textarea>
                                    </div>
                                </div>
                                <?php $i=1; ?>
                            <div class="clonefile" id="div_1"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

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
 
    <script>
        $(document).ready(function(){
            // Add new element
            $(".add").click(function(){
                
            console.log("Click");

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
                $(".clonefile:last").after("<div class='clonefile' id='div_"+ nextindex +"'></div>");
                // Adding element to <div>
                var table = '<hr class="my-5"><div class="d-flex align-items-center justify-content-between mb-4">';
                    table += '<div><h6 class="card-title font-weight-bold"><i class="material-icons float-left mr-2">room</i>Address '+ nextindex +' </h6></div>';
                    table += '<div><button type="button" class="add btn-c material-icons float-right" title="address">filter_none</button><button type="button" class="btn-c material-icons float-right remove" title="Delete address" id="remove_'+nextindex+'">delete</button></div>';
                    table += '</div>';

                    table += '<div class="row">';
                    table +=     '<div class="col-lg-4 mb-3"><label>Branch</label><input type="text" class="form-control" id="Branch" name="Branch[]" /></div>';
                    table +=     '<div class="col-lg-4 mb-3"><label>Phone</label><input type="text" class="form-control" id="phone" name="phone[]" /></div>';
                    table +=     '<div class="col-lg-4 mb-3"><label>Fax</label><input type="text" class="form-control" id="Fax" name="Fax[]" /></div>';
                    table += '</div>';

                    table += '<div class="row">';
                    table +=     '<div class="col-lg-4 mb-3"><label>Email address</label><input type="text" class="form-control" id="email" name="email[]" /></div>';
                    table +=     '<div class="col-lg-4 mb-3"><label>Attention</label><input type="text" class="form-control" id="attent" name="attent[]" /></div>';
                    table +=     '<div class="col-lg-4 mb-3"><label>Option</label><div class="form-check"><input class="form-check-input" type="radio" id="yf_confict_'+nextindex+'" name="invoicepotion'+ int +'" value="1"><label class="form-check-label" for="yf_confict_'+nextindex+'">YES</label></div>';
                    table +=     '<div class="form-check"><input class="form-check-input" type="radio" id="yf_confict_'+tem +'" name="invoicepotion'+ int +'" value="2" ><label class="form-check-label" for="yf_confict_'+ tem +'">No</label></div></div>';
                    table += '</div>';

                    table += '<div class="row">';
                    table +=     '<div class="col-lg-12 mb-8"><label>Address</label><textarea type="text" class="form-control" id="Address" name="Address[]"></textarea></div>';
                    table += '</div>';

                    $("#div_" + nextindex).append(table);
                
            }
                
                
                $('.remove').click(function(){
                var id = this.id;
                console.log(id);

                var split_id = id.split("_");
                var deletenextindex = split_id[1];
                // Remove <div> with id
                $("#div_" + deletenextindex).remove();
                });
                
            });                        
        });

   
    </script>
   

</body>
</html>