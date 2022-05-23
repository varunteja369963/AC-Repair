<?php
include_once('conn.php');
	session_start();
    if (isset($_COOKIE['username'])) {
        if (isset($_SESSION['username'])) {
            return true;
        }
        else {
            $_SESSION['username'] = $_COOKIE['username'];
        }
    }
    else {
        header("location: index.html");
    }
?>