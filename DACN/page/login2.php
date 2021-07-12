<?php
include 'header.php';
include '../Function/ClassFunction.php';
$mess=null;
$Customers = new Edit_Customer();

if(!empty($_POST['checkPassword']))
{
    if($_POST['checkPassword'] == $_POST['password'])
    {
        if ($Customers->AddUser($_POST['userName'], $_POST['password'])) {
            $mess = "Đăng ký thành công";

        }
        else {
            $mess = "Tài khoản đã tồn tại";
        }
    }
    else
    {
        $mess="Mật khẩu không trùng khớp";
    }
}
else {
    if (!empty($_POST['userName']) && empty($_POST['checkPassword'])){
        if ( !empty($Customers->check_login($_POST['userName'], $_POST['password'])[0])) {
            $_SESSION['user'] = $_POST['userName'];
            $_SESSION['CustomerId'] = $Customers->check_login($_POST['userName'], $_POST['password'])[0];
            if($Customers->check_login($_POST['userName'], $_POST['password'])[1]=='customers')
            {
                header('Location: index.php');
                die();
            }
            elseif ($Customers->check_login($_POST['userName'], $_POST['password'])[1]=='admin')
            {
                header('Location: ../admin/insert_info.php');
                die();
            }


        } else {
            $mess = "Sai tài khoản hoặc mật khẩu";
        }

    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập vào website</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/login2.css">
    <link rel="stylesheet" href="../style/style1.css">
    <script src="https://www.w3schools.com/lib/w3.js"></script>

    <?php
    if($mess=="Đăng ký thành công" || $mess=="Tài khoản đã tồn tại" || $mess=="Mật khẩu không trùng khớp")
        {

            echo "
            
            <script>
                setTimeout(function (){
                   w3.removeClass('#dn','sign_in'); 
                },0);
            </script>
            
            ";

        }





      ?>
</head>
<body>
<main>
    <div id="dn" class="container  sign_in">

        <div class="login-form">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <h1>Đăng nhập vào website</h1>
                <div class="input-box">
                    <input type="text" name="userName" placeholder="Tài khoản" required>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Mật khẩu" required>
                </div>
                <div class="btn-box">
                    <input type="submit" name="" value="Đăng nhập" required>
                </div>
                <?php print $mess ?>
            </form>
        </div>
        <button onclick="w3.removeClass('#dn','sign_in')">Đăng Ký</button>
    </div>

    <div  class="container sign_up ">
        <div class="login-form">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <h1>Đăng ký tài khoản</h1>
                <div class="input-box">
                    <input type="text" name="userName" placeholder="Nhập tài khoản" required>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Nhập mật khẩu" required>
                </div>
                <div class="input-box">
                    <input type="password" name="checkPassword" placeholder="Xác nhận mật khẩu" required>
                </div>
                <div class="btn-box">
                    <input type="submit" name="" value="Đăng ký" >
                </div>
                <?php print $mess; ?>
            </form>
        </div>
        <button onclick="w3.addClass('#dn','sign_in')">Đăng Nhập</button>
    </div>



</main>
<?php
include 'footer.php';
?>
</body>

</html>
