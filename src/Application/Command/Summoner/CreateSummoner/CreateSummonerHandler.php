<?php
/**
 * Created by PhpStorm.
 * User: Altz
 * Date: 09/12/2018
 * Time: 16:07
 */

namespace App\Application\Command\Summoner\CreateSummoner;

use App\Application\Event\Summoner\SummonerCreatedEvent;
use App\Domain\Summoner\Factory\SummonerFactory;
use App\Infrastructure\Summoner\Repository\SummonerRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class CreateSummonerHandler
{
    private $summonerFactory;
    private $summonerRepository;
    private $dispatcher;

    public function __construct(SummonerFactory $summonerFactory, SummonerRepository $summonerRepository, EventDispatcherInterface $dispatcher)
    {
        $this->summonerFactory = $summonerFactory;
        $this->summonerRepository = $summonerRepository;
        $this->dispatcher = $dispatcher;
    }

    public function __invoke(CreateSummonerCommand $command): void
    {
        $summoner = $this->summonerFactory->create(
            $command->puuid,
            $command->remoteId,
            $command->accountId,
            $command->name,
            $command->level,
            $command->profileIconId,
            $command->revisionDate
        );

        $this->dispatcher->dispatch(SummonerCreatedEvent::NAME, new SummonerCreatedEvent($summoner));

        //$this->summonerRepository->store($summoner);
    }
}