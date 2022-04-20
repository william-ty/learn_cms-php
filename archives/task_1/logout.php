<?php
include("session.php");

echo "This route destroys the session.<br/>";

// remove session data
if (isset($_SESSION["user"])) {
  unset($_SESSION["user"]);
  // destroy the session
  session_destroy();
  echo "Session has been destroyed.";
}

echo "<br/>";
echo "<br/>";

echo "<a href='index.php'>Return home</a>";
