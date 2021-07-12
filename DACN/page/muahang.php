<?php
include "header.php";
include "../Function/ClassFunction.php";
$Product_list = new get_Products();
$value = $Product_list->get_product_for_muahang($_GET['ProductId']);


?>
<!DOCTYPE html>
<html>
<head>
    <title></title>

    
    <link rel="stylesheet" href="../style/muahang_.css">
</head>
<body>
<?php foreach ($value as $value) : ?>
        
 <h2><?php print $value['ProductName']; ?></h2>        

<hr>
<div class="display-mid">
    
    <div class="display-mid-left">
        <img src="<?php print $value['picture'] ; ?>" alt="<?php print $value['note'] ?>">
    </div>

    <div class="display-mid-right">
        
        <p><LABEL class="label_">Giá:</LABEL> <?php print $value['Price']; ?>đ</p>
<?php if(!empty($value['Chip'])){ ?>        <p><LABEL class="label_">Chip:</LABEL> <?php print $value['Chip']; }?></p>
<?php if(!empty($value['ram'])){ ?>        <p><LABEL class="label_"> Ram:</LABEL> <?php print $value['ram']; }?></p>
<?php if(!empty($value['CD_driver'])){ ?>        <p><LABEL class="label_"> Ổ Cứng</LABEL> <?php print $value['CD_driver']; }?></p>
<?php if(!empty($value['graphic_card'])){ ?>        <p><LABEL class="label_"> Card Màn Hình</LABEL> <?php print $value['graphic_card']; } ?></p>
<?php if(!empty($value['screen'])){ ?>        <p><LABEL class="label_"> Màn Hình</LABEL> <?php print $value['screen']; } ?></p>
        <p>Bảo hành 6 tháng</p>
        <p>Miễn phí giao hàng tại nhà<br>- Đơn hàng 4 củ<br>- Đơn hàng 6 củ</p>
        <form action="giohang.php" method="get">
            <input type="hidden" name="ProductId" value="<?php print $value['ProductId'] ?>">
            <input type="submit" name="" value="Mua Hàng">
            
        </form>
    <?php endforeach; ?>
    </div>
</div>
</body>
</html>
<?php
include "footer.php";
?>
