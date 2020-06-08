<?php

require __DIR__ . '/../../config/config.php';
require __DIR__ . '/../../src/functions.php'; 
require __DIR__ . '/../../src/Article.php';

//Create the object article, set the id and get the data
$article = new Article($pdo);
$article->id = get_article_id_from_url();
$article->get_data();

//Select the number of articles
$query = "SELECT id, title, illustration, creation_date FROM articles";
$stmt = $pdo->prepare($query);
$stmt->execute();
$article_list = $stmt->fetchAll(PDO::FETCH_OBJ);

//Get random articles
if (sizeof($article_list) > 4) {
    
    $other_article_number_1 = random_int(0, 4);
    $other_article_number_2 = random_int(0, 4);

    while ($other_article_number_1 == $other_article_number_2 || $other_article_number_1 == $article->id || $other_article_number_2 == $article->id) {
        $other_article_number_1 = random_int(0, 4);
        $other_article_number_2 = random_int(0, 4);
    }

    $other_articles = [
        $article_list[$other_article_number_1],
        $article_list[$other_article_number_2]
    ];

    foreach ($other_articles as $key => $_article) {
        $_article->link = '/article/' . $_article->id . '/' . preg_replace('/[[:space:]]+/', '-', $_article->title);
    }
}

$page = 'article';
$page_title = $article->title;

require __DIR__ . '/../header.php';


?>
    <!-- Main start -->
    <main class="main-article-page">
        <div class="container">
            <article>
                <header class="article-header" 
                    style="background: linear-gradient(0.15deg, rgba(0, 0, 0, 0.6) 32.53%, rgba(255, 255, 255, 0) 153.51%), 
                        url('<?= htmlspecialchars($article->illustration) ?>');">
                    <h2 class="article-header__title"><?= htmlspecialchars($article->title) ?></h2>
                    <p class="article-header__date">Publié le <?= htmlspecialchars(to_readable_date($article->creation_date)) ?></p>
                </header>
                <main>
                    <div class="article__content">
                        <?= $article->content ?>
                    </div>
                <main>
            </article>
            <!-- Other articles section -->
            <section class="section-other-articles">
                <h2 class="section-other-articles__title">D’autres articles</h2>
                <div class="section-other-articles__box">
                    <?php foreach ($other_articles as $key => $article) { ?>
                        <article class="section-other-articles__article" style="background: linear-gradient(0.15deg, rgba(0, 0, 0, 0.6) 32.53%, rgba(255, 255, 255, 0) 153.51%), 
                        url('<?= htmlspecialchars($article->illustration) ?>');">
                            <a href="<?= htmlspecialchars($article->link) ?>" title="<?= htmlspecialchars($article->title) ?>">
                                <h3 class="section-other-articles__article__title"><?= htmlspecialchars($article->title) ?></h3>
                                <p class="section-other-articles__article__date"><?= htmlspecialchars(to_readable_date($article->creation_date)) ?></p>
                            </a>
                        </article>
                    <?php } ?>
                </div>
            </section>
        </div>
    </main><!-- Main end -->
</body>
</html>