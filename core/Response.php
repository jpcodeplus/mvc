<?php

namespace app\core; // Definiert den Namensraum

/**
 * 
 * @author Jan Behrens
 * @package app\core
 */

class Response
{
    public function getStatusCode(int $code)
    {
        http_response_code($code);
    }
}
