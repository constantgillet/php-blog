<?php
    //Start session and destroy variables
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['user_level']);

    header('Location: /');
    exit;