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

    <!-- Font Awesone CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- styles CSS -->
    <link rel="stylesheet" href="styles.css">

    <title>TasteBook</title>
  </head>

  <body class="background_image_2" style="height: 100%">

    <!-- Center container vertically -->
    <div class="vertical-center">
      <div class="container">

      <!-- Center contains of container and colors border -->
      <div class="flex-container" style="margin: 120px; background-color:  #a1b1cc; opacity: .90; padding: 20px; border-radius: 10px">
        <h1 align="center">TasteBook</h1>

        <!-- Search bar -->
        <div class="input-group" style="margin-bottom: 25px">

            <form action="" method="get" class="input-group">
              <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="Searchbar" id="Searchbar">

              <!-- Search icon -->
              <span class="input-group-append" type="button" onclick="location.href = 'displayRecipe.php';" id="SearchIcon">
                  <div class="input-group-text bg-transparent"><i class="fa fa-search"></i></div>
              </span>
            </form>

            <?php
              if (isset($_GET['Searchbar'])) {
                $_SESSION['term'] = $_GET['Searchbar'];
                header("Location: displayRecipe.php?Search=" .$_SESSION['term']);
              }
             ?>

        </div>

        <!-- Checks if the user is currently logged in -->
        <?php
          if (isset($_SESSION['userID'])) {
            // Log out Button and Submit Recipe Button
            echo '<div style="display: inline-block">
                    <form action="logout.php" method="post">
                      <button class="btn btn-primary" type="button" id="Submit" style="margin-right: 10px">Submit Recipe</button>
                      <button class="btn btn-primary" type="button" style="margin-right: 10px" id="Profile">Profile</button>
                      <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#popUpWindowLogout">Logout</button>
                    </form>
                  </div>';
          }

          else {
            // Log in Button and Register
            echo '<div style="display: inline-block">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#popUpWindowLogin" style="margin-right: 10px">Log in</button>
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#popUpWindowRegister">Register</button>
                  </div>';
          }
        ?>

      </div>
    </div>

    <!-- Log in Modal -->
    <div class="modal fade" id="popUpWindowLogin">
      <div class="modal-dialog">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
              <h1>Log in</h1>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Body -->
            <div class="modal-body">
              <form role="form" action="login.php" method="post">

                <!-- Display error messages for register form -->
                <?php
                  if (isset($_GET['error'])) {

                    // Error message for empty fields
                    if ($_GET['error'] == "emptyfields") {
                      echo '<p style="color: #f45353"> Please fill out all fields. </p>';
                    }

                    // Error message for invalid credentials
                    if ($_GET['error'] == "loginfailure") {
                      echo '<p style="color: #f45353"> Failure to log in. </p>';
                    }
                  }
                ?>

                <!-- Email field -->
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Username" width="100%" name="username" id="Username">
                </div>

                <!-- Password field -->
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password" name="password" id="Password">
                </div>

                <!-- Login Button -->
                <button class="btn btn-primary btn-block" name="login">Log in</button>

              </form>
            </div>

        </div>
      </div>
    </div>

    <!-- Create Account Modal -->
    <div class="modal fade" id="popUpWindowRegister">
      <div class="modal-dialog">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
              <h1>Please enter info to create an account:</h1>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Body -->
            <div class="modal-body">
              <form role="form" action="register.php" method="post">

                <!-- Display error messages for register form -->
                <?php
                  if (isset($_GET['error'])) {

                    // Error message for empty fields
                    if ($_GET['error'] == "emptyfields") {
                      echo '<p style="color: #f45353"> Please fill out all fields. </p>';
                    }

                    // Error message for password mismatch
                    if ($_GET['error'] == "passwordmatch") {
                      echo '<p style="color: #f45353"> Passwords do not match. </p>';
                    }
                  }
                ?>

                <!-- Email field -->
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Email" width="100%" name="email" id="email">
                </div>

                <!-- Username field -->
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Username" width="100%" name="username" id="username">
                </div>

                <!-- Password field -->
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password" name="password_1" id="password_1">
                </div>

                <!-- Re-enter Password field -->
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Re-enter Password" name="password_2" id="password_2">
                </div>

                <!-- Confirm Button -->
                <button class="btn btn-primary btn-block" name="register" id="register">Confirm</button>

              </form>
            </div>
        </div>
      </div>
    </div>

    <!-- Log out Modal -->
    <div class="modal fade" id="popUpWindowLogout">
      <div class="modal-dialog">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
              <h1>Log out?</h1>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Body -->
            <div class="modal-body">
              <form role="form" action="logout.php" method="post">

                <!-- Login Button -->
                <div style="display: inline">
                  <button class="btn btn-primary btn-block" name="logout">Yes</button>
                  <button class="btn btn-secondary btn-block" data-dismiss="modal" name="logout">No</button>
                </div>

              </form>
            </div>

        </div>
      </div>
    </div>

    <script>

      // Allows user to seach by pressing "Enter" on keyboard
      var Searchbar = document.getElementById("Searchbar");
      Searchbar.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
          document.getElementById("SearchIcon").click();
        }
      });

      // Clicking the submit button takes user to the createRecipe page
      var Submit = document.getElementById("Submit");
      Submit.addEventListener("click", function(event) {
        document.location.href = 'createRecipe.php';
      });

      // Clicking the profile button takes user to the myprofile page
      var Profile = document.getElementById("Profile");
      Profile.addEventListener("click", function(event) {
        document.location.href = 'myprofile.php';
      });

    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
