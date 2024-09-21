<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
if($_REQUEST['case']=='member')
{
if($_POST['number']>0)
{
$sql="SELECT * FROM `ee_member` WHERE `userid`='".trim($_POST['userid'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
for($i=1;$i<=$_POST['number'];$i++)
{
$epin=md5(rand(1111111111,9999999999));
$sql1="SELECT * FROM `ee_epin` WHERE `epin`='".strtoupper($epin)."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1<1)
{
$sql="INSERT INTO `ee_epin` (`userid`,`toid`,`package`,`epin`,`date`,`generate`) VALUES ('".trim($_POST['userid'])."','".trim($_POST['userid'])."','".trim($_POST['package'])."','".strtoupper($epin)."','".date('Y-m-d')."','Administrator')";
$res=query($conn,$sql);
}
}
redirect('epin.php');

}else{
redirect('epin.php?case=member&e=1');
}
}else{
redirect('epin.php?case=member&g=1');
}
}

if($_REQUEST['case']=='admin')
{
if($_POST['number']>0)
{
for($i=1;$i<=$_POST['number'];$i++)
{
$epin=md5(rand(1111111111,9999999999));
$sql1="SELECT * FROM `ee_epin` WHERE `epin`='".strtoupper($epin)."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1<1)
{
$sql="INSERT INTO `ee_epin` (`package`,`epin`,`date`,`generate`) VALUES ('".trim($_POST['package'])."','".strtoupper($epin)."','".date('Y-m-d')."','Administrator')";
$res=query($conn,$sql);

}
}
redirect('epin.php');
}else{
redirect('epin.php?case=admin&g=1');
}
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ee_epin` WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('epin.php?page='.$_REQUEST['page']);
}
}
?>