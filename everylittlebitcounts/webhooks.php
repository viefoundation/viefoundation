<?php

require_once './braintree/lib/Braintree.php';

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('79b3jvc4bdr4qx5s');
Braintree_Configuration::publicKey('f2jfgr8fgnxsk9y6');
Braintree_Configuration::privateKey('371a7dde468608f9749fb94bca872c7e');

if(isset($_GET["bt_challenge"])) {
    echo(Braintree_WebhookNotification::verify($_GET["bt_challenge"]));
}

if(
    isset($_POST["bt_signature"]) &&
    isset($_POST["bt_payload"])
) {
    $webhookNotification = Braintree_WebhookNotification::parse(
        $_POST["bt_signature"], $_POST["bt_payload"]
    );

    $message =
        "[Webhook Received " . $webhookNotification->timestamp->format('Y-m-d H:i:s') . "] "
        . "Kind: " . $webhookNotification->kind . " | "
        . "Subscription: " . $webhookNotification->subscription->id . "\n";

    file_put_contents("/tmp/webhook.log", $message, FILE_APPEND);
}



















?>