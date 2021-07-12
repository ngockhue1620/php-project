<?php
include 'menu.php';
include 'function_.php';
/*----------Connect to databasse-------------*/

if(empty($_SESSION['check']))
{
    header('Location: index.php');
                      die();
}

function connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "root";
     $conn = new mysqli($servername, $username,$password,'Shop_cafe');
   // Check connection
   if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }

return $conn;
}
/*----------end function Connect()----------------*/



/*------------function insert($id,$name)------ ID and ProductName to DB----------*/

function insert($id,$name)
{


    $conn=connect();
    $sql="insert  into Products values('$id',N'$name')";

    if( $conn -> query($sql)===true)

    show_all();
    $conn->close();
}
/*----------end function----------------*/

/*_------------Delete function($id)*/

function delete($id)
{


    $conn=connect();
    $sql="delete from Products where ID=".$id;

    if( $conn -> query($sql)===true)

    show_all();
    $conn->close();
}

/*----- function show all data---------*/


function show_all()
{
    global  $productsName;

    $conn=connect();
    $sql="select * from products";
    $result= $conn->query($sql);


    while($row = $result->fetch_assoc())
    {
        $productsName[]=$row;
    }

    $conn->close();
}
/* -------------end function show_all()-------------------*/


/*-----update function($id)---------*/

function update($get_update_id,$get_update_name)
{

    $conn=connect();
    $sql="update  products set ProductName= N'$get_update_name' where ID=$get_update_id";
    $result= $conn->query($sql);
    show_all();
}
/*-----------------------*/

/* --------insert and delete--------------------*/
$id=null;
$name=null;
$update_id=null;
$update_name=null;

if(!empty($_GET['update_id']))
{
    $update_id=$_GET['update_id'];
    $update_name=$_GET['update_name'];
}

/* lấy thông tin từ form và update lại  */
$get_update_id=null;
$get_update_name=null;
if(!empty($_GET['id']) && !empty($_GET['name']))
{
    $id=$_GET['id'];
    $name=$_GET['name'];
   // insert($id,$name);
   $re = new Edit_Product();
   $re->insert($id,$name);
    show_all();


}
elseif( !empty($_GET['id']) && empty($_GET['name']))
{
    $id=$_GET['id'];
    delete($id);
}

/*chuyển data được chọn -> form update  */


elseif(!empty($_GET['get_update_name']) && !empty($_GET['get_update_id']))
{

    $get_update_name=$_GET['get_update_name'];
    $get_update_id =$_GET['get_update_id'];

    update($get_update_id,$get_update_name);
}
else
{
    show_all();
}

if(!empty($_SESSION['img']))
{
    $_SESSION['img']=$_POST['img'];
}

echo $_SESSION['img'];

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
            <?php foreach($productsName as $productsName ) :  ?>
            <tr>
                <td> <?php print $productsName['ID'] ?></td>
                <td> <?php print $productsName['ProductName'] ?></td>
                <td>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
                             <input type="hidden" name="id" value="<?php print $productsName['ID'] ?>">

                            <input type="submit" name="submit" value="Delete">

                     </form>
                </td>
                <td>
                     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
                           <input type="hidden" name="update_id" value="<?php print $productsName['ID'] ?>">
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
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type=text name='img'>
    <input type='submit'>
 </form>
 <img src="$_SESSION['img']">
 <div>

</div>
</div>
</body>
</html>