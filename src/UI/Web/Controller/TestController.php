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
        $command = new CreateSummonerCommand(
            '_PSLqFcfPjjonQrGHh3umDIbh68JFWgWo4o4RRhF2swRh6LC-9htVNKDddLIzy2cg41HfSwiyBRwHA',
            'Fdd80NTM4XkZwcaOuNYFTwdeQrrIlMcv9GyG024uFATBV5U',
            '9WlrEBP3qec2NoL9VXGeRfSQYNA6D2a38TXEcI8CxV_t4_5',
            'TestSummoner',
            84,
            3556,
            1544046420000
        );

        $bus->dispatch($command);

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
