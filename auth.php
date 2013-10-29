<!--here this php code used for whether user is logged in or not, It will be add all page, where page will be related to login-->
<?php

//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['SESS_USER_ID']) || (trim($_SESSION['SESS_USER_ID']) == '')) {
    header("location: index.php");
    exit();
}
?>
