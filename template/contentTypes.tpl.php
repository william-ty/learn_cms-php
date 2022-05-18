<?php

// template: top menu (temp)
include("./template/_top-menu.tpl.php");

$content_types = $data['content_types'];

$isAdmin;

if (isset($_SESSION['user'])) {
  $isAdmin = true;
}

?>

<h2>Content types</h2>

<?php

if (count($content_types) > 0) {
  foreach ($content_types as $contentType) {
    $contentTypePageName = $contentType['name'];
    $contentTypePageName = str_replace(" ", "", $contentTypePageName);
    $detailsLink = "<a href='index.php?page=detailsContentType&id={$contentType['id_content_type']}'>MORE</a><br/>";
    $editLink = "<a href='index.php?page=editContentType&id={$contentType['id_content_type']}'>EDIT</a>";
    $deleteLink = "<br/><a href='index.php?page=deleteContentType&id={$contentType['id_content_type']}'>DELETE</a><br/>";
    $contentTypeContents = "<a href='index.php?page=contentTypeContents&id={$contentType['id_content_type']}'>CONTENTS</a><br/>";
    echo "_____________________________________________________<br/><br/>";
    echo "<span>Content type name:</span><h3>{$contentType['name']}</h3>";
    // echo "<p>{$contentType['data']}</p>";
    echo $isAdmin ? $detailsLink . $editLink . $deleteLink .$contentTypeContents : "";
  }
} else {
  echo "No content type found";
}
