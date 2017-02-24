<?php
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', TRUE);

    include "inc/common.inc.php";

    openDb();

    global	$msock;
    $l_Query = 'SELECT id, state FROM `etapes_states_total`';

    $l_Result = array();
    if($l_MySQLRes = mysql_query($l_Query, $msock))
    {
        while($row = mysql_fetch_assoc($l_MySQLRes))
            $l_Result[$row["id"]] = $row["state"];
    }

    echo(json_encode($l_Result));
?>
