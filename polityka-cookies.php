<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trans Kontrol - polityka cookies</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="styles/website.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YWBTPHN0RL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-YWBTPHN0RL');
    </script>
</head>
<body>
    <header><?php include "components/naglowek.php"; ?></header>
    <nav>
        <div class="dropdown">
            <p class="icon-right-hand" id="dropButton">&nbsp; Polityka</p>
            <div class="tabs">
                <a href="/">Start</a>
                <a href="o-nas">O nas</a>
                <a href="uslugi">Usługi</a>
                <a href="platnosci">Płatności</a>
                <a href="skargi">Skargi</a>
                <a href="odwolania">Odwołania</a>
                <a href="pozwy">Pozwy</a>
                <a href="media">Media</a>
                <a href="studium">Studium</a>
                <a href="praca">Praca</a>
                <a href="kontakt">Kontakt</a>
                <div class="dropdown2">
                    <div onclick="myFunction2()" class="dropbtn2">EN / UA</div>
                    <div id="myDropdown2" class="dropdown-content2">
                        <a href="en/home">English</a>
                        <a href="ua/charges-ukrainian">Український</a>
                    </div>
                </div>            
            </div>
        </div>
    </nav>
    <main>
        <article>
            <h3>Regulamin</h3>
            <p>„Cookies” to pliki tekstowe, dane informatyczne przechowywane w urządzeniach użytkowników, przeznaczone do korzystania ze stron internetowych. Pozwalają m.in. zidentyfikować rodzaj urządzenia użytkownika i wyświetlać strony internetowe dostosowane do indywidualnych preferencji. Pliki „Cookies” zawierają najczęściej adres strony internetowej, czas przechowywania na urządzeniu użytkownika oraz własny unikatowy identyfikator.</p>
            <p>„Cookies” używamy w celu optymalizacji korzystania ze stron internetowych. Używane są również w celu gromadzenia danych statystycznych, które pozwalają identyfikować sposób korzystania użytkowników ze stron internetowych. Daje to możliwość późniejszego ulepszania struktury i zawartości Witryny, z wyłączeniem personalnej identyfikacji użytkownika. Dane osobowe gromadzone przy użyciu plików „cookies” mogą być zbierane wyłącznie w celu wykonywania określonych funkcji i aktywności na rzecz użytkownika. Takie dane są zaszyfrowane w sposób uniemożliwiający dostęp do nich osobom nieuprawnionym.</p>
            <p>Stosujemy tzw. stałe. "Cookies", które przechowywane są przez zdefiniowany czas, który określany jest parametr zawarty w pliku „cookies” - użytkownik dysponuje możliwością ich ręcznego usunięcia. "Cookies" stosowane przez partnerów operatora strony internetowej podlegają ich własnej polityce prywatności.</p>
            <p>Oprogramowanie wykorzystywane do przeglądania stron WWW domyślnie dopuszcza umieszczanie plików "cookies" na urządzeniu końcowym. Użytkownik może dokonać właściwej konfiguracji przeglądarki, aby zablokować automatyczne akceptowanie plików "cookies" lub uzyskać każdorazową informację o przesłaniu pliku na urządzenie użytkownika.</p>
            <p>Właściwe informacje o obsłudze plików "cookies" oraz możliwych konfiguracjach dostępne są w ustawieniach przeglądarki. Poziom ograniczeń dotyczący stosowania plików „cookies” może wpłynąć na dostępność i funkcjonalności oferowane na stronie internetowej, aż do zablokowania możliwości jej prawidłowego użytkowania. </p>
        </article>
    </main>
    <footer>
        <p>Trans Kontrol &copy;<? echo date(Y);?> Wszelkie prawa zastrzeżone.</p>
        <a href="polityka-prywatnosci">Polityka prywatności</a>
        <a style="color: gray;">Polityka cookie</a>
    </footer>
    <script src="js/dropdownNav.js"></script>
</body>
</html>