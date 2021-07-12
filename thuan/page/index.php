<?php 
include 'header.php';
include '../function/page/product_for_index.php';

$products = new products();



?>

<!DOCTYPE html>
<html>
<head>
	
</head>
<body>



	<div class="QC">
		<div id="demo" class="carousel slide" data-ride="carousel">

 	   	     <ul class="carousel-indicators">
			    <li data-target="#demo" data-slide-to="0" class="active"></li>
			    <li data-target="#demo" data-slide-to="1"></li>
			    <li data-target="#demo" data-slide-to="2"></li>
		    </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="img-QC" src="https://cdn.tgdd.vn/2020/10/banner/800-300-800x300-5.png" alt="Los Angeles" width="1100" height="500">
    </div>
    <div  class="carousel-item">
      <img class="img-QC" src="https://cdn.tgdd.vn/2020/10/banner/Normal-Note20-800-300-800x300.png" alt="Chicago" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img class="img-QC" src="https://cdn.tgdd.vn/2020/09/banner/reno4-chung-800-300-800x300-1.png" alt="New York" width="1100" height="500">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</div>	
  <div class="frames">
  	<a class="highlights" href="">ĐIỆN THOẠI NỔI BẬT NHẤT</a>
  	<a class="list-phone" href="">Samsung Galaxy Note 20</a>
  	<a class="list-phone" href="">iPhone 11 Pro Max</a>
  	<a class="list-phone" href="">iPhone 11</a>
  	<a class="list-phone" href="">Redmi Note 9S</a>
  	<a class="list-phone" href="">OPPO Reno4</a>
  	<a class="list-phone" href="">Xem tất cả điện thoại</a>
  </div>
	<div class="container-list">
	<?php
	$dem=0;    
		foreach ($products->getProduct() as $value) :
		
			if($dem==0 || $dem%5==0)
			{
				echo '
			<div class="column-display">
				<div class="column">

				';
			}
		
	?>	
		

				<div class="nomal-product">
					
						<img class="nomal-img" src="<?php print($value['Link']) ?>">
						<p><?php print $value['ProductName'] ?></p>
						<p><?php print $value['Price'] ?>d</p>
					<form action="cart.php" method="get">
						<input type="hidden" name="ProductId" value="<?php print ($value['ProductId']) ?>">
						<input type="submit" name="" value="Mua ngay">
					</form>	
					
				</div>
				
						
			

		
	<?php 
		$dem=$dem+1;
		if( $dem%5 ==0 )
		{
			echo '</div>
			
		</div>';
		}

	endforeach;
	 ?>	
	 </div>					
			

       <div class="frames2">
  	<a class="highlights2" href="">LAPTOP NỔI BẬT NHẤT</a>
  	<a class="list-lap" href="">Laptop Asus</a>
  	<a class="list-lap" href="">Laptop HP</a>
  	<a class="list-lap" href="">Laptop Lenovo</a>
  	<a class="list-lap" href="">Macbook Pro</a>
  	<a class="list-lap" href="">Laptop Acer</a>
  	<a class="list-lap" href="">Xem tất cả Laptop</a>
  </div>
	<div class="container-list">
	<?php
	$dem=0;    
		foreach ($products->getLapTop() as $value) :
		
			if($dem==0 || $dem%5==0)
			{
				echo '
			<div class="column-display">
				<div class="column">

				';
			}
		
	?>	
		

				<div class="nomal-product">
					
						<img class="nomal-img" src="<?php print($value['Link']) ?>">
						<p><?php print $value['ProductName'] ?></p>
						<p><?php print $value['Price'] ?>d</p>
						
					<form action="cart.php"  method="get">
						<input type="hidden" name="ProductId" value="<?php print ($value['ProductId']) ?>">
						<input type="submit" name="" value="Mua ngay">
					</form>
				</div>
				
						
			

		
	<?php 
		$dem=$dem+1;
		if( $dem%5 ==0 )
		{
			echo '</div>
			
		</div>';
		}

	endforeach;
	 ?>		</div>

		   <div class="frames3">
  	<a class="highlights3" href="">TABLET NỔI BẬT NHẤT</a>
  	<a class="list-tablet" href="">Máy tính bảng iPad</a>
  	<a class="list-tablet" href="">Máy tính bảng Samsung</a>
  	<a class="list-tablet" href="">iPad 10.2 inch</a>
  	<a class="list-tablet" href="">Samsung Galaxy Tab S6 Lite</a>
  	<a class="list-tablet" href="">Lenovo Tab E10</a>
  	<a class="list-tablet" href="">Xem tất cả tablet</a>
  </div>
	<div class="container-list">
		<div class="column-display">
			<div class="column">
				<div class="pouplar">
					<a href="">
						<img class="popular-img" src="https://cdn.tgdd.vn/Products/Images/522/228144/Feature/S6864955-720x333-2.jpg">
						<p>Samsung Galaxy Tab A7(2020)</p>
						<p>7.790.000<u>đ</u></p>
						<p>Quà 950.000<u>đ</u></p>
					</a>
				</div>
				
				<div class="nomal-product">
					<a href="">
						<img class="nomal-img" src="https://cdn.tgdd.vn/Products/Images/522/202820/ipad-mini-79-inch-wifi-cellular-64gb-2019-gold-400x400.jpg">
						<p>iPad Mini 7.9 inch Wifi Cellular</p>
						<p>13.990.000<u>đ</u></p>
						
					</a>
				</div>
				<div class="nomal-product">
					<a href="">
						<img  class="nomal-img" src="https://cdn.tgdd.vn/Products/Images/522/219912/samsung-galaxy-tab-s6-lite-600x600-1-200x200.jpg">
						<p>Samsung Glaxy Tab S6 Lite</p>
						<p>9.990.000<u>đ</u></p>
		
					</a>
				</div>
				<div class="nomal-product">
					<a href="">
						<img  class="nomal-img" src="https://cdn.tgdd.vn/Products/Images/522/200691/lenovo-tab-e10-tb-x104l-den-1-400x400.jpg">
						<p>Lenovo Tab E10 TB-X104L Đen</p>
						<p>3.190.000<u>đ</u></p>
				
					</a>
				</div>				
			</div>
			
		</div>
				
	<div class="frames4">
  	<a class="highlights4" href="">PHỤ KIỆN GIÁ RẺ</a>
  	<a class="list-accessories" href="">Pin sạc dự phòng</a>
  	<a class="list-accessories" href="">Cáp sạc</a>
  	<a class="list-accessories" href="">Tai nghe</a>
  	<a class="list-accessories" href="">Loa</a>
  	<a class="list-accessories" href="">Ốp lưng điện thoại</a>
  	<a class="list-accessories" href="">Phụ kiện chính hãng</a>
  	<a class="list-accessories" href="">Xem tất cả phụ kiện</a>
  	</div>
	<div class="container-list2">
		<div class="column-display2">
			<div class="column2">
				<div class="nomal-product2">
					<a href="">
						<img class="nomal-img2" src="https://cdn.tgdd.vn/Products/Images/57/198272/sac-du-phong-polymer-10000mah-xmobile-atela-10-add-400x400.jpg">
						<p>Pin sạc dự phòng Polymer 10.000 mAh Xmobile Atela 10 Nhôm Xám</p>
					
						<p>552.000<u>đ</u></p>
						
					</a>
				</div>
			
				<div class="nomal-product2">
					<a href="">
						<img class="nomal-img2" src="https://cdn.tgdd.vn/Products/Images/58/200960/cap-micro-2m-xmobile-ltmp-2006-xanh-navy-1-fix1-400x400.jpg">
						<p>Cáp Micro 2m Xmobile LTMP-</p><br>
						2006 Xanh Navy 
						<p>70.000<u>đ</u></p>
						
					</a>
				</div>
			    
			    <div class="nomal-product2">
					<a href="">
						<img class="nomal-img2" src="https://cdn.tgdd.vn/Products/Images/54/143410/tai-nghe-bluetooth-roman-r552n-xanh-avatar-2-400x400.jpg">
						<p>Tai nghe Blutooth Roman R552N Xanh</p>
						<p>300.000<u>đ</u></p>
						
					</a>
				</div>
				<div class="nomal-product2">
					<a href="">
						<img class="nomal-img2" src="https://cdn.tgdd.vn/Products/Images/60/220189/op-lung-galaxy-s20-ultra-nhua-deo-slim-tpu-jm-den-1-1-400x400.jpg">
						<p>Ốp lưng Galaxy S20 Ultra Nhựa</p><br>
						dẻo Slim TPU JM Đen
						<p>70.000<u>đ</u></p>
						
					</a>
				</div>
				<div class="nomal-product2">
					<a href="">
						<img class="nomal-img2" src="https://cdn.tgdd.vn/Products/Images/2162/144572/loa-bluetooth-esaver-s12b-2-den-avatar-2-400x400.jpg">
						<p>Loa Blutooth eSaver S12B-2 Đen</p>
						<p>950.000<u>đ</u></p>
						
					</a>
				</div>
	         </div>
				
	     </div>
    </div>

    <div id="adress">
    	<p id="information">Địa chỉ: thị trấn Thạnh Mỹ,H.Nam Giang,T.Quảng Nam.Điện thoại:0528152456.Email:thuanduongk18@gmail.com.Chịu trách nhiệm nội dung:Dương Văn Thuận</p>
    </div>
</body>
</html>	