<!DOCTYPE html>

<?php
/**
* Récuparation du thème coloré actuellement stockée dans la base de donnée
*/

$sql = "SELECT * FROM Options WHERE Options.option__nom = 'option__couleur'";
include './core/query.php'; $result = $conn->query($sql);
if ($result && $result->num_rows > 0):
  while($row = $result->fetch_assoc()):
    $couleurActuelle = $row["option__valeur"];
  endwhile;
else:
  // Si pas de thème, afficher le thème coloré Rouge-trash par defaut
  $couleurActuelle = "__rouge-trash-mode";
endif;
?>

<html lang="fr" class="<?php echo '__'.$couleurActuelle.'-mode' ?>">
<head>
	<meta charset="UTF-8">
	<title>Nadine</title>
	<meta name="description" content="👨‍💻 Premier logiciel open source de compta pour la Maison des Artistes : essayer Nadine, c'est l'adopter. 👍" >
	<meta name="keywords" content="Comptabilité, Maison des Artistes, MDA, précompte, artistes, gratuit, free, logiciel, facture, devis, open-source" >
	<meta name="contact" content="bonjour@nadinecorp.net">
	<meta content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<link rel="apple-touch-icon" sizes="57x57" href="./assets/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="./assets/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="./assets/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="./assets/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="./assets/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="./assets/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="./assets/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="./assets/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="./assets/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="./assets/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="./assets/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="./assets/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.typekit.net/znq5njd.css">
	<link rel='stylesheet' type='text/css' media="all" href='./style.min.css'>
	<link rel="stylesheet" type="text/css" media="print"  href="./assets/sass/print/impression.css">
	<script src="./assets/js/jquery.min.js"></script>
</head>


<body>
	<header class="l-header">
		<div class="l-header__logo isv--parent">
			<a href="./index.php"><?php include './assets/img/inline-nadine-logo.svg.php'; ?></a>
		</div>

		<div class="l-header__bar subheading">
			<input type="text" name="" value="" placeholder="Soon™ : pleins de trucs ici.">
		</div>

		<nav class="l-header__nav">
			<ul class="nav__main">
				<li class="menu__item"><a href="./projets.php" class="lead_paragraph">Projets</a></li>
				<li class="menu__item"><a href="./diffuseurs.php" class="lead_paragraph">Diffuseurs</a></li>
				<li class="menu__item"><a href="./artistes.php" class="lead_paragraph">Artistes</a></li>
				<li class="menu__item"><a href="./suivi.php" class="lead_paragraph">Suivi</a></li>
        <li class="menu__item"><button type="button" class="btn__menu-more-vert"><?php include './assets/img/inline-icon_more-vert.svg.php'; ?></button></li>
			</ul>

			<ul class="nav__subnav menu">
				<li><a href="./profil.php">Modifier votre profil</a></li>
				<li><a href="./bilan.php">Générer le bilan annuel</a></li>
				<li class="separator"><a href="https://discord.gg/Fg2m8gvdWR" target="_blank">Rejoindre le NadineClub©</a></li>
				<li><a href="mailto:coucoucorine@nadinecorp.net" target="_blank">Demander de l'aide par mail</a></li>
				<li class="separator"><a href="./log.php">Journal de dévéloppement</a></li>
			</ul>
		</nav>


		<div class="l-header__btn-color"></div>


	</header>
	<main>
