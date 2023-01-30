<?php

namespace Dhonstudio\Dhonlib;

class DhonVar
{
    /**
     * Assets URL.
     *
     * @var string
     */
    public $assets;

    /**
     * API URL.
     *
     * @var string
     */
    public $api_url;

    public function __construct()
    {
        $this->assets = getenv('app.assetsURL');
        $this->api_url = getenv('app.apiURL');
    }
}
