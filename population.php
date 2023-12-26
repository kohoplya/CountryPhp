<?php
error_reporting(0);
include("db.php");
?>
<!DOCTYPE html>
<html lang="en" class="green_theme">
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
$page = 1;
$limit = 10;

if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page']) && $_REQUEST['page'] > 0) {
    $page = $_REQUEST['page'];
}

if (isset($_REQUEST['limit']) && is_numeric($_REQUEST['limit']) && $_REQUEST['limit'] > 4) {
    $limit = $_REQUEST['limit'];
}
$limits = [10, 50, 100];
if (!in_array($limit, $limits)) {
    $limit = $limits[0];
}
?>
<form>
    <select name="limit">
        <?php
            foreach($limits as $lim) {
                echo '<option '.(($lim == $limit)?'selected':'').'>'.$lim.'</option>';
            }
        ?>
    </select>
    <input type="submit" value="OK">
</form>
<?php
$db = new DB([
    'host' => 'localhost',
    'user' => 'root',
    'password' => '1397',
    'db' => 'country_list',
    'port' => '3306',
]);


if ($db->isConnect()) {
    $first = ($page - 1) * $limit;
    $wh = "WHERE name<>''";
    $c = $db->queryOne("SELECT COUNT(*) as 'id' FROM `country_list` $wh");
    $rowsCount = $c['id'];
    $pageCount = 0;
    if ($rowsCount > 0) {
        $pageCount = (int)(($rowsCount - 1) / $limit) + 1;
    }

    $rows = $db->query("SELECT * FROM `country_list` $wh ORDER BY `name` LIMIT ".$first."," . $limit);
    if ($rows === false) {
        echo 'Error select';
    } else {
        echo "<div>Rows: {$rowsCount} Pages: {$pageCount}</div>";
        ?>
        <table border="1" width="100%"><tr><th>N</th><th>Id</th><th>Name</th><th>Price</th></tr>
        <?php
        $num = $first;
        foreach($rows as $row) {
            echo '<tr><td>'.($num + 1).'</td><td>'.$row['id'].'</td><td>'.$row['name'].'</td><td>'.$row['value'].'</td></tr>';
            $num ++;
        }
        echo '</table>';
    }
} else {
    echo 'Error DB connection';
}
?>
</body>
</html>
