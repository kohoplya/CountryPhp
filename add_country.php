<?php include ("./include/form.php")?>

<!DOCTYPE html>
<html lang="en" class="blue_theme">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:regular,500,600,700,800,900,italic,500italic,600italic,700italic,800italic,900italic&display=swap">
    <title>Add_country</title>
    <link rel="stylesheet" href="./css/add_country.css">
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
            <div class="form__container">
                <form id="form" action="#" method="post">
                    <div class="tile_country">Країна</div>
                    <ul>
                        <input type="text" name="country" id="country_text" autocomplete="off" placeholder="Назва" value="<?php echo isset($_POST['country']) ? $_POST['country'] : '' ?>">
                        <div class="errors"><?php echo isset($err['country']) ? $err['country'] : '' ?></div>
                        <input type="text"  name="capital" autocomplete="off" id="capital_text" placeholder="Столиця" value="<?php echo isset($_POST['capital']) ? $_POST['capital'] : '' ?>">
                        <div class="errors"><?php echo isset($err['capital']) ? $err['country'] : '' ?></div>
                        <input type="text" name="area" autocomplete="off" id="area_text" placeholder="Площа країни"  value="<?php echo isset($_POST['area']) ? $_POST['area'] : '' ?>">
                        <div class="errors"></div>
                    </ul>
                    <div class="input_area">
                        <input type="text" name="text_area" id="area" placeholder="Інфо"
                        value="<?php echo isset($_POST['text_area']) ? $_POST['text_area'] : '' ?>"></div>
                    <div class="submit"><button class="submit_button" type="submit" id="submitbutton">Підтвердити</button></div>
                </form>
            </div>
        </main>
        <?php include("./footer.php"); ?>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>