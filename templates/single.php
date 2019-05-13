<?php
$this->title = "Article";
?>
<h1>Mon blog</h1>
<br/>

<br/>
<div id="post">
    <h2><?= htmlspecialchars($article->getTitle()); ?></h2>

    <p><?= html_entity_decode(htmlspecialchars($article->getContent())); ?></p>
    <p><?= htmlspecialchars($article->getUsername()); ?></p>
    <p>Mis a jour le : <?= htmlspecialchars($article->getDateAdded()); ?></p>
</div>
<br>
<hr>
<div id="comments" class="text-left" style="margin-left: 50px">
    <h3>Commentaires</h3> <br/><br/>
    <?php
    foreach ($comments as $comment) {
        ?>
        <?php
        if ($comment->getstatus() == 'declined') {
            echo htmlspecialchars($comment->getPseudo()) . '<h6>Ce commentaire a été modéré</h6> <br/><br/>';
        } else {
            ?>
            <div id="single_comment">
                <h4><?= htmlspecialchars($comment->getPseudo()); ?></h4>
                <p><?= html_entity_decode(htmlspecialchars($comment->getContent())); ?></p>
                <p>Posté le <?= htmlspecialchars($comment->getDateAdded()); ?></p>
            </div>

            <?php
        }
    }
    ?>

    <br/><br/>
    <div id="postcomment">
        <h3> Ajouter un commentaire ( membre connecté )</h3>

        <?php

        if (isset($_SESSION['user']) == 'membre' or isset($_SESSION['user']) == 'admin') {
            ?>

            <div class="col-xs-3 col-sm-3 col-md-12">

                <div>

                    <form method="post" action="../public/index.php?route=addComment">

                        <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
                        <script>tinymce.init({
                                selector: 'textarea'
                            });
                        </script>

                        <label for="content">Contenu</label><br>
                        <textarea id="content" name="content"></textarea><br>

                        <input type="text" value="<?php echo $_GET['idArt']; ?>" id="id" name="id"
                               class="none"><br/><br/>

                        <input type="submit" value="Poster le commentaire" id="submit" name="submit"
                               class="btn btn-success btn-lg">
                        <br/>
                    </form>

                </div>
            </div>


            <?php
        } else {
            echo '<h4> Connectez vous !</h4>';
        }
        ?>


    </div>


</div><br/><br/>
<a href="../public/index.php">Retour à la liste des articles</a>
<hr>


<body id="page-top" class="index">

<!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#page-top">Sacha Durand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="page-scroll">
                    <a href="index.php?#portfolio">Portfolio</a>
                </li>
                <li class="page-scroll">
                    <a href="index.php?#about">About</a>
                </li>
                <li class="page-scroll">
                    <a href="index.php?#contact">Contact</a>
                </li>

                <li class="page-scroll">
                    <a href="../public/index.php?route=blog">Blog</a>
                </li>
            </ul>
        </div>

    </div>

</nav>


<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-4">
                    <h3>Member Space</h3>
                    <?php
                    if (isset($_SESSION['user']) == 'membre' or isset($_SESSION['user']) == 'admin') {
                        ?>
                        <?php
                        if (isset($_SESSION['user']) == 'admin') {
                            ?>
                            <a href="index.php?route=adminarticle" class="btn btn-success btn-lg">Le back-office</a>
                            <br/><br/>
                        <?php }
                        ?>

                        <a href="index.php?route=deconnexion" class="btn btn-success btn-lg"> Se déconnecter</a>

                    <?php } else {
                        ?>


                        <br>
                        <a href="index.php?route=connect" class="btn btn-success btn-lg"> Connexion</a></p><br>

                        <p class="small"> Pas encore inscrit ? <br/>
                            <a href="index.php?route=register" class="btn btn-success btn-lg"> Inscription</a>
                        </p>


                        <?php
                    } ?>
                </div>
                <div class="footer-col col-md-4">
                    <h3>Around the Web</h3>
                    <ul class="list-inline">
                        <li>
                            <a href="https://github.com/DurandSacha/" class="btn-social btn-outline"><i
                                        class="fa fa-fw fa-github"></i></a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/in/sacha-durand-687032150" class="btn-social btn-outline"><i
                                        class="fa fa-fw fa-linkedin"></i></a>
                        </li>
                        <li>

                    </ul>
                </div>
                <div class="footer-col col-md-4">
                    <h3>About me</h3>
                    <p>Freelance is a free to use, open source Bootstrap theme created by <a
                                href="http://startbootstrap.com">Start Bootstrap</a>.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; Sacha Durand
                </div>
            </div>
        </div>
    </div>
</footer>



<div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>


</body>