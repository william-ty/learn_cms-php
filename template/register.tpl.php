<?php

// template: top menu (temp)
include("./template/_top-menu.tpl.php");

echo "Please enter your username and password to register.";

echo "<br/>";

?>

<form action="" method="post">
  <input placeholder="Lastname" type="text" name="lastname"><br>
  <input placeholder="Firstname" type="text" name="firstname"><br>
  <input placeholder="Email address" type="text" name="email"><br>
  <input placeholder="Password" type="password" name="password"><br>
  <input placeholder="Confirm Password" type="password" name="password_check"><br>
  <input type="submit" name="register" value="Register">
</form>
<p>Password must be 8 characters long, contain a number, an uppercase letter and a special charcater.</p>

<?
echo $data;

