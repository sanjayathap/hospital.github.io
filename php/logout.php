<?php 

session_start();
session_unset();
session_destroy();

header("Location:123.php");

?>