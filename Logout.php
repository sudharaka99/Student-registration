<?php
include('C:\wamp64\www\Student registration\Config\Constants.php');
$SITEURL = 'http://localhost/Student%20registration/';

session_destroy();

header('location:'.$SITEURL.'index.php');
?>