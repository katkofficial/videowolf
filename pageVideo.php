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
                    <div class="swiper-slide">Slide 1</div>
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
            var categoryId = <?php echo $_GET['categoryId']; ?>;

            $.ajax({
                type: "POST",
                dataType: "text",
                url: "Requests/GetVideos.php",
                data: {
                    categoryId: categoryId,
                    tableName: "videos"
                },
                success: function(data) {
                    var slider = $(".swiper-wrapper").children();
                    var videoNames = Array();
                    data = String(data);

                    var tem = String();

                    for (var i = 0; i < data.length; i++) {

                        if (data[i] == '&' && data.indexOf("&amp;", i) != i) {
                            tem = tem.substr(tem.indexOf('=') + 1);
                            videoNames.push(tem.split("&amp;").join("&"));

                            tem = "";
                        } else {
                            tem += data[i];
                        }
                    }
                    tem = tem.substr(tem.indexOf('=') + 1);

                    videoNames.push(tem.split("&amp;").join("&"));

                    var min = videoNames.length < slider.length ? videoNames.length : slider.length;

                    for (var i = 0; i < min; i++) {
                        slider[i].innerText = videoNames[i];
                        slider[i].addEventListener("click", function() {
                            var name = encodeURIComponent($(this).text());
                            var category = encodeURIComponent("<?php echo $_GET['category']; ?>");

                            console.log(name);

                            var video = document.querySelector("#video");
                            console.log("Requests/Streaming.php?Category=" + category + "&VideoName=" + name);

                            video.setAttribute("src", "Requests/Streaming.php?Category=" + category + "&VideoName=" + name);
                            video.setAttribute("type", "video/mp4");

                            video.load();

                            video.play();
                        });
                    }

                }
            });

        });
    </script>

</body>

</html>