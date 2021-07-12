<?php

$mess="ok";
// chua code php
function Connection()
{
	 $result = new mysqli("localhost", "root","root","play");
	 return $result;

}

function insert($ProductName)
{
	$sql="insert into products(ProductName) values('$ProductName');";
	$con =Connection();
	 $con->query($sql);
	

}

if(!empty($_GET['ProductName']))
{
	if(insert($_GET['ProductName']))
	{
		$mess="thanh cong";
	}
	else{
			$mess="that baij";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Prodcuts</title>
</head>
<body>
<div class="insert">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
		<input type="text" name="ProductName">
		<input type="submit" name="" value="Add Prodcuts">	
	</form>
	<?php print $mess; ?>
</div>
</body>
</html>