<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/DataTables/datatables.min.css') }}"/>
    <script type="text/javascript" src="{{ asset('asset/DataTables/datatables.min.js')}}"></script>
   
   
    <title>Cliect</title>
  </head>
  <body>
  
      <div class="container">
          <h1>Client Name</h1>
              <a href="{{ url('insertclient') }}">
                  <button type="button" class="btn btn-dark">Add New Client</button>
              </a> <br><br>
             <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Full Name</th>
                  <th scope="col">Invoice Name</th>
                  <th scope="col">Tax Number</th>
                  <th scope="col">Images</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($client as $val)
                <tr>
                  <th scope="row">{{$val->id_ct}}</th>
                  <td>{{$val->ct_fn}}</td>
                  <td>{{$val->ct_inn}}</td>
                  <td>{{$val->ct_tax}}</td>
                  <td>
                     @if(!empty($val->ct_images))
                        <img src="{{asset('public/client/').'/'.$val->ct_images}}" style="width: 150px;">
                     @endif
                  </td>
                  <td>
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">tool</a>
                          <div class="dropdown-menu">
                           
                            <a class="dropdown-item" href="{{ url('editclient') }}/{{$val->id_ct}}">แก้ไข</a>
                            <a class="dropdown-item" href="{{ url('deleteclient') }}/{{$val->id_ct}}">ลบข้อมูล</a>
<!--
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('addressclient') }}/{{$val->ct_ad_ref}}">Address</a>
-->
                          </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
      </div>
      
          
      
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
      $(document).ready( function () {
        $('.table').DataTable();
    } );
    </script>
    
  </body>
</html>