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
$sql="INSERT INTO `ee_settings_reward` (`left`,`right`,`reward`) VALUES('".trim($_POST['left'])."','".trim($_POST['right'])."','".trim($_POST['reward'])."')";
$res=query($conn,$sql);

redirect('settings-reward.php?case=add&m=1');
}

if($_REQUEST['case']=='edit')
{
$sql1="UPDATE `ee_settings_reward` SET `left`='".mysqli_escape_string($conn,$_POST['left'])."',`right`='".mysqli_escape_string($conn,$_POST['right'])."',`reward`='".mysqli_escape_string($conn,$_POST['reward'])."' WHERE `id`='".mysqli_escape_string($conn,$_REQUEST['id'])."'";
$res1=query($conn,$sql1);

redirect('settings-reward.php');
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ee_settings_reward` WHERE `id`='".mysqli_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('settings-reward.php');
}
}
?> 