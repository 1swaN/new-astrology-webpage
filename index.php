<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/modal.css">
    <link rel="stylesheet" href="./css/info.css">
    <link rel="stylesheet" href="./css/media.css">
    <link rel="stylesheet" href="./css/settings.css">
    <link rel="stylesheet" href="./css/userAlert.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    
    <title>Astrology</title>
</head>
<body>   
    
    <header class="header">
        <div class="header-container container">
            <p class="header__logo">Helena's</p>
            <div class="dropdown">
                <a class="lang__name" href="#"><img class="lang__img img" src="svg/globe-solid.svg"></a>
                <div class="dropdown-content" id="language-select">
                    <a data-lang="en" class="content__link" href="#">English</a>
                    <a data-lang="esp" class="content__link" href="#">Español</a>
                    <a data-lang="rus" class="content__link" href="#">Русский</a>
                </div>
            </div>
        </div>
    </header>
    <main class="info-holder">
        <div class="info-holder-container container">
            <div class="main-info">
                <h1 data-translate="info__title" class="info__title">Специалист по астрологии - Елена</h1>
                <p data-translate="description" class="info__description">Соображения высшего порядка, а также дальнейшее развитие различных форм деятельности требует от нас системного анализа существующих финансовых и административных условий.</p>
                <button class="info__sign" data-translate="signButton" data-path="form-popup">Записаться на сеанс</button>
            </div>
            <div class="info-logo">
                <img src="./jpg/-round.png" alt="Helena's photo" class="info__img">
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="footer-container">
            <p data-translate="footer__rights" class="footer__rights">Все права защищены &#169; 2023</p>
        </div>
    </footer>

    <div class="alert" id="success-alert">
        <span class="fas fa-circle-check"></span>
        <span class="msg">Ваша заявка успешно отправлена!</span>
        <div class="close-btn">
            <span class="fas fa-times"></span>
        </div>
    </div>
    
    <script src="./js/base.js"></script>
    <script src="./plugins/modal.js"></script>
        <!-- очень важно подключить modal после base, чтобы в modal был доступен объект $ -->
    <script src="./js/customUserAlert.js"></script>
    <script src="./js/index.js"></script>
    <script src="./js/translateScript.js"></script>    
    <script src="./js/accordion.js"></script>
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="https://momentjs.com/downloads/moment-timezone-with-data.js"></script>
    <script src="./js/timeDifferent.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>