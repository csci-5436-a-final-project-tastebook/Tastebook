<?php
  // Connect to database
  session_start();
  $db = mysqli_connect('localhost', 'root', 'Landon10000', "tastebook");

  // Check if upload button was clicked
  if (isset($_POST['btn-comment'])) {
    if (isset($_SESSION['userID'])) {
      $userID = $_SESSION['userID'];
      $recipeName = $_SESSION['recipeName'];
      $comment = $_POST['comment'];
      $date = date('Y-m-d H:i:s');

      mysqli_query($db, "INSERT INTO comment(recipeName, userName, comment, date)
      VALUES ('$recipeName', '$userID', '$comment', '$date')");

      header("Location: displayRecipe.php?Comment=success");

    }

  }

?>
