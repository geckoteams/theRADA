<?php
/* Use payment method nonce here */


/* Make the Braintree call to execute the payment. */
if(isset($_REQUEST['payment_method_nonce'])){
	$total = $_REQUEST['paymentAmount'];
	$currencyCode = $_REQUEST['currencyCodeType'];
}
?>

<!--Display Payment Confirmation-->
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h4>Transaction ID : <?php echo($result->transaction->id);?> <br/>
            State : Approved  <br/>
            Total Amount: <?php echo($total);?> &nbsp;<?php echo($currencyCode); ?> <br/>
        </h4>
    </div>
    <div class="col-md-4"></div>
</div>