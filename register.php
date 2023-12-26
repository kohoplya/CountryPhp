<?php include ("./include/registerForm.php")?>

<!DOCTYPE html>
<html lang="en" class="blue_theme">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:regular,500,600,700,800,900,italic,500italic,600italic,700italic,800italic,900italic&display=swap">
    <title>Add_country</title>
    <link rel="stylesheet" href="./css/register.css">
</head>
<body>
    <div class="wrapper">
    <?php include("./header.php"); ?>
        <main class="page" id="main">
            <div class="form__container">
                <form id="form" method="post", enctype="multipart/form-data">
                    <div class="tile_user">Користувач</div>
                    <ul>
                        <input type="text" name="name" id="name_text" placeholder="Ім'я" autocomplete="off" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>">
                        <div class="errors"><?php echo isset($err['name']) ? $err['name'] : '' ?></div>
                        <input type="text" name="telephone" id="tel" placeholder="Номер телефону" value="<?php echo isset($_POST['telephone']) ? $_POST['telephone'] : '' ?>">
                        <div class="errors"><?php echo isset($err['telephone']) ? $err['telephone'] : '' ?></div>
                        <input type="password" name="password" id="pass" placeholder="Пароль" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>">
                        <div class="errors"><?php echo isset($err['password']) ? $err['password'] : '' ?></div>
                    </ul>
                    <div class="submit"><button class="submit_button" type="submit" id="submitbutton">Підтвердити</button></div>
                </form>
            </div>
        </main>
        <?php include("./footer.php"); ?>
        <script src="./js/script.js"></script>
    </div>
</body>
</html>