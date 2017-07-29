<?php

	include('db.php');
	session_start();
	
	if(isset($_POST['submit']))
	{
		$firstname = $_POST['firstname'];
		$lastname  = $_POST['lastname'];
		$email     = $_POST['email'];
		$password  = $_POST['password'];
		$mobilenum = $_POST['mobilenum'];
		$address   = $_POST['address'];
		$address2   = $_POST['address2'];
		$name_validation = "/^[A-Z][A-zA-Z]+$/"; //Name validation
		$mobile_num_validation = "/^[0-9]+$/"; //Mobile number validation
		$confirmpass = $_POST['confirm'];
		

	$check_email = "SELECT * FROM account WHERE email = '$email'"; //Checking Email if existing or not
	$qry = mysqli_query($con,$check_email);
	$row = mysqli_num_rows($qry);
	
	if(empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($mobilenum) || empty($address))
	{
	echo "<script>alert('Please fill out all the fields')</script>";
	echo "<script>window.open('index.php','_self')</script>"; //Return to the index page.
	}

	else if(!preg_match($name_validation, $firstname))
	{
		echo "<script>alert('This $firstname is not valid!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}
	else if($password != $confirmpass)
	{
		echo "<script>alert('Confirmation Password didnt matched!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}
	else if(!preg_match($mobile_num_validation, $mobilenum))
	{
		echo "<script>alert('This $mobilenum is not valid!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}
	else if($row>0)
	{
	echo"<script>alert('Email $email is already exist!')</script>";
	echo "<script>window.open('index.php','_self')</script>";
	}
	else
	{
	
		$sql = "INSERT INTO user_info value('','$firstname','$lastname','$email','$password','$mobilenum','$address','$address2')";
			$qry = mysqli_query($con,$sql);
				$id  = $_SESSION['user_id'] = mysqli_insert_id($con);

		$sql1 = "INSERT INTO account value('','$id','User','$email','$password','$firstname')";
		$qry1 = mysqli_query($con,$sql1); 

	
	echo "<script>alert('Successfuly Registered!')</script>";
	echo "<script>window.open('index.php','_self')</script>";
	}
}
?>
