<?php
include '../templates/inc/baseAdmin.php';
?>
<br/>
<br/>
<br/>
<div class="container admin">
    <h2> Derniers Commentaires</h2><br/>
    <a href="index.php?route=admincommentaireWait" class="btn btn-success btn-md"> Voir les commentaires en attentes</a><br/><br/>
    <?php
    foreach ($comments as $comment)
    {   /*htmlspecialchars($article->getId());*/
    ?>
    <div class="row">
    <div id="range">
        <br/><hr/>
        <div class="col-lg-4">
            <p>n°<?php echo htmlspecialchars($comment->getId());?>. <?php echo htmlspecialchars($comment->getPseudo());?>
                / <?php echo htmlspecialchars($comment->getDateAdded());?>
            </p>
        </div>
        <div class="col-lg-2">
            <a  class="btn btn-success btn-md"> <?php echo htmlspecialchars($comment->getStatus());?></a>
        </div>


        <div class="col-lg-3">
            <p><?php echo htmlspecialchars($comment->getContent());?></p>
        </div>

    </div>
</div>

<?php
}
?>

<br/>
<br/>
<br/>

</div>
