<?php

require __DIR__ . '/../../config/config.php';
require __DIR__ . '/../../src/functions.php'; 
require __DIR__ . '/../../src/User.php';

//Create the object user
$user = new User($pdo);

$page = 'login';
$page_title = 'Se connecter';

//If an user post login
if(isset($_POST['email'])){
    if(!empty($_POST['email'])) {
        $user->email = $_POST['email'];

        if(!empty($_POST['password'])) {
            $user->password = sha1($_POST['password']);

            //We the login of the user is true
            if($user->login()) {
                header('Location: /');
                exit;
            } else {
                $error_message = 'Email ou mot de passe invalide';
            }
            
        } else{
            $error_message = 'Merci de mettre un mot de passe';
        }
    } else{
        $error_message = 'Merci de mettre un email';
    }
}

require __DIR__ . '/../header.php';
?>
    <!-- Main start -->
    <main class="main-login-page">
        <div class="container">
            <h2>Se connecter</h2>
            <form action="" method="post" class="form-login">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
                <label for="Mot de passe">Mot de passe:</label>
                <input type="password" name="password" id="password">
                <button class="form-login__button">Se connecter</button>
                <?= isset($error_message) ? '<p class=form-login__error-message>' . $error_message . '</p>' : '' ?>
            </form>
        </div>
    </main><!-- Main end -->
</body>
</html>