<link rel="stylesheet" type="text/css" href="style.css">

<?php
include_once 'header.php';

echo "<div class = 'main'><h3>Please enter your details to log in</h3>";

$error = $user = $pass = "";                                                  // Error condition

if (isset($_POST['user'])){
  $user = sanitizeString($_POST['user']);
  $pass = sanitizeString($_POST['pass']);

  if ($user == "" || $pass == ""){                                           //if username or password  doesn't exist send message
    $error = "Not all fields were entered<br />";
  } else {                                                                    //if the data is complete check that it is true or not
    $query = "SELECT user,pass FROM members WHERE user = '$user' AND pass = '$pass'";

    if (mysqli_num_rows(queryMysql($query)) == 0){                         //if db not date send error
      $error = "<span class = 'error' Username/Password invalid</span><br>";
    } else {
      $_SESSION['user'] = $user;
      $_SESSION['pass'] = $pass;
      die("You are now logged in.");
    }
  }
}
//Login form
echo <<<_END
<form method = 'post' action = 'login.php'>
Username <input type = 'text' maxlength = '50' name = 'user' value = '$user' /><br><br>
Password <input type = 'password' maxlength = '32' name = 'pass' value = '$pass' /><br><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type = 'submit' value = 'Login' />
</form>
_END;
?>

