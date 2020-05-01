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
                        <li><a class="menu__link" href="">главная</a></li>
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
                    <video></video>
                    <img>
                    
                </div>
                <h2 class="video-player__video-name">Ударил девушку один раз, не будь шакалом,
добей чтобы не мучалась</h2>
            </div>
        </div>
        <div class="container">
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
</body>

</html>