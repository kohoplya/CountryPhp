<?php

$err = [];
$flag = 0;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "countries";

$mysql = new mysqli($servername, $username, $password, $dbname);
if ($mysql === false) {
    die('Помилка підготовки запиту SQL: ' . $mysqli->error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = $_POST['name'];
    $password = $_POST['password'];
    $password = md5($password."awedsd14523");

    $result = $mysql->query("SELECT * FROM `users` WHERE `name` = '$name' AND `password` = '$password'");
    $user = $result->fetch_assoc();

    if($user === null){
        $err['log'] = '<p>Користувача не знайдено</p>';
    } else {
        setcookie('user', $user['name'], time() + 3600, "/");
        header("Location: main.php");
        exit;
    }
}

$mysql->close();

?>
