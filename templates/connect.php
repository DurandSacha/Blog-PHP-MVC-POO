<?php
$this->title = "Connexion";
?>

<!-- Form Section -->
<section id="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Connectez vous</h2>
                <hr class="star-primary">

                <br/>
                <br/>

            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <form  method="POST" action="../public/index.php?route=connect">

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email Address</label>
                            <input type="email" class="form-control" placeholder="Email Address" id="email" name="email"
                                   required data-validation-required-message="Veuillez entrez votre adresse mail.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>password</label>
                            <input type="password" class="form-control" placeholder="Mot de passe" id="password" name="password"
                                   required data-validation-required-message="Entrez votre mot de passe.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                        </div>
                    </div>
                    <a href="../public/index.php">Retour a l'accueil</a>
                </form>
            </div>
        </div>
    </div>
</section>