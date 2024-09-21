<?php 
include('header.php'); 
$left=7;

$tds=getPendingTotalWithdrawal($conn,'tds');
$service=getPendingTotalWithdrawal($conn,'service');
$totalcharge=($tds+$service);
?>
<style>
table,
thead,
tr,
tbody,
th,
td {
text-align: center;
}
</style>
<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->

<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">
<div class="row">
<div>&nbsp;</div>
<div class="col-xs-12">
<div class="card">
<div class="card-header">

<h4 class="card-title">Pending Withdrawal Statement</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>
<div class="card-body collapse in">

<table width="98%">
<tr><td>
<div align="left" style="margin-left:10px;"><a href="withdrawal-pending-csv-download.php"><input type="button" value="Excel Download" class="btn" style="background:#009900;color:#FFFFFF;" /></a></div>
</td>
<td>
<div align="right" style="padding:10px;">
<form name="form3" action="pending-withdrawal.php?act=search" method="post">
<input type="text" name="search" id="search" value="<?=$_REQUEST['search']?>" class="form-control border-primary"style="width:180px;" placeholder="User ID" />
</form>
</div>
</td>
</tr>
</table>
<div>&nbsp;</div>

<table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr height="30" style="font-size:16px;color:#4378A3;">
<td width="23%" align="right" valign="middle"><strong style="font-size:14px;">Total Request Amount:</strong></td>
<td width="9%" align="left" valign="middle" style="font-size:14px;"><?=getPendingTotalWithdrawal($conn,'request')?></td>
<td width="24%" align="right" valign="middle"><strong style="font-size:14px;">Total Charge:</strong></td>
<td width="10%" align="left" valign="middle" style="font-size:14px;"><?=$totalcharge?><span></span></td>
<td width="22%" align="right" valign="middle"><strong style="font-size:14px;">Total Payout:</strong></td>
<td width="12%" align="left" valign="middle" style="font-size:14px;"><?=getPendingTotalWithdrawal($conn,'payout')?></td>
</tr>
</table>

<div class="table-responsive">
<table class="table table-bordered table-striped" align="center" >
<thead class="bg-teal bg-lighten-4" align="center"><tr>
<td width="5%" align="center">Sl_No</td>
<td width="6%" align="center">User_ID</td>
<td width="6%" align="center">Name</td>
<td width="7%" align="center">Request</td>
<td width="9%" align="center">TDS</td>
<td width="9%" align="center">Service</td>
<td width="6%" align="center">Payout</td>
<td width="6%" align="center">Type</td>
<td width="6%" align="center">Account/Wallet_Details</td>
<td width="9%" align="center">Status</td>
<td width="5%" align="center">Date</td>
<td width="6%" align="center">Action</td>
</tr>
</thead>
<tbody>
<?php
$tname='ee_withdrawal';
$lim=100;
$tpage='pending-withdrawal.php';
if($_REQUEST['act']=='search')
{
$where="WHERE `userid` LIKE '".trim(mysqli_real_escape_string($conn,$_POST['search']))."' AND `status`='P' ORDER BY `id` DESC";
}else{
$where="WHERE `status`='P' ORDER BY `id` DESC";
}
include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr height="30">
<td align="center" class="tborder" style="padding:5px;"><?=$i?></td>
<td align="center" class="tborder" style="padding:5px;"><?=$fetch['userid']?></td>
<td align="center" class="tborder" style="padding:5px;"><?=ucwords(getMemberUserid($conn,$fetch['userid'],'name'))?></td>
<td align="center" class="tborder" style="padding:5px;"><?=$fetch['request']?></td>
<td align="center" class="tborder" style="padding:5px;"><?=$fetch['tds']?></td>
<td align="center" class="tborder" style="padding:5px;"><?=$fetch['service']?></td>
<td align="center" class="tborder" style="padding:5px;"><?=$fetch['payout']?></td>
<td align="center" class="tborder" style="padding:5px;"><?=$fetch['type']?></td>
<td align="center" class="tborder" style="padding:5px;">
<?php if($fetch['type']=='Bank'){?><?=$fetch['bname']?><br /><?=$fetch['branch']?><br /><?=$fetch['accname']?><br /><?=$fetch['accno']?><br /><?=$fetch['ifscode']?><?php }?>
<?php if($fetch['type']=='Payeer'){?><?=$fetch['payeer']?><?php }?>
<?php if($fetch['type']=='Paypal'){?><?=$fetch['paypal']?><?php }?>
<?php if($fetch['type']=='PerfectMoney'){?><?=$fetch['perfectmoney']?><?php }?>
<?php if($fetch['type']=='Paytm'){?><?=$fetch['paytm']?><?php }?>
<?php if($fetch['type']=='UPI'){?><?=$fetch['upi']?><?php }?>
<?php if($fetch['type']=='Bitcoin'){?><?=$fetch['bitcoin']?><?php }?>
<?php if($fetch['type']=='Bitcoincash'){?><?=$fetch['bitcoincash']?><?php }?>
<?php if($fetch['type']=='Ethereum'){?><?=$fetch['ethereum']?><?php }?>
<?php if($fetch['type']=='Dash'){?><?=$fetch['dash']?><?php }?>
<?php if($fetch['type']=='Dogecoin'){?><?=$fetch['dogecoin']?><?php }?>
<?php if($fetch['type']=='Litecoin'){?><?=$fetch['litecoin']?><?php }?>
<?php if($fetch['type']=='Monero'){?><?=$fetch['monero']?><?php }?>
<?php if($fetch['type']=='Ripple'){?><?=$fetch['ripple']?><?php }?>
<?php if($fetch['type']=='Troncoin'){?><?=$fetch['troncoin']?><?php }?>
<?php if($fetch['type']=='Zcash'){?><?=$fetch['zcash']?><?php }?>
</td>

<td align="center" class="tborder" style="padding:5px;"><?php if($fetch['status']=='P'){?><a href="withdrawal-process.php?case=status&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>" onClick="return confirm('Are you sure want to active this status?');" style="text-decoration:none;"><span style="color:#FF0000;">Pending</span></a><?php } ?></td>
<td align="center" class="tborder" style="padding:5px;"><?=$fetch['date']?></td>
<td ><a href="withdrawal-process.php?case=delete&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to delete?');"><img src="images/delete.png" title="Delete" /></a></td>
</tr>
<?php $i++;}}else{?>
<tr height="15"><td align="center" colspan="12" style="color:#FF0000;"><div class="norecord">No Record Found!</div></td></tr>
<?php }?>
</tbody>
</table>
</div>
<div align="center"><?=$pagination?></div>
</div>
</div>
</div>
</div>


</div>
</div>
</div>


<?php include('footer.php') ?>

<!-- BEGIN VENDOR JS-->
<script src="app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
<script src="app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
</body>
</html>
