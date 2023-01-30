<?php

namespace Dhonstudio\Dhonlib;

/**
 * Class DhonLib
 *
 * For access DhonLib variable, please add and set up this lists to .env:
 * 
 * @var string $assets 'app.assetsURL'
 * @var string $api_url 'app.apiURL'
 */
class DhonLib extends DhonVar
{
    /**
     * For securing Development Server. 
     * Please add 'php.authUser' and 'php.authPw' in .env 
     * as user and password for basic auth.
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

    public function initSession()
    {
        $dhonsession = new DhonSession();

        return $dhonsession;
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
