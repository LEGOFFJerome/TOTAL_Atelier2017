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
        <div id="histo" style="position:absolute;width:100%;color:gray;text-align:center;font-size:20px;">

        </div>
		<div class="globalContent">

        </div>
		<!-- [ /CONTENT ] -->
		<!-- [ SCRIPT ] -->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/main-admin.js"></script>

        <script>
        lastTimeStamp = 0;
        sentenceArray = new Array();
        loadInterval = null;
        displayInterval = null;
        currentTxt = "";
        function getData() {
            clearInterval(loadInterval);
            $.ajax({
                url: "admin-getRealTimePhrase.php?step=<?php echo $_GET['step'];?>&lts="+lastTimeStamp,
                type: "GET",
                success: function(p_Data){
                    var json_obj = $.parseJSON(p_Data);
                    for (var i=0;i<json_obj.length;++i){
                        sentenceArray.push(json_obj[i].valeur);

                        if (i==json_obj.length-1){
                            lastTimeStamp = json_obj[i].last_edit;
                        }
                    }
                }
            });
            //console.log(sentenceArray);
            loadInterval = setInterval(getData, 500);
            }
            loadInterval = setInterval(getData, 500);


       function displayData(){
            clearInterval(displayInterval);

            if (sentenceArray.length){
                currentTxt = sentenceArray[0];
               $('.globalContent').append('<div class="phraseElem" style="display:none"><div class="placeHolder" style="display:none;width:100%"></div>'+sentenceArray[0]+'</div>');
                var l_T1                    = 500;
                var l_T2                    = 1000;
                var l_T3                    = 3000;
                var l_Element               = $('.phraseElem');
                var l_ElementPlaceHolder    = $('.phraseElem .placeHolder');

                l_Element.fadeOut(0, function () {
                    l_Element.fadeIn(l_T1);
                    l_ElementPlaceHolder.animate({ width: 120 + "%" }, {
                        step: function (p_Now) {
                            jQuery(this).parent().css({ transform: 'scale(' + p_Now / 100 + ')' });
                        },
                        duration: l_T1,
                        complete: function () {
                            l_ElementPlaceHolder.animate({ width: 50 + "%" }, {
                                step: function (p_Now) {
                                    jQuery(this).parent().css({ transform: 'scale(' + p_Now / 100 + ')' });
                                },
                                duration: l_T3,
                                complete: function () {
                                    l_Element.fadeOut(l_T2);
                                    l_ElementPlaceHolder.animate({ width: 0 + "%" }, {
                                        step: function (p_Now) {
                                            jQuery(this).parent().css({ transform: 'scale(' + p_Now / 100 + ')' });
                                        },
                                        duration: l_T2,
                                        complete: function () {
                                            $(this).parent().remove();
                                            var itemHisto = $('#histo').append('<div style="border-bottom:1px solid #333333">'+currentTxt+'</div>');
                                            itemHisto.fadeIn("slow");
                                        }
                                    });
                                }
                            });
                        }
                    });
                });
            }
            sentenceArray.shift();
            displayInterval = setInterval(displayData,5000);
       }

        displayInterval = setInterval(displayData,5000);

        </script>
    </body>
</html>
