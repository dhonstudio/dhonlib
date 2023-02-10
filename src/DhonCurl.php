<?php

namespace Dhonstudio\Dhonlib;

class DhonCurl extends DhonVar
{
    private function _initCURL($url)
    {
        $final_url = strpos($url, "http") !== false ? $url : getenv('app.apiURL') . $url;

        $ch = curl_init($final_url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        return $ch;
    }

    public function get($url)
    {
        $ch = $this->_initCURL($url);
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    public function post($url, $data)
    {
        $ch = $this->_initCURL($url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    public function put($url, $data)
    {
        array_push($this->headers, 'Content-Type: application/json');
        array_push($this->headers, 'Content-Length: ' . (string) strlen(json_encode($data)));

        $ch = $this->_initCURL($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }
}
