<?php
/*-----------------Database Connection-----------------------*/
$conn=mysqli_connect('localhost','u257369931_fast24','Tls@007rj','u257369931_fast24');
date_default_timezone_set('Asia/Calcutta');
/*-----------------Database Connection-----------------------*/

$title='fastrack24';
$domain='www.fastrack24.in';
$welcome='welcome@ fastrack24.in';
$support='support@ fastrack24.in';
$recovery='recovery@ fastrack24.in';
$prefix='FT';

function redirect($url)
{
header('Location: '.$url);
exit();
}
function query($conn,$sql)
{
$res=mysqli_query($conn,$sql);
return $res;
}
function numrows($exe)
{
$no=mysqli_num_rows($exe);
return $no;
}
function fetcharray($res)
{
$fetch=mysqli_fetch_array($res);
return $fetch;
}
function input($string)
{
$string=addslashes(trim(strip_tags($string)));
return $string;
}

function output($string)
{
$string=stripslashes(trim(strip_tags($string)));
return $string;
}

function getUser($conn,$id,$field)
{
$sql="SELECT * FROM `ee_admin` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getSettingsJoining($conn)
{
$sql="SELECT * FROM `ee_settings_joining` ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['joining'];
}
}

function getSettingsEpin($conn)
{
$sql="SELECT * FROM `ee_settings_epin` ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['charge'];
}
}

function getContactDetails($conn,$field)
{
$sql="SELECT * FROM `ee_contact` ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
} 

function getSettingsJoiningNew($conn,$field)
{
$sql="SELECT * FROM `ee_settings_joining` ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}


function getTotalMember($conn)
{
$sql="SELECT `id` FROM `ee_member`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getActiveMember($conn)
{
$sql="SELECT `id` FROM `ee_member` WHERE `paystatus`='A'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getInactiveMember($conn)
{
$sql="SELECT `id` FROM `ee_member` WHERE `paystatus`='I'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}


function getMember($conn,$id,$field)
{
$sql="SELECT * FROM `ee_member` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getUserID($conn,$id,$field)
{
$sql="SELECT * FROM `ee_member` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}


function getMemberUserid($conn,$userid,$field)
{
$sql="SELECT * FROM `ee_member` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}


function getPendingWithdrawalAdmin($conn)
{
$sql="SELECT SUM(`request`) AS total FROM `ee_withdrawal` WHERE `status`='P'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getApprovedWithdrawalAdmin($conn)
{
$sql="SELECT SUM(`request`) AS total FROM `ee_withdrawal` WHERE `status`='C'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getTotalSupport($conn)
{
$sql="SELECT `id` FROM `ee_support`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getNoOfFeedback($conn)
{
$sql="SELECT `id` FROM `ee_feedback`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getEpinMember($conn,$userid)
{
$sql="SELECT SUM(`total`) AS total FROM `ee_member_epin` WHERE `userid`='".$userid."' ORDER BY `id` DESC";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}

function getMemberEPin($conn,$userid)
{
$sql="SELECT SUM(`total`) AS total FROM `ee_member_epin` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getCoinPaymentPaid($conn,$userid)
{
$sql="SELECT * FROM `ee_member_coinpayment` WHERE `userid`='".$userid."' AND `status`='C'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getAvailableWallet($conn,$userid)
{
$total=(getBinaryIncomeReleased($conn,$userid)+getDirectIncomeReleased($conn,$userid)+getROIIncomeReleased($conn,$userid)+getDepositMember($conn,$userid)+getRewardIncome($conn,$userid)+getMemberPayment($conn,$userid)+getCoinPaymentPaid($conn,$userid))-(getMemberWithdrawal($conn,$userid)+getDeductMember($conn,$userid)+getEpinMember($conn,$userid));

return $total;
}

function getTotalIncomeMember($conn,$userid)
{
$total=getBinaryIncomeReleased($conn,$userid)+getDirectIncomeReleased($conn,$userid)+getROIIncomeReleased($conn,$userid)+getRewardIncome($conn,$userid);

return $total;
}


function getBinaryIncome($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_member_binary` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getBinaryIncomeReleased($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_commission_binary` WHERE `userid`='".$userid."' AND `status`='R' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getDirectIncome($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_member_direct` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getDirectIncomeReleased($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_commission_direct` WHERE `userid`='".$userid."' AND `status`='R' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getROIIncome($conn,$userid)
{
$sql="SELECT SUM(`pvalue`) AS total FROM `ee_member_roi` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getROIIncomeReleased($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_commission_roi` WHERE `userid`='".$userid."' AND `status`='R' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTotalBinaryIncome($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_commission_binary` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTotalDirectIncome($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_commission_direct` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTotalROIIncome($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_commission_roi` WHERE `status`='R' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getEpinAdmin($conn)
{
$sql="SELECT * FROM `ee_epin` WHERE `status`='A'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getUsedEpinAdmin($conn)
{
$sql="SELECT * FROM `ee_epin` WHERE `status`='U'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getPendingWithdrawalMember($conn,$userid)
{
$sql="SELECT SUM(`request`) AS total FROM `ee_withdrawal` WHERE `userid`='".$userid."' AND `status`='P'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getApprovedWithdrawalMember($conn,$userid)
{
$sql="SELECT SUM(`request`) AS total FROM `ee_withdrawal` WHERE `userid`='".$userid."' AND `status`='C'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getMemberWithdrawal($conn,$userid)
{
$sql="SELECT SUM(`request`) AS total FROM `ee_withdrawal` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getDepositMember($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_deposit` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getMemberPayment($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_member_payment` WHERE `userid`='".$userid."' AND `status`='C' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getDeductMember($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_deduct` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getSettingsWithdrawal($conn,$amount,$field)
{
$sql="SELECT * FROM `ee_settings_withdrawal` WHERE `framount`<='".$amount."' AND `toamount`>='".$amount."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getSettingsWithdrawalMinimum($conn)
{
$sql="SELECT MIN(`framount`) AS minimum FROM `ee_settings_withdrawal`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['minimum'];
}
}

function getSettingsPin($conn)
{
$sql="SELECT * FROM `ee_settings_pin` ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['charge'];
}
}

function getDownlineByPosition($conn,$sponsor,$position)
{
$sql="SELECT * FROM `ee_genealogy` WHERE `placement`='".$sponsor."' AND `position`='".$position."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['userid'];
}
}

function getSales($conn,$userid,$field)
{
$sql="SELECT * FROM `ee_member_sales` WHERE `userid`='".$userid."'  ORDER BY `id` DESC";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

$total=$fetch[$field];
}else{
$total=0;
}
return $total;
}

function getDownlineCount($conn,$userid,$field)
{
$sql="SELECT * FROM `ee_member_count` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

$total=$fetch[$field];
}else{
$total=0;
}
return $total;
}


function getSalesCount($conn,$userid,$field)
{
$sql="SELECT * FROM `ee_member_sales_count` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

$total=$fetch[$field];
}else{
$total=0;
}
return $total;
}

function getSaleCount($conn,$userid,$package,$field)
{
$sql="SELECT * FROM `ee_member_sales` WHERE `userid`='".$userid."' AND `package`='".$package."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getDownlinePosition($conn,$userid,$placement)
{
$sql1="SELECT * FROM `ee_genealogy` WHERE `userid`='".$userid."' AND `placement`='".$placement."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>0)
{
$fetch1=fetcharray($res1);

return $fetch1['position'];
}
}

function getUplineID($conn,$userid)
{
$sql="SELECT * FROM `ee_genealogy` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['placement'];
}
}

function getCountMatrix($conn,$userid,$table,$level)
{
$sql="SELECT * FROM ".$table."  WHERE `placement`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
$i=0;
$arr=array();
if($num>0)
{
while($fetch=fetcharray($res))
{
$arr[$i]=$fetch['userid'];

$i++;
}

$count=count($arr);
if($count>0)
{
$arr1=array();
$j=0;
for($k=0;$k<$count;$k++)
{
$sql1="SELECT * FROM ".$table." WHERE `placement`='".$arr[$k]."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>0)
{
while($fetch1=fetcharray($res1))
{
$arr1[$j]=$fetch1['userid'];
$j++;
}
}
}
}

$count1=count($arr1);

if($count1>0)
{
$arr2=array();
$m=0;
for($l=0;$l<$count1;$l++)
{
$sql2="SELECT * FROM ".$table." WHERE `placement`='".$arr1[$l]."'";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2>0)
{
while($fetch2=fetcharray($res2))
{
$arr2[$m]=$fetch2['userid'];
$m++;
}
}
}
}
$count2=count($arr2);

if($count2>0)
{
$arr3=array();
$m3=0;
for($l3=0;$l3<$count2;$l3++)
{
$sql3="SELECT * FROM ".$table." WHERE `placement`='".$arr2[$l3]."'";
$res3=query($conn,$sql3);
$num3=numrows($res3);
if($num3>0)
{
while($fetch3=fetcharray($res3))
{
$arr3[$m3]=$fetch3['userid'];
$m3++;
}
}
}
}
$count3=count($arr3);


if($count3>0)
{
$arr4=array();
$m4=0;
for($l4=0;$l4<$count3;$l4++)
{
$sql4="SELECT * FROM ".$table." WHERE `placement`='".$arr3[$l4]."'";
$res4=query($conn,$sql4);
$num4=numrows($res4);
if($num4>0)
{
while($fetch4=fetcharray($res4))
{
$arr4[$m4]=$fetch4['userid'];
$m4++;
}
}
}
}
$count4=count($arr4);
}

if($level=='Level 1'){return $count;}
if($level=='Level 2'){return $count1;}
if($level=='Level 3'){return $count2;}
if($level=='Level 4'){return $count3;}
}


function getMatrixUpline($conn,$userid)
{
$sql="SELECT * FROM  `ee_genealogy` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['placement'];
}
}

function getMatrixPlacement($conn,$table)
{
$sql="SELECT * FROM ".$table." ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['userid'];
}
}

function getMatrixNextUserID($conn,$matrixid,$table)
{
$sql="SELECT * FROM ".$table." WHERE `placement`='".$matrixid."' ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['userid'];
}
}

function getGenealogyID($conn,$table,$userid,$field)
{
$sql="SELECT * FROM ".$table." WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getGenealogyNextUserID($conn,$table,$id,$field)
{
$sql="SELECT * FROM ".$table." WHERE `id`>'".$id."' ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function dateDiffInDays($conn,$date1,$date2)  
{ 
// Calulating the difference in timestamps 
$diff = strtotime($date2) - strtotime($date1); 

// 1 day = 24 hours 
// 24 * 60 * 60 = 86400 seconds 
return abs(round($diff / 86400)); 
} 


function getSponsorByPosition($conn,$userid,$position)
{
$sql="SELECT `id` FROM `ee_member` WHERE `sponsor`='".$userid."' AND `position`='".$position."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getPlacementByPosition($conn,$userid,$position)
{
$sql="SELECT `id` FROM `ee_member` WHERE `placement`='".$userid."' AND `position`='".$position."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getFirstDayWithMonth($conn,$mon,$year)
{
$currentMonth = $mon;
$currentYear = $year;
if($currentMonth == 1) {
   $lastMonth = 12;
   $lastYear = $currentYear - 1;
}
else {
   $lastMonth = $currentMonth -1;
   $lastYear = $currentYear;
}
if($lastMonth < 10) {
   $lastMonth = '0' . $lastMonth;
}
$lastDayOfMonth = date('d', $lastMonth);
$lastDateOfPreviousMonth = $lastYear . '-' . $lastMonth . '-' . $lastDayOfMonth;
return $lastDateOfPreviousMonth;
}

function getLastDayWithMonth($conn,$mon,$year)
{
$currentMonth = $mon;
$currentYear = $year;
if($currentMonth == 1) {
   $lastMonth = 12;
   $lastYear = $currentYear - 1;
}
else {
   $lastMonth = $currentMonth -1;
   $lastYear = $currentYear;
}
if($lastMonth < 10) {
   $lastMonth = '0' . $lastMonth;
}
$lastDayOfMonth = date('t', $lastMonth);
$lastDateOfPreviousMonth = $lastYear . '-' . $lastMonth . '-' . $lastDayOfMonth;
return $lastDateOfPreviousMonth;
}

function getTotalSponsor($conn,$userid)
{
$sql="SELECT `id` FROM `ee_member` WHERE `sponsor`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}


function getEpinID($conn,$id,$field)
{
$sql="SELECT * FROM `ee_epin` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}


function getSettingsRewardID($conn,$id,$field)
{
$sql="SELECT * FROM `ee_settings_reward` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getSettingsRewardLR($conn,$left,$right,$field)
{
$sql="SELECT * FROM `ee_settings_reward` WHERE `left`='".$left."' AND `right`='".$right."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

//----------------------------24/11/2019----------------------//
function getActiveSponsor($conn,$userid)
{
$sql="SELECT `id` FROM `ee_member` WHERE `sponsor`='".$userid."' AND `status`='A' AND `paystatus`='A' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getPendingTotalWithdrawal($conn,$column)
{
$sql="SELECT SUM(`".$column."`) AS total FROM `ee_withdrawal` WHERE`status`='P' ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getApprovedTotalWithdrawal($conn,$column)
{
$sql="SELECT SUM(`".$column."`) AS total FROM `ee_withdrawal` WHERE `status`='C' AND `paid`='P'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getPaidTotalWithdrawal($conn,$column)
{
$sql="SELECT SUM(`".$column."`) AS total FROM `ee_withdrawal` WHERE `status`='C' AND `paid`='C'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


//--------------------12/12/2019--------------------//

function getBlankPosition($conn,$table,$userid)
{
$sql="SELECT * FROM ".$table." WHERE `placement`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
$i=0;
$arr=array();
if($num>=2)
{
while($fetch=fetcharray($res))
{
$arr[$i]=$fetch['userid'];
$i++;
}

$count=count($arr);
if($count>=2)
{
$arr1=array();
$j=0;
for($k=0;$k<$count;$k++)
{
$sql1="SELECT * FROM ".$table." WHERE `placement`='".$arr[$k]."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>=2)
{
while($fetch1=fetcharray($res1))
{
$arr1[$j]=$fetch1['userid'];
$j++;
}
}else{
$return=$arr[$k];
break;
}
}
}

$count1=count($arr1);

if($count1>=4)
{
$arr2=array();
$m=0;
for($l=0;$l<$count1;$l++)
{
$sql2="SELECT * FROM ".$table." WHERE `placement`='".$arr1[$l]."'";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2>=2)
{
while($fetch2=fetcharray($res2))
{
$arr2[$m]=$fetch2['userid'];
$m++;
}
}else{
$return=$arr1[$l];
break;
}
}
}


$count2=count($arr2);

if($count2>=8)
{
$arr3=array();
$m3=0;
for($l3=0;$l3<$count2;$l3++)
{
$sql3="SELECT * FROM ".$table." WHERE `placement`='".$arr2[$l3]."'";
$res3=query($conn,$sql3);
$num3=numrows($res3);
if($num3>=2)
{
while($fetch3=fetcharray($res3))
{
$arr3[$m3]=$fetch3['userid'];
$m3++;
}
}else{
$return=$arr2[$l3];
break;
}
}
}

$count3=count($arr3);

if($count3>=16)
{
$arr4=array();
$m4=0;
for($l4=0;$l4<$count3;$l4++)
{
$sql4="SELECT * FROM ".$table." WHERE `placement`='".$arr3[$l4]."'";
$res4=query($conn,$sql4);
$num4=numrows($res4);
if($num4>=2)
{
while($fetch4=fetcharray($res4))
{
$arr4[$m4]=$fetch4['userid'];
$m4++;
}
}else{
$return=$arr3[$l4];
break;
}
}
}


$count4=count($arr4);

if($count4>=32)
{
$arr5=array();
$m5=0;
for($l5=0;$l5<$count4;$l5++)
{
$sql5="SELECT * FROM ".$table." WHERE `placement`='".$arr4[$l5]."'";
$res5=query($conn,$sql5);
$num5=numrows($res5);
if($num5>=2)
{
while($fetch5=fetcharray($res5))
{
$arr5[$m5]=$fetch5['userid'];
$m5++;
}
}else{
$return=$arr4[$l5];
break;
}
}
}


$count5=count($arr5);

if($count5>=64)
{
$arr6=array();
$m6=0;
for($l6=0;$l6<$count5;$l6++)
{
$sql6="SELECT * FROM ".$table." WHERE `placement`='".$arr5[$l6]."'";
$res6=query($conn,$sql6);
$num6=numrows($res6);
if($num6>=2)
{
while($fetch6=fetcharray($res6))
{
$arr6[$m6]=$fetch6['userid'];
$m6++;
}
}else{
$return=$arr5[$l6];
break;
}
}
}


}else{
$return=$userid;
}

return $return;
}

//--------------8-4-2020-------------//
function getPackage($conn,$id,$field)
{
$sql="SELECT * FROM `ee_settings_package` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getSettingsMatching($conn,$field)
{
$sql="SELECT * FROM `ee_settings_binary` ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getSettingsBinary($conn,$field)
{
$sql="SELECT * FROM `ee_settings_binary` ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getSettingsPackage($conn,$id,$field)
{
$sql="SELECT * FROM `ee_settings_package` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getLatestPackage($conn,$userid,$field)
{
$sql="SELECT * FROM `ee_member_package` WHERE `userid`='".$userid."' ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getLatestPackageUpgrade($conn,$userid,$field)
{
$sql="SELECT * FROM `ee_member_package` WHERE `userid`='".$userid."' AND `remarks`='Upgrade' ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getSettingsTransfer($conn,$field)
{
$sql="SELECT * FROM `ee_settings_transfer` ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getTotalPairToday($conn,$userid,$date)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_member_binary` WHERE `userid`='".$userid."' AND `date`='".$date."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getBinaryBonusDate($conn,$userid,$date)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_member_binary` WHERE `userid`='".$userid."' AND `date`='".$date."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getContact($conn,$field)
{
$sql="SELECT * FROM `ee_contact` ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getModulePermission($conn,$id,$field)
{
$sql="SELECT * FROM `ee_permission` WHERE `userid`='".$id."' AND `module`='".$field."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
} 

function getAdminName($conn,$id,$field)
{
$sql="SELECT * FROM `ee_admin` WHERE `id`='".$id."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getTotalRewardIncome($conn)
{
$sql="SELECT SUM(`reward`) AS total FROM `ee_commission_reward` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getRewardIncome($conn,$userid)
{
$sql="SELECT SUM(`reward`) AS total FROM `ee_commission_reward` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

//----------------------------08/08/2020-------------------//
function getTodayJoining($conn,$date)
{
$sql="SELECT `id` FROM `ee_member` WHERE `date`='".$date."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getTodayApproved($conn,$date)
{
$sql="SELECT `id` FROM `ee_member` WHERE `approved`='".$date."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getTodayEpinGenerate($conn,$date)
{
$total=0;
$sql="SELECT * FROM `ee_epin` WHERE `date`='".$date."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{
$total=$total+getSettingsPackage($conn,$fetch['package'],'amount');
}
}
return $total;
}

function getSettingsWithdrawalMaximum($conn)
{
$sql="SELECT MAX(`toamount`) AS maximum FROM `ee_settings_withdrawal`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['maximum'];
}
}

function getLastROIAccount($conn,$userid)
{
$sql="SELECT * FROM `ee_member_roi` WHERE `userid`='".$userid."' ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

$last=$fetch['account'];
}else{
$last=0;
}
return $last;
}

function getSettingsCoinpayment($conn,$field)
{
$sql="SELECT * FROM `ee_settings_coin_payment` ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getCoinPaymentByInvoice($conn,$invoice,$field)
{
$sql="SELECT * FROM `ee_member_coinpayment` WHERE `invoice`='".$invoice."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}
?>