<?php

include '../function/admin/billManager.php';
include '../function/page/cart_Process.php';
$billManager =new BillManager();
$cartProcess =new checkOutClass();




?>
<div class="totalBill">
	<div class="chooseDate">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
			<select name="date">
				<option value="1">Hom nay</option>
				<option value="7">1 tuan truoc</option>
				<option value="15">15 ngay truoc</option>
				<option value="30">30 ngay truoc</option>
			</select>
			<input type="submit" name="" value="kiem tra">
		</form>
	</div>

	<div class="showResult">


<?php 
if(!empty($_GET['date']))
foreach ($billManager->getBill($_GET['date']) as $value) :
?>

	<table>	
		
<?php	
	foreach ($cartProcess->showtableorderdetail($value['OrderTime']) as $productOrder) :
	
?>

		
	    
	        <tr>
	                    
	                <td><img class="billImg" src="<?php print( $productOrder['Link']); ?>"> </td>
	                <td><?php print($productOrder['ProductName']); ?> </td>
	                <td><?php print($productOrder['Soluong']) ?></td>
	                <td><?php print($productOrder['TongTien']) ?></td>                   
	                
	        </tr>        
	                	
	               
	        
	    
	   
<?php 
	endforeach;
?>	   
	
</table> 
	   	<p>Total: 
	   		<?php 
	   			$k=$cartProcess->totalTableOrderDetail($value['OrderTime']);
	   			foreach ($k as  $valueTotal) {
						
						print($valueTotal['total']." ");

			} 
		?>

	   	 VND</p>
	    <p>Delivery Address: <?php print $value['Address'] ?></p>
	    <p>Phone Number: <?php print $value['Phone'] ?> </p>
	    <p>Recipient's Name: <?php print($value['RecipientName']) ?>  </p>
	    <p>Note: <?php print($value['Note']) ?> </p>
	
	
	<hr>
<?php

endforeach;
?>

</div>
</div>
	
	
</div>