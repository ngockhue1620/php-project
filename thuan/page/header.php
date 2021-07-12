<?php
session_start();
$DangNhap=null;
$DangXuat=null;
$DNLink  =null;
$DXLink  =null;
if(!empty($_SESSION['user']))
{
  $DangNhap =$_SESSION['user'];
  $DangXuat ="Đăng Xuất";
  $DNLink   ="#";
  $DXLink   ="logout.php";


}
else
{
  $DangNhap ="Đăng Nhập";
  $DNLink   ='login.php';
}



if( empty($_SESSION['cart']) )
{
  $_SESSION['cart']=array();
}

?>


 <!DOCTYPE html>
<html>
<head>
  <title>2T MOBILE</title>

  
  

  <link rel="stylesheet" type="text/css" href="../style/cart1.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
</head>
<body>

<div id="menu">
   <a href="index.php"> 
    <p id="logo">
      THUẬN HEO MOBILE
    </p>
   </a> 
    
    <form class="search_form" action="result_search.php" >
      <input  type="text" name="getAll" placeholder="Bạn tìm gì...">
      <input type="submit" name="" value="Tim Kiem">
    </form>
    <a id="login" href="<?php print($DNLink) ?>"> <?php print $DangNhap ?></a>
    <a id="registration" href="<?php print($DXLink) ?>"><?php print($DangXuat) ?></a>
    <a id="cart" href="cart.php">Giỏ Hàng <i style='font-size:24px' class='fas'>&#xf07a;</i></a>
      
 </div>
 <div id ="danhmuc">
  <a id="dt" href="">Điện thoại<i class="material-icons">&#xe325;</i></a>
  <a id="lt" href="">Laptop<i class="material-icons">&#xe31e;</i></a>
  <a id="tb" href="">Tablet<i class="material-icons">&#xe330;</i></a>
  <a id="pk" href="">Phụ kiện<i class="material-icons">&#xe310;</i></a>
 </div>
 </body>
 </html>