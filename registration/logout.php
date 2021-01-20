<?php
require_once "server.php";
session_start();
$_SESSION = array();
unset($_SESSION);
session_destroy();
header("Location: registration/login.php");