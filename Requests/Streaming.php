<?php
include_once("HTTPStreaming.php");

$tem = new web\HTTPStreaming(apache_request_headers());

$getParameters = array();

foreach ($_GET as $key => $value) {
    $getParameters[$key] = $value;
}

$response = $tem->stream(sizeof($getParameters) ? $getParameters : null);

$headers = substr($response, 0, strpos($response, "\r\n\r\n") + 2);
$headers = substr($headers, strpos($headers, "\r\n") + 2);

$singleHeader = array();

for ($i = 0; $i < 4; $i++) {
    $singleHeader[] = substr($headers, 0, strpos($headers, "\r\n"));
    $headers = substr($headers, strpos($headers, "\r\n") + 2);
}

foreach ($singleHeader as $key => $value) {
    header($value, true, 206);
}

$response = substr($response, strpos($response, "\r\n\r\n") + 4);

print($response);
