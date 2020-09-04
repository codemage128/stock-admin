<?php
$contestId = $_POST['contestId'];
$name = $_POST['name'];

$post_data_url = "contestId=".$contestId."&name=".$name."&resetStatus=0";


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

$api_url = "https://jarbly.com/stockApp/stockAd/Admin/editContest";
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'API-KEY: dsffgdzaGRyc2VohejrjZyaHZvb2hqcGFgfdgsdf',
    'token:'. $token,
    'Content-Type: application/x-www-form-urlencoded'
));
//curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data_url);
$result = curl_exec($ch);
header("Location: uni-contest-edit.php?contestId=".$contestId);