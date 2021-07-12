<?php
session_start();
$_SESSION['user']="";
$_SESSION['passworld']="";
$_SESSION['check']="";
$checkUserName=null;
$checkPassWord=null;
$mess=null;
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
function login($user,$passworld)
{

    $con=connect();
    $result=null;
    $sql='select  count(*) from user where UserName=$user and UserPassword=$passworld';
    $result=$con -> query($sql) ;

    if(!$result)

    {

          $_SESSION['check']="ok";
          header('Location: insert_product.php');
          die();

     }
     else
     {      $mess="sai tai khoan mat khau";
     }

     $con->close();



}

if(!empty($_POST['user']) &&  !empty($_POST['passworld']))
{
    $checkUserName=$_POST['user'];
    $checkPassWord=$_POST['passworld'];

    $_SESSION['user']=$checkUserName;
    $_SESSION['passworld']=$checkPassWord;
    login($_SESSION['user'],$_SESSION['passworld']);

}







?>
<html>
<head></head>
<body>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <input type="text" name="user" ><br>
        <input type="password" name="passworld">
        <input type="submit">

    </form>
    <p><?php echo $mess ?></p>


</body>
</html>