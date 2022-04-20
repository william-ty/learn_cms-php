<!-- <?php

// Display PHP errors
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
// error_reporting(-1); // includes every error level (E_STRICT, E_NOTICE etc.)

// Define files and params
$not_found_404 = "404.html";
$page = "page";
$page_param = "param";

$root_dir = $_SERVER["DOCUMENT_ROOT"];
$base_dir = str_replace(__DIR__, '/', $_SERVER["DOCUMENT_ROOT"]);

// var_dump($root_dir);
// var_dump($_SERVER["DOCUMENT_ROOT"]);
// var_dump(__DIR__);
// var_dump($base_dir);
/*
http://novus.local?page=admin
http://novus.local?page=admin&tpl=main
*/

// Serve page content
function servePage($page = null)
{
  $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
  $file = $rootDir;
  $file .= '/' . $page . '.php';
  echo $file;
  return file_exists($file) && include($file);
}


servePage("admin");



// Dispatch Http request to controllers
/*
if(isset($_GET[$page])) {
  servePage("/".$_GET[$page]."/".$_GET[$page].".php");
} else {
  servePage($not_found_404);
};

*/