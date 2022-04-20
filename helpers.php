<?php

// Check if user is in session
function checkUserSession()
{
  if (!isset($_SESSION['user'])) {
    header("Location:index.php?page=login");
  } else {
    return true;
  }
}

// Load controller
function loadController()
{
  $pdo = $GLOBALS['pdo'];
  $file = $GLOBALS["root_dir"];
  if (isset($_GET) and $_GET !== "") {
    if (isset($_GET["page"]) and $_GET["page"] !== "") {
      $page = $_GET["page"];
      $file .= "/controller/" . $page . ".php";
      $file = file_exists($file) ? $file : $GLOBALS["root_dir"] . "/controller/404.php";
    } elseif ($_SERVER["REQUEST_URI"] === "/") {
      $file .= "/controller/home.php";
    } else {
      $file .= "/controller/404.php";
    }
  } else {
    $file .= "/controller/404.php";
  }

  /*Debug*/
  // echo "<br/>___________________________________<br/>";
  // echo "CONTROLLER SERVED: " . $file;

  file_exists($file) && include($file);
}


// Load template
function loadTemplate($filePath, $data)
{
  $file = $GLOBALS['root_dir'];
  $file .= '/template/' . $filePath . '.tpl.php';

  /*Debug*/
  // echo "<br/>___________________________________<br/>";
  // echo "TEMPLATE SERVED: " . $file;

  file_exists($file) && include($file);
}


// // PDO Function
// function pdo($pdo, $sql, $args = NULL)
// {
//   if (!$args) {
//     return $pdo->query($sql);
//   }
//   $stmt = $pdo->prepare($sql);
//   $stmt->execute($args);
//   return $stmt;
// }

function pdoStatementToJson($stmt)
{
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $json = json_encode($results);
  echo $json;
}
