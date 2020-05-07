<?php

print("<input type='hidden' id='category' value={$_GET['category']}>");
print("<input type='hidden' id='categoryId' value={$_GET['categoryId']}>");

?>

<!DOCTYPE html>
<html>

<head lang="ru">
    <meta charset="utf-8" />
    <title>Video Wolf</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/swiper.min.css" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="shortcut icon" href="/img/site-logo.png" type="image/png" />
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__logo">
                    <img src="img/header-logo.png" alt="" class="header__logo" />
                </div>

                <!-- Nav -->
                <nav class="nav">
                    <ul class="menu">
                        <li><a class="menu__link" href="index.php">главная</a></li>
                        <li><a class="menu__link" href="">котики</a></li>
                        <li><a class="menu__link" href="">собачки</a></li>
                        <li><a class="menu__link" href="">попуги</a></li>
                    </ul>

                    <ul class="user">
                        <li>
                            <button class="user__link">вход</button>
                            <div class="user__logo"></div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main class="video-player">
        <div class="container">
            <div class="video-container">
                <div class="video-player__video-block">
                    <video id="video" width="860" height="480">

                    </video>
                    <div class="player">
                        <div>
                            <div id="videoTimeMin"></div>
                            <div id="videoTimeSec"></div>
                            <progress id="progress" class="player__progress" max="100" value="0"></progress>
                        </div>
                        <button id="play">Play</button>
                        <button id="pause">Pause</button>
                        <button id="stop">Stop</button>
                        <button id="fullscreen">Full screen</button>
                        <button id="faster">Faster</button>
                        <button id="slower">Slower</button>
                        <input type="range" id="volume"> volume
                    </div>


                </div>
                <h2 class="video-player__video-name">Пирогенный апофиз глазами современников</h2>
            </div>
        </div>
        <div class="container slider">
            <div class="videos-swiper">
                <div class="swiper-wrapper">
                    <div id="firstVideo" class="swiper-slide">КОТЫ 2020 ПРИКОЛЫ С КОШКАМИ Смешные Коты и Котики 2020 Funny Cats</div>
                    <div class="swiper-slide">Slide 2</div>
                    <div class="swiper-slide">Slide 3</div>
                    <div class="swiper-slide">Slide 4</div>
                    <div class="swiper-slide">Slide 5</div>
                    <div class="swiper-slide">Slide 6</div>
                    <div class="swiper-slide">Slide 7</div>
                    <div class="swiper-slide">Slide 8</div>
                    <div class="swiper-slide">Slide 9</div>
                    <div class="swiper-slide">Slide 10</div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div class="white-block f"></div>
            <div class="white-block s"></div>
        </div>

    </main>





    <footer class="footer">
        <div class="container">
            <p class="footer__title">Разработано командой «Туса Джуса»</p>
        </div>
    </footer>

    <script src="js/swiper.min.js"></script>
    <script src="js/swiper-init.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/script.js"></script>

    <script>
        $(document).ready(function() {

            var categoryId = $("#categoryId").val();

            $.ajax({
                type: "POST",
                dataType: "text",
                url: "Requests/GetVideos.php",
                data: {
                    categoryId: categoryId,
                    tableName: "videos"
                },
                success: function(data) {
                    // alert(data);
                }
            });

        });
    </script>

</body>

</html>