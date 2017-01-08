<?php
session_start();
if(isset($_SESSION['user']))
{
	$access_token = $_SESSION['user']['access_token'];
	
	$url = 'cms.cegtechforum.com/api/getQuestions';
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
		$_SESSION['questions'] = $response['data'];
		$_SESSION['current_time'] = $response['current_time'];
		$_SESSION['questions_answered'] = $response['questions_answered'];
		$_SESSION['user']['state'] = $response['state'];
		$_SESSION['user']['startTime'] = $response['startTime'];
		$_SESSION['user']['points'] = $response['points'];

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