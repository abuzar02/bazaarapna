<?php include('header.php');
$left=12;
?>  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- main menu-->
<?php include('leftpanel.php'); ?>

<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">

<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Payment Request</h4>
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
<div align="right" style="padding:5px;"><form name="frm1" method="post" action="payment-request.php?act=search"><input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" required placeholder="User ID" style="width:150px;" />
</form></div>
<div class="table-responsive" style="overflow:auto;">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<td width="10%" align="center"><strong>Sl_No</strong></td>
<td width="10%" align="center"><strong>User_ID</strong></td>
<td width="10%" align="center"><strong>Name</strong></td>

<td width="15%" align="center"><strong>Invoice</strong></td>
<td width="10%" align="center"><strong>Type</strong></td>
<td width="15%" align="center"><strong>Amount</strong></td>
<td width="10%" align="center"><strong>Txn_ID</strong></td>

<td width="10%" align="center"><strong>Coin_Amount</strong></td>
<td width="10%" align="center"><strong>Pay_To_Wallet</strong></td>

<td width="10%" align="center"><strong>Status</strong></td>
<td width="10%" align="center"><strong>Date</strong></td>
</tr>
</thead>
<tbody>
<?php
$tname='ee_member_coinpayment';
$lim=100;
$tpage='payment-request.php';

if($_REQUEST['act']=='search')
{
$where="WHERE `userid` LIKE '".trim(mysqli_real_escape_string($conn,$_POST['search']))."' ORDER BY `id` DESC";
}else{
$where="ORDER BY `id` DESC";
}
include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr>
<td align="center" style="padding:5px;"><?=$i?></td>
<td align="center" style="padding:5px;"><?=$fetch['userid']?></td>
<td align="center" style="padding:5px;"><?=getMemberUserid($conn,$fetch['userid'],'name')?></td>

<td align="center" style="padding:5px;"><?=$fetch['invoice']?></td>
<td align="center" style="padding:5px;"><?=$fetch['type']?></td>
<td align="center" style="padding:5px;"><?=$fetch['amount']?></td>
<td align="center" style="padding:5px;"><?=$fetch['txn_id']?></td>

<td align="center" style="padding:5px;"><?=$fetch['coinamt']?></td>
<td align="center" style="padding:5px;"><?=$fetch['paywallet']?></td>

<td align="center" style="padding:5px;"><?php if($fetch['status']=='C'){?><a style="color:#006600;">Paid</a><?php }else{?><a style="color:#FF0000;">Pending</a><?php }?></td>
<td align="center" style="padding:5px;"><?=$fetch['date']?></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="11" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>
</tbody>
</table>
<div align="center"><?=$pagination?></div>

</div>
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
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
</body>
</html>