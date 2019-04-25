<?php
include '../templates/inc/baseAdmin.php';
?>

<div class="container admin">
    <section class="row">
        <div class=" box col-xs-3 col-sm-3 col-md-12">

            <div>

                <form method="post" action="../public/index.php?">
                    <h3> <label for="article">Ajouter un Projet</label><br /><br/></h3>
                    <label for="title">Titre</label><br>
                    <input type="text" id="title" class="form-control" name="title" value="<?php
                    if(isset($post['title'])){
                        echo $post['title'];}
                    ?>"><br>
                    <label for="content">Contenu</label><br>
                    <textarea id="content" name="content">hello</textarea><br>
                    <label for="author">Auteur</label><br>
                    <input  class="form-control"type="text" id="author" name="author" value="<?php
                    if(isset($post['author'])){
                        echo $post['author'];}
                    ?>"><br><br/>
                    <input type="submit" value="Envoyer" id="submit" name="submit">
                </form>

            </div>


        </div>


        <div class="box col-xs-3 col-sm-3 col-md-12">
            <div>
                <form method="post" action="../public/index.php?">
                    <p>

                    <h3><label for="article">Retirer un Projet</label><br /></h3>
                    <select name="id">
                        <?php
                        /*
                        foreach ($articles as $article)
                        {
                            ?>
                            <option value="<?= htmlspecialchars($article->getId());?>" name="option">
                                <?= htmlspecialchars($article->getTitle());?></option>

                            <?php
                        }*/
                        ?>
                    </select>
                    </p>
                    <input type="submit" value="Envoyer" id="submit" name="submit">
                </form>

            </div>
    </section>

    <section class="row">
        <div class="box col-xs-8 col-sm-6 col-md-12"> <!-- modifier un article -->

            <form method="POST" action="../public/index.php?route=editArticle">
                <p>

                <h3><label for="article">Modifier un Projet</label><br /></h3>
                <h4><p> selectionner le projet a modifier </p></h4>
                <select name="id">
                    <?php
                    /*
                    foreach ($articles as $article)
                    {
                        ?>
                        <option  name="option" class="form-control">
                            option1</option>
                        <?php }
                    */

                    ?>
                </select>
                </p>
                <input type="submit" value="Selection article" id="submit" name="submit"> <br/>
            </form>
            <hr>


            <form method="POST" action="../public/index.php?route=majArticle">
                <h4> Modification du titre  </h4>
                <input type="text" class="form-control" value="" name="title">
                <input type="number"  class="none" value="" name="id">

                <h4> Modification du contenu  </h4>

                <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
                <script>tinymce.init({ selector:'textarea' });</script>

                <textarea name ="content">

                   <?php// echo htmlspecialchars($blogpost->getContent());?>

                </textarea>

                <br/>


                <input type="submit" value="Modifier l'article" id="submit" name="submit">
            </form>


        </div>
    </section>

</div>