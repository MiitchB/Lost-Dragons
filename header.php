<?php

try
{
	$DBH = new PDO("mysql:host=instance31897.db.xeround.com;port=20547;dbname=app9261699", 'app9261699', 'cookies11');
}
catch(PDOException $e)
{
	echo $e->getMessage();
}

include_once "facebook.php";

$app_id = '262927160495864';
$application_secret = 'db8910816b9f3f2f6f7cfc4f0d7fab55';

$facebook = new Facebook(array(
	'appId'  => $app_id,
	'secret' => $application_secret
));

$uid = $facebook->getUser();

if($uid)
{
	try
	{
		$user = $facebook->api('/me');
		$frnds = $facebook->api('/me/friends');
	}
	catch(FacebookApiException $e)
	{
		error_log($e);
		$uid = null;
	}
}

?>