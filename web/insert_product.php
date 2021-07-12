<?php
include 'menu.php';

/*----------Connect to databasse-------------*/

if(empty($_SESSION['check']))
{
    header('Location: index.php');
                      die();
}

$id=null;
$name=null;
$update_id=null;
$update_name=null;
$get_update_id=null;
$get_update_name=null;


if(!empty($_GET['update_id']))
{
    $update_id=$_GET['update_id'];
    $update_name=$_GET['update_name'];
}

if(!empty($_GET['id']) && !empty($_GET['name']))
{

    $id=$_GET['id'];
    $name=$_GET['name'];
    $edit->insert($id,$name);

}
elseif( !empty($_GET['id']) && empty($_GET['name']))
{

    $id=$_GET['id'];
    $edit->delete($id);

}
elseif(!empty($_GET['get_update_name']) && !empty($_GET['get_update_id']))
{

    $get_update_name=$_GET['get_update_name'];
    $get_update_id =$_GET['get_update_id'];
    $edit->update($get_update_id,$get_update_name);
    //update($get_update_id,$get_update_name);
}


?>
<html>
<head>
    <link rel="stylesheet"  href="css.php">
</head>
<body>
<div class ="main">
<div id="left_main">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
           <label> ID:</label> <input type="text" name="id" class="input" id="first_" ><br>
           <label> ProductName:</label> <input  type="text" name="name" class="input"><br>
            <input type="submit" name="submit" value="Them Thong Tin">

    </form>

    <table>

            <tr>
                <td>ID</td>
                <td>ProducName</td>
            </tr>
            <?php
             $resultt = new Edit_Product();
             $productsName=$resultt->show_all();
             foreach($productsName as $productsName  ) :  ?>
            <tr>
                <td> <?php print $productsName['ProductId'] ?></td>
                <td> <?php print $productsName['ProductName'] ?></td>
                <td>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
                             <input type="hidden" name="id" value="<?php print $productsName['ProductId'] ?>">

                            <input type="submit" name="submit" value="Delete">

                     </form>
                </td>
                <td>
                     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
                           <input type="hidden" name="update_id" value="<?php print $productsName['ProductId'] ?>">
                           <input type="hidden" name="update_name" value="<?php print $productsName['ProductName'] ?>">
                           <input type="submit" name="submit" value="Update">

                     </form>
                </td>
            </tr>
             <?php endforeach; ?>

    </table>
</div>
<div id="right_main">

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
         <input type="button" value="<?php print $update_id ?>"><br>
         <input type="hidden"name="get_update_id" value="<?php print $update_id ?>"><br>
         <input type="text" name="get_update_name" value="<?php print $update_name ?>"><br>
         <input type="submit" name="submit" value="Update">

    </form>
 <div>


 <div>

</div>
</div>
</body>
</html>