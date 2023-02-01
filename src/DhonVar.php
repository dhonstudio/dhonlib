<?php

namespace Dhonstudio\Dhonlib;

class DhonVar
{
    /**
     * Any params in construct.
     *
     * @var mixed
     */
    public $params;

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

    public function __construct($params = [])
    {
        $this->params = $params;
        $this->assetsURL = getenv('app.assetsURL');
        $this->apiURL = getenv('app.apiURL');

        //~ For Session
        $this->userSessionName = getenv('session.userName');
        $this->userSessionExpiration = getenv('session.userExpiration');
        $this->redirectSessionName = getenv('session.redirectName');
        $this->redirectSessionExpiration = getenv('session.redirectExpiration');
        $this->bearerTokenSessionName = getenv('session.bearerName');
        $this->bearerTokenSessionExpiration = getenv('session.bearerExpiration');
    }
}
