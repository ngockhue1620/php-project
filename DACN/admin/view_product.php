<?php

include '../Function/ClassFunction.php';
$Product_list = new get_Products();

$value = $Product_list->get_product();

?>
<!DOCTYPE html>
<html>
<head>
	<title>View Product</title>
	<link rel="stylesheet" type="text/css" href="./style/test.css">
</head>
<body>

<div id="View_prodcut">

	<?php

	foreach ($value as $value) :
		
	?>	

	


	<div class="view">
	
	<img src="<?php print $value['picture'] ?>">
	<p id="prodcutName"><?php print $value["ProductName"] ?></p>
	<p id="price"><?php print $value["Price"] ?></p>
	<p class="introduce"><?php print $value["introduce"] ?></p>
	<p class="introduce"><?php print $value["note"] ?></p>

	</div>
	


	


	<?php 
		endforeach ;

	?>



	
</div>



</body>
</html>
