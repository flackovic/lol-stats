<?php
/**
 * Created by PhpStorm.
 * User: Altz
 * Date: 14/12/2018
 * Time: 09:48
 */

namespace App\Tests\Domain;


use App\Domain\Summoner\Factory\SummonerFactory;
use App\Domain\Summoner\Summoner;
use PHPUnit\Framework\TestCase;

class SummonerFactoryTest extends TestCase
{
    /** @var SummonerFactory */
    private $factory;
    /** @var Summoner */
    private $summoner;

    public function setUp()
    {
        $this->factory = new SummonerFactory();

        $this->summoner = $this->factory->create(
            '_PSLqFcfPjjonQrGHh3umDIbh68JFWgWo4o4RRhF2swRh6LC-9htVNKDddLIzy2cg41HfSwiyBRwHA',
            'Fdd80NTM4XkZwcaOuNYFTwdeQrrIlMcv9GyG024uFATBV5U',
            '9WlrEBP3qec2NoL9VXGeRfSQYNA6D2a38TXEcI8CxV_t4_5',
            'AnneDL',
            827,
            3556,
            1544046420000
        );
    }

    public function testItWillReturnSummoner()
    {
        $this->assertInstanceOf(Summoner::class, $this->summoner);
    }

    public function testItWillSetCorrectPuuid()
    {
        $this->assertSame(
            '_PSLqFcfPjjonQrGHh3umDIbh68JFWgWo4o4RRhF2swRh6LC-9htVNKDddLIzy2cg41HfSwiyBRwHA',
            $this->summoner->getPuuid());
    }

    public function testItWillSetCorrectRemoteId()
    {
        $this->assertSame('Fdd80NTM4XkZwcaOuNYFTwdeQrrIlMcv9GyG024uFATBV5U', $this->summoner->getRemoteId());
    }

    public function testItWillSetCorrectAccountId()
    {
        $this->assertSame('9WlrEBP3qec2NoL9VXGeRfSQYNA6D2a38TXEcI8CxV_t4_5', $this->summoner->getAccountId());
    }

    public function testItWillSetCorrectName()
    {
        $this->assertSame('AnneDL', $this->summoner->getName());
    }

    public function testItWillSetCorrectLevel()
    {
        $this->assertSame(827, $this->summoner->getLevel());
    }

    public function testItWillSetCorrectProfileIconId()
    {
        $this->assertSame(3556, $this->summoner->getProfileIconId());
    }

    public function testItWillSetCorrectRevisionDate()
    {
        $this->assertSame(1544046420000, $this->summoner->getRevisionDate());
    }
}