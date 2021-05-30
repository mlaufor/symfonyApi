<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Usuario;
use App\Repository\UsuarioRepository;

class UserController extends AbstractController
{
    /**
     * @Route("/users", name="users_get")
    */

     public function list(Request $request, UsuarioRepository $usuarioRepository) {

        $users = $usuarioRepository->findAll();
        $usersAsArray = [];
        foreach ($users as $user){
            $usersAsArray[] = [
                'id' => $user->getId(),
                'nombre' => $user->getNombre(),
                'apellido' => $user->getApellido(),
                'password' => $user->getPassword(),
                'email' => $user->getEmail()
            ];
        }
        $response = new JsonResponse();
        $response->setData([
            'success' => true,
            'data'    => $usersAsArray
        ]);
        return $response;
     }

    /**
     * @Route("/user/create", name="user_create")
    */
     public function createUser(Request $request, EntityManagerInterface $em){
        
        $user = new Usuario();
        $user->setNombre('Pablo');
        $user->setApellido('Asad');
        $user->setEmail('Asad@hotmail.com');
        $user->setPassword('589154');
        $em->persist($user);
        $em->flush();
        $response = new JsonResponse();
        $response->setData([
            'success' => true,
            'data'    => [
                [
                    'id'   => $user->getId(),
                    'nombre' => $user->getNombre(),
                    'apellido'=> $user->getApellido(),
                    'email'=> $user->getEmail(),
                    'password'=> $user->getPassword(),
                ]
                
            ]
        ]);
        return $response;
     }

}

?>