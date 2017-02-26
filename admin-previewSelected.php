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
		<div style="color:white;font-size:20px;">
            <table border="0" width="100%" height="100%">
            <?php
                            // Récupère pour le groupe la question les informations
                            if (openDb()){
                                if (is_array($allAnswers = getSelQuestData($_GET['step']))){
                                    $combien = count($allAnswers);

                                    if ($combien){
                                        $pourcentHeight = intval(100/$combien);
                                        while (list($id,$record) = each($allAnswers)){
                                            echo '<tr height="'.$pourcentHeight.'%"><td align="center">'.$record['valeur'].'</td></tr>';
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
            </table>
		</div>
		<!-- [ /CONTENT ] -->
		<!-- [ SCRIPT ] -->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/main.js"></script>
    </body>
</html>
