<?php session_start() ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Admin Login Page</title>
    </head>

    <body>

    <form action="action.php" method="post" class="form">
        <label>

            <?php
            if (isset($_SESSION['adminLogin']['error'])) {
                echo "<p>" . $_SESSION['adminLogin']['error'] . "</p>";
            }
            ?>
        </label>
        <input type="email" name="email" placeholder="For Email">
        <input type="password" name="password" placeholder="For Password">
        <input type="submit" value="Login" name="login" class="btn">
    </form>
    </body>

    </html>

<?php
