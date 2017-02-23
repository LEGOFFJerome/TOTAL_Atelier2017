<?php

include "inc/common.inc.php";

$err = false;
$message = "";

// on v�rifie qu'il y a bien l'info step
if (isset($_POST['step'])){

	// on check si la base est OP
	if (!openDb()){
		$err = true;
		$message = "impossible de se connecter � la base de donn�e";

	}else{
		// en fonction de step on appel la m�thode qui va bien
		switch($_POST['step']){
			// --------------------------------------------------------------------------------------
			case "step1":
				if ($ret=recordStep1(urlencode($_POST['attente1']),urlencode($_POST['attente2']),urlencode($_POST['attente3']))){
					$err = false;
					$message = "insert OK";
				}else{
					$err = true;
					$message = "impossible to insert";
				}
			break;
			// --------------------------------------------------------------------------------------
			case "step2":
				$err = false;
				$message = "ready to insert";
				if ($ret=recordStep2()){
					$err = false;
					$message = "insert";
				}else{
					$err = true;
					$message = "impossible to insert";
				}
			break;
			// --------------------------------------------------------------------------------------
			case "step3":
			if ($ret=recordStep3(urlencode($_POST['percevoir']),urlencode($_POST['voir']),urlencode($_POST['entendre']),urlencode($_POST['dire']))){
					$err = false;
					$message = "insert OK";
				}else{
					$err = true;
					$message = "impossible to insert";
				}
			break;
			// --------------------------------------------------------------------------------------
			case "step4":
			if ($ret=recordStep4(urlencode($_POST['promrel']))){
					$err = false;
					$message = "insert OK";
				}else{
					$err = true;
					$message = "impossible to insert";
				}
			break;
			// --------------------------------------------------------------------------------------
			case "step5":
				$err = false;
				$message = "ready to insert";

				if ($ret=recordStep5()){
					$err = false;
					$message = "insert";
				}else{
					$err = true;
					$message = "impossible to insert";
				}
			break;
			// --------------------------------------------------------------------------------------
			case "step6":
				$err = false;
				$message = "ready to insert";
				if ($ret=recordStep6()){
					$err = false;
					$message = "insert";
				}else{
					$err = true;
					$message = "impossible to insert";
				}
			break;
			// --------------------------------------------------------------------------------------
			case "step7":
				$err = false;
				$message = "ready to insert";
				if ($ret=recordStep7(urlencode($_POST['partage']),urlencode($_POST['curiosite']))){
					$err = false;
					$message = "insert";
				}else{
					$err = true;
					$message = "impossible to insert";
				}
			break;
			// --------------------------------------------------------------------------------------
			case "step8":
				$err = false;
				$message = "ready to insert";
				if ($ret=recordStep8()){
					$err = false;
					$message = "insert";
				}else{
					$err = true;
					$message = "impossible to insert";
				}
			break;


			// --------------------------------------------------------------------------------------
			default:
				$err = true;
				$message = "mauvais identifiant step";
			break;
		}

	}

}else{
	$err = true;
	$message = "pas d'identifiant step";
}

	// r�ponse ajax au formulaire NolaMailSender
	header("Expires: 0");
	header("Cache-Control: no-cache, must-revalidate, post-check=0, pre-check=0");
	header("Pragma: no-cache");
	header('Content-type: application/json');

	$jsonReturn = Array();
	$jsonReturn['status'] = !$err;
	$jsonReturn['message'] = $message;

	echo json_encode($jsonReturn);

//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
function recordStep1($att1,$att2,$att3){
	global	$msock;
	$toStore = json_encode(array("att1" => $att1,"att2" => $att2,"att3" => $att3));
	$sql = "UPDATE reponses SET valeur='".$toStore."', last_edit=unix_timestamp() WHERE groupe='".$_COOKIE["anim-hm"]."' AND etape='1'";
	if(!($res = mysql_query($sql, $msock)))
		return false;
	return true;
}

//------------------------------------------------------------------------------
function recordStep2(){
	global	$msock;

	unset ($_POST['step']);
	unset ($_POST['butRet']);

	$toStore = json_encode(encodeArray($_POST));

	$sql = "UPDATE reponses SET valeur='".$toStore."', last_edit=unix_timestamp() WHERE groupe='".$_COOKIE["anim-hm"]."' AND etape='2'";
	if(!($res = mysql_query($sql, $msock)))
		return false;
	return true;
}



//------------------------------------------------------------------------------
function recordStep3($percevoir,$voir,$entendre,$dire){
	global	$msock;
	$toStore = json_encode(array("percevoir" => $percevoir,"voir" => $voir,"entendre" => $entendre,"dire" => $dire));
	$sql = "UPDATE reponses SET valeur='".$toStore."', last_edit=unix_timestamp() WHERE groupe='".$_COOKIE["anim-hm"]."' AND etape='3'";
	if(!($res = mysql_query($sql, $msock)))
		return false;
	return true;
}

//------------------------------------------------------------------------------
function recordStep4($promrel){
	global	$msock;
	$toStore = json_encode(array("promrel" => $promrel));
	$sql = "UPDATE reponses SET valeur='".$toStore."', last_edit=unix_timestamp() WHERE groupe='".$_COOKIE["anim-hm"]."' AND etape='4'";
	if(!($res = mysql_query($sql, $msock)))
		return false;
	return true;
}

//------------------------------------------------------------------------------
function recordStep5(){
	global	$msock;

	unset ($_POST['step']);
	unset ($_POST['butRet']);

	$toStore = json_encode(encodeArray($_POST));
	$sql = "UPDATE reponses SET valeur='".$toStore."', last_edit=unix_timestamp() WHERE groupe='".$_COOKIE["anim-hm"]."' AND etape='5'";
	writeToLog($sql);
	if(!($res = mysql_query($sql, $msock)))
		return false;
	return true;
}

function recordStep6(){
	global	$msock;

	unset ($_POST['step']);
	unset ($_POST['butRet']);

	$toStore = json_encode(encodeArray($_POST));

	$sql = "UPDATE reponses SET valeur='".$toStore."', last_edit=unix_timestamp() WHERE groupe='".$_COOKIE["anim-hm"]."' AND etape='6'";
	if(!($res = mysql_query($sql, $msock)))
		return false;
	return true;
}


//------------------------------------------------------------------------------
function recordStep7($partage,$curiosite){
	global	$msock;
	$toStore = json_encode(array("partage" => $partage,"curiosite" => $curiosite));
	$sql = "UPDATE reponses SET valeur='".$toStore."', last_edit=unix_timestamp() WHERE groupe='".$_COOKIE["anim-hm"]."' AND etape='7'";
	if(!($res = mysql_query($sql, $msock)))
		return false;
	return true;
}

//------------------------------------------------------------------------------
function recordStep8(){
	global	$msock;

	unset ($_POST['step']);
	unset ($_POST['butRet']);

	$toStore = json_encode(encodeArray($_POST));

	$sql = "UPDATE reponses SET valeur='".$toStore."', last_edit=unix_timestamp() WHERE groupe='".$_COOKIE["anim-hm"]."' AND etape='8'";
	if(!($res = mysql_query($sql, $msock)))
		return false;
	return true;
}



function encodeArray($p_array){

	foreach($p_array as $key  => $val){
		$p_array[$key] = urlencode($val);
	}
	return $p_array;
}

?>



