<?php

// template: top menu (temp)
include("./template/_top-menu.tpl.php");

$contentType = $data['content_type'];

$isAdmin;

if (isset($_SESSION['user'])) {
  $isAdmin = true;
}

echo "<br/>";

?>

<div>
  <h3>Content type name : <?php echo $contentType['name'] ?></h3>
    <br/>
    <a href="index.php?page=contentTypes">Go back</a>
    <?php
        $editLink = "<a href='index.php?page=editContentType&id={$contentType['id_content_type']}'>EDIT</a>";
        $deleteLink = "<br/><a href='index.php?page=deleteContentType&id={$contentType['id_content_type']}'>DELETE</a><br/>";
        $contentTypeContents = "<a href='index.php?page=contentTypeContents&id={$contentType['id_content_type']}'>CONTENTS</a><br/>";
        echo "<br/>_____________________________________________________<br/><br/>";
        echo "<span>Content type name:</span><h3>{$contentType['name']}</h3>";
        // echo "<p>{$contentType['data']}</p>";
        echo $isAdmin ? $editLink . $deleteLink .$contentTypeContents : "";
    ?>
</div>


