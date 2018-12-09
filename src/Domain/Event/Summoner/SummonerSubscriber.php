<?php
/**
 * Created by PhpStorm.
 * User: Altz
 * Date: 09/12/2018
 * Time: 19:03.
 */

namespace App\Domain\Event\Summoner;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class SummonerSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            SummonerCreatedEvent::NAME => 'onSummonerCreated',
            SummonerDeletedEvent::NAME => 'onSummonerDeleted',
        ];
    }

    public function onSummonerCreated(SummonerCreatedEvent $event)
    {
        dd('Summoner created: ' . $event->getSummoner()->getName());
    }

    public function onSummonerDeleted(SummonerDeletedEvent $event)
    {
        dd('Summoner deleted: ' . $event->getSummoner()->getName());
    }
}
