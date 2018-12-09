<?php
/**
 * Created by PhpStorm.
 * User: Altz
 * Date: 09/12/2018
 * Time: 20:13
 */

namespace App\Application\Command\Summoner\DeleteSummoner;


use App\Infrastructure\Summoner\Repository\SummonerRepository;
use Doctrine\ORM\EntityManagerInterface;

class DeleteSummonerHandler
{
    private $summonerRepository;
    private $em;

    public function __construct(SummonerRepository $summonerRepository, EntityManagerInterface $em)
    {
        $this->summonerRepository = $summonerRepository;
        $this->em = $em;
    }

    public function __invoke(DeleteSummonerCommand $command)
    {
        $this->em->remove($command->getSummoner());
        $this->em->flush();

        dd('asd');
    }
}