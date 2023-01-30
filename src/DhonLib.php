<?php

namespace Dhonstudio\Dhonlib;

class DhonLib
{
    /**
     * For securing Development Server. Please add 'php.authUser' and 'php.authPw' in .env as user and password for basic auth.
     * 
     * @param string $envName 
     * @param string $envURL
     */
    public function secureDev($envName, $envURL)
    {
        if (getenv($envName) == "development" && $_SERVER['HTTP_HOST'] == $envURL) {
            $this->_basicAuthBearer();
        }
    }

    /**
     * Basic Auth Bearer.
     */
    private function _basicAuthBearer()
    {
        header('WWW-Authenticate: Basic realm="My Realm"');
        if (
            !isset($_SERVER['PHP_AUTH_USER'])
            || $_SERVER['PHP_AUTH_USER'] != getenv('php.authUser')
            || $_SERVER['PHP_AUTH_PW'] != getenv('php.authPw')
        ) {
            print_r('UNAUTHORIZED');
            die;
        }
    }
}
