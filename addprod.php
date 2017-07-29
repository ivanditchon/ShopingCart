<?php
	
	include('db.php');

if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$brand=$_POST['brand'];
	$price=$_POST['price'];
	$description=$_POST['description'];
	$keyword=$_POST['keyword'];

	$tmp=$_FILES['image']['tmp_name'];
	$size=$_FILES['image']['size'];
	$name=$_FILES['image']['name'];
	$type=$_FILES['image']['type'];
	$path="product_images/".$name;


	if($type=='image/jpeg' || $type=='image/pneg' || $type=='image/gif')
	{
			if($size<300000)
			{
				move_uploaded_file($tmp,$path);
				$sql="INSERT INTO product values('','$category','$brand','$keyword','$price','$description','$name')";
				$qry = mysqli_query($con,$sql);
				echo "<script>alert('Successfully Registered!')</script>";
				echo "<script>window.open('adminpage.php','_self')</script>";
			
			}
			else
			{
				echo "<script>alert('Your File is to large!')</script>";
			}
	}
	else
	{
			echo "<script>alert('Invalid File Type!')</script>";
	}
}

?>