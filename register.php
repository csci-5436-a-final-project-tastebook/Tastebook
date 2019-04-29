<?php
  // Connect to database
  $db = mysqli_connect('localhost', 'root', 'Landon10000', "tastebook");

  // Check if register button was clicked
  if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    // Checks that the fields are not empty
    if (empty($email) || empty($username) || empty($password_1) || empty($password_2)) {
      header("Location: tasteBook-Main.php?error=emptyfields&mail=".$email."&name=".$username);
      exit();
    }

    // Checks if both email and username is valid
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match(("/^[a-zA-Z0-9]*$/"), $username)) {
      header("Location: tasteBook-Main.php?error=invalidmailname");
      exit();
    }

    // Checks for a valid email
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: tasteBook-Main.php?error=invalidmail&name=".$username);
      exit();
    }

    // Checks for a valid username
    else if (!preg_match(("/^[a-zA-Z0-9]*$/"), $username)) {
      header("Location: tasteBook-Main.php?error=invalidname&mamil=".$email);
      exit();
    }

    // Checks if both passwords are the same
    else if ($password_1 != $password_2) {
      header("Location: tasteBook-Main.php?error=passwordmatch&mail=".$email."&name=".$username);
      exit();
    }

    else {
      $sql = "SELECT userName FROM useraccount WHERE userName = ?";
      $statement = mysqli_stmt_init($db);

      if (!mysqli_stmt_prepare($statement, $sql)) {
        header("Location: tasteBook-Main.php?error=sqlerror");
        exit();
      }

      else {
        $password = $password_1;
        // Insert account into database
        mysqli_query($db, "INSERT INTO useraccount(userName, userEmail, userPassword) VALUES ('$username', '$email', '$password')");

        // Create profile for created account
        mysqli_query($db, "INSERT INTO profile(userName, numLiked, numSubmitted) VALUES ('$username', 0, 0)");

        // Redirect to main page
        header("Location: tasteBook-Main.php?register=success");
        exit();
      }
    }
  }
?>
