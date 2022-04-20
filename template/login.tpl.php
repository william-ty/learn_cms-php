<?php

// template: top menu (temp)
include("./template/_top-menu.tpl.php");

echo "Please enter your username and password to login.";

echo "<br/>";

?>

<form action="" method="post">
  Email address: <input type="text" name="email"><br>
  Password: <input name="password" type="password"><br>
  <input type="submit" name="login" value="Login">
</form>

<div>No account yet?<a href="index.php?page=register">Register</a></div>
<?
echo $data;
