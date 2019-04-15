<?php
include '../templates/inc/baseAdmin.php';
?>

<div class="container">
    <section class="row">
        <div class=" box col-xs-3 col-sm-3 col-md-12"> <!-- ajouter article -->

            <div>

                <form method="post" action="../public/index.php?route=addArticle">
                    <label for="article">Ajouter un BlogPost</label><br /><br/>
                    <label for="title">Titre</label><br>
                    <input type="text" id="title" name="title" value="<?php
                    if(isset($post['title'])){
                        echo $post['title'];}
                    ?>"><br>
                    <label for="content">Contenu</label><br>
                    <textarea id="content" name="content"><?php if(isset($post['content'])){ echo $post['content']; } ?></textarea><br>
                    <label for="author">Auteur</label><br>
                    <input type="text" id="author" name="author" value="<?php
                    if(isset($post['author'])){
                        echo $post['author'];}
                    ?>"><br>
                    <input type="submit" value="Envoyer" id="submit" name="submit">
                </form>

            </div>


        </div>


        <div class="box col-xs-3 col-sm-3 col-md-12"> <!-- Enlever un article -->
            <div>
                <form method="post" action="../public/index.php?route=rmArticle">      <!-- ?route=rmArticle -->
                    <p>

                        <label for="article">Retirer un article</label><br />
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

        </div>
    </section>

    <section class="row">
        <div class="box col-xs-8 col-sm-6 col-md-12"> <!-- modifier un article -->

            <form method="POST" action="../public/index.php?route=editArticle">      <!-- ?route=rmArticle -->
                <p>

                    <label for="article">Modifier un article</label><br />
                <p> selectionner l'article a modifier </p>
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

                <input type="submit" value="Selection article" id="submit" name="submit"> <br/>
                <?php
                debug($_POST);
                ?>
            </form>
            <form method="POST" action="../public/index.php?route=editArticle">
                <p> Modification du titre  </p>
                <input type="text">

                <p> Modification du contenu  </p>

                <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
                <script>tinymce.init({ selector:'textareatiny' });</script>

                <textareatiny>

                   <?php echo htmlspecialchars($article->getContent());?>

                </textareatiny>

                <br/>
                <p> Modification de l'auteur </p>
                <input type="text"><br/><br/>

                <input type="submit" value="Modifier l'article" id="submit" name="modifier">
            </form>

        </div>
    </section>
    <a href="../public/index.php">Retour à l'accueil</a>


    <p><?= htmlspecialchars($article->getTitle());?></p>
    <p><?= htmlspecialchars($article->getContent());?></p>
    <p><?= htmlspecialchars($article->getAuthor());?></p>
    <p><?= htmlspecialchars($article->getDateAdded());?></p>

    <?php
    debug($_POST['id']);
    ?>

</div>
















