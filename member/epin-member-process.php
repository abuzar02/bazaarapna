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
$toid=trim($_POST['toid']);

if($userid!=$toid)
{
$sql="SELECT * FROM `ee_member` WHERE `userid`='".$toid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
for($i=0; $i<count($_POST['emp_name']);$i++)
{
$epinid=$_POST['emp_name'][$i];

$sql2="UPDATE `ee_epin` SET `toid`='".$toid."' WHERE `id`='".$epinid."'";
$res2=query($conn,$sql2);

$sqlt="INSERT INTO `ee_epin_transfer`(`userid`,`toid`,`package`,`epin`,`date`) VALUES('".$userid."','".$toid."','".getEpinID($conn,$epinid,'package')."','".getEpinID($conn,$epinid,'epin')."','".date('Y-m-d')."')";
$rest=query($conn,$sqlt);
}

redirect('epin-member.php?case=add&m=1');
}else{
redirect('epin-member.php?case=add&e=1');
}
}else{
redirect('epin-member.php?case=add&e=2');
}

}
?>