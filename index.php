<!DOCTYPE html>
<html>

<head lang="ru">
  <meta charset="utf-8" />
  <title>Video Wolf</title>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="normalize.css" />
  <link rel="stylesheet" href="style.css" />
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

  <!-- Intro -->
  <main>
    <div class="intro">
      <div class="container">
        <div class="intro__inner">
          <p class="into__title">
            Легче жопой съехать с тёрки чем учиться на пятёрки
          </p>
        </div>
      </div>
    </div>

    <!-- Videos -->
    <div class="container">
      <p class="popular">популярное</p>
      <ul class="videos">
        <li class="videos__item">
          <div class="videos__title">
            <p>
              Мальчик заинька, голос ангельский СМОТРЕТЬ ВСЕМ РЖАКА 2007 360
            </p>
          </div>
        </li>

        <li class="videos__item">
          <div class="videos__title">
            <p>
              Мальчик заинька, голос ангельский СМОТРЕТЬ ВСЕМ РЖАКА 2007 360
            </p>
          </div>
        </li>

        <li class="videos__item">
          <div class="videos__title">
            <p>
              Мальчик заинька, голос ангельский СМОТРЕТЬ ВСЕМ РЖАКА 2007 360
            </p>
          </div>
        </li>

        <li class="videos__item">
          <div class="videos__title">
            <p>
              Мальчик заинька, голос ангельский СМОТРЕТЬ ВСЕМ РЖАКА 2007 360
            </p>
          </div>
        </li>

        <li class="videos__item">
          <div class="videos__title">
            <p>
              loh
            </p>
          </div>
        </li>

        <li class="videos__item">
          <div class="videos__title">
            <p>
              Мальчик заинька, голос ангельский СМОТРЕТЬ ВСЕМ РЖАКА 2007 360
            </p>
          </div>
        </li>
      </ul>
    </div>
  </main>

  <footer class="footer">
    <div class="container">
      <p class="footer__title">Разработано командой «Туса Джуса»</p>
    </div>
  </footer>

  <div class="popup-zlp">
    <section class="popup-auth popup-user">
      <div class="close"></div>
      <div class="popup__container">
        <h2 class="popup__title">Авторизация</h2>
        <div class="popup__form auth">
          <input type="text" id="tableName" hidden="true" value="users" />
          <input type="text" id="authorizationLogin" name="auth-login" placeholder="Логин" autofocus="true" class="popup__input login" />
          <input type="password" id="authorizationPassword" name="auth-password" placeholder="Пароль" class="popup__input password" />
          <button id="authorizationButton" name="auth-btn" class="popup__btn">
            Войти
          </button>
          <button class="popup__btn toggle__btn toggleReg">
            Нет аккаунта?
          </button>
        </div>
      </div>
    </section>

    <section class="popup-reg popup-user">
      <div class="close"></div>
      <div class="popup__container">
        <h2 class="popup__title">Регистрация</h2>
        <div class="popup__form reg">
          <input type="text" id="tableName" hidden="true" value="users" />
          <input type="text" id="registrationLogin" name="reg-login" placeholder="Логин" autofocus="true" class="popup__input login" />
          <input type="password" id="registrationPassword" name="reg-password" placeholder="Пароль" class="popup__input password" />
          <input type="password" id="registrationConfirmPassword" name="reg-password-confirm" placeholder="Подтверждение пароля" class="popup__input password-confirm" />
          <button id="registrationButton" class="popup__btn" name="reg-btn">
            Зарегистрироваться
          </button>
          <button class="popup__btn toggle__btn toggleAuth">
            Авторизация
          </button>
        </div>
      </div>
    </section>
  </div>

  <div class="overlay"></div>

  <script src="js/jquery.min.js"></script>
  <script src="js/script.js"></script>

  <script>

  </script>

</body>

</html>