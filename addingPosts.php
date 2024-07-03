<?php
session_start();

if (isset($_SESSION['admin'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Admin Page</title>
    </head>

    <body class="addingPosts">
    <form action="addingPostsAction.php" method="post" id="addForm">
        <label>
            <?php

            if (isset($_SESSION['addingPosts']['error'])) {
                echo "<p>" . $_SESSION['addingPosts']['error'] . "</p>";
                unset($_SESSION['addingPosts']['error']);
            }
            ?>
        </label>
        <input type="text" name="title" placeholder="For Title"     >
        <textarea name="description" cols="50" rows="10" placeholder="Some text here" ></textarea>
        <input type="submit" value="Add" name="add" class="addBtn">
    </form>
    </body>

    </html>

    <?php
} else {
    header("Location: addingPosts.php");
}
?>
