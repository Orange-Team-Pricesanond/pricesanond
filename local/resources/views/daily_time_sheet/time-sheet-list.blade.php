<div class="card border-0">
     <div class="card-header py-4 bg-white d-flex justify-content-between">
        <!--<form method="get"> -->
            <div class="d-flex">
                <!-- <div class="input-group input-group-sm mr-2" >
                    <div class="input-group-prepend">
                        <div class="input-group-text border-0 material-icons">date_range</div>
                    </div>
                    <input type="date" id="search_date" name="search_date" class="form-control" />
                </div> -->
                <div class="input-group input-group-sm mr-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text border-0 material-icons">info</div>
                    </div>
                    <select class="form-control search" id="search_type" name="search_type">
                        <option value="2">All</option>
                        <option value="0">Padding</option>
                        <option value="1">Complete</option>
                    </select>
                </div>
            </div>
        <!-- </form> -->
        {{ csrf_field() }} 
        
    </div>
    <div class="card-body">
        <!-- <table id="list_sm" class="listed table table-hover display responsive nowrap w-100"> -->
        <table id="list_index" class="table hover">
        
            <thead>
                <tr>
                    <th width="30">#</th>
                    <th>File No.</th>
                    <th>Client Name</th>
                    <th>Matter</th>
                    <th>Contact Person Name</th>
                    <th>Status</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

