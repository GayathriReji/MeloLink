<?php
session_start();
if(!(isset($_SESSION['sid']) && !empty($_SESSION['uid']))){
    header("location: ../Guest/Login.php");
}