<?php

/***
 * home controller 
 */

$data = [];

// checkUserSession();

// echo checkUserSession() ? $_SESSION['user'] : "<br/>No user found<br/>";

// echo "<br/>Welcome " . $_SESSION['user'] . " !<br/>";

// echo "<br/><a href='index.php?page=logout'>Logout</a><br/>";



loadTemplate('home', $data);
