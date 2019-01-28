<?php
session_start();
if (isset($_COOKIE['user_cookie']) || isset($_SESSION['user_session'])) {
    session_unset();
    session_destroy();
    unset($_COOKIE['user_cookie']);
    setcookie('user_cookie', '', time() - 3600, '/'); // add a old timestamp 
}
header('Location: index.php');
?>