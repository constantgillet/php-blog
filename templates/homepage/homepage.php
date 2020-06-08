
<?php 
    require __DIR__ . '/../../config/config.php'; 
    require __DIR__ . '/../../src/Article.php'; 
    require __DIR__ . '/../../src/functions.php'; 

    //Get articles data
    $query = "SELECT id, title, illustration, creation_date FROM articles ORDER BY id DESC LIMIT 5";
    $stmt = $pdo->prepare($query);

    if($stmt->execute()) {
        $articles = $stmt->fetchAll(PDO::FETCH_OBJ);

        foreach ($articles as $key => $article) {
            $article->link = '/article/' . $article->id . '/' . preg_replace('/[[:space:]]+/', '-', $article->title);
        }
    }

    $page = 'homepage';
    $page_title = 'Accueil';


    require __DIR__ . '/../header.php';
?>
    <!-- Main start -->
    <main class="main-index">

        <?php if(sizeof($articles) > 0) { ?>
            <!-- last blogs section start -->
            <section class="last-articles">
                <h2 class="last-articles__title">Les derniers articles</h2>
                <div class="last-articles__article-list-box">

                    <div class="last-articles__article-list-box__box">

                        <?php for ($i=0; $i < 2; $i++) { ?>
                            <article class="last-articles__article" style="background: linear-gradient(0.28deg, rgba(0, 0, 0, 0.6) 32.53%, rgba(255, 255, 255, 0) 153.51%), url('<?= htmlspecialchars($articles[$i]->illustration) ?>');">
                                <a href="<?= htmlspecialchars($articles[$i]->link); ?>" title="<?= htmlspecialchars($articles[$i]->title) ?>">
                                    <h3 class="last-articles__article__title"><?= htmlspecialchars($articles[$i]->title) ?></h3>
                                    <p class="last-articles__article__date"><?= to_readable_date($articles[$i]->creation_date) ?></p>
                                </a>
                            </article>  
                        <?php } ?>

                    </div>
                    <article class="last-articles__main-article" style="background: linear-gradient(0.72deg, rgba(0, 0, 0, 0.6) 32.53%, rgba(255, 255, 255, 0) 153.51%), url('<?= htmlspecialchars($articles[2]->illustration) ?>');">
                        <a href="<?= htmlspecialchars($articles[2]->link); ?>" title="<?= htmlspecialchars($articles[2]->title) ?>">
                            <h3 class="last-articles__main-article__title"><?= htmlspecialchars($articles[2]->title); ?></h3>
                            <p class="last-articles__main-article__date"><?= to_readable_date($articles[2]->creation_date) ?></p>
                        </a>
                    </article>
                    <div class="last-articles__article-list-box__box">

                        <?php for ($i=3; $i < 5; $i++) { ?>
                            <article class="last-articles__article" style="background: linear-gradient(0.28deg, rgba(0, 0, 0, 0.6) 32.53%, rgba(255, 255, 255, 0) 153.51%), url('<?= htmlspecialchars($articles[$i]->illustration) ?>');">
                                <a href="<?= htmlspecialchars($articles[$i]->link); ?>" title="<?= htmlspecialchars($articles[$i]->title) ?>">
                                    <h3 class="last-articles__article__title"><?= htmlspecialchars($articles[$i]->title) ?></h3>
                                    <p class="last-articles__article__date"><?= to_readable_date($articles[$i]->creation_date) ?></p>
                                </a>
                            </article>  
                        <?php } ?>

                    </div>
                </div>
            </section>
        <?php } ?>
    </main><!-- Main end -->
</body>
</html>