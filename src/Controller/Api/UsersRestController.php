<?php

namespace App\Controller\Api;

use App\Repository\UsuarioRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\Type\UserFormType;
use App\Form\Type\LoginFormType;
use App\Entity\Usuario;
use App\Form\Model\LoginDto;
use App\Service\Usuario\DeleteUsuario;
use App\Service\Usuario\GetUsuario;
use App\Service\Usuario\UsuarioFormProcessor;
use Exception;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class UsersRestController extends AbstractFOSRestController
{
    /**
     * @Rest\Get(path="/users")
     * @Rest\View(serializerGroups={"usuario"}, serializerEnableMaxDepthChecks=true)
     */
    public function getAction( UsuarioRepository $usuarioRepository ) {
        return $usuarioRepository->findAll();
    }

    /**
     * @Rest\Get(path="/users/{id}")
     * @Rest\View(serializerGroups={"usuario"}, serializerEnableMaxDepthChecks=true)
     */
    public function getSingleAction(int $id, GetUsuario $getUsuario)
    {
        try {
            $usuario = ($getUsuario)($id);

        } catch (Exception $exception) {
            return View::create('Usuario not found', Response::HTTP_BAD_REQUEST);
        }
        return $usuario;
    }

    /**
     * @Rest\Post(path="/user")
     * @Rest\View(serializerGroups={"usuario"}, serializerEnableMaxDepthChecks=true)
     */
    public function postAction(Request $request, EntityManagerInterface $em ) 
    {
        $user = new Usuario();
        $form = $this->createForm(UserFormType::class, $user);
        $form->handleRequest($request);
        If ($form->isSubmitted() && $form->isValid())
        {
           $em->persist($user);
           $em->flush($user);
           return $user;
        }

        return $form;
    }

    /**
     * @Rest\Post(path="/users/validar_login")
     * @Rest\View(serializerGroups={"usuario"}, serializerEnableMaxDepthChecks=true)
     */
    public function validarAction(Request $request, UsuarioRepository $usuarioRepository ) 
    {
        $login = new LoginDto();
        $form = $this->createForm(LoginFormType::class, $login);
        $form->handleRequest($request);
        If ($form->isSubmitted() && $form->isValid())
        {  
           $email = $form['email']->getData();
           $password = $form['password']->getData();
           $usuarioLogueado = $usuarioRepository->findOneBy([
            "email" => $email,
            "password" => $password ]);

           if(!empty($usuarioLogueado)){
             $respuesta = ["mensaje" => 'El usuario se conecto al sistema'];
           }else{
             $respuesta = ["mensaje" => 'Las credenciales ingresadas son incorrectas'];
           }
           return  View::create($respuesta);
        }

        If (!$form->isSubmitted()) {
            return new response('', Response::HTTP_BAD_REQUEST);
        }
      
    }

    /**
     * @Rest\Delete(path="/users/{id}")
     * @Rest\View(serializerGroups={"usuario"}, serializerEnableMaxDepthChecks=true)
     */
    public function deleteAction(int $id, DeleteUsuario $deleteUsuario)
    {
        try {
            ($deleteUsuario)($id);
        } catch (Throwable $t) {
            return View::create('Usuario not found', Response::HTTP_BAD_REQUEST);
        }
        return View::create(null, Response::HTTP_NO_CONTENT);
    }
}