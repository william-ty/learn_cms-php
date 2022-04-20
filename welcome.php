<?php

include("session.php");

$userMessage = isset($_SESSION["user"]) ? "Welcome to Novus, {$_SESSION["user"]} !" : "No user found.";
echo $userMessage;
