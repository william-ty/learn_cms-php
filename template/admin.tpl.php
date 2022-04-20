<?php

// template: top menu (temp)
include("./template/_top-menu.tpl.php");

echo "Welcome to the admin panel.";

echo "<br/>";

echo "<a href='/index.php?page=addContent'>Add new content</a>";

echo "<br/>";

echo "<a href='/index.php?page=addContentType'>Add new content type</a>";

echo "<br/>";

echo $data;