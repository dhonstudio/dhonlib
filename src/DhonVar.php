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

    /**
     * Redirect session name.
     * 
     * @var string
     */
    public $redirectSessionName;

    /**
     * Redirect session expiration.
     * 
     * @var int
     */
    public $redirectSessionExpiration;

    /**
     * Session filled redirect URL.
     * 
     * @var string
     */
    public $redirectSession;

    /**
     * Bearer session name.
     * 
     * @var string
     */
    public $bearerTokenSessionName;

    /**
     * Bearer session expiration.
     * 
     * @var int
     */
    public $bearerTokenSessionExpiration;

    /**
     * Session filled bearer token for API
     * 
     * @var mixed
     */
    public $bearerTokenSession;

    public function __construct()
    {
        $this->assetsURL = getenv('app.assetsURL');
        $this->apiURL = getenv('app.apiURL');
    }
}
