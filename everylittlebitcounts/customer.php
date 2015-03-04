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


$result = Braintree_Customer::create(array(
    "firstName" => $_POST["first_name"],
    "lastName" => $_POST["last_name"],
    'email' => $_POST["email_address"],
    "creditCard" => array(
        "number" => $_POST["number"],
        "expirationMonth" => $_POST["month"],
        "expirationYear" => $_POST["year"],
        "cvv" => $_POST["cvv"],
        "billingAddress" => array(
            "postalCode" => $_POST["postal_code"],
            "streetAddress" => $_POST['mailing_address'],
            "locality" => $_POST['city'],
            "region" => $_POST['state']
        )
    )
    
));

$url = "<meta http-equiv='refresh' content='0;url=http://www.viefoundation.org/everylittlebitcounts/subscription" . $_POST['selector'] . ".php?customer_id=" . $result->customer->id . "'>";


if ($result->success) {
    //echo("Success! Customer ID: " . $result->customer->id . "<br/>");
    echo($url);
} else {
    echo("Validation errors:<br/>");
    foreach (($result->errors->deepAll()) as $error) {
        echo("- " . $error->message . "<br/>");

    }
    echo("</br><a href='javascript:javascript:history.go(-1)'>Go Back</a>");
}
?>
</p>
</body>

</html