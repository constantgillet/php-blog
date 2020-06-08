<?php

$request = $_SERVER['REQUEST_URI'];

//Router
if ($request == '/' or $request == '') {

    require __DIR__ . '/templates/homepage/homepage.php';

} elseif ($request == '/login') {

    require __DIR__ . '/templates/login/loginpage.php';

} elseif ($request == '/create') {

    require __DIR__ . '/templates/create_article/create_article_page.php';

} elseif ($request == '/logout') {

    require __DIR__ . '/templates/logout/logoutpage.php';

} elseif (strpos($request, 'article')) {

    require __DIR__ . '/templates/article/articlepage.php';

} else {

    http_response_code(404);
    require __DIR__ . '/templates/homepage/homepage.php';

}