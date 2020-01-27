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
                    <th>Matter</th>
                    <th>Client</th>
                    <th>Partner</th>
                    <th>Status</th>
                    <th width="30" class="text-center"><i class="material-icons md-14">more_vert</i></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td onclick="location.href='yellow-file.php';"></td>
                    <td onclick="location.href='yellow-file.php';">12531</td>
                    <td onclick="location.href='yellow-file.php';">12/09/2019</td>
                    <td onclick="location.href='yellow-file.php';">TOT Custom Agreement...</td>
                    <td onclick="location.href='yellow-file.php';">American Express (Thai) Co., Ltd.</td>
                    <td onclick="location.href='yellow-file.php';">10 Pramote Srisamai</td>
                    <td onclick="location.href='yellow-file.php';">Active</td>
                    <td class="text-center">
                        <span class="more material-icons md-14" id="ac_dts_1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">more_vert</span>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ac_dts_1">
                            <button class="dropdown-item d-flex justify-content-between align-items-center" href="#">Approve <i class="material-icons md-14 float-right text-muted">gavel</i></button>
                            <button class="dropdown-item d-flex justify-content-between align-items-center" href="#">Submit <i class="material-icons md-14 float-right text-muted">send</i></button>
                            <button class="dropdown-item d-flex justify-content-between align-items-center" href="#">Reject <i class="material-icons md-14 float-right text-muted">report</i></button>
                            <button class="dropdown-item d-flex justify-content-between align-items-center" href="#">Delete <i class="material-icons md-14 float-right text-muted">delete</i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</div>