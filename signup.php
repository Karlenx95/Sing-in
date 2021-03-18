<link rel="stylesheet" type="text/css" href="style.css">

<?php
include_once 'header.php';

echo "<div class='main'> <h3> Sign up Form </h3>";

$error = $user = $pass = "";

if (isset($_SESSION['user'])) destroySession();

  if (isset($_POST['user'])){
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);


    if ($user == "" || $pass == ""){                             //if username or password  doesn't exist send message
      $error = "Not all fields were entered <br><br>";
    } else {                                                     // take db date about user
        $query = "SELECT * FROM members WHERE user = '$user'";
      }

    if (mysqli_num_rows(queryMysql($query))){                    //check that user already create
      $error = "That username already exists <br><br>";
    } else {                                                       //add new user in db
        $query = "INSERT INTO `members` (`user`, `pass`) VALUES('$user', '$pass')";
        queryMysql($query);

          die("<h4> Account created </h4> Please Log in.");
    }
}
//Sing up from
echo <<<_END
<form method='post' action='signup.php'>
  Username <input type = 'text' maxlength = '16' name = 'user' value = '$user' onBlur='checkUser(this)'/><span id = 'info'></span><br><br>
  Password <input type = 'text' maxlength = '16' name = 'pass' value = '$pass' /><br><br>
  <input type = 'submit' value = 'Signup'>
</form>
_END;
?>
