<?php
session_start();
unset($_SESSION['usid']);
header('Location: ../../login.php');
?>