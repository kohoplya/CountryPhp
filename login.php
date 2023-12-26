<?php include ("./include/loginForm.php")?>

<!DOCTYPE html>
<html lang="en" class="blue_theme">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:regular,500,600,700,800,900,italic,500italic,600italic,700italic,800italic,900italic&display=swap">
    <title>Add_country</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <div class="wrapper">
    <?php include("./header.php"); ?>
        <main class="page" id="main">
            <div class="form__container">
                <form id="form" method="post", enctype="multipart/form-data">
                <div class="tile_user">Вхід</div>
                <div class="errors"><?php echo isset($err['log']) ? $err['log'] : '' ?></div>
                    <ul>
                        <input type="text" name="name" id="name_text" placeholder="Логін" autocomplete="off" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>">
                        <div class="errors"><?php echo isset($err['name']) ? $err['name'] : '' ?></div>
                        <input type="password" name="password" id="pass" placeholder="Пароль" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>">
                        <div class="errors"><?php echo isset($err['password']) ? $err['password'] : '' ?></div>
                    </ul>
                    <div class="submit"><button class="submit_button" type="submit" id="submitbutton">Підтвердити</button></div>
                </form>
                <a href="register.php">ЗАРУЄСТРУВАТИСЯ</a>
            </div>
        </main>
        <?php include("./footer.php"); ?>
    </div>
</body>
</html>