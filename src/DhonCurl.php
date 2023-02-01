<?php

namespace Dhonstudio\Dhonlib;

class DhonCurl
{
    public function get($url, $headers = [])
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode(json_decode($result, true), true);
    }

    public function post($url, $headers = [], $data)
    {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        /* set the content type json */
        $headers[] = 'Content-Type:application/json';
        $token = "your_token";
        $headers[] = "Authorization: Bearer " . $token;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        /* execute request */
        $result = curl_exec($ch);

        /* close cURL resource */
        curl_close($ch);

        return json_decode(json_decode($result, true), true);
    }
}
