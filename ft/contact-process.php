<?php
session_start();
include('administrator/includes/function.php');

if($_SERVER['REQUEST_METHOD']=='POST')
{
$sql="INSERT INTO `ee_feedback` (`name`,`email`,`phone`,`subject`,`message`,`date`) VALUES ('".trim($_POST['name'])."','".trim($_POST['email'])."','".trim($_POST['phone'])."','".trim(addslashes(strip_tags($_POST['subject'])))."','".trim(addslashes(strip_tags($_POST['message'])))."','".date('Y-m-d')."')";
$res=query($conn,$sql);

redirect('contact.php?m=1');
}
?>