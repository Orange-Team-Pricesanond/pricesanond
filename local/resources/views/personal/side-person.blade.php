
@foreach( $userlist as $_value)
<div class="box-side" id="side_person_{{$_value->id}}" style="width: 400px;">
    <div class="side-head">
        <span>PERSONAL</span>
        <button class="side-close"><i class="material-icons">close</i></button>
    </div>
    <div class="side-body on-simple-bar">
        <form class="p-4" action="{{url('updatepersonal')}}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }} 
            <h6 class="card-title mb-3">
                <span><i class="material-icons float-left mr-2">insert_photo</i> Profile Image</span>
            </h6>
            <div class="mb-5">
                <!-- <div class="dropzone dz-clickable text-center" id="myDropzone">
                    <div class="dz-default dz-message">
                        <span>Drop image here to upload</span>
                    </div>
                </div> -->
                <input type="file" name="file" id="profile-img">
                <div style=" text-align: center; ">
                    <img src="" id="profile-img-tag" width="200px" />
                </div>
            </div>
            <input name="id_personal" id="id_personal" type="hidden" class="form-control" value="{{$_value->id}}">
            <h6 class="card-title mb-3">
                <span><i class="material-icons float-left mr-2">info</i> Personal details</span>
            </h6>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Full name</label>
                        <input name="name" id="name" type="text" class="form-control" value="{{$_value->name}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Code</label>
                        <input name="code" id="code" type="text" class="form-control" value="{{$_value->code}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" id="email" type="text" class="form-control" value="{{$_value->email}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Phone</label>
                        <input name="phone" id="phone" type="text" class="form-control" value="{{$_value->phone	}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role" id="role">
                            <option value="3" <?php echo ( $_value->user_type == 3) ? "selected" : "" ; ?>>Partner</option>
                            <option value="1" <?php echo ( $_value->user_type == 1) ? "selected" : "" ; ?>>Lawyer</option>
                            <option value="4" <?php echo ( $_value->user_type == 4) ? "selected" : "" ; ?>>Audit</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="1" <?php echo ( $_value->status == 0) ? "selected" : "" ; ?>>Active</option>
                            <option value="0" <?php echo ( $_value->status == 1) ? "selected" : "" ; ?>>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
    </div>
    <div class="side-foot p-0">
        <button type="submit" class="side-close font-weight-bold text-blue w-100">SAVE</button>
    </div>
    </form>
<div>
@endforeach


<div class="box-side" id="side_person" style="width: 400px;">
    <div class="side-head">
        <span>PERSONAL</span>
        <button class="side-close"><i class="material-icons">close</i></button>
    </div>
    <div class="side-body on-simple-bar">
        <form class="p-4" action="{{url('inserpersonal')}}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }} 
            <h6 class="card-title mb-3">
                <span><i class="material-icons float-left mr-2">insert_photo</i> Profile Image</span>
            </h6>
            <div class="mb-5">
                <!-- <div class="dropzone dz-clickable text-center" id="myDropzone">
                    <div class="dz-default dz-message">
                        <span>Drop image here to upload</span>
                    </div>
                </div> -->
                <input type="file" name="file" id="profile-img">
                <div style=" text-align: center; ">
                    <img src="" id="profile-img-tag" width="200px" />
                </div>
            </div>
            <h6 class="card-title mb-3">
                <span><i class="material-icons float-left mr-2">info</i> Personal details</span>
            </h6>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Full name</label>
                        <input name="name" id="name" type="text" class="form-control" require>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Code</label>
                        <input name="code" id="code" type="text" class="form-control" require>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" id="email" type="text" class="form-control" require>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Phone</label>
                        <input name="phone" id="phone" type="text" class="form-control" require>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" id="password" type="text" class="form-control" require>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role" id="role" require>
                            <option value="3">Partner</option>
                            <option value="1">Lawyer</option>
                            <option value="4">Audit</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" id="status" require>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
    </div>
    <div class="side-foot p-0">
        <button type="submit" class="side-close font-weight-bold text-blue w-100">SAVE</button>
    </div>
    </form>
<div>
