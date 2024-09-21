<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_SESSION['mid'])
{
$sql="SELECT * FROM `ee_member` WHERE `id`='".mysqli_real_escape_string($conn,$_SESSION['mid'])."' AND `password`='".base64_encode(mysqli_real_escape_string($conn,$_POST['current']))."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
if($_POST['newpass']==$_POST['conpass'])
{
$sql="UPDATE `ee_member` SET `password`='".base64_encode(mysqli_real_escape_string($conn,$_POST['newpass']))."' WHERE `id`='".mysqli_real_escape_string($conn,$_SESSION['mid'])."'";
$res=query($conn,$sql);

redirect('change-password.php?n=2');
}else{
redirect('change-password.php?p=3');
}

}else{
redirect('change-password.php?m=1');
}
}
}
?>