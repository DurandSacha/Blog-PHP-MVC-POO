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
                        <p>n°<?php echo htmlspecialchars($comment->getId()); ?>
                            . <?php echo htmlspecialchars($comment->getPseudo()); ?>
                            / <?php echo htmlspecialchars($comment->getDateAdded()); ?> : <br/>
                            <?php echo substr(htmlspecialchars($comment->getContent()), 0, 100) ?>
                        </p>
                    </div>
                    <div class="col-lg-1">
                        <a href="index.php?route=declineComment&id=<?php echo htmlspecialchars($comment->getId()); ?>"
                           class="btn btn-success btn-md"> Decline</a>
                    </div>
                    <div class="col-lg-1">
                        <a href="index.php?route=acceptComment&id=<?php echo htmlspecialchars($comment->getId()); ?>"
                           class="btn btn-success btn-md"> Validate</a>
                    </div>

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

