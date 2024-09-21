<?php 
session_start();
include('administrator/includes/function.php');

if($_SERVER['REQUEST_METHOD']=='POST')
{
//-----------------------------------------//
$sql="SELECT * FROM `ee_member` WHERE `userid`='".trim(mysqli_real_escape_string($conn,$_POST['sponsor']))."' AND `status`='A' AND `paystatus`='A'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$sqlp="SELECT * FROM `ee_member` WHERE `phone`='".trim($_POST['phone'])."' OR `email`='".trim($_POST['email'])."' ";
$resp=query($conn,$sqlp);
$nump=numrows($resp);
if($nump<1)
{
$fetch=fetcharray($res);

$userid='FT'.rand(1111111,9999999);

$sql="INSERT INTO `ee_member` (`userid`,`sponsor`,`name`,`package`,`position`,`password`,`email`,`phone`,`date`,`status`,`address`) VALUES('".trim($userid)."','".trim($_POST['sponsor'])."','".trim($_POST['name'])."','".trim($_POST['package'])."','".trim($_POST['position'])."','".base64_encode(trim($_POST['password']))."','".trim($_POST['email'])."','".trim($_POST['phone'])."','".date('Y-m-d')."','A','".trim($_POST['address'])."')";
$res=query($conn,$sql);
$id=mysqli_insert_id($conn);
if($id)
{

if($_POST['email'])
{
$headers="From: welcome@fundtrade.club\r\n";
$headers.="MIME-Version: 1.0" . "\r\n";
$headers.="Content-type:text/html;charset=iso-8859-1"."\r\n";

$to=trim($_POST['email']);
$subject="Your registration is completed in Fund Trade";

$message="Dear ".trim($_POST['name'])." ,<br/> Welcome to Fund Trade.<br/> User ID: ".$userid." <br/> Password: ".trim($_POST['password'])."<br/> Visit us www.fundtrade.club to login into your account. <br/><br/>Thanks Fund Trade.";

//mail($to,$subject,$message,$headers);
}
}


if($_REQUEST['case']=='introducer')
{
redirect('introducer.php?intr='.trim($_POST['sponsor']).'&msg=4&id='.$id);
}else{
redirect('registration.php?msg=4&id='.$id);
}
}else{

if($_REQUEST['case']=='introducer')
{
redirect('introducer.php?intr='.$_POST['sponsor'].'&e=1');
}else{
redirect('registration.php?reg='.$_POST['sponsor'].'&e=1');
}
}

}else{

if($_REQUEST['case']=='introducer')
{
redirect('introducer.php?intr='.trim($_POST['sponsor']).'&q=4');
}else{
redirect('registration.php?reg='.trim($_POST['sponsor']).'&q=4');
}
}
//-----------------------------------------//

}
?>