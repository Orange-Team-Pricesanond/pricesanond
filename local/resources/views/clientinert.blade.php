


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Cliect</title>
  </head>
  <body>
  
       
        <form method="post" action="submitclient" enctype="multipart/form-data">
 
            <div class="container" style="padding-top: 5%;" >
            <h3>Client</h3>
            <hr>
             {{ csrf_field() }}
              <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" >
              </div>
              <div class="form-group">
                <label for="invoice">Invoince Name</label>
                <input type="text" class="form-control" id="invoice" name="invoice" >
              </div>
              <div class="form-group">
                <label for="tax">Compay's tax id number</label>
                <input type="text" class="form-control" id="tax" name="tax" >
              </div>
              <div class="form-group">
                <label for="images">images</label>
                <input type="file" class="form-control" id="images" name="images" />
              </div>
            </div>

           
           
           <div class="container" style="padding-top: 5%;">
                <h3>Address</h3>
                <p class="add"><b>NEW ADDRESS</b></p>
                <hr>
            </div>
            
            <div class="container" style="padding-top: 10px;border-style: solid;border-width: 1px;">
             <h4>Address : 1</h4>
              <div class="form-group">
                <label for="Address">Address</label>
                <input type="text" class="form-control" id="Address" name="Address[]" >
              </div>
              <div class="form-group">
                <label for="Branch">Branch</label>
                <input type="text" class="form-control" id="Branch" name="Branch[]" >
              </div>
              <div class="form-group">
                <label for="Road">Road</label>
                <input type="text" class="form-control" id="Road" name="Road[]" >
              </div>
              <div class="form-group">
                <label for="Province">Province</label>
                <input class="form-control" id="Province" name="Province[]" />
              </div>
              <div class="form-group">
                <label for="Area">Distrct / Area</label>
                  <input class="form-control" id="Area" name="Area[]" />
              </div>
              <div class="form-group">
                <label for="Subarea">Sub-Distrct / Sub-Area</label>
                <input class="form-control" id="Subarea" name="Subarea[]" />
              </div>
              <div class="form-group">
                <label for="Postal">Postal Code</label>
                <input type="text" class="form-control" id="Postal" name="Postal[]" >
              </div>
              <div class="form-group">
                <label for="Postal">Country</label>
                <input type="text" class="form-control" id="Country" name="Country[]" >
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone[]" >
              </div>
              <div class="form-group">
                <label for="Fax">Fax</label>
                <input type="text" class="form-control" id="Fax" name="Fax[]" >
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email[]" >
              </div>
              <div class="form-group">
                <label for="attent">Attention</label>
                <input type="text" class="form-control" id="attent" name="attent[]" >
              </div>
              <div class="form-group">
                <label for="attent">Used in Invoice</label>
                <div class="radio">
                  <label><input type="radio" id="invoicepotion1" name="invoicepotion[]" value="1"> Yes</label>
                </div>
                <div class="radio">
                  <label><input type="radio" id="invoicepotion2" name="invoicepotion[]" value="0"> No</label>
                </div>
              </div>
            </div>
            
            <div class="clonefile" id="div_1"></div>
            <div class="container" style="padding-top: 5px;"><button type="submit" class="btn btn-primary">Submit</button></div>

                              
        </form>
     
      
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
      $(document).ready(function(){
         // Add new element
         $(".add").click(function(){
            
          console.log("Click");

          // Finding total number of elements added
          var total_element = $(".clonefile").length;

          // last <div> with element class id
          var lastid = $(".clonefile:last").attr("id");
          var split_id = lastid.split("_");
          var nextindex = Number(split_id[1]) + 1;
          var max = 20;
          var idv = nextindex; 
          var int = nextindex-1;

          // Check total number elements
          if(total_element < max ){
            
             // Adding new div container after last occurance of element class
             $(".clonefile:last").after("<div class='clonefile container'  style='padding-top: 10px;border-style: solid;border-width: 1px;margin-top: 10px; ' id='div_"+ nextindex +"'></div>");
             // Adding element to <div>
             $("#div_" + nextindex).append('<div class="container">');

                $("#div_" + nextindex).append('<h4>Address : '+nextindex+'</h4>');
              
                $("#div_" + nextindex).append("<button type='button' title='ลบ' id='remove_" + nextindex + "' class='remove'>X ลบ</button>");

                 $("#div_" + nextindex).append('<div class="form-group">');
                 $("#div_" + nextindex).append('<label for="Address">Address</label>');
                 $("#div_" + nextindex).append('<input type="text" class="form-control" id="Address" name="Address[]" >');
                 $("#div_" + nextindex).append('</div>');
              
                 $("#div_" + nextindex).append('<div class="form-group">');
                 $("#div_" + nextindex).append('<label for="Branch">Branch</label>');
                 $("#div_" + nextindex).append('<input type="text" class="form-control" id="Branch" name="Branch[]" >');
                 $("#div_" + nextindex).append('</div>');
              
                 $("#div_" + nextindex).append('<div class="form-group">');
                 $("#div_" + nextindex).append('<label for="Road">Road</label>');
                 $("#div_" + nextindex).append('<input type="text" class="form-control" id="Road" name="Road[]" >');
                 $("#div_" + nextindex).append('</div>');
              
                 $("#div_" + nextindex).append('<div class="form-group">');
                 $("#div_" + nextindex).append('<label for="Province">Province</label>');
                 $("#div_" + nextindex).append('<input type="text" class="form-control" id="Province" name="Province[]" >');
                 $("#div_" + nextindex).append('</div>');
              
                 $("#div_" + nextindex).append('<div class="form-group">');
                 $("#div_" + nextindex).append('<label for="Area">Distict / Area</label>');
                 $("#div_" + nextindex).append('<input type="text" class="form-control" id="Area" name="Area[]" >');
                 $("#div_" + nextindex).append('</div>');
              
                 $("#div_" + nextindex).append('<div class="form-group">');
                 $("#div_" + nextindex).append('<label for="Subarea">Sub-Distict / Sub-area</label>');
                 $("#div_" + nextindex).append('<input type="text" class="form-control" id="Subarea" name="Subarea[]">');
                 $("#div_" + nextindex).append('</div>');
              
                 $("#div_" + nextindex).append('<div class="form-group">');
                 $("#div_" + nextindex).append('<label for="Postal">Postal Code</label>');
                 $("#div_" + nextindex).append('<input type="text" class="form-control" id="Postal" name="Postal[]" >');
                 $("#div_" + nextindex).append('</div>');
              
                 $("#div_" + nextindex).append('<div class="form-group">');
                 $("#div_" + nextindex).append('<label for="Country">Country</label>');
                 $("#div_" + nextindex).append('<input type="text" class="form-control" id="Country" name="Country[]" >');
                 $("#div_" + nextindex).append('</div>');
              
                 $("#div_" + nextindex).append('<div class="form-group">');
                 $("#div_" + nextindex).append('<label for="phone">Phone</label>');
                 $("#div_" + nextindex).append('<input type="text" class="form-control" id="phone" name="phone[]" >');
                 $("#div_" + nextindex).append('</div>');
              
                 $("#div_" + nextindex).append('<div class="form-group">');
                 $("#div_" + nextindex).append('<label for="Fax">Fax</label>');
                 $("#div_" + nextindex).append('<input type="text" class="form-control" id="Fax" name="Fax[]" >');
                 $("#div_" + nextindex).append('</div>');
              
                 $("#div_" + nextindex).append('<div class="form-group">');
                 $("#div_" + nextindex).append('<label for="email">Email Address</label>');
                 $("#div_" + nextindex).append('<input type="text" class="form-control" id="email" name="email[]" >');
                 $("#div_" + nextindex).append('</div>');
              
                 $("#div_" + nextindex).append('<div class="form-group">');
                 $("#div_" + nextindex).append('<label for="attent">Attention</label>');
                 $("#div_" + nextindex).append('<input type="text" class="form-control" id="attent" name="attent[]" >');
                 $("#div_" + nextindex).append('</div>');

                 $("#div_" + nextindex).append('<div class="form-group">');
                 $("#div_" + nextindex).append('<label for="attent">Used in Invoice</label>');
                 
                 $("#div_" + nextindex).append('<div class="radio">');
                 $("#div_" + nextindex).append('<label><input type="radio" id="invoicepotion1" name="invoicepotion[]" value="1"> Yes</label>');
                 $("#div_" + nextindex).append('</div>');
                 $("#div_" + nextindex).append('<div class="radio">');
                 $("#div_" + nextindex).append('<label><input type="radio" id="invoicepotion2" name="invoicepotion[]" value="0"> No</label>');
                 $("#div_" + nextindex).append('</div>');

                 $("#div_" + nextindex).append('</div>');
              
             $("#div_" + nextindex).append('</div>');             
          }
             
             
             $('.remove').click(function(){
              var id = this.id;
              console.log(id);

              var split_id = id.split("_");
              var deletenextindex = split_id[1];
              // Remove <div> with id
              $("#div_" + deletenextindex).remove();
             });
             
         });
         
          
        });

   
    </script>
    
   
    
    
  </body>
</html>