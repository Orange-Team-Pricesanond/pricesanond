<div class="card border-0">
    <div class="card-header py-4 bg-white d-flex justify-content-between">
        <div class="d-flex">
            <div class="input-group input-group-sm mr-2">
                <div class="input-group-prepend">
                    <div class="input-group-text border-0 material-icons">info</div>
                </div>
                <select class="form-control">
                    <option selected>All</option>
                    <option>Active</option>
                    <option>Inactive</option>
                </select>
            </div>
        </div>
    </div>
    {{ csrf_field() }} 
    <div class="card-body">
        <!-- <table id="list_sm" class="listed table tbpersonal table-hover display responsive nowrap w-100"> -->
        <table id="example" class="row-border tbpersonal">
            <thead>
                <tr>
                    <th>Pic</th>
                    <th>Name / Code</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
        </table>

    </div>
</div>