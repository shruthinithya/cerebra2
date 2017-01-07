<?php
session_start();
if(isset($_SESSION['user']))
{
	$access_token = $_SESSION['user']['access_token'];
	
	$url = 'cms.cegtechforum.com/api/practice';
	$params =  json_encode(array(
		"access_token" => $access_token
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
		$response = json_decode($response, true);
		$_SESSION['practice'] = $response['data'];
		$_SESSION['user']['questions_answered'] = $response['questions_answered'];

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
		$_SESSION['practice'] = "failure";
			//header("Location: index.php");
	}
}

?>