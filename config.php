<!--here this php code used for connect to database -->

<?php

$con = mysqli_connect("localhost","root","root","errorLogManagement");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>