
<?php 
include '../function/admin/productManager.php';
$category = new categories();
$product  = new products();
$mess=null;
if( !empty($_GET['category']) )
{
	$category->insert($_GET['category']);
	$mess='Thành Công';
}

if( !empty($_GET['ProductName']))
{
	$product->insert(
			$_GET['ProductName'],
			$_GET['Price'],
			$_GET['Link'],
			$_GET['Screen'],
			$_GET['Os'],
			$_GET['CameraS'],
			$_GET['CameraT'],
			$_GET['Cpu'],
			$_GET['Ram'],
			$_GET['Rom'],
			$_GET['Memory_stick'],
			$_GET['Description'],
			$_GET['Category_Id']
		);
}

?>


<div>	

	<div class="category">
		<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
				<input type="text" name="category">
				<input type="submit" name="" value="Add Category">		
		</form>
		<?php echo $mess; ?>
	</div>	
	<div class="Product">	
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
			<select name="Category_Id">
			<?php foreach ($category->get() as $value) : ?>
			 	<option value=" <?php  print $value['Id'];?> "><?php print $value['CategoryName'] ;?></option>
				
			<?php endforeach; ?>
		    </select><br>
			<label>Product Name</label><input type="text" name="ProductName"><br>
			<label>Price</label><input type="text" name="Price"><br>
			<label>Link</label><input type="text" name="Link"><br>
			<label>Screen</label><input type="text" name="Screen"><br>
			<label>Operating systerm</label><input type="text" name="Os"><br>
			<label>Camera sau</label><input type="text" name="CameraS"><br>
			<label>Camera truoc</label><input type="text" name="CameraT"><br>
			<label>CPU</label><input type="text" name="Cpu"><br>
			<label>Ram</label><input type="text" name="Ram"><br>
			<label>Bo Nho Trong</label><input type="text" name="Rom"><br>
			<label>The Nho</label><input type="text" name="Memory_stick"><br>
			<label>Mo Ta</label><input type="text" name="Description"><br>	

			<input type="submit" name="" value="Add">

		</form>
	</div>	

</div>
