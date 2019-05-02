<?php
$this->title = "Back-office";
?>
<?php
include '../templates/inc/baseAdmin.php';
?>

<!-- Mise en forme bibliotheque chart.js // google charts // ZingChart // HighCharts (3D) -->
<div class="row">

    <div class="box col-lg-offset-1 col-lg-2">
        <h6>commentaire en attente <br/>
            <span class="info"> <?php echo $nbComments; ?> </span>
        </h6>
    </div>

    <div class="col-lg-offset-1 box col-lg-3">
        <h6>article publié <br/>
            <span class="info"> <?php echo $nbArticles; ?></span>
        </h6>
    </div>

    <div class="col-lg-offset-1 box col-lg-2">
        <h6>nombre d'Administrateur <br/>
            <span class="info"> <?php echo $nbAdmin; ?></span>
        </h6>
    </div>
</div>

<div class="row">

    <div class="col-lg-offset-1 box col-lg-3">
        <h6>Demande de rang admin <br/>
            <span class="info"> <?php echo $nbAdminWait; ?></span>
        </h6>
    </div>

</div>
