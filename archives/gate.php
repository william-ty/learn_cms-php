<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
  case '':
  case '/':
      require __DIR__ . '/welcome.php';
      break;
  case '/admin':
      require __DIR__ . '/admin.php';
      break;
  default:
      http_response_code(404);
      require __DIR__ . '/404.html';
      break;
}