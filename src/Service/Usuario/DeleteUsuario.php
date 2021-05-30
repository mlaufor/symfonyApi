<?php

namespace App\Service\Usuario;

use App\Repository\UsuarioRepository;


class DeleteUsuario
{
    private GetUsuario $getUsuario;
    private UsuarioRepository $usuarioRepository;

    public function __construct(GetUsuario $getUsuario, UsuarioRepository $usuarioRepository)
    {
        $this->getUsuario = $getUsuario;
        $this->usuarioRepository = $usuarioRepository;
    }

    public function __invoke(int $id)
    {
        $usuario = ($this->getUsuario)($id);
        $this->usuarioRepository->delete($usuario);
    }
}