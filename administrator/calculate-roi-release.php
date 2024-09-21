<?php
//--------------------ROI------------------------//
$sqlr="SELECT * FROM `ee_commission_roi` WHERE `status`='H' AND `date`<='".date('Y-m-d')."'";
$resr=query($conn,$sqlr);
$numr=numrows($resr);
if($numr>0)
{
while($fetchr=fetcharray($resr))
{
$sqlr2="UPDATE `ee_commission_roi` SET `status`='R' WHERE `id`='".$fetchr['id']."'";
$resr2=query($conn,$sqlr2);
}
}

//--------------------Direct Bonus------------------------//
$sqlr="SELECT * FROM `ee_commission_direct` WHERE `status`='H' AND `date`<='".date('Y-m-d')."'";
$resr=query($conn,$sqlr);
$numr=numrows($resr);
if($numr>0)
{
while($fetchr=fetcharray($resr))
{
$sqlr2="UPDATE `ee_commission_direct` SET `status`='R' WHERE `id`='".$fetchr['id']."'";
$resr2=query($conn,$sqlr2);
}
}

//--------------------Matching Bonus------------------------//
$sqlr="SELECT * FROM `ee_commission_binary` WHERE `status`='H' AND `date`<='".date('Y-m-d')."'";
$resr=query($conn,$sqlr);
$numr=numrows($resr);
if($numr>0)
{
while($fetchr=fetcharray($resr))
{
$sqlr2="UPDATE `ee_commission_binary` SET `status`='R' WHERE `id`='".$fetchr['id']."'";
$resr2=query($conn,$sqlr2);
}
}

?>