<div class="card border-0">
    <div class="card-header py-4 bg-white d-flex justify-content-between">
        <div class="d-flex">
            <div class="input-group input-group-sm mr-2">
                <div class="input-group-prepend">
                    <div class="input-group-text border-0 material-icons">date_range</div>
                </div>
                <input type="date" class="form-control" value="SEP 1 – SEP 30, 2019">
            </div>
            <div class="input-group input-group-sm mr-2">
                <div class="input-group-prepend">
                    <div class="input-group-text border-0 material-icons">info</div>
                </div>
                <select class="form-control">
                    <option selected>All</option>
                    <option>Draft</option>
                    <option>Submitted</option>
                </select>
            </div>
        </div>
        <div>
            <input type="text" class="form-control form-control-sm">
        </div>
    </div>
    <div class="card-body">

        <table id="list_sm" class="listed table table-hover display responsive nowrap w-100">
            <thead>
                <tr>
                    <th width="30">#</th>
                    <th>File No.</th>
                    <th>Date</th>
                    <th>Partner</th>
                    <th>Client</th>
                    <th>Matter</th>
                    <th>Status</th>
                    <th width="30" class="text-center"><i class="material-icons md-14">more_vert</i></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-toggle="modal" data-target="#pop_yellow_file"></td>
                    <td data-toggle="modal" data-target="#pop_yellow_file">12531</td>
                    <td data-toggle="modal" data-target="#pop_yellow_file">12/09/2019</td>
                    <td data-toggle="modal" data-target="#pop_yellow_file">10 Pramote Srisamai</td>
                    <td data-toggle="modal" data-target="#pop_yellow_file">American Express (Thai) Co., Ltd.</td>
                    <td data-toggle="modal" data-target="#pop_yellow_file">TOT Custom Agreement...</td>
                    <td data-toggle="modal" data-target="#pop_yellow_file">Active</td>
                    <td class="text-center">
                        <span class="more material-icons md-14" id="ac_dts_1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">more_vert</span>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ac_dts_1">
                            <a class="dropdown-item" href="#">Submit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</div>