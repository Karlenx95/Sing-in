<?php // functions.php
$dbhost  = 'localhost';    // host direction
$dbname  = 'LoginSystem'; // data base name
$dbuser  = 'root';       // db user name
$dbpass  = 'root';      // db password

$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);      //Connection to db
if($connection-> connect_error) die($connection->connect_error);  //Check db connection

function queryMysql($query){                                     //Take db date
  global $connection;
  $result = $connection->query($query);
  if (!$result) die($connection->error);
  return $result;
}

function destroySession(){                                      //End session
  $_SESSION = array();

  if (session_id() != "" || isset($_COOKIE[session_name()]))
    setcookie(session_name(), '', time()-2592000, '/');

  session_destroy();
}

function sanitizeString($var){
  global $connection;
  $var = strip_tags($var);
  $var = htmlentities($var);
  $var = stripslashes($var);
  return $connection->real_escape_string($var);
}
?>
