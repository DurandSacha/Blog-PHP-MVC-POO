<?php
include '../templates/inc/baseAdmin.php';
?>
<br/>
<br/>
<br/>
<div class="container admin">
<h2> Liste des articles</h2><br/>
    <a href="index.php?route=addArticle" class="btn btn-success btn-md"> Ajouter un article</a><br/><br/>
    <?php
    foreach ($articles as $article)
    {   /*htmlspecialchars($article->getId());*/
    ?>
        <div class=""row">
            <div id="range">
                <br/><hr/>
                <div class="col-lg-4">
                    <p>n°<?php echo htmlspecialchars($article->getId());?>. <?php echo htmlspecialchars($article->getTitle());?></p>
                </div>
                <div class="col-lg-2">
                    <a href="index.php?route=editArticle&id=<?php echo htmlspecialchars($article->getId());?>" class="btn btn-success btn-md"> Update</a>
                </div>
                <div class="col-lg-2">
                    <a href="index.php?route=rmArticle&id=<?php echo htmlspecialchars($article->getId());?>" class="btn btn-success btn-md"> Delete</a>
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














    <!--
    <section class="row">
        <div class=" box col-xs-3 col-sm-3 col-md-12"> < !-- ajouter article

            <div>

                <form method="post" action="../public/index.php?route=addArticle">
                   <h3> <label for="article">Ajouter un BlogPost</label><br /><br/></h3>
                    <label for="title">Titre</label><br>
                    <input type="text" id="title" class="form-control" name="title" value="< ?php
                    if(isset($post['title'])){
                        echo $post['title'];}
                    ?>"><br>
                    <label for="content">Contenu</label><br>
                    <textarea id="content" name="content">< ?php if(isset($post['content'])){ echo $post['content']; } ?></textarea><br>
                    <label for="author">Auteur</label><br>
                    <input  class="form-control"type="text" id="author" name="author" value="< ?php
                    if(isset($post['author'])){
                        echo $post['author'];}
                    ?>"><br><br/>
                    <input type="submit" value="Envoyer" id="submit" name="submit">
                </form>

            </div>


        </div>


        <div class="box col-xs-3 col-sm-3 col-md-12">
            <div>
                <form method="post" action="../public/index.php?route=rmArticle">
                    <p>

                        <h3><label for="article">Retirer un article</label><br /></h3>
                        <select name="id">
                            < ?php
                            foreach ($articles as $article)
                            {
                                ?>
                                <option value="< ?= htmlspecialchars($article->getId());?>" name="option">
                                    < ?= htmlspecialchars($article->getTitle());?></option>

                                < ?php
                            }
                            ?>
                        </select>
                    </p>
                    <input type="submit" value="Envoyer" id="submit" name="submit">
                </form>

        </div>
    </section>

    <section class="row">
        <div class="box col-xs-8 col-sm-6 col-md-12"> < !-- modifier un article

            <form method="POST" action="../public/index.php?route=editArticle">
                <p>

                    <h3><label for="article">Modifier un article</label><br /></h3>
                <h4><p> selectionner l'article a modifier </p></h4>
                    <select name="id">
                        < ?php
                        foreach ($articles as $article)
                        {
                            ?>
                            <option value="< ?= htmlspecialchars($article->getId());?>" name="option" class="form-control">
                                < ?= htmlspecialchars($article->getTitle());?></option>
                            < ?php
                            // default
                            // htmlspecialchars($blogpost->getTitle());
                        }
                        ?>
                    </select>
                </p>
                <input type="submit" value="Selection article" id="submit" name="submit"> <br/>
            </form>
            <hr>


            <form method="POST" action="../public/index.php?route=majArticle">
                <h4> Modification du titre  </h4>
                <input type="text" class="form-control" value="< ?= htmlspecialchars($blogpost->getTitle());?>" name="title">
                <input type="number"  class="none" value="< ?htmlspecialchars($blogpost->getId());?>" name="id">

                <h4> Modification du contenu  </h4>

                <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
                <script>tinymce.init({ selector:'textarea' });</script>

                <textarea name ="content">

                   < ?php echo htmlspecialchars($blogpost->getContent());?>

                </textarea>

                <br/>
                <h4> Modification de l'auteur </h4>
                <input type="text" class="form-control"value="< ?= htmlspecialchars($blogpost->getAuthor());?>" name="author"><br/><br/>

                <input type="submit" value="Modifier l'article" id="submit" name="submit">
            </form>


        </div>
    </section>

</div>


-->













