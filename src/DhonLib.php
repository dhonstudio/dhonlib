<?php

namespace Dhonstudio\Dhonlib;

/**
 * Class DhonLib
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
     * 
     * Please add 'php.authUser' as user and 'php.authPw' as password in .env for basic auth.
     * 
     * @param string $envName filled with environtment param name
     * @param string $envURL filled with environtment URL which want to secure
     */
    public function secureDev($envName, $envURL)
    {
        if (getenv($envName) == "development" && $_SERVER['HTTP_HOST'] == $envURL) {
            $this->_basicAuthBearer();
        }
    }

    /**
     * For calling function in the Curl class.
     * 
     * Curl class filled function to call CURL request.
     * Please add and set up 'app.apiURL' in .env for default CURL's url.
     * 
     * @param string $method 'GET'|'POST'|'PUT'
     * @param string $url filled with url (with http or https) or endpoint (if 'app.apiURL' has been init)
     * @param mixed $data only for 'POST' and 'PUT' request
     */
    public function curl($method, $url, $data = [])
    {
        $dhoncurl = new DhonCurl();

        return $method == 'GET' ? $dhoncurl->get($url)
            : ($method == 'POST' ? $dhoncurl->post($url, $data)
                : ($method == 'PUT' ? $dhoncurl->put($url, $data)
                    : null
                )
            );
    }

    /**
     * Create Token.
     * 
     * Please add 'api.jwtEmail' as user and 'api.jwtPass' as password in .env 
     * for create jwt Token.
     */
    public function createToken()
    {
        //~ Get General bearer Token
        $bearerToken = $this->curl('GET', 'auth/me?email=' . getenv('api.jwtEmail') . '&password=' . getenv('api.jwtPass'));
        if (isset($bearerToken['access_token'])) {
            $_SESSION[getenv('session.bearerName')] = $bearerToken['access_token'];
        }
    }
}
