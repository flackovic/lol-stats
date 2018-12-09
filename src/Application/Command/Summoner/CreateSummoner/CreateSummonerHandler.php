<?php
/**
 * Created by PhpStorm.
 * User: Altz
 * Date: 09/12/2018
 * Time: 16:07
 */

namespace App\Application\Command\Summoner\CreateSummoner;

use App\Domain\Summoner\Factory\SummonerFactory;
use App\Infrastructure\Summoner\Repository\SummonerRepository;

class CreateSummonerHandler
{
    private $summonerFactory;
    private $summonerRepository;

    public function __construct(SummonerFactory $summonerFactory, SummonerRepository $summonerRepository)
    {
        $this->summonerFactory = $summonerFactory;
        $this->summonerRepository = $summonerRepository;
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

        dd($summoner);

        //$this->summonerRepository->store($summoner);
    }
}