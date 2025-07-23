<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="index.js" defer></script>
    <title>Indroduction</title>
</head>
<body data-bs-theme="dark">
    <?php
        global $language;
        $language == [];
        session_start();

        $available_langs = ['en', 'hu'];
        if (!array_key_exists('lang', $_SESSION)) {
            $_SESSION['lang'] = 'hu';
        }
        if (array_key_exists('lang', $_GET) && in_array($_GET['lang'], $available_langs)) {
            $selected_lang = $_GET['lang'];
            $_SESSION['lang'] = $selected_lang;
        }
        require_once './private/language/language.php';
        $language = load('./private/language/' . $_SESSION['lang'] . '.xml');
    ?>
    <div class="container">
        <button id="open-sidebar" onclick="openSidebar()">
            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#c9c9c9"><path d="M165.13-254.62q-10.68 0-17.9-7.26-7.23-7.26-7.23-18t7.23-17.86q7.22-7.13 17.9-7.13h629.74q10.68 0 17.9 7.26 7.23 7.26 7.23 18t-7.23 17.87q-7.22 7.12-17.9 7.12H165.13Zm0-200.25q-10.68 0-17.9-7.27-7.23-7.26-7.23-17.99 0-10.74 7.23-17.87 7.22-7.13 17.9-7.13h629.74q10.68 0 17.9 7.27 7.23 7.26 7.23 17.99 0 10.74-7.23 17.87-7.22 7.13-17.9 7.13H165.13Zm0-200.26q-10.68 0-17.9-7.26-7.23-7.26-7.23-18t7.23-17.87q7.22-7.12 17.9-7.12h629.74q10.68 0 17.9 7.26 7.23 7.26 7.23 18t-7.23 17.86q-7.22 7.13-17.9 7.13H165.13Z"/></svg>
        </button>
        <nav id="navbar">
            <ul>
                <li>
                    <button id="close-sidebar" onclick="closeSidebar()">
                        <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#c9c9c9"><path d="m480-444.62-209.69 209.7q-7.23 7.23-17.5 7.42-10.27.19-17.89-7.42-7.61-7.62-7.61-17.7 0-10.07 7.61-17.69L444.62-480l-209.7-209.69q-7.23-7.23-7.42-17.5-.19-10.27 7.42-17.89 7.62-7.61 17.7-7.61 10.07 0 17.69 7.61L480-515.38l209.69-209.7q7.23-7.23 17.5-7.42 10.27-.19 17.89 7.42 7.61 7.62 7.61 17.7 0 10.07-7.61 17.69L515.38-480l209.7 209.69q7.23 7.23 7.42 17.5.19 10.27-7.42 17.89-7.62 7.61-17.7 7.61-10.07 0-17.69-7.61L480-444.62Z"/></svg>
                    </button>
                </li>
                <li class="nav-container">
                    <a class="nav-item" href="/"><?php echo $language->navbar->homelabel; ?></a>
                </li>
                <li class="nav-container">
                    <a class="nav-item" href="/contact"><?php echo $language->navbar->contactlabel; ?></a>
                </li>
                <li class="nav-container">
                    <a class="nav-item" href="/login"><?php echo $language->navbar->adminloginlabel; ?></a>
                </li>
                <li class="nav-container">
                    <?php if ($_SESSION['lang'] == 'hu'): ?>
                        <a class="nav-item" href="/?lang=en">ENG</a>
                    <?php elseif ($_SESSION['lang'] == 'en'): ?>
                        <a class="nav-item" href="/?lang=hu">HUN</a>
                    <?php endif;?>
                </li>
            </ul>
        </nav>
        <div id="overlay"></div>
        <main>
            <?php 

                header("Access-Control-Allow-Origin: 127.0.0.1:8080");
                require_once './private/database.php';
                $database = new Database();
                $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                switch ($uri) {
                    case '/':
                        require_once 'public/home.php';
                        break;
                    case '/contact':
                        require_once 'public/contact.php';
                        break;
                    case '/login':
                        require_once 'public/login.php';
                        break;
                    default:
                        break;
                }
            ?>
        </main>
    </div>
</body>
</html>