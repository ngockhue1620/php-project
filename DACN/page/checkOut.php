<?php
include "header.php";
include '../Function/cart_Process.php';
$idProduct =null;
$quantityProduct=null;
$OrderTable = new Order();
$dem=0;
if(empty($_SESSION['user']))
{
    header('Location: login2.php');
    die();
}



if(!empty($_POST['id']) )
{

    $idProduct = explode('n',$_POST['id']);
    $quantityProduct =explode('n',$_POST['quantity']);
    for($i=0;$i<count($idProduct);$i++)
    {
        $OrderTable->updateTableOrder( $idProduct[$i] , $quantityProduct[$i],$_SESSION['user'] );
        $dem+=1;
    }
}




if($dem==0)
{
    print '<script>alert("Your cart is null") </script>';





}




?>
<!DOCTYPE html>
<html>
<head>
    <title></title>

    <link rel="stylesheet" href="../style/checkOut.css">
    <link rel="stylesheet" type="text/css" href="../style/giohang.css">



    <script type="text/javascript">

        let checkcount = <?php print($dem); ?>;
        if( checkcount==0)
        {
            window.location='http://localhost/DACN/page/index.php';
        }
    </script>






</head>
<body>
<div id="mainCheckOut">
    <div class="checkOut">

        <h1 class="bill">Your bill</h1>
        <table>
            <tr>
                <td></td>
                <td>Product Name</td>
                <td>So Luong</td>
                <td>Thanh Tien</td>
            </tr>
            <?php
            $dem=0;



            if(!empty($idProduct)| !empty($_SESSION['user']))
                foreach ( $OrderTable->getOrderOfCustomer($_SESSION['user']) as $value):
                    ?>
                    <tr>

                        <td><img src="<?php print($value['picture']); ?>"> </td>
                        <td><?php print($value['introduce']); ?> </td>
                        <td><?php print($value['Soluong']) ?></td>
                        <td><?php print($value['TongTien']) ?></td>





                    </tr>
                <?php
                endforeach;




            ?>

        </table>
        <p>Total: <?php
            $k=$OrderTable->total();
            foreach ($k as  $value) {

                print($value['total']." ");
            }



            ?>VND</p>
        <p>Delivery Address: {{address}}</p>
        <p>Phone Number: {{phone}}</p>
        <p>Recipient's Name: {{recipient}}</p>
        <p>Note: {{note}}</p>
    </div>
    <div class="infomation">
        <form action="bill.php" method="post">
            <input type="text" name="Address" placeholder="Delivery Address" v-model="address" required><br>
            <input type="text" name="Phone" placeholder="Phone" required v-model="phone"><br>
            <input type="text" name="Recipient_Name" placeholder=" Recipient's Name" required v-model="recipient"><br>
            <input type="text" name="Note" placeholder="note"  v-model="note"><br>
            <input type="submit" name="" value="Pay">
        </form>

    </div>
</div>



<script type="text/javascript" src="../javascript/checkOut1.js"></script>
</body>
</html>