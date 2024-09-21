<?php
//----------------------------Calculate Matching Bonus-----------------------//
$sqlpc="SELECT * FROM `ee_member_sales_count` WHERE `left`>0 AND `right`>0";
$respc=query($conn,$sqlpc);
$numpc=numrows($respc);
if($numpc>0)
{
while($fetchpc=fetcharray($respc))
{
$leftc=$fetchpc['left'];
$rightc=$fetchpc['right'];
$userc=$fetchpc['userid'];

if($leftc>0 && $rightc>0)
{
$leftmem=getDownlineCount($conn,$userc,'left');
$rightmem=getDownlineCount($conn,$userc,'right');

if(($leftmem>1 && $rightmem>0) || ($leftmem>0 && $rightmem>1))
{
if($leftmem!=$rightmem)
{
//---------------------------//
$minimum=min($leftc,$rightc);

$binarytot=getSettingsMatching($conn,'binarytot');
$bonus=($minimum*$binarytot)/100;

$package=getMemberUserid($conn,$userc,'package');
$capping=getSettingsPackage($conn,$package,'capping');

$ptoday=getTotalPairToday($conn,$userc,date('Y-m-d'));


if($ptoday<$capping)
{
$remain=$capping-$ptoday;
if($bonus<=$remain)
{
$paybonus=$bonus;
}else{
if($bonus>$remain)
{
$paybonus=$remain;
}else{
$paybonus=$bonus;
}
}
}else{
$paybonus=0;
}

if($paybonus>0)
{
$sqlcm="INSERT INTO `ee_member_binary`(`userid`,`leftsales`,`rightsales`,`minimum`,`percentage`,`bonus`,`date`) VALUES ('".$userc."','".$leftc."','".$rightc."','".$minimum."','".$binarytot."','".$paybonus."','".date('Y-m-d')."')";
$rescm=query($conn,$sqlcm);
$bid=mysqli_insert_id($conn);

//----------------------------------------------------------//
$date=date("Y-m-d");

$binaryper=getSettingsMatching($conn,'binaryper');
$bnodays=getSettingsMatching($conn,'bnodays');

if($binaryper>0)
{
if($bnodays>0)
{
$bonusmat=($paybonus/$bnodays);

for($i=0;$i<$bnodays;$i++)
{
$stdate1=date('Y-m-d',strtotime('+'.$i.' days',strtotime($date)));

$sql5="INSERT INTO `ee_commission_binary` (`userid`,`binaryid`,`total`,`nodays`,`bonus`,`status`,`date`) VALUES ('".$userc."','".$bid."','".$paybonus."','".$bnodays."','".$bonusmat."','H','".$stdate1."')";
$res5=query($conn,$sql5);
}
}
}
//----------------------------------------------------//
$remleft=$leftc-$minimum;
$remright=$rightc-$minimum;

$sqls9="UPDATE `ee_member_sales_count` SET `right`='".$remright."',`left`='".$remleft."' WHERE `userid`='".$userc."'";
$ress9=query($conn,$sqls9);
}
//------------------------------------------//
}
}

}
}
}
/*------------------------Matching--------------------------------------*/


//----------------------------Calculate Reward Bonus-----------------------//
$sqlps="SELECT * FROM `ee_member_sales` WHERE `left`>0 AND `right`>0";
$resps=query($conn,$sqlps);
$numps=numrows($resps);
if($numps>0)
{
while($fetchps=fetcharray($resps))
{
$sqlc="SELECT * FROM `ee_settings_reward` WHERE `left`<='".$fetchps['left']."' AND `right`<='".$fetchps['right']."'";
$resc=query($conn,$sqlc);
$numc=numrows($resc);
if($numc>0)
{
while($fetchc=fetcharray($resc))
{
$sqlch="SELECT * FROM `ee_member_reward` WHERE `userid`='".$fetchps['userid']."' AND `left`='".$fetchc['left']."' AND `right`='".$fetchc['right']."'";
$resch=query($conn,$sqlch);
$numch=numrows($resch);
if($numch<1)
{
$sqlcr="INSERT INTO `ee_member_reward`(`userid`,`left`,`right`,`reward`,`date`) VALUES ('".$fetchps['userid']."','".$fetchc['left']."','".$fetchc['right']."','".$fetchc['reward']."','".date('Y-m-d')."')";
$rescr=query($conn,$sqlcr);

$sqlc1="INSERT INTO `ee_commission_reward`(`userid`,`left`,`right`,`reward`,`date`) VALUES ('".$fetchps['userid']."','".$fetchc['left']."','".$fetchc['right']."','".$fetchc['reward']."','".date('Y-m-d')."')";
$resc1=query($conn,$sqlc1);
}
}
} 
}
}
?>