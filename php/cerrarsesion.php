<?php
session_start();
unset($_SESSION['Cliente']);
$_SESSION['Cliente'].session_destroy();
header("Location:../Login.php");
?>