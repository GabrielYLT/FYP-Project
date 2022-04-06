<?php
include(dataconnection.php);
session_start();

unset($_SESSION['id']);

session_destroy();

header("location:main.php");
?>