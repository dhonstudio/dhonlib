<?php

namespace Dhonstudio\Dhonlib;

class DhonVar
{
    /**
     * Assets URL.
     *
     * @var string
     */
    public $assetsURL;

    /**
     * API URL.
     *
     * @var string
     */
    public $apiURL;

    public function __construct()
    {
        $this->assetsURL = getenv('app.assetsURL');
        $this->apiURL = getenv('app.apiURL');
    }
}
