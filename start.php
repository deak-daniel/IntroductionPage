<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Indroduction</title>
</head>
<body>
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
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="/"><?php echo $language->navbar->homelabel; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contact"><?php echo $language->navbar->contactlabel; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login"><?php echo $language->navbar->adminloginlabel; ?></a>
            </li>
            <li class="nav-item">
                <?php if ($_SESSION['lang'] == 'hu'): ?>
                    <a href="/?lang=en" class="nav-link">ENG</a>
                <?php elseif ($_SESSION['lang'] == 'en'): ?>
                    <a href="/?lang=hu" class="nav-link">HUN</a>
                <?php endif;?>
            </li>
        </ul>
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