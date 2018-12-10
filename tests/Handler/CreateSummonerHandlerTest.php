<?php
/**
 * Created by PhpStorm.
 * User: Altz
 * Date: 10/12/2018
 * Time: 20:45
 */

namespace App\Tests\Handler;


use App\Application\Command\Summoner\CreateSummoner\CreateSummonerCommand;
use App\Application\Command\Summoner\CreateSummoner\CreateSummonerHandler;
use App\Domain\Summoner\Factory\SummonerFactory;
use App\Infrastructure\Summoner\Repository\SummonerRepository;
use App\Tests\DatabaseAwareTestCase;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class CreateSummonerHandlerTest extends DatabaseAwareTestCase
{
    /** @var SummonerFactory */
    private $summonerFactory;
    /** @var SummonerRepository */
    private $summonerRepository;
    /** @var EventDispatcherInterface */
    private $eventDispatcherMock;

    public function setUp()
    {
        parent::setUp();

        $this->summonerFactory = self::$container->get(SummonerFactory::class);
        $this->summonerRepository = self::$container->get(SummonerRepository::class);
        $this->eventDispatcherMock = $this->createMock(EventDispatcherInterface::class);

        $this->truncateEntities();
    }

    public function testItWillCreateAndPersistNewSummoner()
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

        $createSummonerHandler = new CreateSummonerHandler(
            $this->summonerFactory,
            $this->summonerRepository,
            $this->eventDispatcherMock
        );

        $createSummonerHandler($command);

        $summoners = $this->summonerRepository->findAll();

        $this->assertCount(1, $summoners);
    }
}