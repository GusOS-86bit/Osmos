<?php
session_start();

if(isset($_SESSION['osmos_userid']))
{
    $_SESSION['osmos_userid'] = NULL;
    unset($_SESSION['osmos_userid']);
}
header("Location: login.php");
die;