<?php
include "header.php";
include '../Function/cart_Process.php';
$billInsert = new checkOutClass();
$getOrderItem   = new Order();

if(!empty($_SESSION['user'])) {
    if (!empty($_POST['Phone'])) {

        $billInsert->insertOrderInfo($_SESSION['CustomerId'], $_POST['Address'], $_POST['Phone'], $_POST['Recipient_Name'], $_POST['Note']);
        foreach ($getOrderItem->getOrder($_SESSION['user']) as $value) {


            $billInsert->insertOrderDetail($value['ProductId'], $value['Users'], $value['Soluong'], $value['TongTien']);


        }

        $billInsert->clearTableOrder($_SESSION['user']);

    }
}
else{
    header('Location: index.php');
    die();
}


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../style/giohang.css">
	<link rel="stylesheet" href="../style/checkOut.css">
</head>
<body>
<div>

<?php

foreach ($billInsert->showbill() as $value) :
?>
<div class="checkOut">

<?php	
	foreach ($billInsert->showtableorderdetail($value['OrderTime']) as $productOrder) :
	
?>

		<table>
	    
	        <tr>    
	                    
	                <td><img src="<?php print( $productOrder['picture']); ?>"> </td>
	                <td><?php print($productOrder['introduce']); ?> </td>
	                <td>Quantity:<?php print($productOrder['Soluong']) ?></td>
	                <td>Total:<?php print($productOrder['TongTien']) ?></td>
	                
	                

	                
	        </tr>
	    
	   </table>
<?php 
	endforeach;
?>

        <p>Total:
        <?php
        $k=$billInsert->totalTableOrderDetail($value['OrderTime']);
        foreach ($k as  $valueTotal) {

            print($valueTotal['total']." ");



        }
        ?>
        VND</p>
	    <p>Delivery Address: <?php print $value['Address'] ?></p>
	    <p>Phone Number: <?php print $value['Phone'] ?> </p>
	    <p>Recipient's Name: <?php print($value['RecipientName']) ?>  </p>
	    <p>Note: <?php print($value['Note']) ?> </p>
	</div>
	<hr>
<?php

endforeach;
?>

</div>



</body>
</html>