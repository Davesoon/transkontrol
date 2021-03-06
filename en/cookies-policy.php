<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trans Kontrol - cookies policy</title>
    <link rel="icon" href="../img/logo.png">
    <link rel="stylesheet" href="../styles/website.css">
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
    <header><?php include "components/header.php"; ?></header>
    <nav>
        <div class="dropdown">
            <p class="icon-right-hand" id="dropButton">&nbsp; Policy</p>
            <div class="tabs">
                <a href="home">Home</a>
                <a href="about-us">About Us</a>
                <a href="services">Services</a>
                <a href="charges">Charges</a>
                <a href="complaints">Complaints</a>
                <a href="appeals">Appeals</a>
                <a href="lawsuits">Lawsuits</a>
                <a href="press">Press</a>
                <a href="study">Study</a>
                <a href="job">Job</a>
                <a href="contact">Contact</a>
                <div class="dropdown2">
                    <div onclick="myFunction2()" class="dropbtn2">PL / UA</div>
                    <div id="myDropdown2" class="dropdown-content2">
                        <a href="/">Polski</a>
                        <a href="/ua/charges-ukrainian">Український</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <article>
            <h3>Regulations</h3>
            <p>"Cookies" are text files, IT data stored in users' devices, intended for the use of websites. They allow, among others identify the type of user's device and display websites tailored to individual preferences. Cookies usually contain a website address, storage time on the user's device and their own unique identifier.</p>
            <p>We use "cookies" to optimize the use of websites. They are also used to collect statistical data that allow to identify the way users use websites. This gives the opportunity to later improve the structure and content of the Website, excluding personal identification of the user. Personal data collected using "cookies" may be collected only for the purpose of performing specific functions and activities for the user. Such data is encrypted in a way that prevents access by unauthorized persons.</p>
            <p>We use the so-called Constant. "Cookies", which are stored for a defined period of time, which is determined by the parameter contained in the "cookies" file - the user has the option of manually removing them. "Cookies" used by the website operator's partners are subject to their own privacy policy.</p>
            <p>By default, the software used for browsing websites allows "cookies" to be placed on the end device. The user may properly configure the browser to block the automatic acceptance of "cookies" or to obtain information about each transfer of a file to the user's device.</p>
            <p>Relevant information on the use of "cookies" and possible configurations is available in the browser settings. The level of restrictions on the use of "cookies" may affect the availability and functionality offered on the website, up to blocking its proper use.</p>
        </article>
    </main>
    <footer>
        <p>Trans Kontrol &copy;<? echo date(Y);?> All rights reserved.</p>
        <a href="privacy-policy">Privacy policy</a>
        <a style="color: gray;">Cookies policy</a>
    </footer>
    <script src="js/dropdownNav.js"></script>
</body>
</html>