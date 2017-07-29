<?php

  include('db.php');

session_start();

if(!isset($_SESSION['admin']))
{
  header("location:index.php");
}
//if the user is in the profile page he cannot direct to the addproducts//
if(isset($_SESSION['uid']))
{
  header("location:profile.php");
}


  if(isset($_POST['submit']))
  {

$category = $_POST['category'];
    
    $x = 1;
        
        
        foreach($category as $cat){
        $brand = $_POST["brand-".$x];
        $title = $_POST["title-".$x];
        $price = $_POST["price-".$x];
        $description = $_POST["description-".$x];

        $filetmp1 = $_FILES['img-'.$x]['tmp_name'];
        $filename1 = $_FILES['img-'.$x]['name'];
        $file_size1 = $_FILES['img-'.$x]['size'];
        $file_type1 = $_FILES['img-'.$x]['type'];
        $filepath1 = "product_images/".$filename1;


       
      if($file_type1=='image/jpeg' || $file_type1=='image/png' || $file_type1=='image/gif')
      {
              if($file_size1 < 500000)
              {
                 move_uploaded_file($filetmp1, $filepath1);
                  $sql = "INSERT INTO product VALUES('','$cat','$brand','$title','$price','$description','$filename1')";
                 mysqli_query($con,$sql);
                 $x = $x + 1;
                  
                  echo "<script>alert('Successfully products Registered!')</script>"; 
                echo "<script>window.open('adminpage.php','_self')</script>";
                 }  
             else
              {
               echo "<script>alert('Sorry,your file is to large!')</script>";
                echo "<script>window.open('addproducts.php','_self')</script>";
              }
        }
        else 
           {
            echo "<script>alert('Invalid file type')</script>";
             echo "<script>window.open('addproducts.php','_self')</script>";
            }
        
      }
   }   

  
?>
<html>
  <head>
    <title>Add Products</title>
      <form method = "POST" action="addproducts.php" enctype="multipart/form-data">
      <link rel="stylesheet" href="css/bootstrap.min.css"/>
      <script src="js/jquery2.js"></script>
      <script src="js/bootstrap.min.js"></script>
      
      
        <script type = 'text/javascript'>
            $(document).ready(function($){
                $('.category .addtextbox').click(function(){
                    var x = $('.product_numbertr').length + 1;
                    var txtboxes = $("<tr class = 'product_numbertr'><td><input type = 'number' name = 'category[]' class='form-control' required></td><td><input type = 'number' name = 'brand-"+x+"' class='form-control' required></td><td><input type = 'text' name = 'title-"+x+"' class='form-control' required></td><td><input type = 'number' name = 'price-"+x+"' class='form-control' required></td><td><input type = 'text' name = 'description-"+x+"' class='form-control' required></td><td><input type = 'file' name = 'img-"+x+"' class='form-control' required></td></tr>");
                    txtboxes.hide();
                    $('.category tr.product_numbertr:last').after(txtboxes);
                    txtboxes.fadeIn('slow');
                    return false;
                });
            });
        </script>

<style type="text/css">

.icon-size
{
  font-size:18px;
}
</style>
      </head>

  <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="#" class="navbar-brand"><span class="glyphicon glyphicon-cog icon-size"><b>ADMIN_Engineering</b></a></span>
        <ul class="nav navbar-nav">
        <li><a href="adminpage.php"><span class="glyphicon glyphicon-home icon-size">Home</a></li></span>
        

      </div>
    </div>
  </div>
        <p><br></p>
        <p><br></p>
        <p><br></p>
        <center>
        <div class="panel panel-primary" style="width:1055px;">
        <div class="panel panel-heading"><h4 style="text-align: left; font-family: arial black;">Additional Products</h4></div>
          <div class="panel-body">
          <div class="panel panel-info" style="width:1025px;">
            <div class="category">
              <table class="table table-striped">
                <tr class="active">
                    <th><center>Product Category</center></th>
                    <th><center>Product Brand</center></th>  
                    <th><center>Product Title</center></th>
                    <th><center>Product Price</center></th>
                    <th><center>Product Description</center></th>
                    <th><center>Product Image</center></th>
                    </tr>
                <tr class='product_numbertr'>
                    <td><input type = 'number' name = 'category[]' class="form-control" required></td>
                    <td><input type = 'number' name = 'brand-1' class="form-control" required></td>
                    <td><input type = 'text' name = 'title-1' class="form-control" required></td>
                    <td><input type = 'number' name = 'price-1' class="form-control" required></td>
                    <td><input type = 'text' name = 'description-1' class="form-control" required></td>
                    <td><input type = 'file' name = 'img-1' class="form-control" required></td>
                </tr>
              </table>
                    <a class = 'addtextbox' href = '#'><span class="glyphicon glyphicon-plus"></span>Product</a>
              </div>
            </div>
               <center><button class="btn btn-danger" name='submit'><span class="glyphicon glyphicon-save"></span>Save</button></cente>
            </div>
        </div>


     </form> 
     </center>    
  </body>
</html>
          <!--<div class = 'category'>
          <table class="table table-striped table-hover" align = 'center'>
            <tr class="active">
                    <th>Product Category</th>
                    <th>Product Brand</th>  
                    <th>Product Title</th>
                    <th>Product Price</th>
                    <th>Product Description</th>
                    <th>Product Image</th>
                    </tr>
                <tr class='product_numbertr'>
                    <td><input name = 'category[]' class="form-control"></td>
                    <td><input type = 'number' name = 'brand-1' class="form-control"></td>
                    <td><input type = 'text' name = 'title-1' class="form-control"></td>
                    <td><input type = 'number' name = 'price-1' class="form-control"></td>
                    <td><input type = 'text' name = 'description-1' class="form-control"></td>
                    <td><input type = 'file' name = 'img-1' class="form-control"><td>
                </tr>
                <tr>
                    <td><a class = 'addtextbox' href = '#'>Add Room</a></td></center><br><br>
                    <td><input type = "submit" name = "submit" value = "Save"></td></center>
                </tr> 
            </div>
            </div>  
          </table>
          </div>
        </div>
      </center>
    </form>
  </body>
</html> 