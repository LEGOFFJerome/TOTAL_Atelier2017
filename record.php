<?php

include "inc/common.inc.php";

$err = false;
$message = "";

// on vérifie qu'il y a bien l'info step
if (isset($_POST['step'])){

	// on check si la base est OP
	if (!openDb()){
		$err = true;
		$message = "impossible de se connecter à la base de donnée";

	}else{

        $err = false;
        $message = "ready to insert";
        if ($ret=recordStep()){
            $err = false;
            $message = "insert";
        }else{
            $err = true;
            $message = "impossible to insert";
        }

	}

}else{
	$err = true;
	$message = "pas d'identifiant step";
}

	// réponse ajax au formulaire
	header("Expires: 0");
	header("Cache-Control: no-cache, must-revalidate, post-check=0, pre-check=0");
	header("Pragma: no-cache");
	header('Content-type: application/json');

	$jsonReturn = Array();
	$jsonReturn['status'] = !$err;
	$jsonReturn['message'] = $message;

	echo json_encode($jsonReturn);

//------------------------------------------------------------------------------
function recordStep(){
	global	$msock;
    // c'est quel step
    $stepActif = preg_replace("/[^0-9]/", "",$_POST['step']);
    $textToStore = nl2br(htmlentities($_POST["phrase"], ENT_QUOTES, 'UTF-8'));
	$sql ="INSERT INTO `reponses_total` (`groupe`, `etape`, `valeur`,`last_edit`) VALUES ('".$_COOKIE["total-anim"]."','".$stepActif."','".$textToStore."',UNIX_TIMESTAMP(now()))";

    writeToLog($sql);

    if(!($res = mysql_query($sql, $msock)))
		return false;
	return true;
}

// ----------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------
function encodeArray($p_array){

	foreach($p_array as $key  => $val){
		$p_array[$key] = urlencode($val);
	}
	return $p_array;
}
?>
