<!DOCTYPE html>
<html lang="en" class="blue_theme">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:regular,500,600,700,800,900,italic,500italic,600italic,700italic,800italic,900italic&display=swap">
    <title>Add_country</title>
    <link rel="stylesheet" href="./css/requests.css">
</head>
<body>
    <div class="wrapper">
        <?php include("./header.php"); ?>
        <main class="page" id="main">
            <div class="reguest__container">
                <form action="" class="chooseCount" method="get">
                    <select name="count" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                    </select>
                    <div class="submit"><button class="submit_button" type="submit" id="submitbutton">Підтвердити</button></div>
                 </form>
                <?php include("./include/printRequests.php"); ?>
            </div>
        </main>
        <?php include("./footer.php"); ?>
    </div>
</body>
</html>