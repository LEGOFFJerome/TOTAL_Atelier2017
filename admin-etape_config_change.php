<?php
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', TRUE);

    include "inc/common.inc.php";

    openDb();

    $l_Etape = $_GET["etape"];
    $l_Value = $_GET["value"];

    global	$msock;
    $l_Query = 'UPDATE etapes_states_total SET state=' . $l_Value . ' WHERE id=' . $l_Etape;
    mysql_query($l_Query, $msock);
?>
