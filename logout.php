<!--here this php code used for logging out, it will unset session value-->
<?php

//Start session
session_start();
//Unset the variables stored in session
unset($_SESSION['SESS_USER_ID']);
unset($_SESSION['SESS_FIRST_NAME']);
unset($_SESSION['SESS_LAST_NAME']);
header('Location: index.php');
exit();
?>
