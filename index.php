<?php
// Start session
session_start();

// Display PHP errors
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
// error_reporting(-1); // includes every error level (E_STRICT, E_NOTICE etc.)

// Define files and params
// $not_found_404 = "404.html";
// $page = "page";
// $page_param = "param";
// $controller = "admin";


// Define gloabal variables
$GLOBALS['root_dir'] =  $_SERVER["DOCUMENT_ROOT"];
$GLOBALS['base_dir'] = str_replace(__DIR__, '/', $_SERVER["DOCUMENT_ROOT"]);

// PDO
include("pdo_connect.php");
// Import faker functions and execute fixtures
// include("faker.php");

// $GLOBALS['pdo'] = $pdo;

include("helpers.php");

loadController();

/*****************************************************
 * DEBUG
 */

 // // Path debug
// echo "<br/>";
// var_dump("ROOT DIR: " . $GLOBALS['root_dir']);
// echo "<br/>";
// var_dump("__DIR__: " . __DIR__);
// echo "<br/>";
// var_dump("BASE DIR: " . $GLOBALS['base_dir']);
// echo "<br/>";