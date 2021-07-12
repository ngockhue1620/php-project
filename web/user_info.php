<?php
include 'menu.php';
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
$infomation=array();
function show_all()
{
    global $infomation;

    $conn=connect();
    $sql="select * from user";
    $result= $conn->query($sql);


    while($row = $result->fetch_assoc())
    {
        $infomation[]=$row;
    }

    $conn->close();
}
show_all();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css.php">
</head>
<div class="main">
 <table>

            <tr>
                <td>UserId</td>
                <td>userName</td>
                <td>Password</td>
            </tr>
            <?php foreach($infomation as $infomation ) :  ?>
            <tr>
                <td> <?php print $infomation['UserId'] ?></td>
                <td> <?php print $infomation['UserName'] ?></td>
                <td> <?php print $infomation['UserPassword'] ?></td>

            </tr>
             <?php endforeach; ?>

    </table>
</div>
</body>
</html
