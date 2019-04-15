<?php
$this->title = "Retirer un article";
?>
<?php
include '../templates/inc/baseAdmin.php';
?>
<div class="row">
<h1>Mon blog</h1>
<div>

    <form method="post" action="../public/index.php?route=rmArticle">      <!-- ?route=rmArticle -->

        <p>
        <?php
        /*
        echo 'test';
        var_dump($post);
        */
        ?>
        <br/>
        <br/>
        <br/>
       <label for="article">Quel article voulez vous retirer ?</label><br />
       <select name="id">
            <?php
            foreach ($articles as $article)
            {
            ?>
                <option value="<?= htmlspecialchars($article->getId());?>" name="option"> 
                <?= htmlspecialchars($article->getTitle());?></option>
                
            <?php
            }
            ?>
       </select>
   </p>
        <input type="submit" value="Envoyer" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>
</div>