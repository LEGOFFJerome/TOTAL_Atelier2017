<?php
/*
$validIp = array("84.14.220.210","82.224.238.93");

if (!in_array($_SERVER['REMOTE_ADDR'], $validIp)) {
		echo "vous n'avez pas le droit d'acc&egrave;s &agrave; cette page.";
		die();
}
*/
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
			<section class="choixEtape">
			<div class="ariane"><a href="index.php">Accueil</a> | <a href="groupes.php">choix de votre groupe de travail</a> | choisir votre étape </div>

			<div class="titre">Choisir votre étape : </div>
				<ul>
					<li class="disabled"><div data-id="1" class="selStep hab1">Les attentes clefs des collaborateurs</div></li>
					<li class="disabled"><div data-id="2" class="selStep hab2">Se mettre dans la peau d’un collaborateur</div></li>
					<li class="disabled"><div data-id="3" class="selStep hab3">Profil sensoriel du collaborateur</div></li>
					<li class="disabled"><div data-id="4" class="selStep hab4">Écriture de la promesse relationnelle</div></li>
					<li class="disabled"><div data-id="5" class="selStep hab5">Les comportements cibles</div></li>
					<li class="disabled"><div data-id="6" class="selStep hab6">Les comportements cibles suite (prise de recul)</div></li>
					<li class="disabled"><div data-id="7" class="selStep hab7">Développer des relations de travail positives</div></li>
					<li class="disabled"><div data-id="8" class="selStep hab8">Le mot de la fin</div></li>
				</ul>
			</section>
			<!-- [ /CONTENT ] -->

		</div>
		<!-- [ /CONTENT ] -->
		<!-- [ SCRIPT ] -->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/main.js"></script>
        <script>
            function HandleAjaxElement(p_JSON, p_Index)
            {
                if (p_JSON[p_Index] == "1")
                    $("ul li:nth-child(" + p_Index + ")").removeClass("disabled");
                else
                    $("ul li:nth-child(" + p_Index + ")").addClass("disabled");
            }

            setInterval(function() {
                $.ajax({
                    url: "etapes_states.php",
                    type: "GET",
                    success: function(p_Data){
                        l_JSON = jQuery.parseJSON(p_Data);

                        HandleAjaxElement(l_JSON, 1);
                        HandleAjaxElement(l_JSON, 2);
                        HandleAjaxElement(l_JSON, 3);
                        HandleAjaxElement(l_JSON, 4);
                        HandleAjaxElement(l_JSON, 5);
                        HandleAjaxElement(l_JSON, 6);
                        HandleAjaxElement(l_JSON, 7);
                        HandleAjaxElement(l_JSON, 8);
                    }
                });
            }, 500);
        </script>
    </body>
</html>
