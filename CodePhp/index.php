<?php

//insert categories


function  Connection()
{

	$Con = new mysqli('localhost','root','root','thuanphp');// tao 1 cai ket noi toi database

	return $Con;

}
// bat dau 1 bien trong php $ 
// '  "
function insertCategory($categoryName)
{
	$sql=" insert into categories(categoryName)  values(N'$categoryName') ";

    if(	Connection()->query($sql) == true)
    {
    	return true;
    }
    else
    {
    	return false;
    }

}



$mess = "";

if(!empty($_GET['productName']))
{
	if( insertCategory($_GET['productName']) == true)
	{
		$mess= "ok";	
	}	
	else
	{
		$mess="khong thanh cong";
	}
	
}



function show_categories()
{

	$sql="select *from categories";
	$result= Connection()->query($sql);
	return $result;

}

function insertProduct($productName,$price,$link,$categoryID)
{

	$sql="insert into products(productName,price,link,id) values(N'$productName','$price','$link','$categoryID')";

	Connection()->query($sql);	



}

if(  !empty($_GET['productName']) && ! empty($_GET['link']) && !empty($_GET['price'])      )
{
	insertProduct($_GET['productName'],$_GET['price'],$_GET['link'],$_GET['categoryID']);
	echo "ok";
}




function deleteProduct($productId)
{
	$sql="delete from products where productId =$productId";
	Connection()->query($sql);
}


function showProduct()
{

	$sql="select *from products";
	return Connection()->query($sql);

}


if(!empty($_GET['productId_for_delete']))
{
	deleteProduct($_GET['productId_for_delete']);
}

?> 



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	main {
		display: flex;

	}
	div{
		margin-left: 50px;
	}

</style>
<body>
<main>
<div>
	
<p>Them Danh Muc San Pham</p>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">

		<label>Category</label> <input type="text" name="productName">

		<input type="submit" >
		
	</form>
	<p><?php echo $mess; ?> </p>



</div>
<div>
	<p>Them San Pham</p>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
		<select name="categoryID">
		<?php 
			foreach (show_categories() as  $value) :
				
		?>  
			
			<option value="<?php print ($value['id']) ?>">
			 	<?php  print( $value['categoryName'] )  ?>
			 		
			 </option>	

		<?php
			endforeach;
		?>



		</select><br>
		<label>Ten San Pham:</label><input type="text" name="productName"><br>
		<label>Gia</label><input type="text" name="price"><br>
		<label>Hinh anh:</label><input type="link" name="link"><br>
		<input type="submit" name="">
		
	</form>
</div>
<div>
	<p>Cac San Pham Hien Co</p>
	<table>
	<?php 
		foreach (showProduct() as $value) :
	?>

	<tr>
		<td><?php print $value['productName'] ?></td>
		<td><?php print  $value['price'] ?></td>
		<td><?php print  $value['link'] ?></td>
		<td>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
				<input type="hidden" name="productId_for_delete" value="<?php print $value['productId'] ?>">
				<input type="submit" name="" value="Xoa">
			</form>	



		</td>
	</tr>
	<?php 
	endforeach;
	?>
	</table>
</div>
</main>
</body>
</html>