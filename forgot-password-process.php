<?php
session_start();
include('administrator/includes/function.php');

$sqlp="SELECT * FROM `ee_member` WHERE `userid`='".trim($_POST['userid'])."' AND `email`='".trim($_POST['email'])."' AND `status`='A'";
$resp=query($conn,$sqlp);
$nump=numrows($resp);
if($nump>0)
{
$fetchp=fetcharray($resp);

/*----------------------SMS---------------------*/
$headers="From: developer@assoftech.in\r\n";
$headers.="MIME-Version: 1.0" . "\r\n";
$headers.="Content-type:text/html;charset=iso-8859-1"."\r\n";

$to=trim($_POST['email']);
$subject="Welcome to FundTrade.";

$message.="Your Password ".base64_decode($fetchp['password']).",<br/>";
$message.="<br />Thanks <br />Support Team";

//mail($to,$subject,$message,$headers);
/*----------------------SMS---------------------*/

redirect('forgot-password.php?m=1');
}else{
redirect('forgot-password.php?m=2');
}
?>