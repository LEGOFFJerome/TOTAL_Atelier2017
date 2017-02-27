<?php
/*
$BDD_SERV = "localhost";
$BDD = "anim-total";
$BDD_LOG = "root";
$BDD_PASS = "";
*/

$BDD_SERV = "ifasrgdsusidebdd.mysql.db";
$BDD = "ifasrgdsusidebdd";
$BDD_LOG = "ifasrgdsusidebdd";
$BDD_PASS = "uhgQs9878a";

$MAX_ANSWER = 7;
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
	$sql = "SELECT * FROM reponses_total WHERE groupe='".$group."' AND etape='".$quest."' ORDER BY last_edit";

    if(!($res = mysql_query($sql, $msock)))
		return false;

	$Result = array();
	while($data = mysql_fetch_array($res))
	{
		$id = $data['id'];
		$Result[$id] = $data;
	}
	return $Result;
}

//-----------------------------------------------------
function getAllQuestData($quest){
	global	$msock;
	$sql = "SELECT * FROM reponses_total WHERE etape='".$quest."' ORDER BY last_edit";

    if(!($res = mysql_query($sql, $msock)))
		return false;

	$Result = array();
	while($data = mysql_fetch_array($res))
	{
		$id = $data['id'];
		$Result[$id] = $data;
	}
	return $Result;
}


function getSelQuestData($step){

    global	$msock;
	$sql = "SELECT id,groupe,valeur FROM reponses_total WHERE etape='".$step."' AND is_sel=1 ORDER BY last_edit";

    if(!($res = mysql_query($sql, $msock)))
		return false;

	$Result = array();
	while($data = mysql_fetch_array($res))
	{
		$id = $data['id'];
		$Result[$id] = $data;
	}
	return $Result;


}

function writeTolog($log){
	return;
    $urlLog = 'c:\log.txt';
    $urlLog = 'c:\Users\jlegoff\Documents\GitHub\TOTAL_Atelier2017\log.txt';

	$fh=fopen($urlLog,"a");
	fwrite($fh,$log);
	fclose($fh);
}
?>
