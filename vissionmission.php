<!DOCTYPE html>
<html>
<head>
	<title>Vision-Mission</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css"/>
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
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
				<a href="#" class="navbar-brand" style="font-family: cooper black;font-size: 20px;">ShoppingCart</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home icon-size"></span>Home</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window icon-size"></span>Product</a></li>
				<li><a href="faq.php"><span class="glyphicon glyphicon-home icon-size"></span>FAQ</a></li>
				<li><a href="aboutus.php"><span class="glyphicon glyphicon-home icon-size"></span>AboutUs</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user icon-size"></span>SignIn</a>
					<ul class="dropdown-menu">
						<div style="width:250px;">
							<div class="panel panel-primary">
								<div class="panel-heading"><b>Login</b></div>
							</div>
								<div class="panel-body">
								<form action="login.php" method="post">
									<label for="email">Email:</label>
									<input type="email" id="email" class="form-control" name="email">
									<label for="password">Password:</label>
									<input type="password" id="password" class="form-control" name="password">
									<p></br></p>
									<input style="float:right;" type="submit" name="submit" value="Login" class="btn btn-success">
								</form>
								</div> 
							
						</div>
						
					</ul>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span = class="glyphicon glyphicon-user icon-size"></span>SignUp</a>
					<ul class="dropdown-menu">
						<div style="width:255px;">
							<div class="panel panel-primary">
								<div class="panel-heading"><b>SignUp</b></div>
							</div>
								<div class="panel-body">
									
									<form action="signup.php" method="post" id="register1">
									<label for="firstname">Firstname:</label>
									<input type="text" id="firstname" class="form-control" name="firstname">
									<label for="lastname">Lastname:</label>
									<input type="text" id="lastname" class="form-control" name="lastname">
									<label for="email">Email:</label>
									<input type="email" id="email" class="form-control" name="email">
									
									<label for="password1">Password:</label>
									<input type="password" id="password1" class="form-control" name="password">
									<b style="color:#AFB5AD;">Password Strength:</b>&nbsp<span id="result" style="font-family: Arial;"></span><br><br>
									
									<label for="mobile">Mobile Number:</label>
									<input type="number" id="mobile" class="form-control" name="mobilenum">
									<label for="address">Address1:</label>
									<input type="text" id="address" class="form-control" name="address">
									<label for="address">Address2:</label>
									<input type="text" id="address2" class="form-control" name="address2">
									<p></br></p>
									<input style="float:right;" type="submit" name="submit" value="Register" class="btn btn-success">
									</form>
									
								</div> 
							
						</div>
				</li>
			</ul>
		</div>
	</div>
</div>	

<p></br></p>
<p></br></p>
<p></br></p>
<p></br></p>


	<center><div class="panel panel-primary" style="width:550px;">
				<div class="panel panel-heading" style="font-family: arial black; font-size: 50px;">Vision-Mission</div>
					<div class="panel panel-body">
						<p style="font-family:calibri; font-size: 17px;"><b style="font-size:20px;">Vision:</b> ShoppingCart PH aims to become the no. 1 Online Retail and Marketing Company in the Philippines aside from being the leader in the country’s home TV shopping industry. 
						As such, we shall continue to provide the most reliable service and optimum value for customers for them to have a truly richer retail experience.</p>

						<p style="font-family:calibri; font-size: 17px;"><b style="font-size:20px;">Mission:</b> ShoppingCart strives to earn customers’ trust by introducing reliable and reasonably-priced world-class products aside from offering superior shopping experience.Making teleshopping and online shopping a happy and empowering experience,starting with our entertaining shopping programs and reliable website, to the informative phone conversation with our sales consultants,followed by our prompt delivery service, is a job that we take seriously.</p>
					</div>
			</div>

	</center>		
</body>
</html>