<?php

namespace web;

include_once("HTTPBuilder.php");

class HTTPStreaming
{
    private $headers;
    private $clientSocket;
    private $ip;
    private $port;

    public function __construct(array $headers, $ip = "31.207.173.47", $port = "1812")
    {
        $this->headers = $headers;
        $this->headers["Streaming"] = "Web-Version";
        $this->ip = $ip;
        $this->port = $port;
        $this->clientSocket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    }

    public function stream(array $parameters = null)
    {
        socket_connect($this->clientSocket, $this->ip, $this->port);

        $request = (new HTTPBuilder)->setHeaders($this->headers)->setRequest("Get")->setVersion(1.1);
        $response = "";
        $buffer = "";

        if ($parameters != null) {
            $request->setParameters($parameters);
        }

        $request = $request->build();

        socket_send($this->clientSocket, $request, strlen($request), null);

        while (socket_recv($this->clientSocket, $buffer, 2048, null)) {
            $response .= $buffer;

            $buffer = "";

            if (substr($response, -3) == "END") {
                $response = substr($response, 0, strlen($response) - 3);
                break;
            }
        }

        return $response;
    }

    public function __dectruct()
    {
        socket_close($this->clientSocket);
    }
}
