<?php
session_start();
//-------------------------
// Dev : @DevMrAmir
//-------------------------

if (isset($_SESSION['login']) and isset($_SESSION['pay'])) {
//==================================================
include("./../config.php");

$sqluser    = "SELECT * FROM `config`";
$resultuser = mysqli_query($conn,$sqluser);
        
$resuser    = mysqli_fetch_assoc($resultuser);

$walet      = $resuser['walet'];
//====================//  Get  //==============================
// ------- Get -------
$Authority = $_GET['Authority'];
$user = $_GET['id'];
$amount = $_GET['amount'];

$data = array("merchant_id" => "$walet", "authority" => $Authority, "amount" => $amount);
$jsonData = json_encode($data);
$ch = curl_init('https://api.zarinpal.com/pg/v4/payment/verify.json');
curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v4');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData)
));

$result = curl_exec($ch);
curl_close($ch);
$result = json_decode($result, true);
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    if ($result['data']['code'] == 100) {
        
$sql    = "SELECT `balance` FROM `users` WHERE `id`=$user";
$result2 = mysqli_query($conn,$sql);

$res = implode(mysqli_fetch_assoc($result2));
        
$ok = $res + $amount;

$sql_new = "UPDATE `users` SET `balance`=$ok WHERE `id`=$user";
mysqli_query($conn,$sql_new);
        
            header("Location: './../account/verify.php?verify=true");

    } else {
        
            header("Location: './../account/verify.php?verify=false");
    }
}
}
?>