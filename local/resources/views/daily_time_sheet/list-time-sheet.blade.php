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
                    <th>DS. No.</th>
                    <th>DS. Date</th>
                    <th>Law</th>
                    <th>Item</th>
                    <!-- <th>Ref. No.</th> -->
                    <th>Status</th>
                    <th width="30" class="text-center"><i class="material-icons md-14">more_vert</i></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td onclick="location.href='time-sheet-file.php';">1</td>
                    <td onclick="location.href='time-sheet-file.php';">DSL31-150919</td>
                    <td onclick="location.href='time-sheet-file.php';">15/09/2019</td>
                    <td onclick="location.href='time-sheet-file.php';">31</td>
                    <td onclick="location.href='time-sheet-file.php';">3</td>
                    <!-- <td onclick="location.href='time-sheet-file.php';">12531</td> -->
                    <td onclick="location.href='time-sheet-file.php';">Draft</td>
                    <td class="text-center">
                        <span class="more material-icons md-14" id="ac_dts_1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">more_vert</span>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ac_dts_1">
                            <a class="dropdown-item" href="#">Submit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td onclick="location.href='time-sheet-file.php';">2</td>
                    <td onclick="location.href='time-sheet-file.php';">DSL31-140919</td>
                    <td onclick="location.href='time-sheet-file.php';">14/09/2019</td>
                    <td onclick="location.href='time-sheet-file.php';">31</td>
                    <td onclick="location.href='time-sheet-file.php';">3</td>
                    <!-- <td onclick="location.href='time-sheet-file.php';">12531</td> -->
                    <td onclick="location.href='time-sheet-file.php';">Draft</td>
                    <td class="text-center">
                        <span class="more material-icons md-14" id="ac_dts_1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">more_vert</span>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ac_dts_1">
                            <a class="dropdown-item" href="#">Submit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td onclick="location.href='time-sheet-file.php';">3</td>
                    <td onclick="location.href='time-sheet-file.php';">DSL31-130919</td>
                    <td onclick="location.href='time-sheet-file.php';">13/09/2019</td>
                    <td onclick="location.href='time-sheet-file.php';">31</td>
                    <td onclick="location.href='time-sheet-file.php';">3</td>
                    <!-- <td onclick="location.href='time-sheet-file.php';">12531</td> -->
                    <td onclick="location.href='time-sheet-file.php';">Draft</td>
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