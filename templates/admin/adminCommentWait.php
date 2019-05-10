<?php
include '../templates/inc/baseAdmin.php';
?>

<br/>
<br/>
<br/>
<div class="container admin">
    <h2> Commentaires en attente</h2><br/>
    <a href="index.php?route=admincommentaire" class="btn btn-success btn-md"> Retour au Derniers commentaires</a><br/><br/>
    <?php

    if (isset($comments)) {

        foreach ($comments as $comment) {   /*htmlspecialchars($article->getId());*/
            ?>
            <div class="row">
                <div id="range">
                    <br/>
                    <hr/>
                    <div class="col-lg-4">
                        <p>article n°<?php echo htmlspecialchars($comment->getArticle_id()); ?>
                            / <?php echo htmlspecialchars($comment->getPseudo()); ?>
                            / <?php echo htmlspecialchars($comment->getDateAdded()); ?> : <br/>
                            <?php echo html_entity_decode(substr(htmlspecialchars($comment->getContent()), 0, 100)) ?>
                        </p>
                    </div>
                    <div class="col-lg-1">
                        <a href="#comfirmDelete"  data-toggle="modal"
                           class="red btn btn-success btn-md"> Decline</a>
                    </div>
                    <div class="col-lg-1">
                        <a href="index.php?route=acceptComment&id=<?php echo htmlspecialchars($comment->getId()); ?>"
                           class="btn btn-success btn-md"> Validate</a>
                    </div>

                </div>
            </div>

            <!-- essai boite de dialogue suppression -->

            <!--  <a href="index.php?route=declineComment&id=< ?php echo htmlspecialchars($comment->getId()); ?>"
                                       type="button" class="btn btn-default" ><i class="fa fa-times"></i> Delete</a>
                                       -->
            <div class=" portfolio-modal modal fade" id="comfirmDelete" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="alert alert-danger" role="alert">
                    <p> Etes vous sur de vouloir supprimer ce commentaire ?<br/> </p>
                    <a href="index.php?route=declineComment&id=<?php echo htmlspecialchars($comment->getId()); ?>"
                       type="button" class="btn btn-default" ><i class="fa fa-times"></i> Delete</a>
                </div>
            </div>

            <?php
        }
    }






    else {
        echo '<h4> Pas de commentaire en attente </h4>';
    }
    ?>

    <br/>
    <br/>
    <br/>

</div>

