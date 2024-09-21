<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
if($_REQUEST['case']=='add')
{
$sql="SELECT * FROM `ee_admin` WHERE `username`='".base64_encode($_POST['username'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num<1)
{
$sql1="INSERT INTO `ee_admin` (`username`,`password`,`name`,`phone`,`email`,`role`,`date`) VALUES('".base64_encode($_POST['username'])."','".base64_encode($_POST['password'])."','".trim($_POST['name'])."','".trim($_POST['phone'])."','".trim($_POST['email'])."','S','".date('Y-m-d')."')";
$res1=query($conn,$sql1);

redirect('subadmin.php');
}else{
redirect('subadmin.php?case=add&e=1');
}

}


if($_REQUEST['case']=='edit')
{
$sql="SELECT * FROM `ee_admin` WHERE (`username`='".base64_encode($_POST['username'])."' AND `id`!='".$_REQUEST['id']."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num<1)
{
$sql1="UPDATE `ee_admin` SET `username`='".base64_encode($_POST['username'])."',`password`='".base64_encode($_POST['password'])."',`name`='".trim($_POST['name'])."',`phone`='".trim($_POST['phone'])."',`email`='".trim($_POST['email'])."' WHERE `id`='".trim($_REQUEST['id'])."'";
$res1=query($conn,$sql1);

redirect('subadmin.php');
}else{
redirect('subadmin.php?case=add&e=1');
}

}


if($_REQUEST['case']=='status')
{
if($_REQUEST['st']=='A'){$st='I';}else{$st='A';}

$sql="UPDATE `ee_admin` SET `status`='".$st."' WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('subadmin.php?page='.$_REQUEST['page']);
}


if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ee_admin` WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('subadmin.php');
}
}
?>