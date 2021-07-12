<?php

session_start();
// đăng nhập user
$link1=null;
$value1=null;
// đăng xuát đăng ký
$link2=null;
$value2=null;

if( empty($_SESSION['user']))
{

    $link1="login2.php";
    $value1="Đăng nhập";
    //---
    
    $link2='create_Acount.php';
    $value2='dang ky';
}
else
{
    $link1="";
    $value1=$_SESSION['user'];
    
    //---
    $link2="logout.php";
    $value2="Đăng xuất";
}
if(empty( $_SESSION['cart']))
    {
        $_SESSION['cart']=array();
    }




?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../style/style1.css">
    <link rel="stylesheet" href="../style/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>

    <div class="header-top">
    	<div class="header-top-iterm">
	     	<button class="top-content "><a href="index.php">Trang Chu</a></button>
	     	<form action="" method="post" class="top_form">
	        	<input type="text" id="timkiem" class="top-content" name="timkiem" placeholder="Nhập sản phẩm cần tìm kiếm">
	        
	    	</form>
	    	<div class="header-top-left-iterm">	
                <form class="right" action="<?php echo $link1 ?>">
                    <input  type="submit" name="" value="<?php echo $value1 ?>">
                </form>
                <form class="right" action="<?php  echo $link2 ?>">
                    <input <?php if(empty($_SESSION['user'])){print ('style="display:none"');}?> type="submit" name="" value="<?php echo $value2 ?>">
                </form>
                <a href="giohang.php" class="giohang"><i class="fas fa-shopping-cart"></i>Giỏ hàng</a>

            </div>

    	</div>





    <div class="menu">
        <a href="index.php">Trang chủ</a>
        <a href="danhsach.php?getAll=1">Laptop & Macbook</a>
        <a href="danhsach.php?getAll=2">PC- Máy tính đồng bộ</a>
        <a href="danhsach.php?getAll=3">Màn hình máy tính</a>
        <a href="danhsach.php?getAll=4">Chuột gaming</a>
        <a href="danhsach.php?getAll=5">Tay cầm chơi game</a>
        <a href="ttbh.php">Trung tâm bảo hành</a>
    </div>
    <hr>
</body>
</html>