<?php
/**
 * Created by PhpStorm.
 * User: Altz
 * Date: 09/12/2018
 * Time: 16:13
 */

namespace App\Domain\Summoner\Factory;


use App\Domain\Summoner\Summoner;

class SummonerFactory
{
    public function create(
        string $puuid,
        string $remoteId,
        int $accountId,
        string $name,
        int $level,
        int $profileIconId,
        int $revisionDate
    ): Summoner
    {
        return new Summoner($puuid,
            $remoteId,
            $accountId,
            $name,
            $level,
            $profileIconId,
            $revisionDate
        );
    }
}