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


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if (isset($_POST['country']) && !empty($_POST['country'])){
        $country = clearData($_POST['country']);
    } else {
        $err['country'] = '<p>Поле назви країни має бути заповненим</p>';
        $flag = 1;
    }

    if (isset($_POST['capital']) && !empty($_POST['capital'])){
        $capital = clearData($_POST['capital']);
    } else {
        $err['capital'] = '<p>Поле столиці країни має бути заповненим</p>';
        $flag = 1;
    }

    if ($flag == 0){
        $country = $_POST['country'];
        $capital = $_POST['capital'];
        $area = $_POST['area'];
        $textArea = $_POST['text_area'];

        $userName = $_COOKIE['user'];
        $result = $mysql->query("SELECT `userId` FROM `users` WHERE `name` = '$userName'");
        $row = $result->fetch_assoc();
        $userId = $row['userId'];

        $mysql->query("INSERT INTO `requests` (`userId`, `country`, `capital`, `area`, `textArea`) 
        VALUES ('$userId', '$country', '$capital', '$area', '$textArea')");
        if ($mysql === false) {
            die('Помилка підготовки запиту SQL: ' . $mysqli->error);
        }
        
        header("Location: requests.php");
        exit;
    }
    $mysql->close();
}

?>
