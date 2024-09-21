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
$sql2="SELECT * FROM `ee_settings_package` WHERE `package`='".trim(mysqli_real_escape_string($conn,$_POST['package']))."' ";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2<1)
{
$sql="INSERT INTO `ee_settings_package` (`package`,`amount`,`dailyroi`,`nodays`,`capping`,`date`) VALUES('".trim($_POST['package'])."','".trim($_POST['amount'])."','".trim($_POST['dailyroi'])."','".trim($_POST['nodays'])."','".trim($_POST['capping'])."','".date('Y-m-d')."')";
$res=query($conn,$sql);

redirect('settings-package.php?case=add&m=1');
}else{
redirect('settings-package.php?case=add&e=1');
}
}

if($_REQUEST['case']=='edit')
{
$sql1="UPDATE `ee_settings_package` SET `package`='".mysqli_escape_string($conn,$_POST['package'])."',`amount`='".mysqli_escape_string($conn,$_POST['amount'])."',`dailyroi`='".mysqli_escape_string($conn,$_POST['dailyroi'])."',`nodays`='".mysqli_escape_string($conn,$_POST['nodays'])."',`capping`='".mysqli_escape_string($conn,$_POST['capping'])."' WHERE `id`='".mysqli_escape_string($conn,$_REQUEST['id'])."'";
$res1=query($conn,$sql1);

redirect('settings-package.php');
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ee_settings_package` WHERE `id`='".mysqli_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('settings-package.php');
}
}
?> 