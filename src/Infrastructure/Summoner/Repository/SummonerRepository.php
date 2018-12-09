<?php

namespace App\Infrastructure\Summoner\Repository;

use App\Domain\Summoner\Summoner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Summoner|null find($id, $lockMode = null, $lockVersion = null)
 * @method Summoner|null findOneBy(array $criteria, array $orderBy = null)
 * @method Summoner[]    findAll()
 * @method Summoner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SummonerRepository extends ServiceEntityRepository
{
    private $em;

    public function __construct(RegistryInterface $registry, EntityManagerInterface $em)
    {
        parent::__construct($registry, Summoner::class);

        $this->em = $em;
    }

    public function store(Summoner $summoner)
    {
        $this->em->persist($summoner);
        $this->em->flush();
    }

}
