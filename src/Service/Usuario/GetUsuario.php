<?php

namespace App\Service\Usuario;

use App\Entity\Usuario;
use App\Model\Exception\Usuario\UsuarioNotFound;
use App\Repository\UsuarioRepository;

class GetUsuario
{
    private UsuarioRepository $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function __invoke(int $id): Usuario
    {
        $usuario = $this->usuarioRepository->find($id);
        if (!$usuario) {
            UsuarioNotFound::throwException();
        }
        return $usuario;
    }
}