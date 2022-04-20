<?php

// template: top menu (temp)
include("./template/_top-menu.tpl.php");

echo "Create a new content type";

echo "<br/>";

?>

<form action="" method="post">
  <input placeholder="Name" type="text" name="name"><br>
  <input type="submit" name="add_content_type" value="Add">
  <a href="index.php?page=admin">Cancel</a>
</form>

<?
echo $data;
