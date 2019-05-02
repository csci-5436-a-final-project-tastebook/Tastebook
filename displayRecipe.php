<?php
  // Starts session
  session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Font Awesone CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- styles CSS -->
    <link rel="stylesheet" href="styles.css">

    <title>TasteBook</title>
</head>

<body class="background_image_2">

    <!-- Center container vertically -->
    <div class="vertical-center_2">
        <div class="container">

            <!-- Center contains of container and colors border -->
            <div class="flex-container" style="margin-top: 120px; margin-left: 120px; margin-right: 120px; background-color: #a1b1cc; opacity: .90; padding: 20px; border-radius: 10px">

                <?php
                  // Connect to database
                  $db = mysqli_connect('localhost', 'root', 'Landon10000', "tastebook");

                  // Fetches all attributes of inputted recipe
                  $queryRecipe = "SELECT * FROM Recipe WHERE recipeName = '" . $_SESSION['term'] . "'";
                  $resultRecipe = mysqli_query($db, $queryRecipe);

                  if ((mysqli_num_rows($resultRecipe) == 0)) {
                    echo 'Unforunately, the recipe '.$_SESSION['term'].' was NOT found.';
                    exit();
                  }

                  else {

                    $rowRecipe = mysqli_fetch_array($resultRecipe);
                    $_SESSION['recipeName'] = $rowRecipe['recipeName'];

                    // Fetches all attributes of comments associated with this recipe
                    $queryComment = "SELECT * FROM comment WHERE recipeName = '" . $_SESSION['term'] . "' ORDER BY date desc";
                    $resultComment = mysqli_query($db, $queryComment);

                  }

                ?>

                  <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputTitle4">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value=<?php echo $rowRecipe['recipeName'];?> readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputCreator4">Creator</label>
                            <input type="text" class="form-control" id="creator" name="creator" value=<?php echo $rowRecipe['creator'];?> readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputDescription">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value=<?php echo $rowRecipe['description'];?> readonly>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputIngredients">Ingredients</label>
                            <textarea type="text" form="form" class="form-control" id="ingredients" name="ingredients" readonly><?php echo $rowRecipe['ingredients'];?></textarea>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputDirections">Directions</label>
                            <textarea type="textarea" form="form" class="form-control" id="directions" name="directions" readonly><?php echo $rowRecipe['directions'];?></textarea>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="inputExtras">Extras</label>
                            <textarea type="text" form="form" class="form-control" id="extras" name="extras" readonly><?php echo $rowRecipe['extras'];?></textarea>
                        </div>

                    </div>

                      <button class="btn btn-secondary" onclick="location.href = 'tasteBook-Main.php';" style="margin-right: 10px">Back</button>

                      <form action="" method="post" class="input-group" style="display: inline;">
                        <button id="like-btn" class="btn btn-primary" name="Like" style="margin-right: 10px">Like</button>
                      </form>

                      <form action="" method="post" class="input-group" style="display: inline;">
                        <button id="favorite-btn" class="btn btn-primary" name="Favorite" style="margin-right: 10px">Favorite</button>
                      </form>


                    <?php
                      if (isset($_POST['Like'])) {
                        // Update recipemetadata to show number of likes
                        mysqli_query($db, "UPDATE recipemetadata SET numLike = numLike + 1 WHERE recipeName = '".$_SESSION['recipeName']."'");

                        // Update user profile that they haved liked a recipe
                        mysqli_query($db, "UPDATE profile SET numLiked = numLiked + 1 WHERE userName = '".$_SESSION['userID']."'");
                      }
                     ?>

                     <?php
                       if (isset($_POST['Favorite'])) {
                         // Update recipemetadata to show number of likes
                         mysqli_query($db, "UPDATE recipemetadata SET numLike = numLike + 1 WHERE recipeName = '".$_SESSION['recipeName']."'");
                       }
                      ?>

                </form>
            </div>

            <?php
            // Adds the ability for the user to comment if logged in
            if (isset($_SESSION['userID'])) {
              echo '<div class="flex-container" style="margin-top: 25px; margin-left: 120px; margin-right: 120px; background-color: #a1b1cc; opacity: .90; padding: 20px;border-radius: 10px">
                      <h2 align="center">Comments</h2>

                        <form id="form" role="form" action="uploadComment.php" method="post">
                          <textarea type="text" form="form" class="form-control" id="comment" name="comment" required spellcheck="true" placeholder="Write a comment..."></textarea>
                          <button id="comment-btn" class="btn btn-primary" name="btn-comment" style="margin-top: 10px">Comment</button>
                        </form>
                    </div>';
            }

            if ($_SESSION['recipeName']) {
              if ((mysqli_num_rows($resultComment) != 0)) {
                while ($rowComment = mysqli_fetch_array($resultComment)) {
                  echo '<div class="flex-container" style="margin-top: 10px; margin-left: 120px; margin-right: 120px; background-color: #a1b1cc; opacity: .90; padding: 20px;border-radius: 10px">
                            <div class="media-body">
                              <strong class="text-info" style="margin-left: 5px"><font size="5" color="#e24d4d">'.$rowComment['userName'].'</font></strong>
                                <small style="float: right; margin-right: 10px"><font size="3">'.$rowComment['date'].'</font></small>
                                <textarea type="text" form="form" class="form-control" style="margin-top: 10px" readonly>'.$rowComment['comment'].'</textarea>
                            </div>
                      </div>';
                  }
                }
            } ?>

        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
