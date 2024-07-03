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
        <title>Posts Page</title>
    </head>

    <body class="posts">
    <table class="postsTable">
        <tr>
            <th>Title</th>
            <th>Description</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "for_tasks";

        try {
            $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            echo "Error: " . $error->getMessage();
            exit; // Exit the script if there's a connection error
        }

        $stmt = $con->prepare("SELECT title, description FROM posts");
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($posts as $post) {
            echo "<tr>" .
                "<td>" . htmlspecialchars($post['title']) . "</td>" .
                "<td>" . htmlspecialchars($post['description']) . "</td>" .
                "</tr>";
        }
        ?>
    </table>
    </body>

    </html>

    <?php
} else {
    header("Location: index.php");
    unset($_SESSION['admin']);
    exit;
}
?>
