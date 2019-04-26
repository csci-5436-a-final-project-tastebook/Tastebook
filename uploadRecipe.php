<?php
  // Connect to database
  session_start();
  $db = mysqli_connect('localhost', 'root', 'Landon10000', "tastebook");

  // Check if upload button was clicked
  if (isset($_POST['upload'])) {
    $title = $_POST['title'];
    $creator = $_POST['creator'];
    $description = $_POST['description'];
    $ingredients = $_POST['ingredients'];
    $directions = $_POST['directions'];
    $extras = $_POST['extras'];
    $date = date('Y-m-d H:i:s');

      mysqli_query($db, "INSERT INTO recipe(recipeName, creator, description, ingredients, directions, extras)
      VALUES ('$title', '$creator', '$description', '$ingredients', '$directions', '$extras')");

      if (isset($_SESSION['userID'])) {
        $userID = $_SESSION['userID'];

        // Inserts recipeMetaData into database
        mysqli_query($db, "INSERT INTO recipemetadata(recipeName, userName, numLike, uploadDate)
        VALUES ('$title', '$userID', 0, '$date')");

        // Update user Profile
        mysqli_query($db, "UPDATE profile SET numSubmitted = numSubmitted + 1 WHERE userName = '".$userID."'");
      }

      header("Location: {$_SERVER["HTTP_REFERER"]}");

    }

?>
