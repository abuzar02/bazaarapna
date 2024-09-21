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
$sql1="SELECT * FROM `ee_member` WHERE `userid`='".trim(strtoupper($_POST['userid']))."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>0)
{
if($_POST['amount']>0)
{
$sql1="INSERT INTO `ee_deduct`(`userid`,`amount`,`remarks`,`date`) VALUES('".trim($_POST['userid'])."','".trim($_POST['amount'])."','".addslashes($_POST['remarks'])."','".date('Y-m-d')."')";
$res1=query($conn,$sql1);   
   
redirect('deduct.php?case=add&m=1');
}else{
redirect('deduct.php?case=add&f=1');
}
}else{
redirect('deduct.php?case=add&e=1');
}
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ee_deduct` WHERE `id`='".trim(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('deduct.php');
}
}
?>