<?php
$this->title = "Accueil";
?>
<h1>Mon blog</h1>

<?php
foreach ($articles as $article)
{
?>
    <div id="post">
        <h2><a href="../public/index.php?route=article&idArt=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
        <p><?= htmlspecialchars($article->getContent());?></p>
        <p><?= htmlspecialchars($article->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($article->getDateAdded());?></p>
    </div>
    <br>
<?php
}
?>
<a href="../public/index.php?route=addArticle">Ajouter un article ici</a><br/>
<a href="../public/index.php?route=rmArticle">Retirer un article ici</a>
