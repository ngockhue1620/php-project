<?php
include 'header.php';
include '../Function/ClassFunction.php';
$Product_list = new get_Products();

$value = $Product_list->get_product();
$value1 = $Product_list->get_product();
$value2= $Product_list->get_product();
$value3=$Product_list->get_product();
$value4=$Product_list->get_product();
$dem=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web bán hàng</title>
    <link rel="stylesheet" href="../style/style1.css">
    <link rel="stylesheet" href="../style/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div>

    <div class="change-width-body">
        <nav>
            <ul class="mid-content">
                <li class="left">Laptop & Macbook</li>
                <li class="right">

                    <form action="danhsach.php" method="get">

                        <input type="hidden" name="getAll" value="1">
                        <input type="submit" name="" value="Xem tất cả">

                    </form>

                </li>
            </ul>
            <div id="carouselExampleFade" class="carousel slide"  data-ride="carousel" data-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <!--  --------------------------                      -->
                        <?php

                        foreach ($value as $value) :
                            if($value['CategoryName']=="Laptop")
                            {
                                if($dem%3==0 || $dem==0 )
                                {
                                    if($dem!=0)
                                    {
                                        print ' <div class="carousel-item ">';
                                    }
                                    print '  <div class="card-group" class="width-carousel">';
                                }
                                ?>

                                <div class="card text-red backgr-white">
                                    <img src="<?php print $value['picture']; ?>" class="card-img-top" alt="<?php print $value['ProductName'] ?>" style="width: 30%;">
                                    <div class="card-body">
                                        <p class="card-title"><?php print $value['introduce'] ?></p>
                                        <p class="card-text"><?php print $value['Price']."đ"; ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <form action="muahang.php" method="get">
                                            <input type="hidden" name="ProductId" value="<?php print  $value['ProductId']?>">
                                            <input class="button-card" type="submit" value="Mua ngay">
                                        </form>
                                    </div>
                                </div>
                                <?php

                                if($dem%3==2)
                                {
                                    print '  </div>
                                        </div>';

                                }
                                $dem=$dem+1;
                                ?>

                                <?php

                            }  endforeach; $dem=0; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon cl-black" aria-hidden="true" style="color: red"> </span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!--                       --------------------->

        </nav>
        <nav>
            <ul class="mid-content">
                <li class="left">PC-Máy tính đồng bộ</li>
                <li class="right">

                    <form action="danhsach.php" method="get">

                        <input type="hidden" name="getAll" value="2">
                        <input type="submit" name="" value="Xem tất cả">

                    </form>

                </li>
            </ul>
            <div id="carouselExampleFade2" class="carousel slide"  data-ride="carousel" data-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <!--  --------------------------                      -->
                        <?php

                        foreach ($value1 as $value1) :
                            if($value1['CategoryName']=="PC")
                            {
                                if($dem%3==0 || $dem==0 )
                                {
                                    if($dem!=0)
                                    {
                                        print ' <div class="carousel-item ">';
                                    }
                                    print '  <div class="card-group" class="width-carousel">';
                                }
                                ?>

                                <div class="card text-red backgr-white">
                                    <img src="<?php print $value1['picture']; ?>" class="card-img-top" alt="<?php print $value1['ProductName'] ?>" style="width: 30%;">
                                    <div class="card-body">
                                        <p class="card-title"><?php print $value1['introduce'] ?></p>
                                        <p class="card-text"><?php print $value1['Price']."đ"; ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <form action="muahang.php" method="get">
                                            <input type="hidden" name="ProductId" value="<?php print  $value1['ProductId']?>">
                                            <input class="button-card" type="submit" value="Mua ngay">
                                        </form>
                                    </div>
                                </div>
                                <?php

                                if($dem%3==2)
                                {
                                    print '  </div>
                                        </div>';

                                }
                                $dem=$dem+1;
                                ?>

                                <?php

                            }  endforeach; $dem=0; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade2" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"> </span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade2" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!--                       --------------------->

        </nav>
        <nav>
            <ul class="mid-content">
                <li class="left">Màn hình máy tính</li>
                <li class="right">

                    <form action="danhsach.php" method="get">

                        <input type="hidden" name="getAll" value="3">
                        <input type="submit" name="" value="Xem tất cả">

                    </form>

                </li>
            </ul>
            <div id="carouselExampleFade3" class="carousel slide"  data-ride="carousel" data-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <!--  --------------------------                      -->
                        <?php

                        foreach ($value2 as $value2) :
                            if($value2['CategoryName']=="Màn hình")
                            {
                                if($dem%3==0 || $dem==0 )
                                {
                                    if($dem!=0)
                                    {
                                        print ' <div class="carousel-item ">';
                                    }
                                    print '  <div class="card-group" class="width-carousel">';
                                }
                                ?>

                                <div class="card text-red backgr-white">
                                    <img src="<?php print $value2['picture']; ?>" class="card-img-top" alt="<?php print $value2['ProductName'] ?>" style="width: 30%;">
                                    <div class="card-body">
                                        <p class="card-title"><?php print $value2['introduce'] ?></p>
                                        <p class="card-text"><?php print $value2['Price']."đ"; ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <form action="muahang.php" method="get">
                                            <input type="hidden" name="ProductId" value="<?php print  $value2['ProductId']?>">
                                            <input class="button-card" type="submit" value="Mua ngay">
                                        </form>
                                    </div>
                                </div>
                                <?php

                                if($dem%3==2)
                                {
                                    print '  </div>
                                        </div>';

                                }
                                $dem=$dem+1;
                                ?>

                                <?php

                            }  endforeach; $dem=0; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade3" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon cl-black" aria-hidden="true"> </span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade3" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!--                       --------------------->

        </nav>
        <nav>
            <ul class="mid-content">
                <li class="left">Chuột gaming</li>
                <li class="right">

                    <form action="danhsach.php" method="get">

                        <input type="hidden" name="getAll" value="4">
                        <input type="submit" name="" value="Xem tất cả">

                    </form>

                </li>
            </ul>
            <div id="carouselExampleFade4" class="carousel slide"  data-ride="carousel" data-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <!--  --------------------------                      -->
                        <?php

                        foreach ($value3 as $value3) :
                            if($value3['CategoryName']=="Chuột gaming")
                            {
                                if($dem%3==0 || $dem==0 )
                                {
                                    if($dem!=0)
                                    {
                                        print ' <div class="carousel-item ">';
                                    }
                                    print '  <div class="card-group" class="width-carousel">';
                                }
                                ?>

                                <div class="card text-red backgr-white">
                                    <img src="<?php print $value3['picture']; ?>" class="card-img-top" alt="<?php print $value3['ProductName'] ?>" style="width: 30%;">
                                    <div class="card-body">
                                        <p class="card-title"><?php print $value3['introduce'] ?></p>
                                        <p class="card-text"><?php print $value3['Price']."đ"; ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <form action="muahang.php" method="get">
                                            <input type="hidden" name="ProductId" value="<?php print  $value3['ProductId']?>">
                                            <input class="button-card" type="submit" value="Mua ngay">
                                        </form>
                                    </div>
                                </div>
                                <?php

                                if($dem%3==2)
                                {
                                    print '  </div>
                                        </div>';

                                }
                                $dem=$dem+1;
                                ?>

                                <?php

                            }  endforeach; $dem=0; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade4" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon cl-black" aria-hidden="true"> </span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade4" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!--                       --------------------->

        </nav>
        <nav>
            <ul class="mid-content">
                <li class="left">Tay cầm chơi game</li>
                <li class="right">

                    <form action="danhsach.php" method="get">

                        <input type="hidden" name="getAll" value="5">
                        <input type="submit" name="" value="Xem tất cả">

                    </form>

                </li>
            </ul>
            <div id="carouselExampleFade5" class="carousel slide"  data-ride="carousel" data-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <!--  --------------------------                      -->
                        <?php

                        foreach ($value4 as $value4) :
                            if($value4['CategoryName']=="Tay cầm chơi game")
                            {
                                if($dem%3==0 || $dem==0 )
                                {
                                    if($dem!=0)
                                    {
                                        print ' <div class="carousel-item ">';
                                    }
                                    print '  <div class="card-group" class="width-carousel">';
                                }
                                ?>

                                <div class="card text-red backgr-white">
                                    <img src="<?php print $value4['picture']; ?>" class="card-img-top" alt="<?php print $value4['ProductName'] ?>" style="width: 30%;">
                                    <div class="card-body">
                                        <p class="card-title"><?php print $value4['introduce'] ?></p>
                                        <p class="card-text"><?php print $value4['Price']."đ"; ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <form action="muahang.php" method="get">
                                            <input type="hidden" name="ProductId" value="<?php print  $value4['ProductId']?>">
                                            <input class="button-card" type="submit" value="Mua ngay">
                                        </form>
                                    </div>
                                </div>
                                <?php

                                if($dem%3==2)
                                {
                                    print '  </div>
                                        </div>';

                                }
                                $dem=$dem+1;
                                ?>

                                <?php

                            }  endforeach; $dem=0; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade5" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon cl-black" aria-hidden="true"> </span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade5" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!--                       --------------------->

        </nav>
    </div>
</div>
<?php
include 'footer.php';
?>
</body>
</html>