<?php
include('includes/function.php');

$rand=rand(11111,99999);

$arr=array();
$arr[0][0]="Sl_No";
$arr[0][1]="User_ID";
$arr[0][2]="Sponsor";
$arr[0][3]="Placement";
$arr[0][4]="Position";
$arr[0][5]="Package";
$arr[0][6]="Name";
$arr[0][7]="Email";
$arr[0][8]="Phone";
$arr[0][9]="Address";
$arr[0][10]="Bank";
$arr[0][11]="Branch";
$arr[0][12]="Account_Name";
$arr[0][13]="Account_No.";
$arr[0][14]="IFSC_Code";
$arr[0][15]="Aadhar";
$arr[0][16]="Pancard";
$arr[0][17]="Payeer";
$arr[0][18]="Paypal";
$arr[0][19]="Perfect_Money";
$arr[0][20]="PayTM";
$arr[0][21]="UPI";

$arr[0][22]="Status";
$arr[0][23]="Pay_Status";
$arr[0][24]="Epin";
$arr[0][25]="Date";
$arr[0][26]="Approved";

$sqlm="SELECT * FROM `ee_member` ORDER BY `id`";
$resm=query($conn,$sqlm);
$numm=numrows($resm);
if($numm>0)
{
$i=1;
while($fetchm=fetcharray($resm))
{
if($fetchm['status']=='A'){$status='Approved';}else{$status='I';}
if($fetchm['paystatus']=='A'){$paystatus='Paid';}else{$paystatus='Pending';}
$arr[$i][0]=$i;
$arr[$i][1]=$fetchm['userid'];
$arr[$i][2]=$fetchm['sponsor'];
$arr[$i][3]=$fetchm['placement'];
$arr[$i][4]=$fetchm['position'];
$arr[$i][5]=getSettingsPackage($conn,$fetchm['package'],'package');
$arr[$i][6]=ucwords($fetchm['name']);
$arr[$i][7]=$fetchm['email'];
$arr[$i][8]=$fetchm['phone'];
$arr[$i][9]=$fetchm['address'];
$arr[$i][10]=ucwords($fetchm['bname']);
$arr[$i][11]=ucwords($fetchm['branch']);
$arr[$i][12]=ucwords($fetchm['accname']);
$arr[$i][13]=$fetchm['accno'];
$arr[$i][14]=$fetchm['ifscode'];
$arr[$i][15]=$fetchm['aadhar'];
$arr[$i][16]=$fetchm['pancard'];
$arr[$i][17]=$fetchm['payeer'];
$arr[$i][18]=$fetchm['paypal'];
$arr[$i][19]=$fetchm['perfectmoney'];
$arr[$i][20]=$fetchm['paytm'];
$arr[$i][21]=$fetchm['upi'];
$arr[$i][22]=$status;
$arr[$i][23]=$paystatus;
$arr[$i][24]=$fetchm['epin'];
$arr[$i][25]=$fetchm['date'];
$arr[$i][26]=$fetchm['active'];
$i++;
}}

$name='Member-Statement-'.$rand;

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('download2.php?f='.$name.'.csv');
