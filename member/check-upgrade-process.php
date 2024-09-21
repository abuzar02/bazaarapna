<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

$sql="SELECT * FROM `ee_member` WHERE `userid`='".trim($_POST['userid'])."' AND `paystatus`='A'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
redirect('upgrade-others.php?case=add&userid='.trim($_POST['userid']));
}else{
redirect('upgrade-others.php?case=check&e=2');
}

?>