<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
// error_reporting(-1); // includes every error level (E_STRICT, E_NOTICE etc.)

include("session.php");

$userMessage = isset($_SESSION["user"]) ? "Welcome to Novus, {$_SESSION["user"]} !" : "No user found.";

echo $userMessage;

echo "<br/>";
echo "<br/>";

echo "<a href='logout.php'>Logout</a>";
