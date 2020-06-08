<?php

require __DIR__ . '/../../config/config.php';
require __DIR__ . '/../../src/functions.php'; 
require __DIR__ . '/../../src/Article.php';

//Check if the user is registred and have the admin power
if(!isset($_SESSION['id']) || $_SESSION['user_level'] < 2){
    header('Location: /login');
    exit();
}

//Create the object article
$article = new Article($pdo);

$page = 'create_article';
$page_title = 'Créer un article';

$error_message = null;
$success_message = null;

//If the user press the button
if(isset($_POST['submit'])) {
    
    $article->title = $_POST['title'];
    $article->illustration = $_POST['illustration'];
    $article->content = $_POST['content'];

    $date = new DateTime();
    $article->creation_date = $date->getTimestamp();
    $article->category = 1; 

    if(empty($article->title)) {

        $error_message = 'Merci de mettre un titre';

    } elseif(empty($article->illustration)) {

        $error_message = 'Merci de mettre un lien d\'illustration';

    } elseif (empty($article->content)) {
        $error_message = 'Vous ne pouvez pas créer un article vide';
    }

    if($error_message == null) {
        if($article->create()) {
            $success_message = 'L\'article a été ajouté !';
        } else {
            $error_message = 'Erreur lors de l\'ajout de l\'article';
        }
    }
}

require __DIR__ . '/../header.php';

?>
    <!-- Main start -->
    <main class="main-create-article-page">
        <div class="container">
            <h2>Créer un article</h2>
            <form action="" method="post" class="form-create-article">
                <label for="title">Titre:</label>
                <input type="text" name="title" id="title">
                <label for="illustration">Lien de l'image d'illustration:</label>
                <input type="text" name="illustration" id="illustration">
                <textarea name="content" id="editor" rows="10" cols="80">
                    This is my textarea to be replaced with HTML editor.
                </textarea>
                <input class="form-create-article__button" type="submit" name="submit" value="Créer l'article">
                <?= $error_message != null ? '<p class="form-create-article__error-message">' . $error_message . '</p>' : '' ?>
                <?= $success_message != null ? '<p class="form-create-article__success-message">' . $success_message . '</p>' : '' ?>
            </form>
        </div>
        
    </main><!-- Main end -->
    <script src="ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
</body>
</html>