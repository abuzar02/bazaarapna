<?php

    // Get From DataBase
    $cp_merchant_id = '56b89d3f635c30a2076084e96e764d2c';
    $cp_ipn_secret  = 'plcpnl0227';
	
	 if(isset($_SERVER['HTTP_HMAC']) && !empty($_SERVER['HTTP_HMAC'])) {

            $request = file_get_contents('php://input');
            if($request !== FALSE && !empty($request)) {
                if(isset($_REQUEST['merchant']) && $_REQUEST['merchant'] == trim($cp_merchant_id)) {
                
                    $hmac = hash_hmac("sha512", $request, trim($cp_ipn_secret));
                    if($hmac == $_SERVER['HTTP_HMAC']){
                        $auth_ok = true;
                    }else{
                        $error_msg = 'HMAC signature does not match';
                        $this->error_msg_insert($error_msg);
                    }

                }else{
                    $error_msg = 'No or incorrect Merchant ID passed';
                    $this->error_msg_insert($error_msg);
                }
                
            }else{
                $error_msg = 'Error reading POST data';
                $this->error_msg_insert($error_msg);
            }

        }else{

            if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']) && $_SERVER['PHP_AUTH_USER'] == trim($cp_merchant_id) && $_SERVER['PHP_AUTH_PW'] == trim($cp_ipn_secret)){
                $auth_ok = true;
            }else{
              $error_msg = "Invalid merchant id/ipn secret";
              $this->error_msg_insert($error_msg);
            }

        }
		
		
	if($auth_ok){
		if($_REQUEST['ipn_type'] == "api"){ 
		    if($_REQUEST['merchant'] == $cp_merchant_id){
				
				
				 // Get Call back Data
                $txn_id = $_POST['txn_id'];
                $invoiceid = $_POST['invoice'];
                $amount1 = floatval($_POST['amount1']);
                $amount2 = floatval($_POST['amount2']);
                $received_amount = floatval($_POST['received_amount']);
                $currency1 = $_POST['currency1'];
                $currency2 = $_POST['currency2'];
                $status = intval($_POST['status']);
				
				//Get invoice or order details from database useing $invoiceid variable
				$invoice = ''; // SELECT QUERY
				 
				if($status >= 100 || $status == 2){
					
					
					// Run Success Query
					$payment_status = 'Payment Success';
                    $orderStatus = '2';
					 
					 
					 
					 
					 
				}else{
					
					// Failed or other Transaction
					
					
				}
					
				 
		    }
		 
		}
	}
	
	
	
	
?>