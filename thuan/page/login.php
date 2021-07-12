<?php
include '../function/page/loginManager.php';
$Users =new Users();
session_start();
	
$mess=null;

	if(!empty($_POST['passwordcheck']))
	{
		if($_POST['passwordcheck']==$_POST['password'])
		{
			if($Users->insert($_POST['userName'],$_POST['password']))
				{
					$mess ='Tạo Tài Khoản Thành Công';
					
				}
			else{
				$mess="Tên Đăng Nhập Đã tồn Tại";
			}	
		}
		else
		{
			$mess="Nhập Khẩu không trùng khớp";
		}	
		$GLOBALS['value'] ="Sign Up";
 		$GLOBALS['check_value']="Sign In";
	}
	else
	{	
		if(!empty($_POST['userName']))
		{
			if( !empty( $Users->checkuserlogin($_POST['userName'],$_POST['password'])[0] )    )
					{
						
						$_SESSION['user']=$_POST['userName'];
						$_SESSION['CustomerId']=$Users->checkuserlogin($_POST['userName'], $_POST['password'])[0];
						if($Users->checkuserlogin($_POST['userName'], $_POST['password'])[1] =='user')
            			{
                			header('Location: index.php');
                			die();
            			}  
            			else if($Users->checkuserlogin($_POST['userName'], $_POST['password'])[1]=='admin')
           				 {	
           				 	$_SESSION['admin']='admin';
                			header('Location: ../adminpage/menu.php');
                			die();
            			}  
					}
			else{
					$mess="Sai Tài Khoản Hoặc Mật Khẩu";
			}
		}	
		$GLOBALS['value'] ="Sign In";
 		$GLOBALS['check_value']="Sign Up";	
	}


if((empty($check_value) || empty($value)) && empty($_POST['userName']))
{
	$GLOBALS['value'] ="Sign In";
 	$GLOBALS['check_value']="Sign Up";
}


	if(!empty($_POST['checklogin']) &&$_POST['checklogin']=="Sign In" && empty($_POST['userName'])  )
	{
		$check_value="Sign Up";
		$value      ="Sign In";
	}
	
	if(!empty($_POST['checklogin']) &&$_POST['checklogin']=="Sign Up" &&empty($_POST['userName']))
	{
		$check_value="Sign In";
		$value      ="Sign Up";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>	</title>
	<link rel="stylesheet" type="text/css" href="	../style/login.css">
</head>
<body>
<div class="container">	
	<?php if($value=="Sign In") {?>
		<div class="sign_in">
				<form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post"> 
					<h1>	Sign In</h1>
					<input  type="text" name="userName" placeholder="User Name"><br>	
					<input type="password" name="password" placeholder=" Password" required><br>	
					<input type="submit" name="" value="Sign In" id="singin_button" required><br>	
					<?php print $mess ?>
				</form>	

		</div >
	<?php } else {?>	
		<div class="sign_up">	
				<form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<h1>	Sign Up</h1>
				   <input type="text" name="userName" placeholder="User Name" required><br>	
				   <input type="password" name="password" placeholder=" Password" required><br>	
				   <input type="password" name="passwordcheck" placeholder="Check Password" required><br>	
				   <input type="submit" name="" value="Sing Up" id="singin_button">
				   <?php print $mess; ?>
				</form>	
		</div>
	<?php } ?>	
		<div class="right">	
				<form class="changeform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 

					<input type="hidden" name="checklogin" value="<?php  print($check_value)?>">
					<input type="submit" name="" value="<?php print $check_value?>">
				</form>
				<button><a href="	index.php">Trang Chủ</a></button>
		</div>

</div>

</body>
</html>