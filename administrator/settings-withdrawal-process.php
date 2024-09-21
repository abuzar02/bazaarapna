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
$sql="INSERT INTO `ee_settings_withdrawal` (`framount`,`toamount`,`tds`,`service`) VALUES('".trim($_POST['framount'])."','".trim($_POST['toamount'])."','".trim($_POST['tds'])."','".trim($_POST['service'])."')";
$res=query($conn,$sql);

redirect('settings-withdrawal.php?case=add&m=1');
}


if($_REQUEST['case']=='edit')
{
$sql1="UPDATE `ee_settings_withdrawal` SET `framount`='".trim(mysqli_real_escape_string($conn,$_POST['framount']))."',`toamount`='".trim(mysqli_real_escape_string($conn,$_POST['toamount']))."',`tds`='".trim(mysqli_real_escape_string($conn,$_POST['tds']))."',`service`='".trim(mysqli_real_escape_string($conn,$_POST['service']))."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res1=query($conn,$sql1);

redirect('settings-withdrawal.php');
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ee_settings_withdrawal` WHERE `id`='".mysqli_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('settings-withdrawal.php');
}

}
?>