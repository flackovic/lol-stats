<?php
/**
 * Created by PhpStorm.
 * User: Altz
 * Date: 10/12/2018
 * Time: 21:23
 */

namespace App\Tests;


use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DatabaseAwareTestCase extends KernelTestCase
{
    private $entityManager;

    public function setUp()
    {
        self::bootKernel();
    }

    protected function truncateEntities()
    {
        $purger = new ORMPurger($this->getEntityManager());
        $purger->purge();
    }

    protected function getEntityManager()
    {
        if(!$this->entityManager) {
            $this->entityManager = self::$container->get(EntityManagerInterface::class);
        }

        return $this->entityManager;
    }
}