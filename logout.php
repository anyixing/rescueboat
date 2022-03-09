<?php
session_start();
if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='login.php';</script>";
    header("Location: login.php");
}
else {
    session_destroy();
    echo "<script>window.location.href='login.php';</script>";
    header("Location: login.php");
}

?>