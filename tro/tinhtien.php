<?php

function connection()
{
	$con = new mysqli('localhost','root','root','xomtro');
	return $con;
}
function tinhtien($khue,$khanh,$tu,$thuan,$hieu,$y,$person,$money,$trinh)
{
	$sql="insert into tienan(khue,khanh,tu,thuan,hieu,y,thungay,baotien,nguoimua,trinh)
				 values('$khue','$khanh','$tu','$thuan','$hieu','$y',now(),'$money','$person','$trinh')

	";
	connection()->query($sql);
}
$khue=0;
$khanh=0;
$tu=0;
$thuan=0;
$hieu=0;
$y=0;
$trinh=0;
if(!empty($_GET['money']))
{

$dem=0;
if( !empty($_GET['khue'])){ $dem+=1;}	
if( !empty($_GET['khanh'])){ $dem+=1;}
if( !empty($_GET['tu'])){ $dem+=1;}
if( !empty($_GET['thuan'])){ $dem+=1;}
if( !empty($_GET['hieu'])){ $dem+=1;}
if( !empty($_GET['y'])){ $dem+=1;}
if(	!empty($_GET['trinh'])){$dem+=1;}
$tien = (float)$_GET['money'];
$tcr  =$tien/$dem;

if( !empty($_GET['khue'])){ $khue=$tcr;}	
if( !empty($_GET['khanh'])){$khanh=$tcr; }
if( !empty($_GET['tu'])){$tu=$tcr; }
if( !empty($_GET['thuan'])){$thuan=$tcr; }
if( !empty($_GET['hieu'])){$hieu=$tcr; }
if( !empty($_GET['y'])){$y=$tcr ;}
if(	!empty($_GET['trinh'])){$trinh=$tcr;}

tinhtien($khue,$khanh,$tu,$thuan,$hieu,$y,$_GET['person'],$_GET['money'],$trinh);

}

function show()
{
	$sql="select*from tienan";
	return connection()->query($sql);
}
function delete($id)
{
	$sql="update  tienan set xoa=1 where id=$id";
	connection()->query($sql);
}

function delete_forever($id)
{
	$sql="delete from tienan where id=$id";
	connection()->query($sql);

}
if(!empty($_GET['delete']))
{
	delete($_GET['delete']);
}
if(!empty($_GET['delete_forever']))
{	
	delete_forever($_GET['delete_forever']);
}



?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table {
    border: 1px solid;
}

h1 {
    text-align: center;
}

td {
    width: 100px;
    border-bottom: 1px solid;
}
.insert {background: antiquewhite;padding: 10px;text-align: right;}

.show {
    background: aquamarine;
    padding: 10px;
    margin-top: 30px;
}
	</style>
</head>
<body>
	<h1>Tiền Ăn Của Trọ</h1>
<div class="insert">	
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
	<table>
		<tr>
			<td>Khuê</td>
			<td>Khanh</td>
			<td>Tự</td>
			<td>yên</td>
			<td>Phượng</td>
			<td>Hiểu</td>
			<td>trinh</td>
			<td>người mua</td>
			<td>Bao tiền</td>
		</tr>
		<tr>
		<td>	<input type="checkbox" name="khue" value="co"></td>
		<td>	<input type="checkbox" name="khanh" value="co"></td>
		<td>	<input type="checkbox" name="tu" value="co"></td>
		<td>	<input type="checkbox" name="thuan"value="co" ></td>
		<td>	<input type="checkbox" name="y" value="co"></td>
		<td>	<input type="checkbox" name="hieu" value="co"></td>
		<td>     <input type="checkbox" name="trinh" value="co"></td>
		<td>    
			<select name="person">
				<option value="khue">khue</option>
				<option value="khanh" >khanh </option>
				<option value="hieu" >hieu</option>
				<option value="thuan" > yến</option>
				<option value="tu" >tu </option>
				<option value="y" >Phượng </option>
				<option value="trinh" > trinh</option>
			</select>
		</td>
		<td>     <input type="text" name="money"></td>
		</tr>
	</table>
	<input type="submit" name="" value="Cập Nhâp">
</form>
</div>
<div class="show">
	<table>
			<tr>
			<td>Khuê</td>
			<td>Khanh</td>
			<td>Tự</td>
			<td>Yến</td>
			<td>Phuong</td>
			<td>Hiểu</td>
			<td>trinh</td>
			
			<td>Bao tiền</td>
			<td>Ngày Mua</td>
			<td>Nguoi Mua</td>
		</tr>
			
	<?php foreach (show() as $value):

		if(empty( $value['xoa'])) {
	 ?>
		<tr>
		<td><?php print($value['khue']); ?></td>
		<td><?php print($value['khanh']); ?></td>
		<td><?php print($value['tu']); ?></td>
		<td><?php print($value['thuan']); ?></td>
		<td><?php print($value['y']); ?></td>
		<td><?php print($value['hieu']); ?></td>
		<td><?php print($value['trinh']); ?></td>
		<td><?php print($value['baotien']); ?></td>
		<td><?php print($value['thungay']); ?></td>
		<td><?php print($value['nguoimua']); ?></td>
		
		
		<td>
			<form action="/tro/tinhtien.php" method="get">
				<input type="hidden" name="delete" value="<?php print($value['id'])?>">
				<input type="submit" name="" value="Xoa">
			</form>
		</td>
		<td>
			<form action="/tro/tinhtien.php" method="get">
				<input type="hidden" name="delete_forever" value="<?php print($value['id'])?>">
				<input type="submit" name="" value="Xoa lun">
			</form>
		</td>
		</tr>
<?php } endforeach;

	$khanh12=0;
				  $khue12=0;
				  $tu12=0;
				  $thuan12=0;
				  $y12=0;
				  $hieu12=0;
				  $trinh12=0;
?>	

			<tr><td></td></tr>
			<tr><td></td></tr>

			<tr><td></td></tr>
			<tr><td></td></tr>



			<tr>
			<td><?php
					
					$k=	connection()->query('SELECT sum(khue) as tongtien from tienan where xoa is null');
					foreach ($k as  $value) {
						$khue12=$value['tongtien'];
						print($value['tongtien']);
					}
						
					

				?>
			</td>
			 	<td><?php
					
					$k=	connection()->query('SELECT sum(khanh) as tongtien from tienan  where xoa is null');
					foreach ($k as  $value) {
						$khanh12=$value['tongtien'];
						print($value['tongtien']);
					}
						
					

				?>
			</td>
				<td><?php
					
					$k=	connection()->query('SELECT sum(tu) as tongtien from tienan   where xoa is null');
					foreach ($k as  $value) {
						$tu12=$value['tongtien'];
						print($value['tongtien']);
					}
						
					

				?>
			</td>
				<td><?php
					
					$k=	connection()->query('SELECT sum(thuan) as tongtien from tienan  where xoa is null');
					foreach ($k as  $value) {
						$thuan12=$value['tongtien'];
						print($value['tongtien']);
					}
						
					

				?>
			</td>
				<td><?php
					
					$k=	connection()->query('SELECT sum(y) as tongtien from tienan  where xoa is null');
					foreach ($k as  $value) {
						$y12=$value['tongtien'];
						print($value['tongtien']);
					}
						
					

				?>
			</td>
				<td><?php
					
					$k=	connection()->query('SELECT sum(hieu) as tongtien from tienan  where xoa is null');
					foreach ($k as  $value) {
						$hieu12=$value['tongtien'];
						print($value['tongtien']);
					}
						
					

				?>
			</td>
			<td><?php
					
					$k=	connection()->query('SELECT sum(trinh) as tongtien from tienan  where xoa is null');
					foreach ($k as  $value) {
						$trinh12=$value['tongtien'];
						print($value['tongtien']);
					}
						
					

				?>
			</td>
			<td></td>
			<td></td>
			<td>Tong Tien Đã Mua:</td>
			<td>
				
			</td>

			<td>
				<?php
					
					$k=	connection()->query('SELECT sum(baotien) as tongtien from tienan  where xoa is null');
					foreach ($k as  $value) {
						print($value['tongtien']);
					}
						
					

				?>
			</td>
		</tr>
		<tr>
			<?php $khanh1=0;
				  $khue1=0;
				  $tu1=0;
				  $thuan1=0;
				  $y1=0;
				  $hieu1=0;
				  $trinh1=0;

				  foreach (show() as $value) {
				  	if(empty($value['xoa'])){
				  	if($value['nguoimua']=="khue")
				  		{
				  			$khue1=$khue1+$value['baotien'];
				  		}
				  	elseif ($value['nguoimua']=="khanh") {
				  			$khanh1   =$khanh1  +$value['baotien'];
				  		}
				  	elseif ($value['nguoimua']=="tu") {

				  			$tu1=$tu1  +$value['baotien'];
				  		}			
				  	elseif ($value['nguoimua']=="thuan") {
				  			$thuan1   =$thuan1  +$value['baotien'];
				  		}		
				  	elseif ($value['nguoimua']=="y") {
				  			$y1   =$y1  +$value['baotien'];
				  		}	
				  	elseif ($value['nguoimua']=="hieu") {
				  			$hieu1   =$hieu1  +$value['baotien'];
				  		}	
				  	elseif ($value['nguoimua']=="trinh") {
				  			$trinh1   =$trinh1  +$value['baotien'];
				  		}
				  	}
				  					
				  }




			 ?>
			 <td><?php print $khue1 ?></td>
			 <td><?php print $khanh1 ?></td>
			 <td><?php echo $tu1 ?></td>
			 <td><?php echo  $thuan1 ?></td>
			 <td><?php echo  $y1 ?></td>
			 <td><?php echo  $hieu1 ?></td>
			 <td><?php echo  $trinh1 ?></td>
			 <td>Tổng Chi Của Mổi Người</td>
		</tr>
		<tr>	
				<td><?php print $khue1-$khue12 ?></td>
			 <td><?php print $khanh1-$khanh12 ?></td>
			 <td><?php echo $tu1-$tu12 ?></td>
			 <td><?php echo  $thuan1-$thuan12 ?></td>
			 <td><?php echo  $y1-$y12 ?></td>
			 <td><?php echo  $hieu1-$hieu12 ?></td>
			 <td><?php echo  $trinh1-$trinh12 ?></td>
			 <td>Result</td>

		</tr>
	</table>
</div>
</body>
</html>