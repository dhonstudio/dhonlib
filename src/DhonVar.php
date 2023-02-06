<?php

namespace Dhonstudio\Dhonlib;

class DhonVar
{
    /**
     * Header option for CURL request.
     *
     * @var mixed
     */
    public $headers;

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

    public function __construct()
    {
        $this->apiURL = getenv('app.apiURL');

        //~ For Session
        $this->userSessionName = getenv('session.userName');
        $this->userSessionExpiration = getenv('session.userExpiration');
        $this->redirectSessionName = getenv('session.redirectName');
        $this->redirectSessionExpiration = getenv('session.redirectExpiration');
        $this->bearerTokenSessionName = getenv('session.bearerName');
        $this->bearerTokenSessionExpiration = getenv('session.bearerExpiration');

        //~ Init header for CURL request.
        $this->headers = isset($_SESSION[$this->bearerTokenSessionName]) ?
            ['Authorization: Bearer ' . $_SESSION[$this->bearerTokenSessionName]] : [];
    }
}
