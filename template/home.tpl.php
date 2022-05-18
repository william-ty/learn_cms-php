<?php

// template: top menu (temp)
include("./template/_top-menu.tpl.php");


echo "Welcome to your favourite CMS!";
$isAdmin;

if (!isset($_SESSION['user'])) {
  echo "<br/><a href='index.php?page=register'>Register</a><br/>";
  echo "<a href='index.php?page=login'>Login</a><br/>";
} else {
  echo "<br/>Welcome " . $_SESSION['user'] . " !<br/>";
  $isAdmin = true;
  // echo "<br/><a href='index.php?page=logout'>Logout</a><br/>";

  echo "<br/>";

?>

  <h4><a href="index.php?page=contents">> Contents</a></h4>
  <h4><a href="index.php?page=contentTypes">> Content Types</a></h4>

<?php
}
