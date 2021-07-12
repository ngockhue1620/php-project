<?php
include '../page/header.php';
include '../Function/ClassFunction.php';
$Insert_products = new Products();
$mess= null;
if(!empty($_POST['CategoryName']))
{
	if( $Insert_products -> Category($_POST['CategoryName']))
	{
		$mess="insert successful";
	}
	else
	{
		$mess="fail";
	}
}


$Category_list = $Insert_products->Category_list();


if(
        !empty($_POST['ProductName'])
        && !empty($_POST['Amount'])
        && !empty($_POST['price'])
        && !empty($_POST['introduce'])
        && !empty($_POST['note'])
        && !empty($_POST['picture']))
{

	if( $Insert_products -> insert_product(
	        $_POST['CategoryId'],
            $_POST['ProductName'],
            $_POST['Amount'],
            $_POST['price'],
            $_POST['introduce'],
            $_POST['note'],
            $_POST['picture'],
            $_POST['Chip'],
            $_POST['ram'],
            $_POST['CD_driver'],
            $_POST['graphic_card'],
            $_POST['screen'])
        ==true)
	{
		$mess="insert successful products";

		


	}
	else
	{
		$mess="Insert Products is fail";
	}

	
}

?>


<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/insert_info.css">

</head>
<body>
<nav id="navbar">
    <ul>
        <li>
            <a href="insert_info.php">Thêm danh mục, thông tin sản phẩm</a>
        </li>
        <li>
            <a href="xemsp.php">Xem các sản phẩm hiện có</a>
        </li>
    </ul>
</nav>
<hr>
<main>
    <div class="main_of_insert">
        <div class="add_category">
            <div class="column">
                <div class="card">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="card-header">
                            <div class="title">
                                Thêm danh mục
                            </div>
                        </div>
                        <div class="card-dm">
                            <div class="field">
                                <label class="label">Tên danh mục</label>
                                <div class="control">
                                    <input class="input" type="text" name="CategoryName" placeholder="Tên danh mục">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="button is-link" type="submit" name="" value="Thêm">
                                </div>
                            </div>
                        </div>
                    </form>
                    <p><?php print $mess ?></p>
                </div>
            </div>
        </div>
        <div class="add_product">
            <div class="column">
                <div class="card">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="card-header">
                            <div class="title">
                                Thêm Thông Tin Sản Phẩm
                            </div>
                        </div>
                        <select name="CategoryId">
                            <?php 	foreach ($Category_list as $Category_list ) :  ?>

                                <?php
                                if(!empty($Category_list['CategoryName']))
                                {
                                    ?>
                                    <option value="<?php print $Category_list['CategoryId']  ?>">
                                        <?php
                                        print $Category_list['CategoryName'];


                                        ?>
                                    </option>



                                <?php } endforeach; ?>

                            <option></option>
                        </select>
                        <div class="card-content">
                            <div class="field">
                                <label class="label">Tên Sản phẩm</label>
                                <div class="control">
                                    <input class="input" type="text" name="ProductName" placeholder="Tên Sản Phẩm">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Giá Sản phẩm</label>
                                <div class="control">
                                    <input class="input" type="text" name="price" placeholder="Giá">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Số lượng nhập</label>
                                <div class="control">
                                    <input class="input" type="text" name="Amount" placeholder="số lượng hàng nhập">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Giới thiệu</label>
                                <div class="control">
                                    <input class="input" type="text" name="introduce" placeholder="Giới Thiệu">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Mô Tả</label>
                                <div class="control">
                                    <input class="input" type="text" name="note" placeholder="Mô Tả">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Link hình ảnh</label>
                                <div class="control">
                                    <input class="input" type="text" name="picture" placeholder="hinhanh">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Chip</label>
                                <div class="control">
                                    <input class="input" type="text" name="Chip" placeholder="Chip">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Ram</label>
                                <div class="control">
                                    <input class="input" type="text" name="ram" placeholder="Ram">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Ổ cứng</label>
                                <div class="control">
                                    <input class="input" type="text" name="CD_driver" placeholder="Ổ cứng">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Card Màn Hình</label>
                                <div class="control">
                                    <input class="input" type="text" name="graphic_card" placeholder="Card màn hình">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Màn hình</label>
                                <div class="control">
                                    <input class="input" type="text" name="screen" placeholder="Màn hình">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="button is-link" type="submit" name="" value="Thêm Sản Phẩm">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
<?php
include '../page/footer.php';