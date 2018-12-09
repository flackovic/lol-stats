<?php

namespace App\Domain\Summoner\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Summoner\Repository\SummonerRepository")
 */
class Summoner
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $puuid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $remoteId;

    /**
     * @ORM\Column(type="integer")
     */
    private $accountId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\Column(type="integer")
     */
    private $profileIconId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $revisionDate;

    public static function fromJson(string $summonerData): Summoner
    {
        $summonerObject = json_decode($summonerData);

        $summoner = new self;
        $summoner->setPuuid($summonerObject->puuid);

        return $summoner;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPuuid(): ?string
    {
        return $this->puuid;
    }

    public function setPuuid(string $puuid): self
    {
        $this->puuid = $puuid;

        return $this;
    }

    public function getRemoteId(): ?string
    {
        return $this->remoteId;
    }

    public function setRemoteId(string $remoteId): self
    {
        $this->remoteId = $remoteId;

        return $this;
    }

    public function getAccountId(): ?int
    {
        return $this->accountId;
    }

    public function setAccountId(int $accountId): self
    {
        $this->accountId = $accountId;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getProfileIconId(): ?int
    {
        return $this->profileIconId;
    }

    public function setProfileIconId(int $profileIconId): self
    {
        $this->profileIconId = $profileIconId;

        return $this;
    }

    public function getRevisionDate(): ?int
    {
        return $this->revisionDate;
    }

    public function setRevisionDate(?int $revisionDate): self
    {
        $this->revisionDate = $revisionDate;

        return $this;
    }


}
