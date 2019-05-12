<?php
$this->title = "Ajouter un article";
?>
<?php
include '../templates/inc/baseAdmin.php';
?>
<br/>
<br/>
<br/>

<div class=" box col-xs-3 col-sm-3 col-md-12">

    <div>

        <form method="post" action="../public/index.php?route=addArticle">
            <h3><label for="article">Ajouter un BlogPost</label><br/><br/></h3>
            <label for="title">Titre</label><br>
            <input type="text" id="title" class="form-control" name="title" value="<?php
            if (isset($post['title'])) {
                echo $post['title'];
            }
            ?>"><br>

            <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
            <script>tinymce.init({
                    selector: 'textarea'
                });
            </script>


            <label for="content">Contenu</label><br>
            <textarea id="content" name="content"><?php if (isset($post['content'])) {
                    echo $post['content'];
                } ?></textarea><br>

            <label for="author">Auteur</label><br>
            <select name="author">
                <?php
                foreach ($authors as $author) {
                    ?>
                    <option value="<?php echo htmlspecialchars($author->getUsername()); ?>" name="author" id="author"
                            class="form-control"
                    > <?php echo htmlspecialchars($author->getUsername()); ?>
                    </option>
                    <!--<input type="text" class="form-control"value="< ?php echo htmlspecialchars($blogpost->getAuthor());?>" name="author"><br/><br/> -->
                    <?php
                }
                ?>
            </select><br/><br/>


            <input type="submit" value="Envoyer" id="submit" name="submit" class="btn btn-success btn-lg">
                </form>

            </div>
</div>


