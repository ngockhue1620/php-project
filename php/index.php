<?php 
// bắt  1 code php thì <?php  // ? >

function Connection()
{	
	//"dia chi loacl . tai khoan cua con ca heo minh . mk cua con ca heo . ten db"
	
	$con = new mysqli("localhost","root","root","php");// tao ket noi toi database
	return $con; //tra ve ket noi de ti nua goi ve de ket noi db thuc hien cau lenh gi do 

}

function insertCategory($categoryName)
{
	$sql="insert into categories(categoryName) values('$categoryName')";
	Connection()->query($sql);// goi ham connection ve de thuc hien cau lenh $sql duoc tao o tren	

}

if( !empty( $_GET['categoryName']))
{
	insertCategory($_GET['categoryName']);
}


//--------------
function showCategory()
{
	$sql="select *from categories";
	return Connection()->query($sql); // tra ve ket qua khi thuc hien cau len $sql tren 
}

function insertProduct($productName,$price,$link,$id)
{
	$sql="insert into products(productName,price,link,id) values('$productName','$price','$link','$id')";
	Connection()->query($sql);
}


if(!empty($_GET['productName'])  )
{
	insertProduct($_GET['productName'],$_GET['price'],$_GET['link'],$_GET['id']);
}


function showProduct()
{
	$sql= "select *from products";
	return connection()->query($sql);
}


function deleteProduct($productId)
{
	$sql="delete from products where productId= '$productId'";
	connection()->query($sql);
}

if( !empty($_GET['Delete_ProductId']))
{
	deleteProduct($_GET['Delete_ProductId']);
}




// ---------------------update
function getInfor($productId)
{
	$sql="select *from products where productId='$productId' ";
	 return Connection()->query($sql);
}

function updateProduct($productId,$productName,$price,$link,$id)
{
	$sql="update products set productName='$productName' , price='$price',link='$link',id='$id' where productId='$productId' ";
	connection()->query($sql);
}
$productName=null;
$price=null;
$productId=null;

if(!empty($_GET['update']))
{
		foreach (getInfor($_GET['update']) as  $value) {
			$productName=$value['productName'];
			$price		=$value['price'];
			$productId  =$value['productId'];
		}
}

if(!empty($_GET['productName_update']))
{
	updateProduct($_GET['updateProductId'],$_GET['productName_update'],$_GET['price'],$_GET['link'],$_GET['id']);
}

 ?>





 <!DOCTYPE html>
  <html>
  <head>
  	<title></title>
  	<style type="text/css">
  		img {
    width: 183px;
}
.right {
    display: flex;
    flex-flow: wrap-reverse;
}
form {
    display: inline-block;
}
/*.products {
    display: flex;
}
.update {
    margin-left: 69px;
    background: aqua;
}*/
  	</style>
  </head>

  <body>
  
<!-- action : 2 kiểu action 
					+ khi kích submit thì chuyển đến 1 trang nào đó
					+ khi kich submit thì trả về ngay trang hiện tại 


	method là gì : method là 1 cái phương thức dùng để gửi dữ  liệu ,có 2 kiểu là get và post

 -->
 <div class="category">
  	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
  	     <input type="text" name="categoryName">
  		 <input type="submit" name=""> <!-- lun lun phai có --> 
  	</form>
  	<div>
  		<p>Danh Sach Danh muc</p>
  		<?php 

  			foreach( showCategory() as $values):

 		?>
 			<p><?php print($values['categoryName']." co id la:".$values['id'])  ?></p>

  		<?php

  		endforeach;
  		 ?>
  	</div>

  	<hr>
</div>
<div class="products">

	<div class="left">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
		<select name="id">
		<?php 

  			foreach( showCategory() as $value):

 		?>	
			<option value="<?php print($value['id']) ?>"><?php print( $value['categoryName']) ?></option>
			
		<?php

  		endforeach;
  		 ?>	
		</select>
		<label>Product Name:</label><input type="text" name="productName" required><br>
		<label>Gia Ca</label><input type="text" name="price" required><br>
		<label>Link Hinh anh</label> <input type="text" name="link" required><br>
	
		<input type="submit" name="">
	</form>
	</div>
	<div  class="right">
		
		<?php  foreach(showProduct() as $value):?>
			<div class="item">
			<p>Ten San Pham: <?php  print($value['productName'])?></p>
			<p>Gia San Pham: <?php print($value['price']) ?></p>
			<img src="<?php print($value['link']) ?>">
			<br>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
				<input type="hidden" name="Delete_ProductId" value="<?php print($value['productId']) ?>">
				<input type="submit" name="" value="xoa">
				
			</form>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
					<input type="hidden" name="update" value="<?php print($value['productId']) ?>">
					<input type="submit" value="Update">


			</form>



			</div>
			
		<?php endforeach; ?>
		
	</div>
	<div class="update">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
			<select name="id">
		    <?php 

  			foreach( showCategory() as $value):

 		    ?>	
					<option value="<?php print($value['id']) ?>"><?php print( $value['categoryName']) ?></option>
			
	     	<?php

  		   endforeach;
  		    ?>	
		   </select>
			<input type="hidden" name="updateProductId" value="<?php print($productId) ?>"><br>
			<label>Ten San Pham</label><input type="text" name="productName_update" value="<?php print($productName) ?>" placeholder="Product Name" required><br>
			<label>Gia:</label><input type="text" name="price" value="<?php print($price) ?>" placeholder="Gia" required><br>
			<label>Hinh anh</label> <input type="text" name="link" placeholder='Link Hinh anh' required><br>
			
			<input type="submit" name="" value="update">
		</form>
		
	</div>
	
</div>  	

  </body>
  </html> 