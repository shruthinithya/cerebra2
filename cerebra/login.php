<?php
session_start();
if(!isset($_SESSION['user']))
{
	$emailId = sanitizeParams($_POST['email']);
	$password = sanitizeParams($_POST['password']);
	
	$url = 'cms.cegtechforum.com/api/login';
	$params =  json_encode(array(
		"emailId" => $emailId, 
		"password" => $password
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
		//print_r($response['user']['eventSubscriptionList']);
		$_SESSION['user'] = $response['user'];
		$_SESSION['access_token'] = $response['token'];
		$_SESSION['login'] = "success";
		foreach ($response['user']['eventSubscriptionList'] as $r) {
			$_SESSION['user']['events'][$r['eventName']] = true;
		}
		foreach ($response['user']['workshopsList'] as $r) {
			$_SESSION['user']['workshops'][$r['workshopName']] = true;
		}
		if ($_SESSION['user']['isSA'] == true)
			$code = 1;
		else
			$code = 2;

		$arr = array ('response'=>$code,'name'=>$_SESSION['user']['name']);
		echo json_encode($arr);

	}
	else
	{
		$_SESSION['login'] = "failure";
		$code = 0;
		$arr = array ('response'=>$code);
		echo json_encode($arr);
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
		$_SESSION['login'] = "failure";
			//header("Location: index.php");
	}
}

?>