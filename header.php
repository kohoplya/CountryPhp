<link rel="stylesheet" href="./css/header.css">

<header class="header">
    <div class="add_country_header">
        <a href="add_country.php" class="">ДОДАТИ КРАЇНУ</a>
        <a href="requests.php" class="">ЗАПИТИ</a>
        <?php
            if ($_COOKIE['user'] == ''){
                echo '<a href="login.php" class="">УВІЙТИ</a>';
            } else {
                echo '<a href="exit.php" class="">' . $_COOKIE['user'] . '/ВИЙТИ</a>';
            }
        ?>
</div>
    <div class="header__menu">
        <ul class="header__list">
            <li><a href="main.php" class="header__link">НА ГОЛОВНУ</a></li>
            <li><a href="#main" class="header__link">НА ПОЧАТОК</a></li>
            <li><a href="japan.php" class="header__link">ПАМ'ЯТКИ ЯПОНІЇ</a></li>
            <li><a href="china.php" class="header__link">ПАМ'ЯТКИ КИТАЮ</a></li>
            <li><a href="south_korea.php" class="header__link">ПАМ'ЯТКИ КОРЕЇ</a></li>
        </ul>
    </div>
    <ul class="color_list">
        <li><div class="color_green"></div></li>
        <li><div class="color_red"></div></li>
        <li><div class="color_pink"></div></li>
        <li><div class="color_blue"></div></li>
    </ul>
    <script src="./js/header.js"></script>
</header>