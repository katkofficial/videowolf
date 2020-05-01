<?php

include_once("HTTPDataBaseRequests.php");

$tem = new web\HTTPDataBaseRequests();

$response = $tem->sendRequest(array(
    "DataBaseRequest" => "Authorization"
), $_POST);

if (strpos($response, "DataBaseError: true") != false) {
    header("Authorization: failed", true, 200);
    print("Authorization failed");
} else {
    $start = strpos($response, "UserId");
    $end = strpos($response, "\r\n", $start);
    $length = $end - $start;

    header("Authorization: success", true, 200);
    print(substr($response, $start, $length));
}
