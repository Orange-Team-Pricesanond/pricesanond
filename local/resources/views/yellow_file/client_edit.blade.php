<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../../img/ic/favicon.png">
    <link rel="icon" type="image/png" href="../../img/ic/favicon@2x.png">
    <title>Master Data | Client file</title>

    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}"></script>
    <link rel="stylesheet" href="{{ asset('asset/css/material-icons.css') }}"></script>
    
    <link rel="stylesheet" href="{{ asset('asset/css/sidebar-main.css') }}"></script>
    <link rel="stylesheet" href="{{ asset('asset/css/styles.css') }}"></script>
    <link rel="stylesheet" href="{{ asset('asset/css/simplebar.css') }}"></script>
   
    <link rel="stylesheet" href="{{ asset('asset/css/dropzone.css') }}"></script>
    <link rel="stylesheet" href="{{ asset('asset/css/cropper.css') }}"></script>

</head>

<body>

    <!-- page-wrapper -->
    <div class="page-wrapper">
        <div class="docs-warp">
            <div class="docs-head shadow-on">
                <div class="docs-pane">
                    <div class="w-25">
                        <button class="btn-c material-icons" title="Back" onclick="location.href='index.php';">home</button>
                    </div>
                    <div class="w-50">
                        <h6 class="text-center font-weight-bold m-0">Client file information</h6>
                    </div>
                    <div class="w-25">
                        <div class="text-right">
                            <button class="btn-c material-icons" title="">save</button>
                            <button class="btn-c material-icons" title="">print</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="docs-body on-simple-bar">
                <div class="docs-pane">
                    <div class="w-100 py-2">
                    <form>
                        <div class="card shadow-on">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <h6 class="card-title mb-4">
                                            <strong><i class="material-icons float-left mr-2">insert_photo</i> Profile Image</strong>
                                        </h6>

                                        <div class="form-group">
                                            <div class="dropzone dz-clickable text-center" id="myDropzone" style="min-height: 234px;">
                                                <div class="dz-default dz-message">
                                                    <span>Drop image here to upload</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="card-title mb-4">
                                            <strong><i class="material-icons float-left mr-2">person</i> General info</strong>
                                        </h6>
                                        <div class="form-group">
                                            <label>Full name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Invoice name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Company's tax id number</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-5">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div>
                                        <h6 class="card-title font-weight-bold"><i class="material-icons float-left mr-2">room</i>Address 1</h6>
                                    </div>
                                    <div>
                                        <button type="button" class="btn-c material-icons float-right" title="Coppy address">filter_none</button>
                                        <button type="button" class="btn-c material-icons float-right" title="Delete address">delete</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <label>Branch</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label>Country</label>
                                        <select class="form-control">
                                            <option selected>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label>Province</label>
                                        <select class="form-control">
                                            <option selected>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <label>Postal Code</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label>District / Area</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label>Sub-district / Sub-area</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <label>Road</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-8 mb-3">
                                        <label>Address</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <label>Phone</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label>Fax</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label>Email address</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <label>Attention</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label>How to send</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label>Option</label>
                                        <div class="custom-control custom-switch mb-2">
                                            <input type="radio" class="custom-control-input" id="addressSwitch_1_1" name="addressSwitch_1" checked>
                                            <label class="custom-control-label" for="addressSwitch_1_1">Used in invoice address</label>
                                        </div>
                                        <div class="custom-control custom-switch mb-2">
                                            <input type="radio" class="custom-control-input" id="addressSwitch_2_1" name="addressSwitch_2" checked>
                                            <label class="custom-control-label" for="addressSwitch_2_1">Document delivery location</label>
                                        </div>
                                    </div>
                                </div>


                                <hr class="my-5">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div>
                                        <h6 class="card-title font-weight-bold"><i class="material-icons float-left mr-2">room</i>Address 2</h6>
                                    </div>
                                    <div>
                                        <button type="button" class="btn-c material-icons float-right" title="Coppy address">filter_none</button>
                                        <button type="button" class="btn-c material-icons float-right" title="Delete address">delete</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <label>Branch</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label>Country</label>
                                        <select class="form-control">
                                            <option selected>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label>Province</label>
                                        <select class="form-control">
                                            <option selected>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <label>Postal Code</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label>District / Area</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label>Sub-district / Sub-area</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <label>Road</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-8 mb-3">
                                        <label>Address</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <label>Phone</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label>Fax</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label>Email address</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <label>Attention</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label>How to send</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label>Option</label>
                                        <div class="custom-control custom-switch mb-2">
                                            <input type="radio" class="custom-control-input" id="addressSwitch_1_2" name="addressSwitch_1">
                                            <label class="custom-control-label" for="addressSwitch_1_2">Used in invoice address</label>
                                        </div>
                                        <div class="custom-control custom-switch mb-2">
                                            <input type="radio" class="custom-control-input" id="addressSwitch_2_2" name="addressSwitch_2">
                                            <label class="custom-control-label" for="addressSwitch_2_2">Document delivery location</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
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

    <script src="{{ asset('asset/js/dropzone') }}"></script>
    <script src="{{ asset('asset/js/cropperjs') }}"></script>

    <script id="rendered-js">
        Dropzone.options.myDropzone = {
        url: '/post',
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