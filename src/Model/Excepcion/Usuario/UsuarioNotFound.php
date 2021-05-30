<?php

namespace App\Model\Exception\Usuario;

use Exception;

class UsuarioNotFound extends Exception
{
    public static function throwException()
    {
        throw new self('Usuario not found');
    }
}