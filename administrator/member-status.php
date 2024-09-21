<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
if($_REQUEST['case']=='status')
{
if($_REQUEST['st']=='A'){$st='I';}else{$st='A';}

$sql="UPDATE `ee_member` SET `status`='".$st."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('member.php');
}

if($_REQUEST['case']=='pay')
{
if($_REQUEST['st']=='A'){$st='I';}else{$st='A';}
$sqll="UPDATE `ee_member` SET `paystatus`='".$st."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$resl=query($conn,$sqll);

redirect('member.php');
}
}
?>