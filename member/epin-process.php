<?php
session_start();
include('../administrator/includes/function.php');

if($_REQUEST['case']=='add')
{
if(mysqli_real_escape_string($conn,$_POST['noofpin'])>0)
{
$userid=getMember($conn,$_SESSION['mid'],'userid');
$avawallet=getAvailableWallet($conn,$userid);

$amt=getSettingsPackage($conn,$_POST['package'],'amount');

$epincost=($_POST['noofpin']*$amt);
$percent=getSettingsEpin($conn);

$charge=($epincost*$percent)/100;
$total=($epincost+$charge);

if($avawallet>=$total)
{
$noepin=mysqli_real_escape_string($conn,$_POST['noofpin']);

 $sql1="INSERT INTO `ee_member_epin` (`userid`,`noepin`,`package`,`pvalue`,`epincost`,`charge`,`total`,`date`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".$noepin."','".mysqli_real_escape_string($conn,$_POST['package'])."','".$amt."','".$epincost."','".$charge."','".$total."','".date('Y-m-d')."')";
$res1=query($conn,$sql1);

for($i=0;$i<$noepin;$i++)
{
$rand=strtoupper(md5(rand(1111111111,9999999999)));

$sql2="INSERT INTO `ee_epin` (`package`,`userid`,`toid`,`epin`,`generate`,`date`,`usedon`,`usedby`,`status`) VALUES('".mysqli_real_escape_string($conn,$_POST['package'])."','".getMember($conn,$_SESSION['mid'],'userid')."','".getMember($conn,$_SESSION['mid'],'userid')."','".$rand."','".getMember($conn,$_SESSION['mid'],'userid')."','".date('Y-m-d')."','','','A')";
$res2=query($conn,$sql2);
}
redirect('epin.php');

}else{
redirect('epin-generate.php?case=add&e=1');

}
}else{
redirect('epin-generate.php?case=add&m=3');
}
}
?>