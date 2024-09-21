<?php if($_SESSION['sid']>1){ ?>
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
<div class="main-menu-content">
<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
<li class=" nav-item"><a href="#"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Home</span></a>
<ul class="menu-content">
<li class="<?php if($left=='1'){?> active<?php }?>"><a href="dashboard.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-home"></i>Dashboard</a>
</li>
<li class="<?php if($left=='1'){?> active<?php }?>"><a href="change-password.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-ios-locked"></i>Change Password</a>
</li>
<li class="<?php if($left=='1'){?> active<?php }?>"><a href="logout.php?case=delete&id=<?=$fetch['id']?>" onclick="return confirm('Are you want to sure to logout now?');" data-i18n="nav.dash.main" class="menu-item"><i class="icon-power3"></i>Logout</a>
</li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-gear"></i><span data-i18n="nav.dash.main" class="menu-title">Settings</span></a>
<ul class="menu-content">
<?php if(getModulePermission($conn,$_SESSION['sid'],'Package')>0) {?>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-package.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Package</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'Binary')>0) {?>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-binary.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Binary</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'Reward')>0) {?>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-reward.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Reward</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'Epin')>0) {?>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-epin.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Epin</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'Withdrawal')>0) {?>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-withdrawal.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Withdrawal</a></li>
<?php }?>
</ul>
</li>
<li class=" nav-item"><a href="#"><i class="icon-group"></i><span data-i18n="nav.dash.main" class="menu-title">Member</span></a>
<ul class="menu-content">
<?php if(getTotalMember($conn)<1){ ?>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="member.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>First Member</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'View Member')>0) {?>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="member.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Member</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'Bank Details')>0) {?>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="bank-details.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Bank Details</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'Income Statement')>0) {?>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="income-statement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Income Statement</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'Sales Statement')>0) {?>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="sales-statement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Sales Statement</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'Member ROI')>0) {?>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="member-roi.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Member BDA</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'Epin Purchase')>0) {?>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="member-epin.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Epin Purchase</a></li>
<?php }?>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-dollar"></i><span data-i18n="nav.dash.main" class="menu-title">Commission</span></a>
<ul class="menu-content">
<?php if(getModulePermission($conn,$_SESSION['sid'],'Direct Income')>0) {?>
<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-direct.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Direct Income</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'Binary Bonus')>0) {?>
<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-binary.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Binary Bonus</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'ROI Bonus')>0) {?>
<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-roi.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>BDA Bonus</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'Reward Bonus')>0) {?>
<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-reward.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Reward & Award</a></li>
<?php }?>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-envelope"></i><span data-i18n="nav.dash.main" class="menu-title">E-Pin</span></a>
<ul class="menu-content">
<?php if(getModulePermission($conn,$_SESSION['sid'],'E-pin User')>0) {?>
<li class="<?php if($left=='5'){?> active<?php }?>"><a href="epin.php?case=member" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>E-pin User</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'E-pin Admin')>0) {?>
<li class="<?php if($left=='5'){?> active<?php }?>"><a href="epin.php?case=admin" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>E-pin Admin</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'View E-pin')>0) {?>
<li class="<?php if($left=='5'){?> active<?php }?>"><a href="epin.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View E-pin</a></li>
<?php }?>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-dollar"></i><span data-i18n="nav.dash.main" class="menu-title">Deposit</span></a>
<ul class="menu-content">
<?php if(getModulePermission($conn,$_SESSION['sid'],'New Deposit')>0) {?>
<li class="<?php if($left=='6'){?> active<?php }?>"><a href="deposit.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Deposit</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'View Deposit')>0) {?>
<li class="<?php if($left=='6'){?> active<?php }?>"><a href="deposit.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Deposit</a></li>
<?php }?>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-dollar"></i><span data-i18n="nav.dash.main" class="menu-title">Deduct</span></a>
<ul class="menu-content">
<?php if(getModulePermission($conn,$_SESSION['sid'],'New Deduct')>0) {?>
<li class="<?php if($left=='10'){?> active<?php }?>"><a href="deduct.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Deduct</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'View Deduct')>0) {?>
<li class="<?php if($left=='10'){?> active<?php }?>"><a href="deduct.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Deduct</a></li>
<?php }?>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-dollar"></i><span data-i18n="nav.dash.main" class="menu-title">Payment Request</span></a>
<ul class="menu-content">
<?php if(getModulePermission($conn,$_SESSION['sid'],'Payment Statement')>0) {?>
<li class="<?php if($left=='12'){?> active<?php }?>"><a href="payment-request.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Statement</a></li>
<?php }?>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-envelope"></i><span data-i18n="nav.dash.main" class="menu-title">Withdrawal</span></a>
<ul class="menu-content">
<?php if(getModulePermission($conn,$_SESSION['sid'],'Pending Withdrawal')>0) {?>
<li class="<?php if($left=='7'){?> active<?php }?>"><a href="pending-withdrawal.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Pending Withdrawal</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'Approved Withdrawal')>0) {?>
<li class="<?php if($left=='7'){?> active<?php }?>"><a href="approved-withdrawal.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Approved Withdrawal</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'Paid Withdrawal')>0) {?>
<li class="<?php if($left=='7'){?> active<?php }?>"><a href="paid-withdrawal.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Paid Withdrawal</a></li>
<?php }?>
</ul>
</li>

<li class="nav-item"><a href="#"><i class="icon-group"></i><span data-i18n="nav.dash.main" class="menu-title">Genealogy</span></a>
<ul class="menu-content">
<?php if(getModulePermission($conn,$_SESSION['sid'],'Grid View')>0) {?>
<li class="<?php if($left=='8'){?> active<?php }?>"><a href="grid-view.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Grid View</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'Tree View')>0) {?>
<li class="<?php if($left=='8'){?> active<?php }?>"><a href="tree-view.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Tree View</a></li>
<?php }?>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-money"></i><span data-i18n="nav.dash.main" class="menu-title">Announcement</span></a>
<ul class="menu-content">
<?php if(getModulePermission($conn,$_SESSION['sid'],'New Message')>0) {?>
<li class="<?php if($left=='16'){?> active<?php }?>"><a href="announcement.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Message</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'View Message')>0) {?>
<li class="<?php if($left=='16'){?> active<?php }?>"><a href="announcement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Message</a></li>
<?php }?>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-envelope"></i><span data-i18n="nav.dash.main" class="menu-title">Others</span></a>
<ul class="menu-content">
<?php /*?><?php if(getModulePermission($conn,$_SESSION['sid'],'New Banner')>0) {?>
<li class="<?php if($left=='9'){?> active<?php }?>"><a href="banner.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Banner</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'View Banner')>0) {?>
<li class="<?php if($left=='9'){?> active<?php }?>"><a href="banner.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Banner</a></li>
<?php }?><?php */?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'New Contact')>0) {?>
<li class="<?php if($left=='9'){?> active<?php }?>"><a href="contact.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Contact</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'View Contact')>0) {?>
<li class="<?php if($left=='9'){?> active<?php }?>"><a href="contact.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Contact</a></li>
<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'View Feedback')>0) {?>
<li class="<?php if($left=='9'){?> active<?php }?>"><a href="feedback.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Feedback</a></li>
<?php }?>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-envelope"></i><span data-i18n="nav.dash.main" class="menu-title">Support</span></a>
<ul class="menu-content">
<?php if(getModulePermission($conn,$_SESSION['sid'],'View Support')>0) {?>
<li class="<?php if($left=='11'){?> active<?php }?>"><a href="support.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Support</a></li>
<?php }?>
</ul>
</li>

<li class=" nav-item"><a href="logout.php" onclick="return confirm('Are you sure want to logout now?');"><i class="icon-power"></i><span data-i18n="nav.dash.main" class="menu-title">Logout</span></a></li>
</ul>
</div>
</div>
<?php } else {?>
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
<div class="main-menu-content">
<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
<li class=" nav-item"><a href="#"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Home</span></a>
<ul class="menu-content">
<li class="<?php if($left=='1'){?> active<?php }?>"><a href="dashboard.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-home"></i>Dashboard</a>
</li>
<li class="<?php if($left=='1'){?> active<?php }?>"><a href="change-password.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-ios-locked"></i>Change Password</a>
</li>
<li class="<?php if($left=='1'){?> active<?php }?>"><a href="logout.php?case=delete&id=<?=$fetch['id']?>" onclick="return confirm('Are you want to sure to logout now?');" data-i18n="nav.dash.main" class="menu-item"><i class="icon-power3"></i>Logout</a>
</li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-gear"></i><span data-i18n="nav.dash.main" class="menu-title">Settings</span></a>
<ul class="menu-content">
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-package.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Package</a></li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-binary.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Binary</a></li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-reward.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Reward</a></li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-epin.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Epin</a></li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-withdrawal.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Withdrawal</a></li>
</ul>
</li>
<li class=" nav-item"><a href="#"><i class="icon-group"></i><span data-i18n="nav.dash.main" class="menu-title">Member</span></a>
<ul class="menu-content">
<?php if(getTotalMember($conn)<1){ ?>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="member.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>First Member</a></li>
<?php }?>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="member.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Member</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="bank-details.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Bank Details</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="income-statement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Income Statement</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="sales-statement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Sales Statement</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="member-roi.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Member ROI</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="member-package.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Member Package</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="member-upgrade.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Upgrade Statement</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="member-epin.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Epin Purchase</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-dollar"></i><span data-i18n="nav.dash.main" class="menu-title">Commission</span></a>
<ul class="menu-content">
<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-direct.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Direct Income</a></li>
<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-binary.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Binary Bonus</a></li>
<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-roi.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>BDA Bonus</a></li>
<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-reward.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Reward Bonus</a></li>

</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-envelope"></i><span data-i18n="nav.dash.main" class="menu-title">E-Pin</span></a>
<ul class="menu-content">
<li class="<?php if($left=='5'){?> active<?php }?>"><a href="epin.php?case=member" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>E-pin User</a></li>
<li class="<?php if($left=='5'){?> active<?php }?>"><a href="epin.php?case=admin" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>E-pin Admin</a></li>
<li class="<?php if($left=='5'){?> active<?php }?>"><a href="epin.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View E-pin</a></li>

</ul>
</li>
<li class=" nav-item"><a href="#"><i class="icon-dollar"></i><span data-i18n="nav.dash.main" class="menu-title">Deposit</span></a>
<ul class="menu-content">
<li class="<?php if($left=='6'){?> active<?php }?>"><a href="deposit.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Deposit</a></li>
<li class="<?php if($left=='6'){?> active<?php }?>"><a href="deposit.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Deposit</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-dollar"></i><span data-i18n="nav.dash.main" class="menu-title">Deduct</span></a>
<ul class="menu-content">
<li class="<?php if($left=='10'){?> active<?php }?>"><a href="deduct.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Deduct</a></li>
<li class="<?php if($left=='10'){?> active<?php }?>"><a href="deduct.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Deduct</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-dollar"></i><span data-i18n="nav.dash.main" class="menu-title">Payment Request</span></a>
<ul class="menu-content">
<li class="<?php if($left=='12'){?> active<?php }?>"><a href="payment-request.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Statement</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-envelope"></i><span data-i18n="nav.dash.main" class="menu-title">Withdrawal</span></a>
<ul class="menu-content">
<li class="<?php if($left=='7'){?> active<?php }?>"><a href="pending-withdrawal.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Pending Withdrawal</a></li>
<li class="<?php if($left=='7'){?> active<?php }?>"><a href="approved-withdrawal.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Approved Withdrawal</a></li>
<li class="<?php if($left=='7'){?> active<?php }?>"><a href="paid-withdrawal.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Paid Withdrawal</a></li>
</ul>
</li>

<li class="nav-item"><a href="#"><i class="icon-group"></i><span data-i18n="nav.dash.main" class="menu-title">Genealogy</span></a>
<ul class="menu-content">
<li class="<?php if($left=='8'){?> active<?php }?>"><a href="grid-view.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Grid View</a></li>
<li class="<?php if($left=='8'){?> active<?php }?>"><a href="tree-view.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Tree View</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-money"></i><span data-i18n="nav.dash.main" class="menu-title">Announcement</span></a>
<ul class="menu-content">
<li class="<?php if($left=='16'){?> active<?php }?>"><a href="announcement.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Message</a></li>
<li class="<?php if($left=='16'){?> active<?php }?>"><a href="announcement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Message</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-money"></i><span data-i18n="nav.dash.main" class="menu-title">Sub Admin</span></a>
<ul class="menu-content">
<li class="<?php if($left=='71'){?> active<?php }?>"><a href="subadmin.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Sub Admin</a></li>
<li class="<?php if($left=='71'){?> active<?php }?>"><a href="subadmin.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Sub Admin</a></li>
<li class="<?php if($left=='71'){?> active<?php }?>"><a href="permission.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Permission</a></li>
<li class="<?php if($left=='71'){?> active<?php }?>"><a href="permission.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Permission</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-envelope"></i><span data-i18n="nav.dash.main" class="menu-title">Others</span></a>
<ul class="menu-content">
<?php /*?><li class="<?php if($left=='9'){?> active<?php }?>"><a href="banner.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Banner</a></li>
<li class="<?php if($left=='9'){?> active<?php }?>"><a href="banner.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Banner</a></li><?php */?>
<li class="<?php if($left=='9'){?> active<?php }?>"><a href="contact.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Contact</a></li>
<li class="<?php if($left=='9'){?> active<?php }?>"><a href="contact.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Contact</a></li>
<li class="<?php if($left=='9'){?> active<?php }?>"><a href="feedback.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Feedback</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-envelope"></i><span data-i18n="nav.dash.main" class="menu-title">Support</span></a>
<ul class="menu-content">
<li class="<?php if($left=='11'){?> active<?php }?>"><a href="support.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Support</a></li>
</ul>
</li>

<li class=" nav-item"><a href="logout.php" onclick="return confirm('Are you sure want to logout now?');"><i class="icon-power"></i><span data-i18n="nav.dash.main" class="menu-title">Logout</span></a></li>
</ul>
</div>
</div>
<?php }?>