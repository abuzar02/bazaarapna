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
$sql1="UPDATE `ee_settings_epin` SET `charge`='".mysqli_escape_string($conn,$_POST['charge'])."' WHERE `id`='".mysqli_escape_string($conn,$_REQUEST['id'])."'";
$res1=query($conn,$sql1);

redirect('settings-epin.php');
}

}
?> 