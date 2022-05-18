<?php

// template: top menu (temp)
include("./template/_top-menu.tpl.php");

$contents = $data['contents'];

$isAdmin;

if (isset($_SESSION['user'])) {
  $isAdmin = true;
}

?>

<h2>Contents</h2>

<?php

if (count($contents) > 0) {
  foreach ($contents as $content) {
    $contentPageName = $content['content_name'];
    $contentPageName = str_replace(" ", "", $contentPageName);
    $detailsLink = "<a href='index.php?page=detailsContent&id={$content['id_content']}'>MORE</a><br/>";
    $editLink = "<a href='index.php?page=editContent&id={$content['id_content']}'>EDIT</a>";
    $deleteLink = "<br/><a href='index.php?page=deleteContent&id={$content['id_content']}'>DELETE</a><br/>";
    echo "_____________________________________________________<br/><br/>";
    echo "<span>{$content['created_at']} par {$content['firstname']} {$content['lastname']}</span>";
    echo "<h3>{$content['content_name']}</h3>";
    // echo "<p>{$content['data']}</p>";
    echo $isAdmin ? $detailsLink . $editLink . $deleteLink  : "";
  }
} else {
  echo "No contents found";
}
