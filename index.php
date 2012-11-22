<?php

include_once('inc/header.php');

$STH = $DBH->query("SELECT COUNT(*) FROM `users` WHERE `fbid`='".$uid."'");

if($STH->fetchColumn() == 0)
{
	$STH2 = $DBH->prepare("INSERT INTO `users` (`fbid`) VALUES ('".$uid."')");
	$STH2->execute();
}
else
{
	$STH2 = $DBH->query("SELECT `fbid`, `gold` FROM `users` WHERE `fbid`='".$uid."'");
	$STH2->setFetchMode(PDO::FETCH_OBJ);
	$row = $STH2->fetch();
	echo '<b>Your FaceBook ID: '.$row->fbid.'</b><br />
	<i>You have '.$row->gold.' gold</i>';
}

include_once('inc/footer.php');

?>