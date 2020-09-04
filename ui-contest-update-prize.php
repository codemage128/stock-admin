<?php

$contestId = $_POST['contestId'];
$amountOne = $_POST['amountOne'];
$amountTwo = $_POST['amountTwo'];
$amountThree = $_POST['amountThree'];
$amountFour = $_POST['amountFour'];
$amountFive = $_POST['amountFive'];
$amountSix = $_POST['amountSix'];
$amountSeven = $_POST['amountSeven'];
$amountEight = $_POST['amountEight'];
$amountNine = $_POST['amountNine'];
$amountTen = $_POST['amountTen'];


$post_data_url = "contestId=".$contestId."&amountOne=".$amountOne."&amountTwo=".$amountTwo."&amountThree=".$amountThree."&amountFour=".$amountFour."&amountFive=".$amountFive.
    "&amountSix=".$amountSix."&amountSeven=".$amountSeven."&amountEight=".$amountEight."&amountNine=".$amountNine."&amountTen=".$amountTen;
$api_url = 'https://jarbly.com/stockApp/stockAd/Admin/token';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'API-KEY: dsffgdzaGRyc2VohejrjZyaHZvb2hqcGFgfdgsdf'
));
$excute = curl_exec($ch);
curl_close($ch);

$result = json_decode($excute);
$token = $result->data->token;

$api_url = "https://jarbly.com/stockApp/stockAd/Admin/addEditContestPositionPrice";
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'API-KEY: dsffgdzaGRyc2VohejrjZyaHZvb2hqcGFgfdgsdf',
    'token:'. $token,
    'Content-Type: application/x-www-form-urlencoded'
));
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data_url);
$result = curl_exec($ch);

header("Location: uni-contest-edit.php?contestId=".$contestId);
