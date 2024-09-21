<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
if($_REQUEST['case']=='add')
{
if($_POST['amount']>0)
{
$userid=getMember($conn,$_SESSION['mid'],'userid');

$avabal=getAvailableWallet($conn,$userid);

$service=getSettingsWithdrawal($conn,trim($_POST['amount']),'service');
$tds=getSettingsWithdrawal($conn,trim($_POST['amount']),'tds');

$tdsamt=($_POST['amount'] * $tds)/100;
$serviceamt=($_POST['amount'] * $service)/100;
$payout=($_POST['amount']-($tdsamt+$serviceamt));

if($avabal>=trim($_POST['amount']))
{
$min=getSettingsWithdrawalMinimum($conn);
$max=getSettingsWithdrawalMaximum($conn);

$amt=trim($_POST['amount']);

if($amt>=$min && $amt<=$max)
{
if($_POST['type']=='Bank')
{
$sql1="INSERT INTO `ee_withdrawal` (`userid`,`request`,`tds`,`service`,`payout`,`type`,`bname`,`branch`,`accname`,`accno`,`ifscode`,`date`,`status`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".$tdsamt."','".$serviceamt."','".$payout."','".mysqli_real_escape_string($conn,$_POST['type'])."','".getMember($conn,$_SESSION['mid'],'bname')."','".getMember($conn,$_SESSION['mid'],'branch')."','".getMember($conn,$_SESSION['mid'],'accname')."','".getMember($conn,$_SESSION['mid'],'accno')."','".getMember($conn,$_SESSION['mid'],'ifscode')."','".date('Y-m-d')."','P')";
$res1=query($conn,$sql1);
}

if($_POST['type']=='Payeer')
{
$sql1="INSERT INTO `ee_withdrawal` (`userid`,`request`,`tds`,`service`,`payout`,`type`,`payeer`,`date`,`status`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".$tdsamt."','".$serviceamt."','".$payout."','".mysqli_real_escape_string($conn,$_POST['type'])."','".getMember($conn,$_SESSION['mid'],'payeer')."','".date('Y-m-d')."','P')";
$res1=query($conn,$sql1);
}

if($_POST['type']=='Paypal')
{
$sql1="INSERT INTO `ee_withdrawal` (`userid`,`request`,`tds`,`service`,`payout`,`type`,`paypal`,`date`,`status`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".$tdsamt."','".$serviceamt."','".$payout."','".mysqli_real_escape_string($conn,$_POST['type'])."','".getMember($conn,$_SESSION['mid'],'paypal')."','".date('Y-m-d')."','P')";
$res1=query($conn,$sql1);
}

if($_POST['type']=='PerfectMoney')
{
$sql1="INSERT INTO `ee_withdrawal` (`userid`,`request`,`tds`,`service`,`payout`,`type`,`perfectmoney`,`date`,`status`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".$tdsamt."','".$serviceamt."','".$payout."','".mysqli_real_escape_string($conn,$_POST['type'])."','".getMember($conn,$_SESSION['mid'],'perfectmoney')."','".date('Y-m-d')."','P')";
$res1=query($conn,$sql1);
}


if($_POST['type']=='Paytm')
{
$sql1="INSERT INTO `ee_withdrawal` (`userid`,`request`,`tds`,`service`,`payout`,`type`,`paytm`,`date`,`status`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".$tdsamt."','".$serviceamt."','".$payout."','".mysqli_real_escape_string($conn,$_POST['type'])."','".getMember($conn,$_SESSION['mid'],'paytm')."','".date('Y-m-d')."','P')";
$res1=query($conn,$sql1);
}

if($_POST['type']=='UPI')
{
$sql1="INSERT INTO `ee_withdrawal` (`userid`,`request`,`tds`,`service`,`payout`,`type`,`upi`,`date`,`status`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".$tdsamt."','".$serviceamt."','".$payout."','".mysqli_real_escape_string($conn,$_POST['type'])."','".getMember($conn,$_SESSION['mid'],'upi')."','".date('Y-m-d')."','P')";
$res1=query($conn,$sql1);
}


if($_POST['type']=='Bitcoin')
{
$sql1="INSERT INTO `ee_withdrawal` (`userid`,`request`,`tds`,`service`,`payout`,`type`,`bitcoin`,`date`,`status`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".$tdsamt."','".$serviceamt."','".$payout."','".mysqli_real_escape_string($conn,$_POST['type'])."','".getMember($conn,$_SESSION['mid'],'bitcoin')."','".date('Y-m-d')."','P')";
$res1=query($conn,$sql1);
}
if($_POST['type']=='Bitcoincash')
{
$sql1="INSERT INTO `ee_withdrawal` (`userid`,`request`,`tds`,`service`,`payout`,`type`,`bitcoincash`,`date`,`status`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".$tdsamt."','".$serviceamt."','".$payout."','".mysqli_real_escape_string($conn,$_POST['type'])."','".getMember($conn,$_SESSION['mid'],'bitcoincash')."','".date('Y-m-d')."','P')";
$res1=query($conn,$sql1);
}
if($_POST['type']=='Ethereum')
{
$sql1="INSERT INTO `ee_withdrawal` (`userid`,`request`,`tds`,`service`,`payout`,`type`,`ethereum`,`date`,`status`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".$tdsamt."','".$serviceamt."','".$payout."','".mysqli_real_escape_string($conn,$_POST['type'])."','".getMember($conn,$_SESSION['mid'],'ethereum')."','".date('Y-m-d')."','P')";
$res1=query($conn,$sql1);
}
if($_POST['type']=='Dash')
{
$sql1="INSERT INTO `ee_withdrawal` (`userid`,`request`,`tds`,`service`,`payout`,`type`,`dash`,`date`,`status`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".$tdsamt."','".$serviceamt."','".$payout."','".mysqli_real_escape_string($conn,$_POST['type'])."','".getMember($conn,$_SESSION['mid'],'dash')."','".date('Y-m-d')."','P')";
$res1=query($conn,$sql1);
}
if($_POST['type']=='Dogecoin')
{
$sql1="INSERT INTO `ee_withdrawal` (`userid`,`request`,`tds`,`service`,`payout`,`type`,`dogecoin`,`date`,`status`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".$tdsamt."','".$serviceamt."','".$payout."','".mysqli_real_escape_string($conn,$_POST['type'])."','".getMember($conn,$_SESSION['mid'],'dogecoin')."','".date('Y-m-d')."','P')";
$res1=query($conn,$sql1);
}
if($_POST['type']=='Litecoin')
{
$sql1="INSERT INTO `ee_withdrawal` (`userid`,`request`,`tds`,`service`,`payout`,`type`,`litecoin`,`date`,`status`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".$tdsamt."','".$serviceamt."','".$payout."','".mysqli_real_escape_string($conn,$_POST['type'])."','".getMember($conn,$_SESSION['mid'],'litecoin')."','".date('Y-m-d')."','P')";
$res1=query($conn,$sql1);
}
if($_POST['type']=='Monero')
{
$sql1="INSERT INTO `ee_withdrawal` (`userid`,`request`,`tds`,`service`,`payout`,`type`,`monero`,`date`,`status`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".$tdsamt."','".$serviceamt."','".$payout."','".mysqli_real_escape_string($conn,$_POST['type'])."','".getMember($conn,$_SESSION['mid'],'monero')."','".date('Y-m-d')."','P')";
$res1=query($conn,$sql1);
}
if($_POST['type']=='Ripple')
{
$sql1="INSERT INTO `ee_withdrawal` (`userid`,`request`,`tds`,`service`,`payout`,`type`,`ripple`,`date`,`status`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".$tdsamt."','".$serviceamt."','".$payout."','".mysqli_real_escape_string($conn,$_POST['type'])."','".getMember($conn,$_SESSION['mid'],'ripple')."','".date('Y-m-d')."','P')";
$res1=query($conn,$sql1);
}
if($_POST['type']=='Troncoin')
{
$sql1="INSERT INTO `ee_withdrawal` (`userid`,`request`,`tds`,`service`,`payout`,`type`,`troncoin`,`date`,`status`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".$tdsamt."','".$serviceamt."','".$payout."','".mysqli_real_escape_string($conn,$_POST['type'])."','".getMember($conn,$_SESSION['mid'],'troncoin')."','".date('Y-m-d')."','P')";
$res1=query($conn,$sql1);
}
if($_POST['type']=='Zcash')
{
$sql1="INSERT INTO `ee_withdrawal` (`userid`,`request`,`tds`,`service`,`payout`,`type`,`zcash`,`date`,`status`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".$tdsamt."','".$serviceamt."','".$payout."','".mysqli_real_escape_string($conn,$_POST['type'])."','".getMember($conn,$_SESSION['mid'],'zcash')."','".date('Y-m-d')."','P')";
$res1=query($conn,$sql1);
}

$id=mysqli_insert_id($conn);

redirect('withdrawal.php?case=add&m=4');
}else{
redirect('withdrawal.php?case=add&e=3');
}

}else{
redirect('withdrawal.php?case=add&e=2');
}
}else{
redirect('withdrawal.php?case=add&e=1');
}
}else{
redirect('withdrawal.php?case=add&e=3');
}
}

?>