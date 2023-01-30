<?php

namespace Dhonstudio\Dhonlib;

class DhonSession
{
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
        $this->userSessionName = getenv('session.userName');
        $this->userSessionExpiration = getenv('session.userExpiration');
    }

    public function initSession($sessionTypes)
    {
        if ($sessionTypes == 'user' || in_array('user', $sessionTypes)) {
            $this->userSession = isset($_SESSION[$this->userSessionName]) ? $_SESSION[$this->userSessionName] : null;
        }
    }
}
