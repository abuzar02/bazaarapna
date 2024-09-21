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
$sql="UPDATE `ee_withdrawal` SET `status`='C',`approved`='".date('Y-m-d')."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('pending-withdrawal.php?page='.mysqli_real_escape_string($conn,$_REQUEST['page']));
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ee_withdrawal` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql); 

redirect('pending-withdrawal.php?page='.mysqli_real_escape_string($conn,$_REQUEST['page']));
}

if($_REQUEST['case']=='paid')
{
if(trim($_REQUEST['status'])=='paid'){$status='C';}else{$status='P';}

$sql="UPDATE `ee_withdrawal` SET `paid`='".trim($status)."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql); 

redirect('approved-withdrawal.php?page='.mysqli_real_escape_string($conn,$_REQUEST['page']));
}


}
?>