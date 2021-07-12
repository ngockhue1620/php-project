<?php
session_start();


if(!empty($_POST['action']))
{
	$_SESSION['page']=$_POST['action'];	
}
if( empty($_SESSION['admin']))
{
	header('Location: ../page/notfound.php');
                			die();
	
}




?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../style/admin/menu2.css">
	<link rel="stylesheet" type="text/css" href="../style/admin/product.css">
    <link rel="stylesheet" type="text/css" href="../style/admin/productmanager2.css"> 
    <link rel="stylesheet" type="text/css" href="../style/admin/TotalBill.css"> 	

</head>
<body >
<div class="top">
	<h1>Admin page Website </h1>
	<a href="../page/logout.php">Log Out</a>

</div>
<div class="left">
<form action="" method="post">
	<input type="hidden" name="action" value="addProduct">
	<input type="submit" name="" value="Add Product">
	
</form>

<form action="" method="post">
	<input type="hidden" name="action" value="productManager">
	<input type="submit" name="" value="Show Product">
	
</form>
<form action="" method="post">
	<input type="hidden" name="action" value="TotalBill">
	<input type="submit" name="" value="Total Bill">
	
</form>
</div>
<div class="center">
	<?php

if(!empty($_SESSION['page'])&& $_SESSION['page']=='addProduct')
{
	 include 'product.php';

}
elseif (!empty($_SESSION['page'])&& $_SESSION['page']=='productManager') {
	include 'productManager.php';
}
elseif (!empty($_SESSION['page'])&& $_SESSION['page']=='TotalBill') {
	include 'TotalBill.php';
}

else
{
	echo "<h1>Xin Chao ".$_SESSION['user']. "</h1>";
}


	 ?>
</div>
<div class="footer"></div>
<?php 


?>
</body>
</html>