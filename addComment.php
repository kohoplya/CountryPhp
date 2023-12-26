<!DOCTYPE html>
<html lang="en" class="blue_theme">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:regular,500,600,700,800,900,italic,500italic,600italic,700italic,800italic,900italic&display=swap">
    <title>Add_country</title>
    <link rel="stylesheet" href="./css/addComent.css">
</head>
<body>
    <?php
        if ($_COOKIE['user'] == ''){
            header("Location: login.php");
        }
    ?>
    <div class="wrapper">
        <?php include("./header.php"); ?>
        <main class="page" id="main">
            <div class="request__container">
                <?php
                $country = $_GET['country'];

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "countries";

                $mysql = new mysqli($servername, $username, $password, $dbname);

                $result = $mysql->query("SELECT * FROM `requests` WHERE `country` = '$country'");
                while ($row = $result->fetch_assoc()) {
                    $userId = $row['userId'];
                    $userResult = $mysql->query("SELECT `name` FROM `users` WHERE `userId` = '$userId'");
                    $userRow = $userResult->fetch_assoc();
                    $userName = $userRow['name'];
                    $countryName = $row["country"];

                    echo "<div class='request'>";
                        echo "<div class='request_fields'>";
                            echo "<p class='name'> Користувач: " . $userName . "</p>";
                            echo "<p class='country'> Країна: " . $countryName . "</p>";
                            echo "<p class='capital'> Столиця: " . $row["capital"] . "</p>";
                            echo "<p class='area'>Площа: " . $row["area"] . "</p>";
                            echo "<p class='text'>Інфо: " . $row["textArea"] . "</p>";
                        echo "</div>";
                    echo "</div>";
                }
                echo "<form id='commentForm' method='post'>
                    <input type='text' autocomplete='off' name='comment' id='comment' placeholder='Написати коментар'>
                    <div class='submit'>
                        <button class='submit_button' type='submit' id='submitbutton'>Підтвердити</button>
                    </div>
                </form>";
                        
                if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    if (empty($_POST['comment'])){
                        echo 'Спочатку напишіть коментар';
                    }
                    else {
                        $userName = $_COOKIE['user'];
                        $result = $mysql->query("SELECT `userId` FROM `users` WHERE `name` = '$userName'");
                        $row = $result->fetch_assoc();
                        $userId = $row['userId'];
                            
                        $comment = $_POST['comment'];
                
                        $mysql->query("INSERT INTO `comments` (`userId`, `country`, `comment`)
                        VALUES ('$userId', '$country', '$comment')");
                        
                        header("Location: requests.php");
                    }
                }

                $mysql->close();
                ?>
            </div>
        </main>
        <?php include("./footer.php"); ?>
    </div>
</body>
</html>
