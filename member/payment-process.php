<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
/*-----------------------STart OF file CODE-----------*/
if($_FILES['file']['name'])
{
if(strpos($_FILES['file']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="paymentslip/";
$path=$rand.$_FILES['file']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif' || $ext=='xlsx' || $ext=='docx' || $ext=='pdf')
{
$target=$target.basename($path);
move_uploaded_file($_FILES['file']['tmp_name'], $target);
}
}
}
/*-----------------------END OF file CODE-----------*/

 $sql="INSERT INTO `ee_member_payment`(`userid`,`tranid`,`amount`,`slip`,`status`,`date`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".mysqli_real_escape_string($conn,trim($_POST['tranid']))."','".mysqli_real_escape_string($conn,trim($_POST['amount']))."','".$path."','P','".date('Y-m-d')."')";
$res=query($conn,$sql);

redirect('payment.php?s=1&page='.$_REQUEST['page']);
}
?> 