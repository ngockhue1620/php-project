<?php
session_start();
;
function destroy()
{
                // remove all session variables
                session_unset();

                // destroy the session
                session_destroy();
                
}
destroy();
if(empty($_SESSION['user']))
{
	header('Location: ../page/index.php');
                      die();
}

?>