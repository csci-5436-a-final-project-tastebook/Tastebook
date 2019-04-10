<?php
  // Connect to database
  $db = mysqli_connect('localhost', 'root', 'Landon10000', "tastebook");

  // Check if register button was clicked
  if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    if ($password_1 == $password_2) {
      $password = $password_1;
      mysqli_query($db, "INSERT INTO useraccount(userName, userEmail, userPassword) VALUES ('$username', '$email', '$password')");
      header("Location: {$_SERVER["HTTP_REFERER"]}");
    }
  }
?>
