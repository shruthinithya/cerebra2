<?php
session_start();
if(isset($_SESSION['user']))
{
	$access_token = $_SESSION['user']['access_token'];
	$key = sanitizeParams($_POST['key']);
	$url = 'cms.cegtechforum.com/api/getClue';
	$params =  json_encode(array(
		"access_token" => $access_token,
		'key' => $key
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

		$response = array('code' => 1, 'clue' => $response['data']);
		echo json_encode($response);		
	}
	else if(curl_getinfo($ch, CURLINFO_HTTP_CODE) == 401)
	{
		$response = array('code' => 2);
		echo json_encode($response);		
	}
	else
	{
		$response = array('code' => 3);
		echo json_encode($response);
	}
}
else
{
	header("Location: index.php");
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
		//handle else case
	}
}

?>