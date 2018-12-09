<?php
/**
 * Created by PhpStorm.
 * User: Altz
 * Date: 09/12/2018
 * Time: 16:07
 */

namespace App\Application\Command\Summoner\CreateSummoner;


class CreateSummonerCommand
{
    public $puuid;

    public $remoteId;

    public $accountId;

    public $name;

    public $level;

    public $profileIconId;

    public $revisionDate;

    public function __construct(
        string $puuid,
        string $remoteId,
        int $accountId,
        string $name,
        int $level,
        int $profileIconId,
        int $revisionDate
    )
    {
        $this->puuid = $puuid;
        $this->remoteId = $remoteId;
        $this->accountId = $accountId;
        $this->name = $name;
        $this->level = $level;
        $this->profileIconId = $profileIconId;
        $this->revisionDate = $revisionDate;
    }
}