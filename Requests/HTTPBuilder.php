<?php

namespace web;

class HTTPBuilder
{
    private $response;
    private $request;
    private $version;
    private $parameters;
    private $headers;

    public function __construct()
    {
        $this->response = null;
        $this->request = null;
        $this->version = null;
        $this->parameters = null;
        $this->headers = null;
    }

    public function setResponse(int $code, string $message)
    {
        $this->response = $code . " " . $message;

        return $this;
    }

    public function setRequest(string $request)
    {
        $this->request = $request;

        return $this;
    }

    public function setVersion(float $version)
    {
        $this->version = "HTTP/" . $version;

        return $this;
    }

    public function setParameters(array $parameters)
    {
        foreach ($parameters as $key => $value) {
            $this->parameters[$key] = $value;
        }

        return $this;
    }

    public function setHeaders(array $headers)
    {
        foreach ($headers as $key => $value) {
            $this->headers .= $key . ": " . $value . "\r\n";
        }

        return $this;
    }

    public function build(&$body = null)
    {
        if ($this->response != null) {
            $result = $this->version . " " . $this->response . "\r\n" . $this->headers;
        } else if ($this->request != null) {
            $localParameters = "";

            if ($this->parameters != null) {
                foreach ($this->parameters as $key => $value) {
                    $localParameters .= $key . "=" . $value . "&";
                }

                $localParameters = substr($localParameters, 0, -1);
            }

            $result = $this->request . " /" . $localParameters . " " . $this->version . "\r\n" . $this->headers;
        }

        if ($body != null) {
            $result .= "\r\n" . $body;
        }

        return $result;
    }

    public function __toString()
    {
        return $this->build();
    }

    public function __destruct()
    {
    }
}
