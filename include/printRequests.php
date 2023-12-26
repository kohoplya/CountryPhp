<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "countries";

$mysql = new mysqli($servername, $username, $password, $dbname);

if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
}
$countPerPage = isset($_GET['count']) ? intval($_GET['count']) : 10;

$countResult = $mysql->query("SELECT COUNT(*) AS count FROM `requests`");
$countRow = $countResult->fetch_assoc();
$totalRecords = $countRow['count'];

$totalPages = ceil($totalRecords / $countPerPage);

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $countPerPage;

$sql = "SELECT * FROM `requests` LIMIT $offset, $countPerPage";
$result = $mysql->query($sql);

while ($row = $result->fetch_assoc()) {
    $userId = $row['userId'];
    $userResult = $mysql->query("SELECT `name` FROM `users` WHERE `userId` = '$userId'");
    $userRow = $userResult->fetch_assoc();
    $userName = $userRow['name'];
    $country = $row["country"];

    echo "<div class='request'>";
        echo "<div class='request_fields'>";
            echo "<p class='name'> Користувач: " . $userName . "</p>";
            echo "<p class='country'> Країна: " . $row["country"] . "</p>";
            echo "<p class='capital'> Столиця: " . $row["capital"] . "</p>";
            echo "<p class='area'>Площа: " . $row["area"] . "</p>";
            echo "<p class='text'>Інфо: " . $row["textArea"] . "</p>";
        echo "</div>";
        echo "<div class='add_coment'>
                    <a href='addComment.php?country=$country'>Додати коментар</a>
                </div>";
    echo "</div>";

    $comments = $mysql->query("SELECT * FROM `comments` WHERE `country` = '$country'");
    while ($rowC = $comments->fetch_assoc()) {
        $userIdC = $rowC['userId'];
        $resultC = $mysql->query("SELECT `name` FROM `users` WHERE `userId` = '$userIdC'");
        $rowss = $resultC->fetch_assoc();
        $userNameC = $rowss['name'];

        echo "<div class='comment'>";
            echo "<p class='name'> Користувач: " . $userNameC . "</p>";
            echo "<p class='capital'> Коментар: " . $rowC["comment"] . "</p>";
        echo "</div>";
    }
}

echo '<div class="pagination">';
for ($i = 1; $i <= $totalPages; $i++) {
    echo '<a href="?page=' . $i . '&count=' . $countPerPage . '">' . $i . '</a>';
}
echo '</div>';
$mysql->close();
?>