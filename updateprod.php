<?php
	
	include('db.php');

	$uid=$_GET['uid'];

	if(isset($_GET['uid']))
	{
		$sql = "SELECT * FROM product WHERE product_id = '$uid'";
		$qry = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($qry);
			$product_image = $row['product_image'];

	}

	if(isset($_POST['submit']))
		{
    		$newpicture = $_FILES['image']['name'];
    		$filetmp 	= $_FILES['image']['tmp_name'];
    		$file_size  = $_FILES['image']['size'];
    		$file_type  = $_FILES['image']['type'];
    		$filepath   = "product_images/".$newpicture;

	if($newpicture=="")
        {
			mysqli_query($con,"UPDATE product SET product_cat 	       = '$_POST[category]',
											product_brand 	           = '$_POST[brand]',
											product_price              = '$_POST[price]',
											product_title      		   ='$_POST[title]',
											product_desc  			   ='$_POST[description]' 
											WHERE product_id  = '$uid'");
                            
                            echo "<script>alert('Succesfully Updated!')</script>";
                           
        }
                     
        if($newpicture)
        {
            if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/gif' )
            {
                if($file_size < 500000)
                {
                    move_uploaded_file($filetmp,$filepath);
                    unlink('product_images/'.$product_image);
                    mysqli_query($con,"UPDATE product SET product_cat 		  = '$_POST[category]',
                    								product_brand 	  		  = '$_POST[brand]',
                    								product_price    	  = '$_POST[price]',
                    								product_title     	  = '$_POST[title]', 
                    								product_image    	  = '$newpicture', 
                    								product_desc 		  = '$_POST[description]' 
                    								WHERE product_id = '$uid'");
                    
                    echo "<script>alert('Succesfully Updated')</script>";
                   
                }
            
            
                else
                {
                echo "<script>alert('Sorry,your file is to large!')</script>";
                }
            }
            else 
            {
            echo "<script>alert('Invalid file type')</script>";
            }
        }                 
}

?>
<!DOCTYPE>
<html>
<head>
	<title>Update Product</title>
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
</head>
<style type="text/css">

.icon-size{
	font-size:16px;

}

</style>	
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand"><span = class="glyphicon glyphicon-cog icon-size"><b>ADMIN_Engineering</b></a></span>
				<ul class="nav navbar-nav">
				<li><a href="adminpage.php"><span class="glyphicon glyphicon-home icon-size">Home</a></li></span>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user icon-size"></span>WELCOME:&nbsp<b>ADMIN</b></a>
					<ul class="dropdown-menu">
						<li><a href="logout.php" style="text-decoration:none">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
<p></br></p>
<p></br></p>
<p></br></p>

<div class="col-md-1"></div>
<div class="col-md-2">
	<div class="panel panel-info" style="width:210px;">
				<div class="panel panel-heading" style="font-family: cooper black; font-size: 30px;">Note:</div>
					<div class="panel panel-body">
						<div class="panel panel-info">
						<?php 
							include('db.php');
								$sql = "SELECT * FROM categories";
								$qry = mysqli_query($con,$sql);
						?>
							<table class="table table-striped">
								<tr class="active">
									<th><center>ID # &nbsp</th>
									<th><center>Category_Title</th> 
								</tr>
						<?php	
							while ($row=mysqli_fetch_array($qry))
						  { ?>
										<tr>
										<td><center><?php echo $row['cat_id'];?></td>
										<td><center><?php echo $row['cat_title'];?></td>
										</tr>
					<?php } ?> 
							</table>
						</div>
						
						<div class="panel panel-info">
						<?php 
							include('db.php');
								$sql = "SELECT * FROM brand";
								$qry = mysqli_query($con,$sql);
						?>
							<table class="table table-striped">
								<tr class="active">
									<th><center>ID # &nbsp</th>
									<th><center>Brand_Title</th> 
								</tr>
						<?php	
							while ($row=mysqli_fetch_array($qry))
						{ ?>
										<tr>
										<td><center><?php echo $row['brand_id'];?></td>
										<td><center><?php echo $row['brand_title'];?></td>
										</tr>
					<?php } ?> 
							</table>
						</div>
					</div>
	</div>
</div>
	
	
	<center><div class="panel panel-primary" style="width:280px; border-color: gray;">
				<div class="panel panel-heading" style="font-family: cooper black; font-size: 30px;">Update Product</div>
					<div class="panel panel-body">
							<?php
								include('db.php');

								$id = $_GET['uid'];
								if(isset($_GET['uid']))
								{
									$sql = "SELECT * FROM product WHERE product_id = '$id'";
									$qry = mysqli_query($con,$sql);
							
								 	$row = mysqli_fetch_array($qry);
									
								
							  			$cat_id 		= $row['product_cat'];
							  			$brand_id 		= $row['product_brand'];
							  			$prod_price 	= $row['product_price'];
							  			$prod_title 	= $row['product_title'];
							  			$prod_desc      = $row['product_desc'];
							  			$prod_img 		= $row['product_image'];
							  	?>
							  		
							 
								<form action="" method="POST" enctype="multipart/form-data">
									<label for="category" style="float:left">Product Category_ID:</label>
									<input type="number" id="category" class="form-control" name="category" value="<?php echo $cat_id; ?>" required>
									
									<label for="brand" style="float:left">Product Brand_ID:</label>
									<input type="number" id="brand" class="form-control" name="brand" value="<?php echo $brand_id; ?>" required>
									
									<label for="price" style="float:left">Product Price:</label>
									<input type="number" id="price" class="form-control" name="price" value="<?php echo $prod_price; ?>" required>

									<label for="keyword" style="float:left">Product Title:</label>
									<input type="text" id="keyword" class="form-control" name="title" value="<?php echo $prod_title; ?>" required>
									
									<label for="image" style="float:left">Product Image:</label>
									<img src="<?php echo "product_images/".$prod_img ?>" style="width: 100px;">
									<input type="file" id="image" class="form-control" name="image"><br>
									
									<label for="description" style="float:left">Product Description:</label>
									<textarea name="description" id="description" class="form-control" required><?php echo $prod_desc; ?></textarea><br>
									
									<p></br></p>
									
									<input style="float:right;" type="submit" name="submit" value="Update" class="btn btn-danger">
								</form>
								<?php } ?>
							
					</div>
			</div>
</center>
	
</body>
</html>
