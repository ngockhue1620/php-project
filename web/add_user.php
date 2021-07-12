<?php

include 'menu.php';
/*--connect DB ---*/
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
/*----function insert ---*/
$_SESSION['mess']="";
function insert($username,$password)
{


    $conn=connect();
    $sql="insert into user(UserName,UserPassword,Role)  values('$username','$password','user')";

    if( $conn -> query($sql)===true)
    {
         $_SESSION['mess']="insert successful";
    }
    else
    {
        $_SESSION['mess']="fail";
    }

    $conn->close();
}

$user=null;
$passWord=null;
if(!empty($_POST['user']) && !empty($_POST['password']))
{
    $user=(string)$_POST['user'];
    $passWord=(string)$_POST['password'];

    insert($user,$passWord);


}





?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css.php">
</head>
<body>
<div class="main">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<lable>User</lable><input type="text" name="user"><br>
		<label>PassWord</label><input type="text" name="password"><br>
		<input type="submit" name="">
	</form>
    <p><?php    echo $_SESSION['mess']; $_SESSION['mess']=""; ?></p>

</body>
</html>