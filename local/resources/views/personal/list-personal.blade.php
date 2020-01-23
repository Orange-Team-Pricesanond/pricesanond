<div class="card border-0">
    <div class="card-header py-4 bg-white d-flex justify-content-between">
        <div class="d-flex">
            <div class="input-group input-group-sm mr-2">
                <div class="input-group-prepend">
                    <div class="input-group-text border-0 material-icons">info</div>
                </div>
                <select class="form-control selectStatus" name="status" id="status">
                    <option value="2">All</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </div>
    </div>
    {{ csrf_field() }} 
    <div class="card-body">
        <!-- <table id="list_sm" class="listed table tbpersonal table-hover display responsive nowrap w-100"> -->
        <table id="personal_tb" class="row-border tbpersonal">
            <thead>
                <tr>
                    <th>Pic</th>
                    <th>Name / Code</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    @php 
                        if(Auth::user()->user_type == 4){
                        echo "<th></th>";
                    }
                    @endphp
                </tr>
            </thead>
        </table>

    </div>
</div>