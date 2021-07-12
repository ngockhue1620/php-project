<?php
session_start();
$userName =$_SESSION['user'];
include 'function_.php';
$edit = new Edit_Product();
$Count_cart =$edit->count_();



?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css.php">

</head>
<body>
	<div id="header">
        <button>Hi!<?php echo $userName  ?></button>
        <button ><a href="logout.php">logout</a></button>
        <div id="square_icon">
            <img id="icon" src="https://png.pngtree.com/element_our/20190531/ourlarge/pngtree-shopping-cart-convenient-icon-image_1287807.jpg">
             <p id="cart"><?php echo $Count_cart ?></p>

        </div>

	</div>
	<div class="menu">
		<button class="button">
			<a href="insert_product.php">Edit Data</a>

		</button>
		<button class="button">
			<a href="add_user.php">Add user</a>

		</button>
		<button class="button">
			<a href="user_info.php">User Infomation</a>

		</button>
		<button class="button">
        			<a href="add_img.php">User Infomation</a>

        </button>

	</div>

</body>
</html>