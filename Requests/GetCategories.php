<?php

include_once("HTTPDataBaseRequests.php");

$request = new web\HTTPDataBaseRequests();

//TODO: В $response находятся категории видосов, нужно как-то их вывести на страницу
$response = $request->sendRequest(array(
    "DataBaseRequest" => "Categories"
));
