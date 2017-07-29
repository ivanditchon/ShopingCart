<?php

include('db.php');
session_start();

if(isset($_POST['submit']))
{

    $emailadd = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    $_SESSION['email'] = $emailadd;
    $_SESSION['password'] = $password;
    
    $select = "SELECT * FROM account WHERE email = '{$emailadd}' AND password = '{$password}'";
   

    $x1 = mysqli_query($con,$select);
    $y1 = mysqli_num_rows($x1);
      
    if(empty($emailadd) || empty($password))
    {
      echo "<script>alert('Please fill out all the fields')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }

    else if($y1<1)
    {   
            echo "<script>alert('Please check your Username and Password!')</script>";
            echo "<script>window.open('index.php','_self')</script>"; 
    }
    
    else if($row=mysqli_fetch_array($x1))  
   
    {
        if($row['acc_type']=="Admin")
        { 
           $_SESSION['admin']      = $row['acc_id'];
           $_SESSION['emailaddress']  = $emailadd;
           header("location:adminpage.php");
        }
        else if($row['acc_type']=="User")
        {
           $_SESSION['usertype'] = "User";
           $_SESSION['uid']           = $row['user_id'];
           $firsname                  = $row['firstname'];
           $_SESSION['user']          = $firsname;
           $_SESSION['emailaddress']  = $emailadd;
           $_SESSION['password']      = $password;
           header("Location:profile.php");

        }
    }
}
?>







