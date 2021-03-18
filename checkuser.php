<?php
include_once 'functions.php';

if (isset($_POST['user'])){                              //Check username that it is busy or not
  $user = sanitizeString($_POST['user']);
  $query = "SELECT * FROM members WHERE user = '$user'";

  if (mysqli_num_rows(queryMysql($query))) {
    echo "<span class = 'taken'>;.
			 Already taken</span>";
  } else {
    echo "<span class = 'available'>;.
			 Username available </span>";
  }
}
?>
