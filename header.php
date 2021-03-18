<?php
include 'functions.php';

session_start();

if (isset($_SESSION['user'])){                 //Login succeeded or not
    $user = $_SESSION['user'];
    $loggedin = TRUE;
} else {
  $loggedin = FALSE;
}

if ($loggedin) {
    echo "<b> $user </b>:
		 <a href = 'logout.php'> Log out </a>";
} else {
    echo "<a href = 'index.php'> Home </a>
		 <a href = 'signup.php'> Sign up </a>
		 <a href = 'login.php'> Log in </a>";
}
?>
