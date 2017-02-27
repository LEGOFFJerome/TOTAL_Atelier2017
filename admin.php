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
            <section class="admin">
                <div class="titAdmin">ADMIN TOTAL EP</div>
                <ul>
                    <li id="openStep">Ouvrir les étapes</li>
                    <li id="selSentence1">Phrases étapes 1</li>
                    <li id="selSentence2">Phrases étapes 2</li>
                    <li id="selSentence3">Phrases étapes 3</li>
                    <li id="selSentence4">Phrases étapes 4</li>
                    <li id="selSentence5">Phrases étapes 5</li>

                    <li id="selSentence5">prev.<select onchange="javascript:if (this.value) window.open(this.value);">
                            <option selected>-</option>
                            <option value="admin-realTimeSentence.php?step=1">1</option>
                            <option value="admin-realTimeSentence.php?step=2">2</option>
                            <option value="admin-realTimeSentence.php?step=3">3</option>
                            <option value="admin-realTimeSentence.php?step=4">4</option>
                            <option value="admin-realTimeSentence.php?step=5">5</option>

                        </select>
                    </li>
                </ul>

                <div style="clear:both;float:none;">&nbsp;</div>


            </section>
        </div>
		<!-- [ /CONTENT ] -->
		<!-- [ SCRIPT ] -->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/main-admin.js"></script>
    </body>
</html>
