<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', TRUE);

include "inc/common.inc.php";

// init des var
$attente1 = "";
$attente2 = "";
$attente3 = "";


// Récupère pour le groupe la question les informations
if (openDb()){
	if ($ret = getQuestData($_COOKIE["anim-hm"],1)){

		$json = json_decode($ret['valeur'],true);

		$attente1 = urldecode($json['att1']);
		$attente2 = urldecode($json['att2']);
		$attente3 = urldecode($json['att3']);

	}else{
		// echo "erreur";
	}
}else{
	echo "impossible de se connecter à la base de données";
	die();
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" xmlns="http://www.w3.org/1999/html"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
		<!--[if lt IE 9]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
		<noscript>
            <div class="no-js-warning">Ce site nécessite l'utilisation de JavaScript!</div>
        </noscript>
		<!-- [ CONTENT ] -->
		<div class="globalContent">

			<section class="etape">
			<div class="loadAnim"><img src="imgs/spin.gif" width="30" height="30" border="0" alt=""></div>
				<div class="ariane"><a href="index.php">Accueil</a> | <a href="groupes.php">choix de votre groupe de travail</a> | <a href="etapes.php">choisir votre étape</a> | Étape 1 : </div>
				<span class="titre">Les attentes clefs des collaborateurs</span>
				<div class="contentQuest">
					<div class="colLeft">
					<span class="bigNumber">1</span>
					<div class="txtQuest">Quelles sont les 3 attentes clefs des collaborateurs vis-à-vis de leur ligne hiérarchique qui leur permettraient de renforcer leur engagement et leur orientation client ?</div>

					</div>
					<div class="colRight">
						<form method="post" action="record.php" id="myForm" name="myForm">
							<input id="step" name="step" type="hidden" value="step1">

							<textarea name="attente1" placeholder="première attente" class="txtAreaQ1"><?php echo $attente1 ?></textarea>

							<textarea name="attente2" placeholder="seconde attente" class="txtAreaQ1"><?php echo $attente2 ?></textarea>

							<textarea name="attente3" placeholder="troisième attente" class="txtAreaQ1"><?php echo $attente3 ?></textarea>

							<div class="validButs" align="right"><input name="butRet" id="butRet" value="annuler" /><input name="but" type="submit" id="but" value="enregistrer" /></div>
						</form>
					</div>
				</div>
			</section>
			<!-- [ /CONTENT ] -->
		</div>
		<!-- [ /CONTENT ] -->
		<!-- [ SCRIPT ] -->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/main.js"></script>
    </body>
</html>
