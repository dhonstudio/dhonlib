<?php

namespace Dhonstudio\Dhonlib;

class DhonCurl
{
    protected $headers;

    public function __construct($headers = [])
    {
        $this->headers = $headers;
    }

    public function get($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    public function post($url, $data)
    {
        $post = [];
        foreach (array_keys($data) as $key => $value) {
            array_push($post, $value . '=' . array_values($data)[$key]);
        }
        $final_post = implode("&", $post);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $final_post);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    public function put($url, $data)
    {
        array_push($this->headers, 'Content-Type: application/json');
        array_push($this->headers, 'Content-Length: ' . (string) strlen(json_encode($data)));

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }
}
