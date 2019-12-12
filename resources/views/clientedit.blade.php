
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title> Edit Cliect </title>
  </head>
  <body>
<!--  {{ csrf_field() }} check token for method post -->
      <div class="container" style="padding-top: 5%;">
         <h3>Edit Client</h3>
         <hr>
          <form method="post" action="{{ url('submiteditclient') }}" enctype="multipart/form-data">
             {{ csrf_field() }} 
                <input type="hidden" class="form-control" id="id" name="id" value="{{ (!empty($client) ? $client->id_ct : '' ) }}" required>

              <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="{{ (!empty($client) ? $client->ct_fn : '' ) }}" required>
              </div>
              <div class="form-group">
                <label for="invoice">Invoince Name</label>
                <input type="text" class="form-control" id="invoice" name="invoice" value="{{ (!empty($client) ? $client->ct_inn : '' ) }}" required>
              </div>
              <div class="form-group">
                <label for="tax">Compay's tax id number</label>
                <input type="text" class="form-control" id="tax" name="tax" value="{{ (!empty($client) ? $client->ct_tax : '' ) }}" required>
              </div>
              <div class="form-group">
                <label for="images">images</label>
                <input type="file" class="form-control" id="images" name="images" required>
              </div>
             
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
      
      
      
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>