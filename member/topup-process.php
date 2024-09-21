<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
$userid=trim($_POST['userid']);
$loginuser=getMember($conn,$_SESSION['mid'],'userid');
$sponsor=getMemberUserid($conn,trim($_POST['userid']),'sponsor');
$package=getMemberUserid($conn,trim($_POST['userid']),'package');
$pvalue=getSettingsPackage($conn,$package,'amount');

$sqlp="SELECT * FROM `ee_epin` WHERE `epin`='".trim(mysqli_real_escape_string($conn,$_POST['epin']))."' AND `package`='".$package."' AND `status`='A'";
$resp=query($conn,$sqlp);
$nump=numrows($resp);
if($nump>0)
{
$sqltop="INSERT INTO `ee_member_topup` (`userid`,`topupid`,`epin`,`date`) VALUES('".trim(getMember($conn,$_SESSION['mid'],'userid'))."','".trim($_POST['userid'])."','".trim(mysqli_real_escape_string($conn,$_POST['epin']))."','".date('Y-m-d')."')";
$restop=query($conn,$sqltop);

$sql1="UPDATE `ee_member` SET `paystatus`='A',`epin`='".trim(mysqli_real_escape_string($conn,$_POST['epin']))."',`approved`='".date('Y-m-d')."' WHERE `userid`='".trim(mysqli_real_escape_string($conn,$_POST['userid']))."'";
$res1=query($conn,$sql1);

$sql2="UPDATE `ee_epin` SET `status`='U',`usedby`='".$userid."',`usedon`='".date('Y-m-d')."' WHERE `epin`='".trim(mysqli_real_escape_string($conn,$_POST['epin']))."' AND `package`='".$package."'";
$res2=query($conn,$sql2);

$sql21="INSERT INTO `ee_member_count`(`userid`,`left`,`right`) VALUES('".$userid."','0','0')";
$res21=query($conn,$sql21);

$sql41="INSERT INTO `ee_member_sales`(`userid`,`left`,`right`) VALUES('".$userid."','0','0')";
$res41=query($conn,$sql41);

$sql42="INSERT INTO `ee_member_sales_count`(`userid`,`left`,`right`) VALUES('".$userid."','0','0')";
$res42=query($conn,$sql42);

$sql51="INSERT INTO `ee_member_package`(`userid`,`package`,`pvalue`,`remarks`,`date`) VALUES('".$userid."','".$package."','".$pvalue."','Joining','".date('Y-m-d')."')";
$res51=query($conn,$sql51);

$pvalue=getSettingsPackage($conn,$package,'amount');
if($pvalue>0)
{
$sql61="INSERT INTO `ee_member_roi` (`userid`,`package`,`account`,`pvalue`,`status`,`date`) VALUES('".$userid."','".$package."','1','".$pvalue."','R','".date('Y-m-d')."')";
$res61=query($conn,$sql61);

//----------------------------------------------------------//
$date=strtotime(date("Y-m-d"));
$stdate=date('Y-m-d',strtotime('+1 days',$date));

$percent=getSettingsPackage($conn,$package,'dailyroi');

$actdays=getSettingsPackage($conn,$package,'nodays');
$nodays=$actdays+100;

if($percent>0)
{
if($nodays>0)
{
$amount=getSettingsPackage($conn,$package,'amount');
$bonus=($amount*$percent)/100;

for($i=0;$i<$nodays;$i++)
{
$stdate1=date('Y-m-d',strtotime('+'.$i.' days',strtotime($stdate)));

$day=date('l',strtotime($stdate1));
if($day=='Monday' || $day=='Tuesday' || $day=='Wednesday' || $day=='Thursday' || $day=='Friday')
{
$sqlch="SELECT * FROM `ee_commission_roi` WHERE `userid`='".$userid."' AND `package`='".$package."' AND `account`='1'";
$resch=query($conn,$sqlch);
$numch=numrows($resch);
if($numch<$actdays)
{

$sql7="INSERT INTO `ee_commission_roi` (`userid`,`package`,`account`,`bonus`,`status`,`date`) VALUES('".$userid."','".$package."','1','".$bonus."','H','".$stdate1."')";
$res7=query($conn,$sql7);

}
}
}
}
}
//--------------------------//
}
//----------------------------------------------------------//
//-----------------Placement Logic--------------------------//
$position=getMemberUserid($conn,$userid,'position');
$sponchek=getMemberUserid($conn,$userid,'sponsor');
$orguserid=$userid;

function getXtremeDownline($conn,$userid,$placement,$position)
{
$sql="SELECT * FROM `ee_genealogy` WHERE `placement`='".$placement."' AND `position`='".$position."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['userid'])
{
getXtremeDownline($conn,$userid,$fetch['userid'],$position);
}
}else{
$sqlch="SELECT * FROM `ee_genealogy` WHERE `userid`='".$userid."'";
$resch=query($conn,$sqlch);
$numch=numrows($resch);
if($numch<1)
{
$sqls="INSERT INTO `ee_genealogy` (`userid`,`placement`,`position`,`date`) VALUES('".$userid."','".$placement."','".$position."','".date('Y-m-d')."')";
$ress=query($conn,$sqls);

$sql6="UPDATE `ee_member` SET `placement`='".$placement."' WHERE `userid`='".$userid."'";
$res6=query($conn,$sql6);
}
}
}

if($sponchek!='' && $position!='')
{
getXtremeDownline($conn,$userid,$sponchek,$position);
}
//-----------------------------------//

//-------------------------BV Calculation----------------//
$packamt=getSettingsPackage($conn,$package,'amount');
$placement=getMemberUserid($conn,$userid,'placement');

function getSalesDistribute($conn,$userid,$placement,$packamt,$k)
{
$pos=getDownlinePosition($conn,$userid,$placement);
if($pos=='Left')
{
$ldown=getDownlineCount($conn,$placement,'left');
$leftdown=($ldown+1);

$sqld1="UPDATE `ee_member_count` SET `left`='".$leftdown."' WHERE `userid`='".$placement."'";
$resd1=query($conn,$sqld1);

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
$rdown=getDownlineCount($conn,$placement,'right');
$rightdown=($rdown+1);

$sqld2="UPDATE `ee_member_count` SET `right`='".$rightdown."' WHERE `userid`='".$placement."'";
$resd2=query($conn,$sqld2);

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

//----------------------------Direct Sponsor Bonus-----------------------//
$sponsor=getMemberUserid($conn,trim($_POST['userid']),'sponsor');
if($sponsor)
{
$packamt=getSettingsPackage($conn,$package,'amount');

$directot=getSettingsBinary($conn,'directot');

$totbonus=($packamt*$directot)/100;
if($totbonus>0)
{
$sql5="INSERT INTO `ee_member_direct` (`userid`,`fromid`,`package`,`pvalue`,`percentage`,`bonus`,`date`) VALUES ('".$sponsor."','".$userid."','".$package."','".$packamt."','".$directot."','".$totbonus."','".date('Y-m-d')."')";
$res5=query($conn,$sql5);
}

//----------------------------------------------------------//
$date=date("Y-m-d");

$directper=getSettingsBinary($conn,'directper');
$dnodays=getSettingsBinary($conn,'dnodays');

if($directper>0)
{
if($dnodays>0)
{
$packamt=getSettingsPackage($conn,$package,'amount');
$bonusdir=($packamt*$directper)/100;

for($i=0;$i<$dnodays;$i++)
{
$stdate1=date('Y-m-d',strtotime('+'.$i.' days',strtotime($date)));

$sql5="INSERT INTO `ee_commission_direct` (`userid`,`fromid`,`package`,`pvalue`,`percentage`,`bonus`,`status`,`date`) VALUES ('".$sponsor."','".$userid."','".$package."','".$packamt."','".$directper."','".$bonusdir."','H','".$stdate1."')";
$res5=query($conn,$sql5);
}
}
}
//----------------------------------------------------//

}

/*------------------------Matching--------------------------*/
include('calculate-matching-bonus.php');
//-------------End of Matching Calculation------------------//



redirect('topup.php?case=check&m=1');
}else{
redirect('topup.php?e=1&case=add&check=correct&userid='.trim(($_POST['userid'])));
}
}
?>