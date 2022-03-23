<?php 
//error reporting on with 100
error_reporting(100);
// Database Connection 
$mysqli = new mysqli("localhost","root","","db_vub");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

//Session start check and start
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// get session flag variable
$login_key_ = '';
$login_id_ = '';
$login_name_ = '';
$login_username_ = '';
$token_id_ = '';

// if session will create to store variable
if (isset($_SESSION["login_key"])) {
  $login_key_ = $_SESSION["login_key"];
  $login_id_ = $_SESSION["login_id"];
  $login_name_ = $_SESSION["login_name"];
  $login_username_ = $_SESSION["login_username"];
  $token_id_ = $_SESSION["token_id"];
}

// logout session destroy and unset
if (isset($_GET['logout'])) {
  session_destroy();
  session_unset();
  header("Location:login.php");
}

// String limited for display function create
function textShorten($text, $limit = 60) {
    $text = strip_tags($text);
    $text = $text. " ";
    $text = substr($text, 0, $limit);
    $text = substr($text, 0, strrpos($text, ' '));
    $text = $text."...";
    return $text;
   }

// Integer parameter validation
 function validInt($data) {
  $data = preg_replace('/[^0-9]/', '', $data); // Allow only number
  $data = preg_replace('/\D/', '', $data); // Allow only number
  $data = (int)$data; // Convert number  
  return $data;
}  

// Extracting page names from website URLs Like login.php 
 $page_name = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style type="text/css">
      body{
        font-family: Helvetica, sans-serif;
      }
      .mdimranhosen_s1 {margin:10px 5px;}
      .form-check .form-check-input{margin-left: -0.5em;}
    </style>
    <title>Web Application Security</title>
  </head>
  <body style="background-image: url('img/bg.png');">
   

