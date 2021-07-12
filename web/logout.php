<?php
function destroy()
{
                // remove all session variables
                session_unset();

                // destroy the session
                session_destroy();
}
if(empty($_SESSION['check']))
{
    header('Location: index.php');
                      die();
}
?>