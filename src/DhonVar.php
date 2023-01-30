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

    /**
     * User session name.
     * 
     * @var string
     */
    public $userSessionName;

    /**
     * User session expiration.
     * 
     * @var int
     */
    public $userSessionExpiration;

    /**
     * Session filled user information in encrypt.
     *
     * @var mixed
     */
    public $userSession;

    public function __construct()
    {
        $this->assetsURL = getenv('app.assetsURL');
        $this->apiURL = getenv('app.apiURL');
    }
}
