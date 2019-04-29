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
            <div class="flex-container"
                style="margin-top: 120px; margin-left: 120px; margin-right: 120px; background-color: #a1b1cc; opacity: .90; padding: 20px; border-radius: 10px">

                <?php
                  // Connect to database
                  $db = mysqli_connect('localhost', 'root', 'Landon10000', "tastebook");

                  // Fetches all attributes of inputted recipe
                  $query = "SELECT * FROM Recipe WHERE recipeName = '" . $_SESSION['term'] . "'";
                  $result = mysqli_query($db, $query);
                  $row = mysqli_fetch_array($result);

                  $_SESSION['recipeName'] = $row['recipeName'];
                ?>

                  <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputTitle4">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value=<?php echo $row['recipeName'];?> readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputCreator4">Creator</label>
                            <input type="text" class="form-control" id="creator" name="creator" value=<?php echo $row['creator'];?> readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputDescription">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value=<?php echo $row['description'];?> readonly>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputIngredients">Ingredients</label>
                            <textarea type="text" form="form" class="form-control" id="ingredients" name="ingredients" readonly><?php echo $row['ingredients'];?></textarea>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputDirections">Directions</label>
                            <textarea type="textarea" form="form" class="form-control" id="directions" name="directions" readonly><?php echo $row['directions'];?></textarea>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="inputExtras">Extras</label>
                            <textarea type="text" form="form" class="form-control" id="extras" name="extras" readonly><?php echo $row['extras'];?></textarea>
                        </div>

                    </div>
                    <button class="btn btn-secondary" onclick="location.href = 'tasteBook-Main.php';" style="margin-right: 10px">Back</button>
                    <button id="like-btn" class="btn btn-primary" name="Like" style="margin-right: 10px">Like</button>
                    <button id="favorite-btn" class="btn btn-primary" name="Favorite" style="margin-right: 10px">Favorite</button>

                </form>
            </div>

            <?php
            if (isset($_SESSION['userID'])) {
              echo ' <div class="flex-container" style="margin-top: 25px; margin-left: 120px; margin-right: 120px; background-color: #a1b1cc; opacity: .90; padding: 20px;border-radius: 10px">
                      <h2 align="center">Leave a comment!</h2>

                        <form id="form" role="form" action="uploadComment.php" method="post">
                          <textarea type="text" form="form" class="form-control" id="comment" name="comment" required spellcheck="true"></textarea>
                          <button id="comment-btn" class="btn btn-primary" name="btn-comment" style="margin-top: 10px">Comment</button>
                        </form>
                    </div>';
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
