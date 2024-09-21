<?php include('header.php'); 
$left=3;
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
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Bank Statement</h4>
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
<div align="right" style="padding:5px;">
<form action="bank-details.php?act=search" method="post">
<input type="text" name="search" id="search" value="<? $_POST['search']?>" class="form-control border-primary" placeholder="User ID, Name, Bank Name"; style="width:240px;" />
</form>
</form></div>


<div class="table-responsive" style="overflow:auto;">
<table class="table table-bordered table-striped" align="center" width="100%">
<thead class="bg-teal bg-lighten-4" align="center">
<tr align="center">
<th width="6%">Sl_No.</th>							
<th width="8%">User_ID</th>				
<th width="12%">Name</th>						
<th width="8%">Bank_Name</th>						
<th width="9%">Branch_Name</th>
<th width="9%">Account_Name</th>
<th width="8%">Account_No</th>
<th width="8%">IFS_Code</th>
<th width="8%">Payeer</th>
<th width="8%">PayPal</th>
<th width="8%">Perfect_Money</th>
<th width="8%">PayTM</th>
<th width="8%">UPI</th>

</tr>
</thead>
<tbody>

<?php
$tname='ee_member';
$lim=100;
$tpage='bank-details.php';

if($_REQUEST['act']=='search')
{
$where="WHERE `userid` LIKE '".trim(mysqli_real_escape_string($conn,$_POST['search']))."' OR `bname` LIKE '".trim(mysqli_real_escape_string($conn,$_POST['search']))."' OR `name` LIKE '".trim(mysqli_real_escape_string($conn,$_POST['search']))."' ORDER BY `id` DESC";
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
<tr align="center">
<td style="text-align:center;padding:2px;"><?=$i?></td>
<td style="text-align:center;padding:2px;"><?=$fetch['userid']?></td>
<td style="text-align:center;padding:2px;"><?=ucwords(strtolower($fetch['name']))?></td>
<td style="text-align:center;padding:2px;"><?=ucwords($fetch['bname'])?></td>
<td style="text-align:center;padding:2px;"><?=ucwords($fetch['branch'])?></td>
<td style="text-align:center;padding:2px;"><?=ucwords($fetch['accname'])?></td>
<td style="text-align:center;padding:2px;"><?=$fetch['accno']?></td>
<td style="text-align:center;padding:2px;"><?=$fetch['ifscode']?></td>
<td style="text-align:center;padding:2px;"><?=$fetch['payeer']?></td>
<td style="text-align:center;padding:2px;"><?=$fetch['paypal']?></td>
<td style="text-align:center;padding:2px;"><?=$fetch['perfectmoney']?></td>
<td style="text-align:center;padding:2px;"><?=$fetch['paytm']?></td>
<td style="text-align:center;padding:2px;"><?=$fetch['upi']?></td>
 
</tr>              
<?php $i++;}}else{?>
<tr><td colspan="13" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
</body>
</html>
