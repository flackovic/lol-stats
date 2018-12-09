<?php
/**
 * Created by PhpStorm.
 * User: Altz
 * Date: 09/12/2018
 * Time: 16:07.
 */

namespace App\Application\Command\Summoner\CreateSummoner;

class CreateSummonerCommand
{
    private $puuid;

    private $remoteId;

    private $accountId;

    private $name;

    private $level;

    private $profileIconId;

    private $revisionDate;

    public function __construct(
        string $puuid,
        string $remoteId,
        string $accountId,
        string $name,
        int $level,
        int $profileIconId,
        int $revisionDate
    ) {
        $this->puuid = $puuid;
        $this->remoteId = $remoteId;
        $this->accountId = $accountId;
        $this->name = $name;
        $this->level = $level;
        $this->profileIconId = $profileIconId;
        $this->revisionDate = $revisionDate;
    }

    public function getPuuid(): string
    {
        return $this->puuid;
    }

    public function getRemoteId(): string
    {
        return $this->remoteId;
    }

    public function getAccountId(): string
    {
        return $this->accountId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function getProfileIconId(): int
    {
        return $this->profileIconId;
    }

    public function getRevisionDate(): int
    {
        return $this->revisionDate;
    }
}
