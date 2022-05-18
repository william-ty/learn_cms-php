<?php

// template: top menu (temp)
include("./template/_top-menu.tpl.php");

$contentType = $data['content_type'];

echo "<br/>";

?>

<form action="" method="post">
  <input value="<?php echo $contentType['name'] ?>" type="text" name="name"><br>
  <br />
  <input type="submit" name="edit_content_type" value="Edit">
  <a href="index.php?page=contentTypes">Cancel</a>
</form>

<?
// echo $data;
