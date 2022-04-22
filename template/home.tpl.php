<?php

// template: top menu (temp)
include("./template/_top-menu.tpl.php");

$contents = $data['contents'];

echo "Welcome to your favourite CMS!";
$isAdmin;

if (!isset($_SESSION['user'])) {
  echo "<br/><a href='index.php?page=register'>Register</a><br/>";
  echo "<a href='index.php?page=login'>Login</a><br/>";
} else {
  echo "<br/>Welcome " . $_SESSION['user'] . " !<br/>";
  $isAdmin = true;
  // echo "<br/><a href='index.php?page=logout'>Logout</a><br/>";
  
  echo "<br/>";
  
  
  // echo $data;
  
  ?>
  
  <h2>Contents</h2>
  
  <?php
  if(count($contents) > 0 ) {
    foreach ($contents as $content) {
      $contentPageName = $content['content_name'];
      $contentPageName = str_replace(" ", "", $contentPageName);
      echo "_____________________________________________________<br/><br/>";
      echo "<span>{$content['created_at']} par {$content['firstname']} {$content['lastname']}</span>";
      echo "<h3>{$content['content_name']}</h3>";
      echo "<p>{$content['data']}</p>";
      echo $isAdmin ? "<a href='index.php?page=editContent&id={$content['id_content']}'>EDIT</a><br/><a href='index.php?page=deleteContent&id={$content['id_content']}'>DELETE</a><br/>": "";
    }
  } else {
    echo "No contents found";
  }

}

