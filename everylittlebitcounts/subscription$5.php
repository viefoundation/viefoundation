<html>
<head>
<link rel="stylesheet" href="giving-page-style.css" type="text/css" media="screen" />
<meta name="viewport" content="width=device-width , initial-scale=1.0, maximum-scale=1.0">

</head>
<body>
<p class="processing">
<?php

require_once './braintree/lib/Braintree.php';

Braintree_Configuration::environment('production');
Braintree_Configuration::merchantId('cfgbfs86gv3572gm');
Braintree_Configuration::publicKey('yzsr6nbrss8tkf3d');
Braintree_Configuration::privateKey('c37a6bf32c481939990709451271a107');

try {
    $customer_id = $_GET["customer_id"];
    $customer = Braintree_Customer::find($customer_id);
    $payment_method_token = $customer->creditCards[0]->token;

    $result = Braintree_Subscription::create(array(
        'paymentMethodToken' => $payment_method_token,
        'planId' => 'fiveaweek'
    ));

    if ($result->success) {
        echo("Processing...");
    } else {
        echo("Validation errors:<br/>");
        foreach (($result->errors->deepAll()) as $error) {
            echo("- " . $error->message . "<br/>");
        }
    }
} catch (Braintree_Exception_NotFound $e) {
    echo("Failure: no customer found with ID " . $_GET["customer_id"]);
}

?>
</p>


<?php

$thanks = "<meta http-equiv='refresh' content='0;url=http://www.viefoundation.org/everylittlebitcounts/thankyou.html'>";
echo($thanks);

?>

</body></html>