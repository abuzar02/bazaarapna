<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_REQUEST['case']=='add')
{
$sql1="INSERT INTO `ee_contact` (`title`,`addline1`,`addline2`,`email1`,`email2`,`phone1`,`phone2`) VALUES('".input($_POST['office'])."','".input($_POST['address1'])."','".input($_POST['address2'])."','".mysqli_real_escape_string($conn,input($_POST['email1']))."','".mysqli_real_escape_string($conn,input($_POST['email2']))."','".mysqli_real_escape_string($conn,input($_POST['phone1']))."','".mysqli_real_escape_string($conn,input($_POST['phone2']))."')";
$res1=query($conn,$sql1);
   
redirect('contact.php?case=add&m=1');
}

if($_REQUEST['case']=='edit')
{
$sql2="UPDATE `ee_contact` SET `title`='".input($_POST['office'])."',`addline1`='".input($_POST['address1'])."',`addline2`='".input($_POST['address2'])."',`email1`='".mysqli_real_escape_string($conn,input($_POST['email1']))."',`email2`='".mysqli_real_escape_string($conn,input($_POST['email2']))."',`phone1`='".mysqli_real_escape_string($conn,input($_POST['phone1']))."',`phone2`='".mysqli_real_escape_string($conn,input($_POST['phone2']))."' WHERE `id`='".mysqli_real_escape_string($conn,input($_REQUEST['id']))."'";
$res2=query($conn,$sql2);
redirect('contact.php');
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ee_contact` WHERE `id`='".input(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('contact.php');
}
?>