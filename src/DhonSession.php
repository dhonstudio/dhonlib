<?php

namespace Dhonstudio\Dhonlib;

class DhonSession extends DhonVar
{
    /**
     * For init any Session needed.
     * 
     * @param string|array $sessionTypes can choose 'user'|'bearer'
     */
    public function initSession($sessionTypes)
    {
        if ($sessionTypes == 'user' || in_array('user', $sessionTypes)) {
            $this->userSession = isset($_SESSION[$this->userSessionName]) ? $_SESSION[$this->userSessionName] : null;
        }

        if ($sessionTypes == 'redirect' || in_array('redirect', $sessionTypes)) {
            $this->redirectSession = isset($_SESSION[$this->redirectSessionName]) ? $_SESSION[$this->redirectSessionName] : null;
        }

        if ($sessionTypes == 'bearer' || in_array('bearer', $sessionTypes)) {
            $this->bearerTokenSession = isset($_SESSION[$this->bearerTokenSessionName]) ? $_SESSION[$this->bearerTokenSessionName] : null;
        }
    }
}
