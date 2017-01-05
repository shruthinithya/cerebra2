<?php
session_start();
if(isset($_SESSION['user']))
{
	$emailId = $_SESSION['user']['emailId'];
	
	$url = 'cms.cegtechforum.com/api/getNextLevel';
	$params =  json_encode(array(
		"emailId" => $emailId
		));
	$ch = curl_init( $url );
	curl_setopt( $ch, CURLOPT_POST, 1);
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $params);
	curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt( $ch, CURLOPT_HEADER, 0);
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
	
	$response = curl_exec( $ch );
	if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == 200)
	{
		//$response = array('state' => $response, 'data' => $response);
		echo json_encode($response);
		//print_r($_SESSION['practice']);
		//header("Location: practice.php");
	}
	else
	{
		header("Location: index.php");
	}
	//header("Location: index.php");	
}
else
{
	echo 3;
}

function sanitizeParams($param)
{
	$param = strip_tags(trim($param));
	if (isset($param) && empty($param) != 1)
	{
		return $param;	
	}
	else
	{
		$_SESSION['level'] = "failure";
			//header("Location: index.php");
	}
}

?>