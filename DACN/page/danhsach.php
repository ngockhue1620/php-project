<?php
include 'header.php';

function getProductByCategoryId($id)
{

    $sql= "select *from Products where CategoryId=$id";
    $con=new mysqli('localhost','root','root','quanlybanhang');
    return $con->query($sql);

}


if(empty($_GET['getAll']))
{
    header('Location: index.php');
    die();
}



?>
<!DOCTYPE html>
<html>
<head>
    <title>Cửa hàng</title>
    <link rel="stylesheet" href="../style/style1.css">
    <link rel="stylesheet" href="../style/danhsach.css">
</head>
<body>
<main>

    <?php
    $dem=0;
    foreach (getProductByCategoryId($_GET['getAll']) as  $value) :

        if($dem%4==0){ print('<div class="group-card">');}
        $dem=$dem+1;
        ?>


        <div class="container-card ds-card">
            <img src="<?php print($value['picture']) ?>" alt="Laptop-Macbook">
            <p><?php print($value['introduce']) ?></p>
            <p><?php print($value['Price']) ?></p>
            <form action="giohang.php" method="get">
                <input type="hidden" name="ProductId" value="<?php print($value['ProductId']) ?>">
                <input class="button-card" type="submit" name="" value="Mua Ngay">
            </form>
        </div>



        <?php
        if($dem%4==0&&$dem!=0){print("</div>");}

    endforeach;?>
    <?php if($dem/4!=0){print("</div>"); }  ?>






</main>
</body>
</html>