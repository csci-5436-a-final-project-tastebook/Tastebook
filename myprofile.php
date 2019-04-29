<?php
  // Starts session
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	   <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- styles CSS -->
    <link rel="stylesheet" href="styles.css">

	<title>Your Profile</title>
</head>

  <body class="background_image_2" style="height: 100%">
    <!-- Center container vertically -->
    <div class="top-center">
      <div class="container">

	       <!-- Center contains of container and colors border -->
      <div class="flex-container" style="margin: 5px; background-color:  #a1b1cc; opacity: .90; padding: 10px; border-radius: 10px">
        <h1 align="center">Your Profile</h1>

          <div style="display: inline-block">
            <form action="logout.php" method="post">
              <button class="btn btn-primary" type="button" onclick="location.href = 'tasteBook-Main.php';">Home</button>
              <button class="btn btn-secondary" name="logout">Log out</button>
            </form>
          </div>
	    </div>

    <div class="flex-container" style="margin: 5px; margin-top: 20px; height: 500px;background-color: #a1b1cc; opacity: .90; padding: 10px; border-radius:10px">

      <!-- Display logged in username -->
      <h1 align="left">Welcome, <?php echo $_SESSION['userID'];?>!</h1>

        <body>
          <p align="left">Your Favorite Recipes:</p>
          <!-- if/when feature is added container here which will contain any recipes favorited by user -->
        </body>
    </div>
	  </div>
	</div>


	<!-- Div for "favorited" recipes when feature is added -->

</body>
</html>
