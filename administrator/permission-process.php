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
$sql1="INSERT INTO `ee_permission` (`userid`,`module`,`date`) VALUES('".trim($_POST['username'])."','".trim($_POST['menu'])."','".date('Y-m-d')."')";
$res1=query($conn,$sql1);

redirect('permission.php');
}


if($_REQUEST['case']=='edit')
{
$sql1="UPDATE `ee_permission` SET `userid`='".trim($_POST['username'])."',`module`='".trim($_POST['menu'])."' WHERE `id`='".trim($_REQUEST['id'])."'";
$res1=query($conn,$sql1);

redirect('permission.php');
}



if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ee_permission` WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('permission.php');
}
}
?>