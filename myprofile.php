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
		      <body>
			         <div class="d1" style="margin-top: -70px; float: right; display: inline">

                 <button class="btn btn-primary btn-block" onclick="location.href = 'tasteBook-Main.php';">Home</button>

                   <form role="form" action="logout.php" method="post" style="display: inline">
                    <button class="btn btn-secondary btn-block" name="logout">Log out</button>
                  </form>

			         </div>
	        </body>
	    </div>

    <div class="flex-container" style="margin: 5px; margin-top: 20px; height: 500px;background-color: #a1b1cc; opacity: .90; padding: 10px; border-radius:10px">

      <!-- Display logged in username -->
      <h1 align="left">Welcome, <?php echo $_SESSION['userID'];?>!</h1>

        <body>
		  <p align = "right"> Recipes Submitted: <?php  $profileNumSub = mysqli_query($db, "SELECT numSubmitted FROM Profile WHERE userName = '$userID'"); echo $_SESSION[$profileNumSub];?> </p>
          <p>Your Favorite Recipes:</p>
          <!-- if/when feature is added container here which will contain any recipes favorited by user -->
		  <?php echo $_SESSION[''];?>
        </body>
    </div>
	  </div>
	</div>

	<!-- Div for "favorited" recipes when feature is added -->

</body>
</html>
