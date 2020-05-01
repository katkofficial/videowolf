<?php

namespace web;

include_once("HTTPBuilder.php");

const responseSize = 1024;

class HTTPDataBaseRequests
{
    private $ip;
    private $port;
    private $clientSocket;

    public function __construct($ip = "31.207.173.47", $port = "1812")
    {
        $this->ip = $ip;
        $this->port = $port;

        $this->clientSocket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    }

    //$additionalHeaders as headerName => headerValue
    public function sendRequest(array $additionalHeaders, array $body, string $method = "POST")
    {
        socket_connect($this->clientSocket, $this->ip, $this->port);

        $response = "";
        $body = http_build_query($body);
        $request = (new HTTPBuilder())->setRequest($method)->setVersion(1.1)->setHeaders($additionalHeaders)->setHeaders(
            array(
                "Content-Length" => strlen($body),
                "Connection" => "Keep-Alive",
                "Content-type" => "application/x-www-form-urlencoded"
            )
        )->build($body);
        
        socket_send($this->clientSocket, $request, strlen($request), null);

        socket_recv($this->clientSocket, $response, responseSize, null);

        return $response;
    }

    public function __destruct()
    {
        socket_close($this->clientSocket);
    }
}
