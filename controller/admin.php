<?php

/***
 * admin controller 
 */

$data = "admin_controller";

// Check user role 
if (isset($_SESSION['user_role'])) {
  if (!$_SESSION['user_role'] === 'admin' || !$_SESSION['user_role'] === 'superadmin') {
    header("Location:index.php?page=home");
  } else {
    loadTemplate('admin', $data);
  }
}
