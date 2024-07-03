<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "for_tasks";


try {
    $con = new PDO("mysql:host = $servername;dbname=$db", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    echo "Error is:$error";
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
}

if (empty($email) || empty($password)) {
    $_SESSION['adminLogin']['error'] = "All fields are required!";
    header("Location:index.php");
} else {
    unset($_SESSION['adminLogin']['error']);

    $stmt = $con->prepare("SELECT `email`, `password` FROM `admin` WHERE `email` = :email AND `password` = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($res['email'] == $email && $res['password'] == $password) {
        $_SESSION['admin'] = "admin";
        header("Location:addingPosts.php");
    } else {
        header("Location:index.php");
        $_SESSION['adminLogin']['error'] = "User Not Found";
        unset($_SESSION['admin']);

    }
}
