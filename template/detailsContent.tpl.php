<?php

// template: top menu (temp)
include("./template/_top-menu.tpl.php");

$content = $data['content'];

echo "<br/>";

?>

<div>
  <h3>Content name : <?php echo $content['content_name'] ?></h3>
    <p>Content data : <?php echo $content['data'] ?></p>
    <p>Content type name : <?php echo $content['content_type']['name'] ?></p>
    <p>Creation date : <?php echo $content['created_at'] ?></p>
    <p>Author : <?php echo $content['firstname'] ?> <?php echo $content['lastname'] ?></p>
    <br/>
    <a href="index.php?page=contents">Go back</a>
</div>


