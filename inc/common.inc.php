<?php

$BDD_SERV = "localhost";
$BDD = "anim-hm";
$BDD_LOG = "root";
$BDD_PASS = "";

/*
$BDD_SERV = "ifasrgdsusidebdd.mysql.db";
$BDD = "ifasrgdsusidebdd";
$BDD_LOG = "ifasrgdsusidebdd";
$BDD_PASS = "uhgQs9878a";
*/

/******** fonction open Db *************/
function	openDb(){
	global	$msock,$BDD_SERV,$BDD,$BDD_LOG,$BDD_PASS;

	if(!($msock = @mysql_connect($BDD_SERV, $BDD_LOG, $BDD_PASS)) || !(@mysql_select_db($BDD, $msock)))
	{
		$msock = false;
		return false;
	}
	// passage de la connection de la base en UTF8
	if (!($res =mysql_query("SET NAMES utf8",$msock)))
		return false;
	return true;
}

//-----------------------------------------------------
function getQuestData($group,$quest){
	global	$msock;
	$sql = "SELECT valeur FROM reponses WHERE groupe='".$group."' AND etape='".$quest."'";
	if(!($res = mysql_query($sql, $msock)))
		return false;
	return mysql_fetch_array($res);
}

function writeTolog($log){
	return;
	$fh=fopen('c:\log.txt',"a");
	fwrite($fh,$log);
	fclose($fh);
}


?>
