<?php
session_start();
if (isset($_SESSION['logined'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.html");
    exit();
} else {
    header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.html");
    exit();
}
?>
