<?php
namespace Alura\Doctrine\Helper;

// CHAMADAS REFERENTE AO DOCTRINE ORM PARA LIBERAR AS CHAMADAS DOS MÉTODOS DAS
// CLASSE ABAIXO
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    public function getEntityManager(): EntityManagerInterface
    {
        $rootDir = __DIR__ . '/../..';
        $config = Setup::createAnnotationMetadataConfiguration(
            [$rootDir . '/src'],
            true
        );
        $connection = [
            'driver' => 'pdo_sqlite',
            'path' => $rootDir . '/var/data/banco.sqlite'
        ];
        return EntityManager::create($connection, $config);
    }
}

