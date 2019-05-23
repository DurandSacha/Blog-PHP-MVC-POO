<?php
require "../vendor/autoload.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Sacha Durand">

    <title><?= $title ?></title>


    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">


    <link href="../public/css/style.css">
    <!-- Theme CSS -->
    <link href="../public/css/freelancer.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">

</head>

<div id="content">
    <?= $content ?>
</div>


<!-- jQuery -->
<script src="../vendor/jquery/jquery-3.4.1.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="../public/js/jqBootstrapValidation.js"></script>
<script src="../public/js/contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="../public/js/freelancer.js"></script>
</html>