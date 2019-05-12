<?php
include '../templates/inc/baseAdmin.php';
$this->title ="Droit - Back-office";
?>
<br/>
<br/>
<br/>
<div class="container admin">
    <br/>
    <br/>

    <h2> Demande d'élévation au rang admin en attente</h2><br/>

    <?php
    foreach ($privileges as $privilege)
    {
        ?>
        <div class="row">
            <div id="range">
                <br/><hr/>
                <div class="col-lg-4">
                    <p><?php echo htmlspecialchars($privilege->getId());?> / <?php echo htmlspecialchars($privilege->getUsername());?></p>
                </div>


                <div class="bouton-groupe">
                    <div class="col-lg-2">
                        <a href="#comfirmDelete"  data-toggle="modal"
                           class="red btn btn-success btn-md"> Decline</a>
                    </div>
                    <div class="col-lg-3">
                        <a href="index.php?route=acceptUser&id=<?php echo htmlspecialchars($privilege->getId()); ?>"
                           class="btn btn-success btn-md"> Accept Request</a>
                    </div>
                </div>
            </div>
        </div>

        <div class=" portfolio-modal modal fade" id="comfirmDelete" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="alert alert-danger" role="alert">
                <p> Voulez vous vraiment refuser la demande administrateur  ? <br/></p>
                <a href="index.php?route=declineUser&id=<?php echo htmlspecialchars($privilege->getId()); ?>"
                   type="button" class="btn btn-default" ><i class="fa fa-times"></i> Delete</a>
            </div>
        </div>



        <?php
    }
    ?>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>

</div>

