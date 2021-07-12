<?php
session_start();
$image=null;
$infomation=null;
if(empty($_POST['img_url']))
{
    $image= "a.png";
}
else
{
$image=$_POST['img_url'];
$infomation=$_POST['info'];
}





?>
<html>
<head>
    <link rel="stylesheet"  href="css.php">
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <h2>Mô Tả</h1>

    Link ảnh :<input type="text" name="img_url">
    Thông Tin:<input type="text" name="info">
     <input type="submit" >

</form>
<div id="decrition">
    <img src="<?php echo $image ?>" id="img_" alt="Image of Product"> <br>
    <p><?php echo $infomation ?> </p>
</div>
</body>
</html>