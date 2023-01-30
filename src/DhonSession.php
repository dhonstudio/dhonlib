<?php

namespace Dhonstudio\Dhonlib;

class DhonSession extends DhonVar
{
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
