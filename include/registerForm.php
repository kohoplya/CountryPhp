<?php
function clearData($val){
    $val = trim($val);
    $val = stripslashes($val);
    $val = strip_tags($val);
    $val = htmlspecialchars($val, ENT_QUOTES);
    return $val;
}

function writeToFile($values){
    $f = fopen('addRequests.csv', 'a');

    if (!fputs($f, implode(", ", $values)."\n")) {
        echo 'Помилка запису';
    }
    fclose($f);
}


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

    if (isset($_POST['name']) && !empty($_POST['name'])){
        $name = clearData($_POST['name']);
        $patternName = '/^[A-Za-zА-Яа-яЁёІі]+$/u';
        if (!preg_match($patternName, $name)){
            $err['name'] = '<p>Некоректне ім\'я</p>';
            $flag = 1;
        }
    } else {
        $err['name'] = '<p>Поле імені має бути заповненим</p>';
        $flag = 1;
    }

    if (isset($_POST['telephone']) && !empty($_POST['telephone'])){
        $telephone = clearData($_POST['telephone']);
        $patternPhone = '/^(\+38|\+380)?\(\d{3}\)-\d{3}-\d{4}$/';
        if (!preg_match($patternPhone, $telephone)){
            $err['telephone'] = '<p>Некоректний номер телефону</p>';
            $flag = 1;
        }
    } else {
        $err['telephone'] = '<p>Поле телефону має бути заповненим</p>';
        $flag = 1;
    }

    if (isset($_POST['password']) && !empty($_POST['password'])){
    } else {
        $err['password'] = '<p>Пароль має бути заповненим</p>';
        $flag = 1;
    }

    if ($flag == 0){
        $userId = uniqid();
        $name = $_POST['name'];
        $telephone = $_POST['telephone'];
        $password = $_POST['password'];

        $password = md5($password."awedsd14523");

        $mysql->query("INSERT INTO `users` (`userId`,`name`, `telephone`, `password`) VALUES ('$userId', '$name', '$telephone', '$password')");
        
        header("Location: login.php");
        exit;
    }
    $mysql->close();
}

?>
