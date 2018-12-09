<?php

namespace App\UI\Web\Controller;


use App\Application\Command\Summoner\CreateSummoner\CreateSummonerCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(MessageBusInterface $bus)
    {

        $bus->dispatch(new CreateSummonerCommand(
            'asdasd',
            'asdasd',
            131312,
            'asdasd',
            123,
            123,
            123
        ));


        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
