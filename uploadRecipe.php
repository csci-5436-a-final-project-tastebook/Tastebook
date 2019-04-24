<?php
  // Connect to database
  $db = mysqli_connect('localhost', 'root', 'Landon10000', "tastebook");

  // Check if upload button was clicked
  if (isset($_POST['upload'])) {
    $title = $_POST['title'];
    $creator = $_POST['creator'];
    $description = $_POST['description'];
    $ingredients = $_POST['ingredients'];
    $directions = $_POST['directions'];
    $extras = $_POST['extras'];

      mysqli_query($db, "INSERT INTO recipe(recipeName, creator, description, ingredients, directions, extras)
      VALUES ('$title', '$creator', '$description', '$ingredients', '$directions', '$extras')");
      header("Location: {$_SERVER["HTTP_REFERER"]}");
    }
?>
