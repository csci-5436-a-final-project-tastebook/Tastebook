<?php
  // Connect to database
  $db = mysqli_connect('localhost', 'root', 'Landon10000', "tastebook");

  // Check if login button was clicked
  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($db, "SELECT * FROM useraccount WHERE userName = '$username' AND userPassword = '$password'") or die( mysqli_error($db));;
    $row = mysqli_fetch_array($result);

    if ($row['userName'] == $username && $row['userPassword'] == $password) {
      echo "Success! Welcome, ".$row['userName'];
    }

    else {
      echo "Failure to log in!";
    }
  }
?>
