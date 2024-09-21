<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
$userid=getMember($conn,$_SESSION['mid'],'userid');

$sqlp="SELECT * FROM `ee_epin` WHERE `package`='".trim(mysqli_real_escape_string($conn,$_POST['package']))."' AND `epin`='".trim(mysqli_real_escape_string($conn,$_POST['epin']))."' AND `status`='A'";
$resp=query($conn,$sqlp);
$nump=numrows($resp);
if($nump>0 & $_POST['package']!=$package)
{
$sql="INSERT INTO `ee_member_upgrade`(`userid`,`package`,`epin`,`date`) values('".$userid."','".mysqli_real_escape_string($conn,trim($_POST['package']))."','".mysqli_real_escape_string($conn,trim($_POST['epin']))."','".date('Y-m-d')."')";
$res=query($conn,$sql);

$sql2="UPDATE `ee_epin` SET `status`='U',`usedby`='".$userid."',`usedon`='".date('Y-m-d')."' WHERE `epin`='".trim(mysqli_real_escape_string($conn,$_POST['epin']))."'";
$res2=query($conn,$sql2);

$sql3="INSERT INTO `ee_member_package`(`userid`,`package`,`remarks`,`date`) values('".$userid."','".mysqli_real_escape_string($conn,trim($_POST['package']))."','Upgrade','".date('Y-m-d')."')";
$res3=query($conn,$sql3);

//--------------------Direct Referral Bonus-------------------------------//
$sponsor=getMember($conn,$_SESSION['mid'],'sponsor');
if($sponsor)
{
$percentR=getSettingsMatching($conn,'referral');
$packamt=getSettingsPackage($conn,trim($_POST['package']),'package');

$bonusR=($packamt*$percentR)/100;
if($bonusR>0)
{
$sql5="INSERT INTO `ee_commission_referral` (`userid`,`fromid`,`package`,`pvalue`,`percentage`,`bonus`,`date`) VALUES ('".$sponsor."','".$userid."','".trim($_POST['package'])."','".$packamt."','".$percentR."','".$bonusR."','".date('Y-m-d')."')";
$res5=query($conn,$sql5);
}
}

redirect('member-upgrade.php?m=1&page='.$_REQUEST['page']);
}else{
redirect('member-upgrade.php?e=1&page='.$_REQUEST['page']);
}
}
?> 