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
$userid=getMember($conn,$_SESSION['mid'],'userid');
$package=trim($_REQUEST['package']);
$pvalue=getSettingsPackage($conn,$package,'amount');

$sqlp="SELECT * FROM `ee_epin` WHERE `epin`='".trim(mysqli_real_escape_string($conn,$_POST['epin']))."' AND `package`='".$package."' AND `status`='A'";
$resp=query($conn,$sqlp);
$nump=numrows($resp);
if($nump>0)
{

$sqlc="SELECT * FROM `ee_member_upgrade` WHERE `userid`='".$userid."' AND `package`='".trim($_REQUEST['package'])."'";
$resc=query($conn,$sqlc);
$numc=numrows($resc);
if($numc<1)
{
$sql="INSERT INTO `ee_member_upgrade` (`userid`,`package`,`pvalue`,`epin`,`upgradeby`,`date`) VALUES('".$userid."','".$package."','".$pvalue."','".trim($_REQUEST['epin'])."','".$userid."','".date('Y-m-d')."')";
$res=query($conn,$sql);
$id=mysqli_insert_id($conn);
if($id)
{
$sql2="UPDATE `ee_epin` SET `status`='U',`usedby`='".$userid."',`usedon`='".date('Y-m-d')."' WHERE `epin`='".trim(mysqli_real_escape_string($conn,$_POST['epin']))."' AND `package`='".$package."'";
$res2=query($conn,$sql2);

$sql51="INSERT INTO `ee_member_package`(`userid`,`package`,`pvalue`,`remarks`,`date`) VALUES('".$userid."','".$package."','".$pvalue."','Upgrade','".date('Y-m-d')."')";
$res51=query($conn,$sql51);


$pvalue=getSettingsPackage($conn,$package,'amount');
if($pvalue>0)
{
$last=getLastROIAccount($conn,$userid);
$account=($last+1);

$sql61="INSERT INTO `ee_member_roi` (`userid`,`package`,`account`,`pvalue`,`status`,`date`) VALUES('".$userid."','".$package."','".$account."','".$pvalue."','R','".date('Y-m-d')."')";
$res61=query($conn,$sql61);

//----------------------------------------------------------//
$date=strtotime(date("Y-m-d"));
$stdate=date('Y-m-d',strtotime('+1 days',$date));

$percent=getSettingsPackage($conn,$package,'dailyroi');
$nodays=getSettingsPackage($conn,$package,'nodays');

if($percent>0)
{
if($nodays>0)
{
$amount=getSettingsPackage($conn,$package,'amount');
$bonus=($amount*$percent)/100;

for($i=0;$i<$nodays;$i++)
{
$stdate1=date('Y-m-d',strtotime('+'.$i.' days',strtotime($stdate)));

$sql7="INSERT INTO `ee_commission_roi` (`userid`,`package`,`account`,`bonus`,`status`,`date`) VALUES('".$userid."','".$package."','".$account."','".$bonus."','H','".$stdate1."')";
$res7=query($conn,$sql7);
}
}
}
//--------------------------//
}
//----------------------------------------------------------//

//-------------------------BV Calculation----------------//
$packamt=getSettingsPackage($conn,$package,'amount');
$placement=getMemberUserid($conn,$userid,'placement');

function getSalesDistribute($conn,$userid,$placement,$packamt,$k)
{
$pos=getDownlinePosition($conn,$userid,$placement);
if($pos=='Left')
{
$lbal=getSales($conn,$placement,'left');
$tleft=($lbal+$packamt);

$sqls="UPDATE `ee_member_sales` SET `left`='".$tleft."' WHERE `userid`='".$placement."'";
$ress=query($conn,$sqls);

$lbalc=getSalesCount($conn,$placement,'left');
$tleftct=($lbalc+$packamt);

$sqls1="UPDATE `ee_member_sales_count` SET `left`='".$tleftct."' WHERE `userid`='".$placement."'";
$ress1=query($conn,$sqls1);
}

if($pos=='Right')
{
$rbal=getSales($conn,$placement,'right');
$tright=($rbal+$packamt);

$sqls="UPDATE `ee_member_sales` SET `right`='".$tright."' WHERE `userid`='".$placement."'";
$ress=query($conn,$sqls);

$rbalc=getSalesCount($conn,$placement,'right');
$rbalct=($rbalc+$packamt);

$sqls1="UPDATE `ee_member_sales_count` SET `right`='".$rbalct."' WHERE `userid`='".$placement."'";
$ress1=query($conn,$sqls1);
}

$k=$k+1;
$upline=getUplineID($conn,$placement);
if($upline)
{
getSalesDistribute($conn,$placement,$upline,$packamt,$k);
}
}

$k=1;
$upline=getUplineID($conn,$userid);
if($upline)
{
getSalesDistribute($conn,$userid,$upline,$packamt,$k);
}
//----------------------------------//

/*------------------------Matching--------------------------*/
include('calculate-matching-bonus.php');
//-------------End of Matching Calculation------------------//

}

redirect('upgrade.php?case=add&s=1');
}else{
redirect('upgrade.php?case=add&e=2');
}
}else{
redirect('upgrade.php?case=add&e=3');
}


}
}

?> 