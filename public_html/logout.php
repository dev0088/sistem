<?php

ob_start();

session_start();

require_once("lib/config.php");

$page_title = "Logout";

require_once("inc/config.ui.php");

session_destroy();

if (isset($_COOKIE['pro_users'])) {

    unset($_COOKIE['pro_users']);

    setcookie('pro_users', '', time() - 3600, '/'); // empty value and old timestamp

}



header('Location:' . APP_URL . 'login.php');

exit();

?>