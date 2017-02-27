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
                    <li id="selSentence1" <?php if ($_GET['step']==1){echo 'class="li-on"';} ?>>Phrases étapes 1</li>
                    <li id="selSentence2" <?php if ($_GET['step']==2){echo 'class="li-on"';} ?>>Phrases étapes 2</li>
                    <li id="selSentence3" <?php if ($_GET['step']==3){echo 'class="li-on"';} ?>>Phrases étapes 3</li>
                    <li id="selSentence4" <?php if ($_GET['step']==4){echo 'class="li-on"';} ?>>Phrases étapes 4</li>
                    <li id="selSentence5" <?php if ($_GET['step']==5){echo 'class="li-on"';} ?>>Phrases étapes 5</li>
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
                            <p class="introSelSentence">
                                Les réponses des utilisateurs s'affichent ci dessous en temps réel,
                                sélectionnez celles vous paraissant les plus pertinentes et valider avec le boutons ci contre pour afficher les réponses.
                            </p>
                            <div id="previewSelected" onclick="document.location.href='admin-previewSelected.php?step=<?php echo $_GET["step"];?>'">Afficher la sélection</div>
                        </div>
                <div style="clear:both;floaqt:none;">&nbsp;</div>
                <?php
                if(isset($_GET['step']) && $_GET['step']!=""){
                    ?>
                    <div id="AllPhraseContainer">
                            <?php
                            $lastTimeStamp=0;
                            // Récupère pour le groupe la question les informations
                            if (openDb()){
                                if (is_array($allAnswers = getAllQuestData($_GET['step']))){
                                    if (count($allAnswers)){
                                        while (list($id,$record) = each($allAnswers)){
                                            if ($record['is_sel']){$chk = "checked";}else{$chk ="";}
                                            echo '<div class="phraseContainer"><div class="grpId">Table -> '.$record['groupe'].'</div><input type="checkbox" class="bigSelect" onchange="onPhraseSelect(this,'.$record['id'].');" '.$chk.'><div class="phraseToSel">'.$record['valeur'].'</div></div>';
                                            $lastTimeStamp = $record['last_edit'];
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
                    <?php
                }else{
                    // merde pas d'etape a checker
                    echo '<div style="color:white;">pas de variable d étape</div>';
                    die();
                }
                ?>
            </section>
        </div>
		<!-- [ /CONTENT ] -->
		<!-- [ SCRIPT ] -->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/main-admin.js"></script>

        <script>
            lastTimeStamp = <?php echo $lastTimeStamp ?>;
            setInterval(function() {
                $.ajax({
                    url: "admin-getLastPhrase.php?step=<?php echo $_GET['step']?>&lts="+lastTimeStamp,
                    type: "GET",
                    success: function(p_Data){
                        var json_obj = $.parseJSON(p_Data);
                        for (var i=0;i<json_obj.length;++i){
                            $('#AllPhraseContainer').append('<div class="phraseContainer"><div class="grpId">Table -> '+json_obj[i].groupe+'</div><input type="checkbox" class="bigSelect" onchange="onPhraseSelect(this,'+json_obj[i].id+');"><div class="phraseToSel">'+ json_obj[i].valeur +'</div></div>');
                            // si dernier on stocke le dernier timeStamp
                            if (i==json_obj.length-1){
                                lastTimeStamp = json_obj[i].last_edit;
                            }
                        }
                    }
                });
            }, 500);
        </script>
    </body>
</html>
