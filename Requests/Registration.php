<?php

include_once("HTTPDataBaseRequests.php");

$request = new web\HTTPDataBaseRequests();

$response = $request->sendRequest(array(
    "DataBaseRequest" => "Registration"
), $_POST);

if (strpos($response, "DataBaseError: true") != false) {
    $start = strpos($response, "ErrorDescription");
    $end = strpos($response, "\r\n", $start);

    header("Registration: failed", true, 200);
    print(substr($response, $start, $end - $start) . "<br>");
    print("Registration failed");
} else {
    $start = strpos($response, "UserId");
    $end = strpos($response, "\r\n", $start);
    $length = $end - $start;

    header("Registration: success", true, 200);
    print(substr($response, $start, $length));
}
