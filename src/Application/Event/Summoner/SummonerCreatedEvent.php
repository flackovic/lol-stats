<?php
/**
 * Created by PhpStorm.
 * User: Altz
 * Date: 09/12/2018
 * Time: 19:03
 */

namespace App\Application\Event\Summoner;


use App\Domain\Summoner\Summoner;
use Symfony\Component\EventDispatcher\Event;

class SummonerCreatedEvent extends Event
{
    const NAME = 'summoner.created';

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