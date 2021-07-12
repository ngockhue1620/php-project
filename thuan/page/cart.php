<?php
include "header.php";
include '../Function/page/cart_Process.php';
$OrderTable = new Order();
$CountNum=1;
if(!empty($_GET['ProductId']))
{


    // $_SESSION['cart']=$_SESSION['cart']."n".$_GET['ProductId'];



    if(!empty($_SESSION['user']))
    {


        $OrderTable->insertOrder($_GET['ProductId'],$_SESSION['user']);

    }
    else
    {

        $c= array_search($_GET['ProductId'],$_SESSION['cart']);
        if(empty($c))
        {
            array_push($_SESSION['cart'], $_GET['ProductId']);
        }
    }

}

if(!empty($_SESSION['user']) && !empty($_SESSION['cart']))
{


    foreach ($_SESSION['cart'] as $value) {


        $OrderTable->insertOrder($value,$_SESSION['user']);
        array_splice($_SESSION['cart'],0,1);



    }


}


//have delete request without $_SESSION['user'] => delete with session

if(!empty($_POST['delete']) &&empty( $_SESSION['user']))
{
    $count = count($_SESSION['cart']);


    array_splice($_SESSION['cart'],(int)$_POST['delete'],1);
    if($_POST['delete']==100)
    {
        array_splice($_SESSION['cart'],0,1);
    }

}
//have delete request with $_SESSION['user'] => delete with database
if(!empty($_POST['delete']) && !empty( $_SESSION['user']))
{

    $OrderTable->deleteOrder($_POST['delete'],$_SESSION['user']);

}

$cart_item=null;
if(!empty($_SESSION['user']))
{

    $cart_item=$OrderTable->getOrder($_SESSION['user']);



}
else
{
    $cart_item=$_SESSION['cart'];
}
















$getProById= new get_Products_ById();

?>

   
    <link rel="stylesheet" type="text/css" href="../style/ProCart1.css">

 
<div id="cart_">    
  
<table>
    <tr>
        <th>Sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>

    </tr>
    <?php
    $dem=0;
    if(!empty($cart_item))
        foreach ($cart_item as $id):
            if(!empty($_SESSION['user'])){  
                $pro=$getProById->get_product($id['ProductId']);
            }
            else {
             $pro =$getProById->get_product($id);
            }
            if (is_array($pro) || is_object($pro))
            {

                foreach ( $pro as $value):

                    ?>
                    <tr>
                        <td>
                            <div id="sanpham">
                                <img src="<?php print($value['Link']); ?>">
                                <p><?php print($value['ProductName']); ?></p>
                            </div>
                        </td>
                       
                        <td>                        
                         <cart-item price="<?php print($value['Price']) ?>" count="1" ></cart-item>
                        </td>

                        <td>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                <input type="hidden" name="delete" class="delete" value="<?php
                                if(!empty($_SESSION['user']))
                                {
                                    print($value['ProductId']);
                                }
                                else
                                {
                                    if($dem===0)
                                    {
                                        print(100);
                                    }
                                    else
                                    {
                                        print($dem)  ;
                                    }
                                }

                                ?>">
                                <input type="submit" name="" value="Xoa">
                            </form>
                        </td>                           
 
                     </tr>

    <?php
            endforeach;

            }
            $dem=$dem+1;
        endforeach;

    ?>
   
</table>
<p id="price_"></p>
</div>

<button onclick="checkOut()">Thanh Toan</button>
</body>

<script src="../javascript/cart_.js" >
 get_quantity();
</script>
<script type="text/javascript" src='../javascript/vueJs.js'></script>
</html>
