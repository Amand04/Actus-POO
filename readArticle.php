<?php
require("./header.php");
$articleManager = new ArticlesManager();
$article = $articleManager->getById($_GET["id"]);

$commentManager = new CommentsManager();
$comments = $commentManager->getAllByArticleId($_GET["id"]);

if ($_POST) {
    $comment = new Comment([
        "content" => $_POST["content"],
        "article_id" => $_GET["id"]
    ]);
    $commentManager->create($comment);

    echo "<script>window.location.href='./readArticle.php?id={$_GET['id']}'</script>";
}
?>
<div class="container mt-2">
    <h3><?= $article->getTitle() ?></h3>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <p class="card-text"><?= $article->getContent() ?>...</p>
            <a href="./updateArticle.php?id=<?= $article->getId() ?>" class="btn btn-dark">Modifier</a>
            <a href="./deleteArticle.php?id=<?= $article->getId() ?>" class="btn btn-dark">-</a>
        </div>
    </div>
    <div class="mt-3">
        <h3>Commentaires</h3>
        <form method="post">
            <textarea name="content" id="content" placeholder="Votre commentaire" class="form-control"></textarea>
            <input type="submit" value="Poster" class="btn btn-dark mt-2">
        </form>
    </div>

    <div class="d-flex flex-wrap mt-3">
        <?php foreach ($comments as $comment) : ?>
            <div class="card me-2 mt-2" style="width: 18rem;">
                <div class="card-body">
                    <p class="card-text"><?= $comment->getContent() ?>...</p>
                    <a href="./updateComment.php?id=<?= $comment->getId() ?>" class="btn btn-dark">Modifier</a>
                    <a href="./deleteComment.php?id=<?= $comment->getId() ?>" class="btn btn-dark">-</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
</body>

</html>