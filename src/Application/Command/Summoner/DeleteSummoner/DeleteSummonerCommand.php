<?php
/**
 * Created by PhpStorm.
 * User: Altz
 * Date: 09/12/2018
 * Time: 20:13
 */

namespace App\Application\Command\Summoner\DeleteSummoner;


use App\Domain\Summoner\Summoner;

class DeleteSummonerCommand
{
    private $summoner;

    public function __construct(Summoner $summoner)
    {
        $this->summoner = $summoner;
    }

    public function getSummoner(): Summoner
    {
        return $this->summoner;
    }
}