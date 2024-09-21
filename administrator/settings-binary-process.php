<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
if($_REQUEST['case']=='edit')
{
$sql1="UPDATE `ee_settings_binary` SET `directot`='".mysqli_escape_string($conn,$_POST['directot'])."',`directper`='".mysqli_escape_string($conn,$_POST['directper'])."',`dnodays`='".mysqli_escape_string($conn,$_POST['dnodays'])."',`binarytot`='".mysqli_escape_string($conn,$_POST['binarytot'])."',`binaryper`='".mysqli_escape_string($conn,$_POST['binaryper'])."',`bnodays`='".mysqli_escape_string($conn,$_POST['bnodays'])."' WHERE `id`='".mysqli_escape_string($conn,$_REQUEST['id'])."'";
$res1=query($conn,$sql1);

redirect('settings-binary.php');
}

}
?> 