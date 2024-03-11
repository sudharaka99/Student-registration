<?php

if(!isset($_SESSION['user']))
{
$_SESSION['No_login_massage']= "<b><p style='color:green'>Please Login to access Admin panel.</p></b>";
header('location:'.$SITEURL.'Login.php');
}

?>