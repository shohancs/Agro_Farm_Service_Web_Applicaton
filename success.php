<?php include "inc/header.php"; ?>
<div class="container py-4">
			<div class="row">

				<div class="col-lg-12 order-lg-1">
					<div class="row">
						

						<?php  
	
	$val_id=urlencode($_POST['val_id']);
	$store_id=urlencode("shoha6574c17446d26");
	$store_passwd=urlencode("shoha6574c17446d26@ssl");
	$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

	$handle = curl_init();
	curl_setopt($handle, CURLOPT_URL, $requested_url);
	curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
	curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

	$result = curl_exec($handle);

	$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

	if($code == 200 && !( curl_errno($handle)))
	{

		# TO CONVERT AS ARRAY
		# $result = json_decode($result, true);
		# $status = $result['status'];

		# TO CONVERT AS OBJECT
		$result = json_decode($result);

		# TRANSACTION INFO
		$status = $result->status;
		$tran_date = $result->tran_date;
		$tran_id = $result->tran_id;
		$val_id = $result->val_id;
		$amount = $result->amount;
		$store_amount = $result->store_amount;
		$bank_tran_id = $result->bank_tran_id;
		$card_type = $result->card_type;

		# EMI INFO
		$emi_instalment = $result->emi_instalment;
		$emi_amount = $result->emi_amount;
		$emi_description = $result->emi_description;
		$emi_issuer = $result->emi_issuer;

		# ISSUER INFO
		$card_no = $result->card_no;
		$card_issuer = $result->card_issuer;
		$card_brand = $result->card_brand;
		$card_issuer_country = $result->card_issuer_country;
		$card_issuer_country_code = $result->card_issuer_country_code;

		# API AUTHENTICATION
		$APIConnect = $result->APIConnect;
		$validated_on = $result->validated_on;
		$gw_version = $result->gw_version;
		?>
		<h1 class="welcome text-center py-5">Payment Successfully Done!! </h1> <br>
		<br>
		<h1 class='text-center py-5'> &nbsp; Your Payment Amount : <?php echo $amount; ?> Taka</h1>
		<?php

	} else {

		echo "Failed to connect with SSLCOMMERZ";
	}

?>

					</div>
				</div>
			</div>
		</div>


<?php include "inc/footer.php"; ?>