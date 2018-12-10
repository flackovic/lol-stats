<?php

namespace App\Infrastructure\Share\DataFixtures;

use App\Domain\Summoner\Summoner;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SummonerFixture extends Fixture
{

    public function getSummonerData()
    {
        return [
            [
                'puuid' => '_PSLqFcfPjjonQrGHh3umDIbh68JFWgWo4o4RRhF2swRh6LC-9htVNKDddLIzy2cg41HfSwiyBRwHA',
                'remoteId' => 'Fdd80NTM4XkZwcaOuNYFTwdeQrrIlMcv9GyG024uFATBV5U',
                'accountId' => '9WlrEBP3qec2NoL9VXGeRfSQYNA6D2a38TXEcI8CxV_t4_5',
                'name' => 'AnneDL',
                'level' => 827,
                'profileIconId' => 3556,
                'revisionDate' => 1544046420000
            ],
            [
                'puuid' => 'PSLqFcfPjjonQrGH_F2swRh6LC-9htVNKh3umDIbh68JFWgWo4o4RRhDddLIzy2cg41HfSwiyBRwHA',
                'remoteId' => 'FTwdeQrrIlMcdd80NTM4XkZwcaOuNYFv9GyG024uFATBV5U',
                'accountId' => 'QYNA6D2a38T9WlrEBP3qec2NoL9VXGeRfSXEcI8CxV_t4_5',
                'name' => 'NyxWulf',
                'level' => 652,
                'profileIconId' => 3111,
                'revisionDate' => 1544042420000
            ],
        ];
    }

    public function load(ObjectManager $manager)
    {
        foreach ($this->getSummonerData() as $summonerDatum) {
            $summoner = new Summoner(
                $summonerDatum['puuid'],
                $summonerDatum['remoteId'],
                $summonerDatum['accountId'],
                $summonerDatum['name'],
                $summonerDatum['level'],
                $summonerDatum['profileIconId'],
                $summonerDatum['revisionDate'],
            );
            $manager->persist($summoner);
        }

        $manager->flush();
    }
}
