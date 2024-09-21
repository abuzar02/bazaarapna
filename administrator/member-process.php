<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_REQUEST['case']=='add')
{
$userid='FT'.rand(1111111,9999999);

$sql="INSERT INTO `ee_member` (`userid`,`package`,`name`,`email`,`phone`,`password`,`address`,`date`,`bname`,`branch`,`accname`,`accno`,`ifscode`,`pancard`,`aadhar`,`payeer`,`paypal`,`perfectmoney`,`paytm`,`upi`,`status`,`paystatus`,`approved`) VALUES('".$userid."','".mysqli_real_escape_string($conn,$_POST['package'])."','".mysqli_real_escape_string($conn,$_POST['name'])."','".mysqli_real_escape_string($conn,$_POST['email'])."','".trim(mysqli_real_escape_string($conn,$_POST['phone']))."','".base64_encode($_POST['password'])."','".mysqli_real_escape_string($conn,$_POST['address'])."','".date('Y-m-d')."','".mysqli_real_escape_string($conn,$_POST['bname'])."','".mysqli_real_escape_string($conn,$_POST['branch'])."','".mysqli_real_escape_string($conn,$_POST['accname'])."','".mysqli_real_escape_string($conn,$_POST['accno'])."','".mysqli_real_escape_string($conn,$_POST['ifscode'])."','".mysqli_real_escape_string($conn,$_POST['pancard'])."','".mysqli_real_escape_string($conn,$_POST['aadhar'])."','".mysqli_real_escape_string($conn,$_POST['payeer'])."','".mysqli_real_escape_string($conn,$_POST['paypal'])."','".mysqli_real_escape_string($conn,$_POST['perfect'])."','".mysqli_real_escape_string($conn,$_POST['paytm'])."','".mysqli_real_escape_string($conn,$_POST['upi'])."','A','A','".date('Y-m-d')."')";
$res=query($conn,$sql);

$sql1="INSERT INTO `ee_genealogy`(`userid`,`placement`,`position`,`date`) VALUES('".$userid."','','','".date('Y-m-d')."')";
$res1=query($conn,$sql1);

$sql2="INSERT INTO `ee_member_count`(`userid`,`left`,`right`) VALUES('".$userid."','0','0')";
$res2=query($conn,$sql2);

$sql4="INSERT INTO `ee_member_sales`(`userid`,`left`,`right`) VALUES('".$userid."','0','0')";
$res4=query($conn,$sql4);

$sql5="INSERT INTO `ee_member_sales_count`(`userid`,`left`,`right`) VALUES('".$userid."','0','0')";
$res5=query($conn,$sql5);

$amount=getSettingsPackage($conn,trim($_POST['package']),'amount');

$sql5="INSERT INTO `ee_member_package`(`userid`,`package`,`pvalue`,`remarks`,`date`) VALUES('".$userid."','".trim($_POST['package'])."','".$amount."','Joining','".date('Y-m-d')."')";
$res5=query($conn,$sql5);

$sql6="INSERT INTO `ee_member_roi` (`userid`,`package`,`account`,`pvalue`,`status`,`date`) VALUES('".$userid."','".trim($_POST['package'])."','1','".$amount."','R','".date('Y-m-d')."')";
$res6=query($conn,$sql6);

$date=strtotime(date("Y-m-d"));
$stdate=date('Y-m-d',strtotime('+1 days',$date));

$percent=getSettingsPackage($conn,trim($_POST['package']),'dailyroi');
if($percent>0)
{
$amount=getSettingsPackage($conn,trim($_POST['package']),'amount');
$bonus=($amount*$percent)/100;

$actdays=getSettingsPackage($conn,trim($_POST['package']),'nodays');
$nodays=$actdays+100;

if($nodays>0)
{
for($i=0;$i<$nodays;$i++)
{
$stdate1=date('Y-m-d',strtotime('+'.$i.' days',strtotime($stdate)));

$day=date('l',strtotime($stdate1));
if($day=='Monday' || $day=='Tuesday' || $day=='Wednesday' || $day=='Thursday' || $day=='Friday')
{

$sqlch="SELECT * FROM `ee_commission_roi` WHERE `userid`='".$userid."' AND `package`='".trim($_POST['package'])."' AND `account`='1'";
$resch=query($conn,$sqlch);
$numch=numrows($resch);
if($numch<$actdays)
{
$sql7="INSERT INTO `ee_commission_roi` (`userid`,`package`,`account`,`bonus`,`status`,`date`) VALUES('".$userid."','".trim($_POST['package'])."','1','".$bonus."','H','".$stdate1."')";
$res7=query($conn,$sql7);
}
}

}
}
}

redirect('member.php');
}

if($_REQUEST['case']=='edit')
{
$sql3="UPDATE `ee_member` SET `name`='".mysqli_escape_string($conn,$_POST['name'])."',`email`='".mysqli_escape_string($conn,$_POST['email'])."',`phone`='".mysqli_escape_string($conn,$_POST['phone'])."',`password`='".base64_encode(mysqli_escape_string($conn,$_POST['password']))."',`address`='".mysqli_escape_string($conn,$_POST['address'])."',`bname`='".mysqli_escape_string($conn,$_POST['bname'])."',`branch`='".mysqli_escape_string($conn,$_POST['branch'])."',`accname`='".mysqli_escape_string($conn,$_POST['accname'])."',`accno`='".mysqli_escape_string($conn,$_POST['accno'])."',`ifscode`='".mysqli_escape_string($conn,$_POST['ifscode'])."',`pancard`='".mysqli_escape_string($conn,$_POST['pancard'])."',`aadhar`='".mysqli_escape_string($conn,$_POST['aadhar'])."',`payeer`='".mysqli_escape_string($conn,$_POST['payeer'])."',`paypal`='".mysqli_escape_string($conn,$_POST['paypal'])."',`perfectmoney`='".mysqli_escape_string($conn,$_POST['perfect'])."',`paytm`='".mysqli_escape_string($conn,$_POST['paytm'])."',`upi`='".mysqli_escape_string($conn,$_POST['upi'])."' WHERE `id`='".mysqli_escape_string($conn,$_REQUEST['id'])."'";
$res3=query($conn,$sql3);

redirect('member.php');
}
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ee_member` WHERE `id`='".trim(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('member.php');
}
}
?>