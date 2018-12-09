<?php
/**
 * Created by PhpStorm.
 * User: Altz
 * Date: 09/12/2018
 * Time: 20:13
 */

namespace App\Application\Command\Summoner\DeleteSummoner;


use App\Domain\Event\Summoner\SummonerDeletedEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class DeleteSummonerHandler
{
    private $em;
    private $dispatcher;

    public function __construct(EntityManagerInterface $em, EventDispatcherInterface $dispatcher)
    {
        $this->em = $em;
        $this->dispatcher = $dispatcher;
    }

    public function __invoke(DeleteSummonerCommand $command)
    {
        $summoner = $command->getSummoner();
        $this->em->remove($summoner);
        $this->em->flush();

        $this->dispatcher->dispatch(SummonerDeletedEvent::NAME, new SummonerDeletedEvent($summoner));
    }
}