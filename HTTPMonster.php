<?php

/**
 * HTTPMonster - A simple PHP class for making HTTP requests using cURL
 */
class HTTPMonster
{
    // Private class properties
    private $ch; // cURL handle
    private $options = array(); // Array of cURL options

    // Constructor method
    public function __construct()
    {
        $this->ch = curl_init(); // Initialize cURL handle
        // Set default cURL options
        $this->setOption(CURLOPT_RETURNTRANSFER, true);
        $this->setOption(CURLOPT_SSL_VERIFYPEER, false);
        $this->setOption(CURLOPT_ENCODING, '');
        $this->setOption(CURLOPT_FOLLOWLOCATION, true);
        $this->setOption(CURLOPT_MAXREDIRS, 10);
        $this->setOption(CURLOPT_TIMEOUT, 30);
        $this->setOption(CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    }

    // Method for setting a single HTTP header
    public function setHeader($header)
    {
        $this->options[CURLOPT_HTTPHEADER][] = $header;
        return $this;
    }

    // Method for setting multiple HTTP headers
    public function setHeaders($headers)
    {
        $this->options[CURLOPT_HTTPHEADER] = $headers;
        return $this;
    }

    // Method for setting a cURL option
    public function setOption($option, $value)
    {
        curl_setopt($this->ch, $option, $value);
        return $this;
    }

    // Method for setting the request timeout
    public function setTimeout($timeout)
    {
        $this->setOption(CURLOPT_TIMEOUT, $timeout);
        return $this;
    }

    // Method for setting the request URL
    public function setUrl($url)
    {
        $this->setOption(CURLOPT_URL, $url);
        return $this;
    }

    // Method for setting the request method
    public function setMethod($method)
    {
        $this->setOption(CURLOPT_CUSTOMREQUEST, strtoupper($method));
        return $this;
    }

    // Method for setting the request body
    public function setBody($body)
    {
        $this->setOption(CURLOPT_POSTFIELDS, $body);
        return $this;
    }

    // Method for executing the request and returning the response
    public function execute()
    {
        curl_setopt_array($this->ch, $this->options); // Set all cURL options
        $response = curl_exec($this->ch); // Execute the request
        return $response; // Return the response
    }

    // Destructor method
    public function __destruct()
    {
        curl_close($this->ch); // Close the cURL handle
    }
}