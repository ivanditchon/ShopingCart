<?php
session_start();
include "db.php";
if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4 style='font-size:20px;font-family:arial black;'><img src='product_images/e.png' width='40px;'>Categories</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "
					<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
		}
		echo "</div>";
	}
}
if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brand";
	$run_query = mysqli_query($con,$brand_query);
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'>
			<a href='#'><h4 style='font-size:20px;font-family:arial black;'><img src='product_images/brand.png' width='30px;'>&nbspBrands</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			echo "
					<li><a href='#' class='selectBrand' bid='$bid'>$brand_name</a></li>
			";
		}
		echo "</div>";
	}
}
//Select all categories from the database(Admin)//
if(isset($_POST['category1']))
{
	$category="SELECT * FROM categories";
	$qry=mysqli_query($con,$category);
				echo"
					<div class='nav nav-pills nav-stacked'>
					<li class='active'><a href='#'><h4><img src='product_images/e.png' width='35px;'>Categories</h4></a></li>

					";
	if(mysqli_num_rows($qry))
	{
		while($row=mysqli_fetch_array($qry))
		{
			$cid       = $row['cat_id'];
			$cat_title = $row['cat_title'];
				echo "
				 	  <li><a href='#' class='category1' cid1='$cid'>$cat_title</a></li>
				 	 ";
		}
				echo "</div>";
	}
}

//Select all brand from the database(Admin)//
if(isset($_POST['brand1']))
{
	$brand="SELECT * FROM brand";
	$qry=mysqli_query($con,$brand);
	echo"
			<div class='nav nav-pills nav-stacked'>
					<li class='active'><a href='#'><h4><img src='product_images/brand.png' width='28px;'>&nbspBrand</h4></a></li>

		";
	if(mysqli_num_rows($qry))
	{
		while($row=mysqli_fetch_array($qry))
		{
			$bid         = $row['brand_id'];
			$brand_title = $row['brand_title'];
				echo "
					  <li><a href='#' class='brand1' bid1='$bid'>$brand_title</a></li>
					 ";
		}
				echo "</div>";
	}
}
//Select All Products from the Database(Admin)//
if(isset($_POST['product1']))
{
	$product="SELECT * FROM product";
	$qry=mysqli_query($con,$product);
		
		echo "<table class = 'table table-striped table-hover'>";
		echo "<tr class = 'active'>
		
			<th><center>Product ID &nbsp</th>
			<th><center>Category ID &nbsp</th> 
			<th><center>Brand ID &nbsp</th>    
			<th><center>Product Price &nbsp</th>    
			<th><center>Product Title &nbsp</th>
			<th><center>Product Image &nbsp</th>
			<th><center>Product Code &nbsp</th>	
			<th colspan = 3><center>Action</center></th>
			</tr>";
	if(mysqli_num_rows($qry))
	{
		while($row=mysqli_fetch_array($qry))
		{
	 	
							echo "<td><center>".$row['product_id']." </td>";
							echo "<td><center>".$row['product_cat']." </td>";
							echo "<td><center>".$row['product_brand']." </td>";
							echo "<td><center>".$row['product_price']." </td>";
							echo "<td><center>".$row['product_title']." </td>";
							echo "<td><center>"."<img src='product_images/".$row['product_image']."' height = '50' width = '55'>"."</td>";
							echo "<td><center>".$row['product_desc']." </td>";
							echo "<td>"."<a href='updateprod.php?uid=".$row['product_id']."' class='glyphicon glyphicon-pencil icon-size' style='color:green'></a>"." </td>";
							echo "<td>"."<a class='glyphicon glyphicon-remove icon-size' style='color:red' href=deleteprod.php?id=".$row['product_id']."&img=".$row['product_image']."></a>"." </a>";
							echo "</tr>";
		}
		
							echo "</table>";
						    echo "</center>";	
	}
}

//Footer pages//
if(isset($_POST["page"])){
	$sql = "SELECT * FROM product";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}
//get all products(index)
if(isset($_POST["getProduct"])){
	$limit = 20;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM product LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			$pro_desc  = $row['product_desc'];
			echo "
				<div class='col-md-3'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
									<center><img src='product_images/$pro_image' style='width:120px; height:130px;'/></center>
								</div>
								<div class='panel-heading'>$pro_price.00
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>Buy now&nbsp<span class = 'glyphicon glyphicon-shopping-cart'></span></button>
								</div>
							</div>
						</div>	
			";
		}
	}
}
if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"]) || isset($_POST["range"])){
	if(isset($_POST["get_seleted_Category"]))
	{
		$id = $_POST["cat_id"];	
		$sql = "SELECT * FROM product WHERE product_cat = '$id'";
	}
	else if(isset($_POST["selectBrand"]))
	{
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM product WHERE product_brand = '$id'";
	}
	else if(isset($_POST["range"])) 
	{
		$min = $_POST["min"];
		$max = $_POST["max"];
		$sql = "SELECT * FROM product WHERE product_price BETWEEN '$min' AND '$max'";
	}
	else
	{
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM product WHERE product_title LIKE '%$keyword%'";
	}
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			$pro_desc  = $row['product_desc'];
			echo "
				<div class='col-md-3'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
									<center><img src='product_images/$pro_image' style='width:120px; height:130px;'/></center>
								</div>
								<div class='panel-heading'>$pro_price.00
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>Buy now&nbsp<span class='glyphicon glyphicon-shopping-cart'></span></button>
								</div>
							</div>
						</div>	
			";
		}
	}

	//To view Selected Category(Admin)//
if(isset($_POST['get_selected_category1']) || isset($_POST['get_selected_brand1']) || isset($_POST["search1"])){
	if(isset($_POST['get_selected_category1'])){
		$id = $_POST['cat_id1'];
		$sql = "SELECT * FROM product WHERE product_cat = '$id'";
	}else if(isset($_POST['get_selected_brand1'])){
		$id = $_POST['brand_id1'];
		$sql = "SELECT * FROM product WHERE product_brand = '$id'";
	}else {
		$keyword1 = $_POST["keyword1"];
		$sql = "SELECT * FROM product WHERE product_title LIKE '%$keyword1%'";
	}
	
	$run_query = mysqli_query($con,$sql);
		echo "<table class = 'table table-striped table-hover'>";
		echo "<tr class = 'active'>
		
			<th><center>Product ID &nbsp</th>
			<th><center>Category ID &nbsp</th> 
			<th><center>Brand ID &nbsp</th>    
			<th><center>Product Price &nbsp</th>    
			<th><center>Product Description &nbsp</th>
			<th><center>Product Image &nbsp</th>
			<th><center>Product Code &nbsp</th>	
			<th colspan = 3><center>Action</center></th>
			</tr>";
	while($row=mysqli_fetch_array($run_query))
		{
							echo "<td><center>".$row['product_id']." </td>";
							echo "<td><center>".$row['product_cat']." </td>";
							echo "<td><center>".$row['product_brand']." </td>";
							echo "<td><center>".$row['product_price']." </td>";
							echo "<td><center>".$row['product_desc']." </td>";
							echo "<td><center>"."<img src='product_images/".$row['product_image']."' height = '50' width = '55'>"."</td>";
							echo "<td><center>".$row['product_title']." </td>";
							echo "<td>"."<a href='#' class='glyphicon glyphicon-pencil icon-size' style='color:green'></a>"." </td>";
							echo "<td>"."<a href='#' class='glyphicon glyphicon-remove icon-size' style='color:red'></a>"." </a>";
							echo "</tr>";
		}
		
							echo "</table>";
						    echo "</center>";			
}


//Add product to cart//								
if(isset($_POST["addToProduct"]))
{
		
	if(isset($_SESSION["uid"]))
	{
		$p_id = $_POST["proId"];
		$user_id = $_SESSION["uid"];
		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0)
		{
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is already added into the cart Continue Shopping..!</b>
				</div>
			";
		} 
		else 
		{
			$sql = "SELECT * FROM product WHERE product_id = '$p_id'";
			$run_query = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($run_query);
				$id = $row["product_id"];
				$pro_name = $row["product_title"];
				$pro_image = $row["product_image"];
				$pro_price = $row["product_price"];
			$sql = "INSERT INTO `cart` 
			(`id`, `p_id`, `user_id`, `product_title`,
			`product_image`, `qty`, `price`, `total_amt`)
			VALUES (NULL, '$p_id','$user_id', '$pro_name', 
			'$pro_image', '1', '$pro_price', '$pro_price')";
			if(mysqli_query($con,$sql))
			{
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is Added..!</b>
					</div>
				";
			}
		}
	}
		else
		{
			echo "
					<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<span class = 'glyphicon glyphicon-warning-sign'></span>&nbspSorry!!! You need to <b>SIGN UP</b> first before you can buy any things!
					</div>
				";
		}	
}
if(isset($_POST["get_cart_product"]) || isset($_POST["cart_checkout"]))
{
	$uid = $_SESSION["uid"];
	$sql = "SELECT * FROM cart WHERE user_id = '$uid'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	if($count > 0)
	{
		$no = 1;
		$total_amt = 0;
		while($row=mysqli_fetch_array($run_query))
		{
			$id = $row["id"];
			$pro_id = $row["p_id"];
			$pro_name = $row["product_title"];
			$pro_image = $row["product_image"];
			$qty = $row["qty"];
			$pro_price = $row["price"];
			$total = $row["total_amt"];
			$price_array = array($total);
			$total_sum = array_sum($price_array);
			$total_amt = $total_amt + $total_sum;
			//setcookie("ta",$total_amt,strtotime("+1 day"),"/","","",TRUE);
			if(isset($_POST["get_cart_product"]))
			{
				echo "
				<div class='row'>
					<li class = 'divider'></li>
					<div class='col-md-3 col-xs-3'>$no</div>
					<div class='col-md-3 col-xs-3'><img src='product_images/$pro_image' width='60px' height='50px'></div>
					<div class='col-md-3 col-xs-3'>$pro_name</div>
					<div class='col-md-3 col-xs-3'>$pro_price.00</div>
				</div>
			";
			$no = $no + 1;
			}
			else
			{
				
				
				echo "
					<div class = 'row'>
					<ul class = 'divider'></ul>
							<div class='col-md-2 col-sm-2'>
								<div class='btn-group'>
									<a href='#' remove_id='$pro_id' class='btn btn-danger btn-xs remove'><span class='glyphicon glyphicon-trash'></span></a>
									<a href='' update_id='$pro_id' class='btn btn-primary btn-xs update'><span class='glyphicon glyphicon-ok'></span></a>
								</div>
							</div>
							<div class='col-md-2 col-sm-2'><img src='product_images/$pro_image' width='50px' height='60'></div>
							<div class='col-md-2 col-sm-2'>$pro_name</div>
							<div class='col-md-2 col-sm-2'><input type='text' class='form-control qty' pid='$pro_id' id='qty-$pro_id' value='$qty' ></div>
							<div class='col-md-2 col-sm-2'><input type='text' class='form-control price' pid='$pro_id' id='price-$pro_id' value='$pro_price' disabled></div>
							<div class='col-md-2 col-sm-2'><input type='text' class='form-control total' pid='$pro_id' id='total-$pro_id' value='$total' disabled></div>
					
					
					</div>";
				
			}
				
}
if(isset($_POST["cart_checkout"]))
{
			echo "<div class='row'>
				<div class='col-md-8'></div>
				<div class='col-md-4'>
					<h1 style='font-size:20px;float:right;color:green'>(Total:$total_amt php)</h1>
				</div>";
}
				  $x=0;
				  $uid = $_SESSION["uid"];
				  $sql = "SELECT * FROM cart WHERE user_id = '$uid'";
				  $run_query = mysqli_query($con,$sql);
				  while($row=mysqli_fetch_array($run_query))
				  {
					  $x++;
				 echo  '<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
				  <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
				  <input type="hidden" name="amount_'.$x.'" value="'.$row["price"].'">
				  <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">';
				  
				  }
	}
}
//Removed from the Cart
if(isset($_POST["cart_count"]) AND isset($_SESSION["uid"])){
	$uid = $_SESSION["uid"];
	$sql = "SELECT * FROM cart WHERE user_id = '$uid'";
	$run_query = mysqli_query($con,$sql);
	echo mysqli_num_rows($run_query);
}


if(isset($_POST["removeFromCart"])){
	$pid = $_POST["removeId"];
	$uid = $_SESSION["uid"];
	$sql = "DELETE FROM cart WHERE user_id = '$uid' AND p_id = '$pid'";
	$run_query = mysqli_query($con,$sql);
	if($run_query){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				Product is <b>SUCCESSFULY REMOVED<b> from Cart..!</b>
			</div>
		";
	}
}
//Update from the cart
if(isset($_POST["updateProduct"])){
	$uid = $_SESSION["uid"];
	$pid = $_POST["updateId"];
	$qty = $_POST["qty"];
	$price = $_POST["price"];
	$total = $_POST["total"];
	
	$sql = "UPDATE cart SET qty = '$qty',price='$price',total_amt='$total' 
	WHERE user_id = '$uid' AND p_id='$pid'";
	$run_query = mysqli_query($con,$sql);
	if($run_query){
		echo "
			<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				Product is <b>SUCCESSFULY UPDATED</b> from the cart..!</b>
			</div>
		";
	}
}
?>






























