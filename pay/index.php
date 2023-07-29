<?php 
session_start();
//-------------------------
// Dev : @DevMrAmir
//-------------------------

if (isset($_SESSION['login']) and isset($_SESSION['pay'])) {
//==================================================
include("./../scratch.php");
$sqluser    = "SELECT * FROM `config`";
$resultuser = mysqli_query($conn,$sqluser);
        
$resuser    = mysqli_fetch_assoc($resultuser);

$walet      = $resuser['walet'];
//====================//  Get  //==============================
$user = $_GET['id'];
$amount = $_GET['amount'];



$data = array("merchant_id" => "$walet",
    "amount" => $amount,
    "callback_url" => "https://telocoin.org/pay/back.php?id=$user&amount=$amount",
    "description" => "بوس بده پدر سگ",
    "metadata" => [ "email" => "info@email.com","mobile"=>"09121234567"],
    );
$jsonData = json_encode($data);
$ch = curl_init('https://api.zarinpal.com/pg/v4/payment/request.json');
curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData)
));

$result = curl_exec($ch);
$err = curl_error($ch);
$result = json_decode($result, true, JSON_PRETTY_PRINT);
curl_close($ch);



if ($err) {
    echo "cURL Error #:" . $err;
} else {
    if (empty($result['errors'])) {
        if ($result['data']['code'] == 100) {
            header('Location: https://www.zarinpal.com/pg/StartPay/' . $result['data']["authority"]);
        }
    } else {
         echo'Error Code: ' . $result['errors']['code'];
         echo'message: ' .  $result['errors']['message'];

    }
}}

?>