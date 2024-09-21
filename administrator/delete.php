<?php
session_start();
include('includes/function.php');


if($_SESSION['sid'])
{
if($_REQUEST['case']=='feedback')
{
$sql="DELETE FROM `ee_feedback` WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('feedback.php?page='.$_REQUEST['page']);
}
}
?>