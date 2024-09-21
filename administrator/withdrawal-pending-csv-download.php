<?php
include('includes/function.php');

$rand=rand(11111,99999);

$arr=array();
$arr[0][0]="Sl_No";
$arr[0][1]="User_ID";
$arr[0][2]="Name";
$arr[0][3]="Request";
$arr[0][4]="TDS";
$arr[0][5]="Service";
$arr[0][6]="Payout";
$arr[0][7]="Type";
$arr[0][8]="Account_Wallet";
$arr[0][9]="Status";
$arr[0][10]="Date";

$sqlm="SELECT * FROM `ee_withdrawal` WHERE `status`='P' ORDER BY `id` DESC";
$resm=query($conn,$sqlm);
$numm=numrows($resm);
if($numm>0)
{
$i=1;
while($fetchm=fetcharray($resm))
{

if($fetchm['type']=='Bank'){$wallet=$fetchm['bname'].'-'.$fetchm['branch'].'-'.$fetchm['accname'].'-'.$fetchm['accno'].'-'.$fetchm['ifscode'];}
if($fetchm['type']=='Payeer'){$wallet=$fetchm['payeer'];}
if($fetchm['type']=='Paypal'){$wallet=$fetchm['paypal'];}
if($fetchm['type']=='PerfectMoney'){$wallet=$fetchm['perfectmoney'];}
if($fetchm['type']=='Paytm'){$wallet=$fetchm['paytm'];}
if($fetchm['type']=='UPI'){$wallet=$fetchm['upi'];}
if($fetchm['type']=='Bitcoin'){$wallet=$fetchm['bitcoin'];}
if($fetchm['type']=='Bitcoincash'){$wallet=$fetchm['bitcoincash'];}
if($fetchm['type']=='Ethereum'){$wallet=$fetchm['ethereum'];}
if($fetchm['type']=='Dash'){$wallet=$fetchm['dash'];}
if($fetchm['type']=='Dogecoin'){$wallet=$fetchm['dogecoin'];}
if($fetchm['type']=='Litecoin'){$wallet=$fetchm['litecoin'];}
if($fetchm['type']=='Monero'){$wallet=$fetchm['monero'];}
if($fetchm['type']=='Ripple'){$wallet=$fetchm['ripple'];}
if($fetchm['type']=='Troncoin'){$wallet=$fetchm['troncoin'];}
if($fetchm['type']=='Zcash'){$wallet=$fetchm['zcash'];}


if($fetchm['status']=='P'){$status='Pending';}
$arr[$i][0]=$i;
$arr[$i][1]=$fetchm['userid'];
$arr[$i][2]=getMemberUserid($conn,$fetchm['userid'],'name');
$arr[$i][3]=$fetchm['request'];
$arr[$i][4]=$fetchm['tds'];
$arr[$i][5]=$fetchm['service'];
$arr[$i][6]=$fetchm['payout'];

$arr[$i][7]=$fetchm['type'];
$arr[$i][8]=$wallet;


$arr[$i][9]=$status;
$arr[$i][10]=$fetchm['date'];
$i++;
}}

$name='Pending-Statement-'.date('Y-m-d');

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('download2.php?f='.$name.'.csv');
