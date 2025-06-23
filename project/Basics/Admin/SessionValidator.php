<?php
session_start();
if(!(isset($_SESSION['aid']) && !empty($_SESSION['uid']))){
    header("location: ../Guest/Login.php");
}