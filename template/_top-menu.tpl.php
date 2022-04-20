<?php
echo "<a href='/index.php?page=home'>Home</a>";
echo "<br/>";

// Check user role 
if (isset($_SESSION['user_role'])) {
  if ($_SESSION['user_role'] === "admin") {
    echo "<a href='/index.php?page=admin'>Admin panel</a>";
    echo "<br/>";
  }
}

if (!isset($_SESSION['user'])) {
  echo "<a href='/index.php?page=login'>Login</a>";
  echo "<br/>";
} else {
  echo "<a href='index.php?page=logout'>Logout</a>";
}
echo "<br/>";
echo "__________________________________________________________________________________________________________________________<br/>";
