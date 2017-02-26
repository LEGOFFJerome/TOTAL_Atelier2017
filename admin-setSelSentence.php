<?php
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', TRUE);

    include "inc/common.inc.php";

    openDb();

    $id = $_GET["id"];

    if($_GET["val"] == "true"){
        $val = 1;
    }else{
        $val = 0;
    }

    global	$msock;
    $l_Query = 'UPDATE reponses_total SET is_sel=' . $val . ' WHERE id=' . $id;

    mysql_query($l_Query, $msock);
?>
