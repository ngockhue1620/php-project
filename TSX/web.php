<?php

	function connection()
	{
		$con= new mysqli('localhost','root','root','tsx');
		return $con;
	}

	function insert($id,$name,$link)
	{
			$sql="insert into products values($id,'$name','$link')";
			connection()->query($sql);
	}



if( !empty($_GET['id'])   )
{
	$id   = $_GET['id'];
   $name = $_GET['name'];
   $link =$_GET['link'];
   insert($id,$name,$link);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
		<label>ID:</label><input type="text" name="id">
		<label>Prodcut Name:</label><input type="text" name="name">
		<label>Link:</label><input type="text" name="link">
		<input type="submit" name="">
	</form>

</body>
</html>