<?php

namespace Dhonstudio\Dhonlib;

/**
 * Class DhonLib
 *
 * For access DhonLib variables, please add and set up this lists to .env:
 * 
 * @var string $assets 'app.assetsURL'
 * @var string $api_url 'app.apiURL'
 * 
 * For access Session variables, please add and set up this lists to .env:
 *  
 * @var string $userSessionName 'session.userName'
 * @var int $userSessionExpiration 'session.userExpiration'
 * @var string $bearerTokenSessionName 'session.bearerName'
 * @var int $bearerTokenSessionExpiration 'session.bearerExpiration'
 * @var string $redirectSessionName 'session.redirectName'
 * @var int $redirectSessionExpiration 'session.redirectExpiration'
 */
class DhonLib extends DhonVar
{
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

    /**
     * For calling function in the Session class.
     */
    public function initSession()
    {
        $dhonsession = new DhonSession();

        return $dhonsession;
    }

    /**
     * For calling function in the Curl class.
     */
    public function curl()
    {
        $dhoncurl = new DhonCurl();

        return $dhoncurl;
    }
}
