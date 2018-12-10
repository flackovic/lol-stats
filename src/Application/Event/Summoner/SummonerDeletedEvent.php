<?php
/**
 * Created by PhpStorm.
 * User: Altz
 * Date: 09/12/2018
 * Time: 20:22
 */

namespace App\Application\Event\Summoner;


use App\Domain\Summoner\Summoner;
use Symfony\Component\EventDispatcher\Event;

class SummonerDeletedEvent extends Event
{
    const NAME = 'summoner.deleted';

    /** @var Summoner */
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