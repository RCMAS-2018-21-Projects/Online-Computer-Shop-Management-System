<?php

session_start();
require('conn.php');

unset($_SESSION['Username']);
unset($_SESSION['cart']);



header("location:log.php");

?>