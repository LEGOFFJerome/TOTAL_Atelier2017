<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', TRUE);

include "inc/common.inc.php";
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
				<div class="ariane"><a href="index.php">Accueil</a> | <a href="groupes.php">choix de votre table de travail</a> | <a href="etapes.php">choisir votre question</a> | Question 2 : </div>
				<span class="titre">Operating principles</span>

				<div class="contentQuest">
					<div class="colLeft">
					<span class="bigNumber">2</span>
					<div class="txtQuest">What benefits do you see in the new operating principles ?</div>
					<div class="txtQuestEn">Quels bénéfices voyez-vous dans les nouveaux principes de fonctionnement ?</div>
                    <div class="btBack"> retour aux questions </div>
					</div>
					<div class="colRight">
						<div id="previous" style="color:white;">
                            <?php
                            // Récupère pour le groupe la question les informations
                            if (openDb()){
                                if (is_array($allAnswers = getQuestData($_COOKIE["total-anim"],2))){
                                    $combien = count($allAnswers);
                                    if ($combien){
                                        while (list($id,$record) = each($allAnswers)){
                                            echo '<div class="answer">'.$record['valeur'].'</div>';
                                        }
                                    }
                                }else{
                                    echo ('erreur');
                                }
                            }else{
                                echo ("impossible de se connecter à la base de données");
                                die();
                            }
                            ?>
                        </div>
                        <form method="post" action="record.php" id="myForm" name="myForm">
                            <div style="clear:both;margin-bottom:5px;">
                                <input id="step" name="step" type="hidden" value="step2">
								<?php
                                if ($combien < $MAX_ANSWER){
                                ?>
								<textarea name="phrase" id="phrase" class="txtEtap1" placeholder="réponse"></textarea>
								<div style="color:gray;font-size:15px;font-weight:bold;float:right"><?php echo($combien+1)." / ".$MAX_ANSWER; ?></div><input type="submit" class="recordField" id="recordField" value="enregistrer"/>
                                <?php
                                }
                                ?>
							</div>
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
