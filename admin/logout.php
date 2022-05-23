<?php
session_start();
if (session_destroy()){
    if (isset($_COOKIE['username'])) {
        unset($_COOKIE['username']);
        setcookie("username", null, -1, '/');
    header('location: index.html');
    }
}
?>