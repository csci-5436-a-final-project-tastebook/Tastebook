<?php
  // Connect to database
  $db = mysqli_connect('localhost', 'root', 'Landon10000', "tastebook");

  // Check if login button was clicked
  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Checks if any fields are empty
    if (empty($username) || empty($password)) {
      header("Location: tasteBook-Main.php?error=emptyfields&name=".$username."&password=".$password);
      exit();
    }

    $result = mysqli_query($db, "SELECT * FROM useraccount WHERE userName = '$username' AND userPassword = '$password'") or die( mysqli_error($db));;
    $row = mysqli_fetch_array($result);

    if ($row['userName'] == $username && $row['userPassword'] == $password) {
      session_start();
      $_SESSION['userID'] = $row['userName'];

      header("Location: tasteBook-Main.php?login=success");
      exit();
    }

    else {
      header("Location: tasteBook-Main.php?error=loginfailure");
      exit();
    }
  }
?>
