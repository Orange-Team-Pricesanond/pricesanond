<div class="card border-0">
    @php
        setlocale(LC_ALL, "en_US.UTF-8");
        $dates = date('Y-m-d');
    @endphp
     <div class="card-header py-4 bg-white d-flex justify-content-between">
            <div class="d-flex">
                <div class="input-group input-group-sm mr-2" >
                    <div class="input-group-prepend">
                        <div class="input-group-text border-0 material-icons">date_range</div>
                    </div>
                    <input type="date" id="search_date" name="search_date" class="form-control search" />

                </div>
                <div class="input-group input-group-sm mr-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text border-0">Code</div>
                    </div>
                    <input type="number" id="search_code" name="search_code" class="form-control search" />
                </div>
                <div class="input-group input-group-sm mr-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text border-0">Ref No.</div>
                    </div>
                    <input type="text" id="search_ref" name="search_ref" class="form-control search" />
                </div>
                
            </div>
        {{ csrf_field() }} 
        
    </div>
    <div class="card-body">
        <!-- <table id="list_sm" class="listed table table-hover display responsive nowrap w-100"> -->
        
        <table id="list_index" class="table hover nowrap  ">        
            <thead>
                <tr>
                    <th width="30">#</th>
                    <th>Ref No.</th>
                    <th>Date</th>
                    <th>Code</th>
                    <th>Form</th>
                    <th>To</th>
                    <th>Total</th>
                    @php
                    if(Auth::user()->user_type == 4){
                    echo '<th>Total Rate</th>';
                    } 
                    @endphp
                    <th>work performed</th>
                    <th>Status</th>
                    @php
                    if(Auth::user()->user_type == 2){
                    echo '<th><i class="material-icons md-12">delete</i></th>';
                    } 
                    @endphp
                </tr>
            </thead>
        </table>
    </div>
</div>

