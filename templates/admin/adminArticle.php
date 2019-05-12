<?php
include '../templates/inc/baseAdmin.php';
$this->title = "Article - Back-office";

?>
<br/>
<br/>
<br/>
<div class="container admin">
    <h2> Liste des articles</h2><br/>
    <a href="index.php?route=addArticle" class="btn btn-success btn-md"> Ajouter un article</a><br/><br/>
    <?php
    foreach ($articles as $article) {
        ?>
        <div class="row">
            <div id="range">
                <br/>
                <hr/>
                <div class="col-lg-4 col-sm-4 col-sm-4">
                    <p>n°<?php echo htmlspecialchars($article->getId()); ?>
                        . <?php echo htmlspecialchars($article->getTitle()); ?></p>
                </div>

                <div class="bouton-groupe">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <a href="index.php?route=editArticle&id=<?php echo htmlspecialchars($article->getId()); ?>"
                           class="btn btn-success btn-md"> Update</a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <a href="#comfirmDelete" data-toggle="modal"
                           class="red btn btn-success btn-md"> Delete</a>
                    </div>
                </div>


            </div>
        </div>

        <div class=" portfolio-modal modal fade" id="comfirmDelete" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="alert alert-danger" role="alert">
                <p> Voulez vous vraiment supprimer cet article ? <br/></p>
                <a href="index.php?route=rmArticle&id=<?php echo htmlspecialchars($article->getId()); ?>"
                   type="button" class="btn btn-default"><i class="fa fa-times"></i> Delete</a>
            </div>
        </div>
        <?php
    }
    ?>
    <br/>
    <br/>
    <br/>

</div>




























