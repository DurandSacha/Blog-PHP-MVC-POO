<?php
$this->title = "Modifier un article";
?>
<?php
include '../templates/inc/baseAdmin.php';
?>

<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>

<h1>Mon blog</h1>
<div>

    <form method="post" action="../public/index.php?route=editArticle">      <!-- ?route=rmArticle -->

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
       <label for="article">Quel article voulez vous Modifier ?</label><br />
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


    <textarea id="tinymce">
        <?php
        //echo $_POST['content'];
        echo htmlspecialchars($article->getContent());
        htmlspecialchars($article->getContent());
        ?>
    </textarea>



    <a href="../public/index.php">Retour à l'accueil</a>
</div>