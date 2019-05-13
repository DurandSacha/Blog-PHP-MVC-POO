<?php
$this->title = "Back-office";
?>
<?php
include '../templates/inc/baseAdmin.php';
?>


<div class="row back-office">
    <br/>
    <br/>
    <div class="box col-lg-offset-2 col-sm-offset-1 col-md-8 col-lg-3">
        <h6>commentaire en attente <br/>
            <span class="info"> <?php echo $nbComments; ?> </span>
        </h6>
    </div>

    <div class="box col-lg-offset-1 col-sm-offset-1 col-sm-10 col-lg-3">
        <h6>article publié <br/>
            <span class="info"> <?php echo $nbArticles; ?></span>
        </h6>
    </div>
</div>

<div class="row back-office">

    <div class="box col-lg-offset-2 col-sm-offset-1 col-sm-10  col-lg-3">
        <h6>nombre d'Administrateur <br/>
            <span class="info"> <?php echo $nbAdmin; ?></span>
        </h6>
    </div>

    <div class="box col-lg-offset-1 col-sm-offset-1 col-sm-10 col-lg-3">
        <h6>Demande de rang admin <br/>
            <span class="info"> <?php echo $nbAdminWait; ?></span>
        </h6>
    </div>

</div>

<br/>
<br/>
<div class="row back-office">
    <div class="col-lg-10 col-lg-offset-1 ">

        <div class="progress-bar progress-red" role="progressbar"
             style="width: <?php echo $nbCommentDonePourcent . "%"; ?>"
             aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"> <?php echo $nbCommentDonePourcent . "%"; ?>
            Commentaire Accepté
        </div>

        <div class="progress-bar bg-success" role="progressbar"
             style="width: <?php echo $nbCommentWaitPourcent . "%"; ?>"
             aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"> <?php echo $nbCommentWaitPourcent . "%"; ?>
            Commentaire en attente
        </div>

        <div class="progress-bar bg-success progress-orangered" role="progressbar"
             style="width: <?php echo $nbCommentDeclinedPourcent . "%"; ?>"
             aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?php echo $nbCommentDeclinedPourcent . "%"; ?>
             refusé
        </div>
    </div>
</div>
