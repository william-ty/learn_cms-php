<?php

/***
 * logout controller 
 */

$data = "logout_controller";

header("Location:index.php?page=home");

loadTemplate('logout', $data);

session_destroy();
