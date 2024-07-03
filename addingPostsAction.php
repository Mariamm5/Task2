<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "for_tasks";

try {
    $con = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    echo "Database connection error: " . $error->getMessage();
    exit;
}

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $error = false;

    if (empty($title) || empty($description)) {
        $error = true;
        $_SESSION['addingPosts']['error'] = "All fields are required!";
    }

    if (!$error) {
        $stmt = $con->prepare("INSERT INTO posts (title, description) VALUES (:title, :description)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
        header("Location: post.php");
        exit;
    } else {
        header("Location: addingPosts.php");
        exit;
    }
} else {
    header("Location: addingPosts.php");
    exit;
}
?>
