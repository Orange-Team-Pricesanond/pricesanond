<div class="box-side" id="side_person" style="width: 400px;">
    <div class="side-head">
        <span>PERSONAL</span>
        <button class="side-close"><i class="material-icons">close</i></button>
    </div>
    <div class="side-body on-simple-bar">
        <form class="p-4" action="{{url('')}}">
            <h6 class="card-title mb-3">
                <span><i class="material-icons float-left mr-2">insert_photo</i> Profile Image</span>
            </h6>
            <div class="mb-5">
                <div class="dropzone dz-clickable text-center" id="myDropzone">
                    <div class="dz-default dz-message">
                        <span>Drop image here to upload</span>
                    </div>
                </div>
            </div>

            <h6 class="card-title mb-3">
                <span><i class="material-icons float-left mr-2">info</i> Personal details</span>
            </h6>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Full name</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Code</label>
                        <input type="text" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control">
                            <option>Partner</option>
                            <option>Lawyer</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control">
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>
                </div>

            </div>
        </form>

    </div>
    <div class="side-foot p-0">
        <button type="submit" class="side-close font-weight-bold text-blue w-100">SAVE</button>
    </div>
<div>