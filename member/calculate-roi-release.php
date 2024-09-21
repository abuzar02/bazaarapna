<?php
$userid=getMember($conn,$_SESSION['mid'],'userid');

//--------------------ROI------------------------//
$sqlr="SELECT * FROM `ee_commission_roi` WHERE `userid`='".$userid."' AND `status`='H' AND `date`<='".date('Y-m-d')."'";
$resr=query($conn,$sqlr);
$numr=numrows($resr);
if($numr>0)
{
while($fetchr=fetcharray($resr))
{
$sqlr2="UPDATE `ee_commission_roi` SET `status`='R' WHERE `userid`='".$userid."' AND `id`='".$fetchr['id']."'";
$resr2=query($conn,$sqlr2);
}
}

//--------------------Direct Bonus------------------------//
$sqlr="SELECT * FROM `ee_commission_direct` WHERE `userid`='".$userid."' AND `status`='H' AND `date`<='".date('Y-m-d')."'";
$resr=query($conn,$sqlr);
$numr=numrows($resr);
if($numr>0)
{
while($fetchr=fetcharray($resr))
{
$sqlr2="UPDATE `ee_commission_direct` SET `status`='R' WHERE `userid`='".$userid."' AND `id`='".$fetchr['id']."'";
$resr2=query($conn,$sqlr2);
}
}

//--------------------Matching Bonus------------------------//
$sqlr="SELECT * FROM `ee_commission_binary` WHERE `userid`='".$userid."' AND `status`='H' AND `date`<='".date('Y-m-d')."'";
$resr=query($conn,$sqlr);
$numr=numrows($resr);
if($numr>0)
{
while($fetchr=fetcharray($resr))
{
$sqlr2="UPDATE `ee_commission_binary` SET `status`='R' WHERE `userid`='".$userid."' AND `id`='".$fetchr['id']."'";
$resr2=query($conn,$sqlr2);
}
}

?>