<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MK Transport - Užsakymo forma</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">
	<link href="css/mano.css" rel="stylesheet">

  </head>

	<body id="page-top">

    <!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" style="background-color:white;">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php#page-top" style="color:tomato;">MK Transport</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php#about"  style="color:black;">Pradžia</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php#services" style="color:black;">Paslaugos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php#apiemus" style="color:black;">Apie Mus</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#contact" style="color:black;">Kontaktai</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger" style="color:tomato;">Užsakyti</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	
	<section class="bg-primary" id="uzsakyti">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h3 class="section-heading text-white">Siuntos užsakymas:</h3>
            <hr class="light my-4">
			<form method="POST" action="uzsakyti2.php">
			<div class="row">
				<div class="text-faded mb-1 col-sm-6">Siuntėjo vardas, pavardė:</div>
				<div class="col-sm-6 mb-3"><input name="vardas" class="form-control" type="text" placeholder="Vardas Pavardė"></div>
			</div>
			<div class="row">
				<div class="text-faded mb-1 col-sm-6">Siuntėjo tel. numeris (būtina):</div>
				<div class="col-sm-6 mb-3"><input name="tel" class="form-control" type="text" placeholder="pvz. 086 1234567"></div>
			</div>
			<div class="row">
				<div class="text-faded mb-1 col-sm-6">Siuntėjo adresas:</div>
				<div class="col-sm-6 mb-3"><textarea name="adresas" class="form-control" rows="4" placeholder="pvz. 1 street, Dublin 1.."></textarea></div>
			</div>
			<div class="row">
				<div class="text-faded mb-1 col-sm-6">Siuntėjo elektroninis paštas:</div>
				<div class="col-sm-6 mb-3"><input name="emailas" type="email" class="form-control" type="text" placeholder="pvz. email@email.lt"></div>
			</div>
			<div class="row">
				<div class="text-faded mb-1 col-sm-6">Siuntinio svoris kg.(apytiksliai):</div>
				<div class="col-sm-6 mb-3"><input name="svoris" type="number" class="form-control" type="text" placeholder="pvz. 15"></div>
			</div>
			<div class="row">
				<p class="text-faded mb-1 col-sm-6">Papildoma informacija:<br>
				<div class="col-sm-6 mb-5"><textarea name="papildoma" class="form-control" rows="5" placeholder="pvz. Matmenys, jei didelis. Dviratis. Padangos.. Pageidaujamas paėmimo laikas.. Papildomas tel. numeris.."></textarea></div>
            </div>
			<div class="row">
				<div class="col-sm-12 mb-3"><button class="btn btn-light btn-xl js-scroll-trigger">Užsakyti</button>
			</div>
          </form>
		  </div>
        </div>
      </div>
    </section>
	
	<?php
	include "footer.php";
	?>
	
	<!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>
	
	</body>