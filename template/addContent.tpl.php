<?php

// template: top menu (temp)
include("./template/_top-menu.tpl.php");

echo "Create a new content";

echo "<br/>";

?>
<form action="" method="post">
  <input placeholder="Name" type="text" name="name"><br>
  <textarea placeholder="Text..." resize="both" name="data"></textarea><br>
  <select name="id">
    <option value="">--Please choose a content type--</option>
    <?php
    for ($i = 0; $i < count($data); $i++) {
      echo "<option value='" . $data[$i]['id_content_type'] . "'>" . $data[$i]['name'] . "</option>";
    }
    ?>
  </select>
  <br/>
  <input type="submit" name="add_content" value="Add">
  <a href="index.php?page=admin">Cancel</a>
</form>

<?
// echo $data;
