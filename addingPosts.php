<?php
session_start();
?>

<?php if (!isset($_SESSION['admin'])): ?>
    <?php header("Location: index.php"); ?>
<?php else: ?>

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
        <label style="color: gray">Title
            <input type="text" name="title" placeholder="For Title">
        </label>
        <label style="color: gray">
            Description
            <textarea name="description" cols="50" rows="10" placeholder="Some text here"></textarea>
        </label>
        <input type="submit" value="Add" name="add" class="addBtn">
    </form>
    </body>

    </html>

<?php endif; ?>
