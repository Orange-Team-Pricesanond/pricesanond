
<!-- Update data -->
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
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Full name</label>
                        <input name="name" id="name" type="text" class="form-control" value="{{$_value->name}}">
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
                            <option value="A" <?php echo ( $_value->status == 'A') ? "selected" : "" ; ?>>Active</option>
                            <option value="N" <?php echo ( $_value->status == 'N') ? "selected" : "" ; ?>>Inactive</option>
                        </select>
                    </div>
                </div>
                <?php 
                    $detail = DB::table('user_detail')->where('id',$_value->id)->get();   
                ?>
                
                @foreach($detail as $_dt)
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Rate</label>
                        <input name="rates[]" id="rates" type="text" class="form-control" value="{{$_dt->lw_yf_rates }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Code</label>
                        <input name="code[]" id="code" type="text" class="form-control" value="{{$_dt->code }}">                        
                    </div>
                </div>
                @endforeach
            </div>
            @if(Auth::user()->user_type == 2|| Auth::user()->user_type == 4)
            <div class="side-foot p-0">
                <button type="submit" class="side-close font-weight-bold text-blue w-100">SAVE</button>
            </div>
            @endif
    </div>
    </form>
<div>
@endforeach

<!-- Insert data -->
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
                <input type="file" name="file" id="profile-img">
                <div style=" text-align: center; ">
                    <img src="" id="profile-img-tag" width="200px" />
                </div>
            </div>
            <h6 class="card-title mb-3">
                <span><i class="material-icons float-left mr-2">info</i> Personal details</span>
            </h6>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Full name</label>
                        <input name="name" id="name" type="text" class="form-control" require>
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
                            <option value="A">Active</option>
                            <option value="N">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="add col-md-6">Add Personal</div><br>
                <div class="add_code" id="div_0"></div>
                
            </div>
            <div class="side-foot p-0">
                <button type="submit" class="side-close font-weight-bold text-blue w-100">SAVE</button>
            </div>
    </div>
    </form>
<div>

<!-- Colne Insert data -->
@foreach( $userlist as $_value)
<div class="box-side" id="side_person_clone_{{$_value->id}}" style="width: 400px;">
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
                        <input name="email" id="email" type="text" class="form-control" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Phone</label>
                        <input name="phone" id="phone" type="text" class="form-control" value="{{$_value->phone	}}">
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
                            <option value="A" <?php echo ( $_value->status == 'A') ? "selected" : "" ; ?>>Active</option>
                            <option value="N" <?php echo ( $_value->status == 'N') ? "selected" : "" ; ?>>Inactive</option>
                        </select>
                    </div>
                </div>
                <?php 
                    $detail = DB::table('user_detail')->where('id',$_value->id)->get();   
                ?>
                
                @foreach($detail as $_dt)
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Rate</label>
                        <input name="rates[]" id="rates" type="text" class="form-control" value="{{$_dt->lw_yf_rates }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Code</label>
                        <input name="code[]" id="code" type="text" class="form-control" value="{{$_dt->code }}">                        
                    </div>
                </div>
                @endforeach
            </div>
            @if(Auth::user()->user_type == 2 || Auth::user()->user_type == 4)
            <div class="side-foot p-0">
                <button type="submit" class="side-close font-weight-bold text-blue w-100">SAVE</button>
            </div>
            @endif
    </div>
    </form>
<div>
@endforeach



