<?php
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', TRUE);

    include "inc/common.inc.php";

    openDb();
//.' AND last_edit < '.$_GET['step']
    global	$msock;
    $l_Query = 'SELECT id,groupe,valeur,last_edit FROM `reponses_total` WHERE etape='.$_GET['step'].' AND last_edit > '.$_GET['lts'].'ORDER BY last_edit';

    if($l_MySQLRes = mysql_query($l_Query, $msock))
    {
            $jsonData = array();
            while ($array = mysql_fetch_assoc($l_MySQLRes)) {
                $jsonData[] = $array;
            }
            echo json_encode($jsonData);
    }
?>
