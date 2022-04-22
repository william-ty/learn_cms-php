<?php

// template: top menu (temp)
include("./template/_top-menu.tpl.php");

$content = $data['content'];
$contentTypes = $data['content_types'];

// var_dump($content['id_content_type']);
// echo "<br/>";
// var_dump( $contentTypes);
// echo "Edit content: " . $content['name'];

echo "<br/>";

?>

<form action="" method="post">
  <input value="<?php echo $content['name'] ?>" type="text" name="name"><br>
  <textarea name="data" resize="both"><?php echo $content['data']?></textarea><br/>
  <select name="id">
    <option value="<?php echo $content['id_content_type'] ?>"><?php echo $content['content_type']['name'] ?></option>
    <?php
    for ($i = 0; $i < count($contentTypes); $i++) {
      if ($content['id_content_type'] !== $contentTypes[$i]['id_content_type'] - 1) {
        echo "<option value='" . $contentTypes[$i]['id_content_type'] . "'>" . $contentTypes[$i]['name'] . "</option>";
      }
    }
    ?>
  </select>
  <br />
  <input type="submit" name="edit_content" value="Edit">
  <a href="index.php?page=home">Cancel</a>
</form>

<?
// echo $data;
