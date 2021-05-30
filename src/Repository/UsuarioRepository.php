<?php

namespace App\Repository;

use App\Entity\Usuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Usuario|null find($id, $lockMode = null, $lockVersion = null)
 * @method Usuario|null findOneBy(array $criteria, array $orderBy = null)
 * @method Usuario[]    findAll()
 * @method Usuario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 * @extends \Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository<Usuario>
 */

class UsuarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Usuario::class);
        
    }

    public function save(Usuario $usuario): Usuario
    {
        $this->getEntityManager()->persist($usuario);
        $this->getEntityManager()->flush();
        return $usuario;
    }

    public function reload(Usuario $usuario): Usuario
    {
        $this->getEntityManager()->refresh($usuario);
        return $usuario;
    }

    public function delete(Usuario $usuario)
    {
        $this->getEntityManager()->remove($usuario);
        $this->getEntityManager()->flush();
    }

    
}



