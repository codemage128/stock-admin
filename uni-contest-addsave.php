<?php
date_default_timezone_set('UTC');


$startDate = $_POST['startDate'];
$startTime = $_POST['startTime'];
$startPickingDate = $_POST['startPickingDate'];
$startPickingTime = $_POST['startPickingTime'];

$endDate = $_POST['endDate'];
$endTime = $_POST['endTime'];
$endPickingDate = $_POST['endPickingDate'];
$endPickingTime = $_POST['endPickingTime'];


$startDateTime = $startDate . " " . $startTime;
$endDateTime = $endDate . " " . $endTime;
$stockAddStartDateTime = $startPickingDate . " " . $startPickingTime;
$stockAddEndDateTime = $endPickingDate . " " . $endPickingTime;


$name = $_POST["name"];
$maxContestants = $_POST['maxContestants'];
$prizePot = $_POST['prizePot'];
$entryFees = $_POST['entryFees'];
$bannerText = $_POST['bannerText'];
$rules = $_POST['rules'];

$resetStatus = 1;
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

$data = array(
    'name' => $name,
    'stockAddStartDateTime' => $stockAddStartDateTime,
    'stockAddEndDateTime' => $stockAddEndDateTime,
    'startDateTime' => $startDateTime,
    'endDateTime' => $endDateTime,
    'maxContestants' => $maxContestants,
    'prizePot' => $prizePot,
    'entryFees' => $entryFees,
    'bannerText' => $bannerText,
    'rules' => $rules,
    'resetStatus' => $resetStatus
);
$post_data_url = "name=".$name."&stockAddStartDateTime=".$stockAddStartDateTime."&stockAddEndDateTime=".$stockAddEndDateTime
."&startDateTime=".$startDateTime."&endDateTime=".$endDateTime."&maxContestants=".$maxContestants
."&prizePot=".$prizePot."&entryFees=".$entryFees."&bannerText=".$bannerText."&rules=".$rules."&resetStatus=".$resetStatus."&amountOne=".$amountOne."&amountTwo=".$amountTwo."&amountThree=".$amountThree."&amountFour=".$amountFour."&amountFive=".$amountFive.
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

$post_data = json_encode($data);

$api_url = "https://jarbly.com/stockApp/stockAd/Admin/addNewContest";
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

$result_noti = -1;
if ($result === false) {
    // throw new Exception('Curl error: ' . curl_error($crl));
    //print_r('Curl error: ' . curl_error($crl));
    $result_noti = 0;
} else {
    $result_noti = 1;
}

// Close cURL session handle
//print($result_noti);

header('Location: uni-contests.php');
