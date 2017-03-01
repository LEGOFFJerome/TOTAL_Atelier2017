<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', TRUE);

include "inc/common.inc.php";

    $l_Questions = array(
        1 => "question 1 ",
        2 => "question 2 ",
        3 => "question 3 ",
        4 => "question 4 ",
        5 => "question 5 "
    );
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
                <div class="titAdmin"> ADMIN TOTAL EP</div>
                <ul>
                    <li id="openStep" class="li-on">Ouvrir questions</li>
                    <li id="selSentence1">Réponses quest. 1</li>
                    <li id="selSentence2">Réponses quest. 2</li>
                    <li id="selSentence3">Réponses quest. 3</li>
                    <li id="selSentence4">Réponses quest. 4</li>
                    <li id="selSentence5">Réponses quest. 5</li>
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
                <div>
                    <form  class="form-horizontal">
                            <?php
                                if (openDb()){
                                    global	$msock;
                                    $l_Query = 'SELECT id, state FROM `etapes_states_total`';

                                    $l_Result = array();
                                    if($l_MySQLRes = mysql_query($l_Query, $msock))
                                    {
                                        while($row = mysql_fetch_assoc($l_MySQLRes))
                                            $l_Result[$row["id"]] = $row["state"];
                                    }

                                    $i=1;
                                    foreach ($l_Questions as $l_Key => $l_Value)
                                    {
                                        ?>
                                        <hr/>
                                        <div class="form-group" style="margin-left:10px;">

                                            <input type="checkbox" class="bigSelect" onchange="onEtapeConfChange(this, <?php echo $i; ?>)" <?php if ($l_Result[$i] == '1') echo('checked'); ?>>
                                            <div class="" style="margin-left:50px;color:white;font-size:20px;width:100px;"><?php echo $l_Value; ?></div>
                                        </div>
                                        <?php
                                        $i++;
                                    }
                                }
                            ?>
                            </form>
                <div style="clear:both;float:none;">&nbsp;</div>
                </div>

            </section>
        </div>
		<!-- [ /CONTENT ] -->
		<!-- [ SCRIPT ] -->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/main-admin.js"></script>
    </body>
</html>
