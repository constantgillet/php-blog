<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devenir gopnik | <?= htmlspecialchars($page_title) ?></title>
    <link rel="stylesheet" href="/public/styles/main.css">
    <link rel="icon" type="image/png" href="/favicon.png" />
</head>
<body class="<?= $page == 'homepage' ? 'body-homepage' : '' ?>">
    <!-- Header start -->
    <header class="header-main">
        <a href="/" title="Accueil du site">
            <img src="/public/images/logo.png" alt="Website logo" class="header-main__logotype"> 
            <h1 class="header-main__title">Devenir-gopnik.gouv</h1>
        </a>
        <nav class="header-navigation">
            <ul class="header-navigation__list">
                <!-- <a href=""><li class="header-navigation__list__list-item">Catégorie</li></a>
                <a href=""><li class="header-navigation__list__list-item">Catégorie</li></a> -->
                <?php if (isset($_SESSION['id'])) { ?>
                    <a href="/create"><li class="header-navigation__list__list-item">Ajouter un article</li></a>
                    <a href="/logout"><li class="header-navigation__list__list-item">Se déconnecter</li></a>
                <?php } else { ?>
                    <a href="/login"><li class="header-navigation__list__list-item">Se connecter</li></a>
                <?php } ?> 
            </ul>
        </nav>
    </header> <!-- Header end -->