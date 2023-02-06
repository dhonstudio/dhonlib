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

    public function __construct()
    {
        //~ Init header for CURL request.
        $this->headers = isset($_SESSION[getenv('session.bearerName')]) ?
            ['Authorization: Bearer ' . $_SESSION[getenv('session.bearerName')]] : [];
    }
}
