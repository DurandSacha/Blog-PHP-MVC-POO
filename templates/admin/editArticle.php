<?php
$this->title = "Modifier un article";
include '../templates/inc/baseAdmin.php';
?>
<br/>
<br/>
<section class="row">
    <div class="box col-xs-8 col-sm-6 col-md-12">

        <form method="POST" action="../public/index.php?route=majArticle">
            <h4> Modification du titre </h4>
            <input type="text" class="form-control" value="<?php echo htmlspecialchars($blogpost->getTitle()); ?>"
                   name="title">
            <input type="number" class="none" value="<?php echo htmlspecialchars($blogpost->getId()); ?>" name="id">

            <h4> Modification du contenu </h4>

            <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
            <script>tinymce.init({selector: 'textarea'});</script>

            <textarea name="content">

                   <?php echo htmlspecialchars($blogpost->getContent()); ?>

                </textarea>

            <br/>
            <h4> Modification de l'auteur </h4>
            <select name="author">
                <?php
                foreach ($authors as $author) {
                    ?>
                    <option value="<?php echo htmlspecialchars($author->getUsername()); ?>" name="author" id="author"
                            class="form-control"
                    > <?php echo htmlspecialchars($author->getUsername()); ?>
                    </option>
                    <?php
                }
                ?>
            </select><br/><br/>
            <input type="submit" value="Modifier l'article" id="submit" name="submit" class="btn btn-success btn-lg">
        </form>


    </div>
</section>