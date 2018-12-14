<?php
/**
 * Created by PhpStorm.
 * User: Altz
 * Date: 14/12/2018
 * Time: 10:17
 */

namespace App\Tests\Application\Http;


use App\Application\Http\BaseHttpClient;
use App\Application\Http\RiotApiClient;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class RiotApiClientTest extends TestCase
{
    /** @var RiotApiClient */
    private $apiClient;

    public function setUp()
    {
        $this->apiClient = new RiotApiClient($this->createMock(Client::class));
    }

    public function testItWillBeAnInstanceOfBaseHttpClient()
    {
        $this->assertInstanceOf(BaseHttpClient::class, $this->apiClient);
    }

    /**
     * @param string $expected
     * @param string $path
     * @param array $params
     *
     * @dataProvider provideDifferentCasesForReplaceInPath
     * @dataProvider provideRealDataForReplaceInPath
     */
    public function testReplaceInPathWillReplacePlaceholdersWithCorrectParams(string $expected, string $path, array $params)
    {
        $this->assertSame(
            $expected,
            $this->apiClient->replaceInPath($path, $params)
        );
    }

    /**
     * @param string $expected
     * @param string $path
     * @param array $params
     *
     * @dataProvider provideRealDataForPathToUrl
     */
    public function testPathToUrlWillReturnFullPathWithCorrectParams(string $expected, string $path, array $params)
    {
        $this->assertSame(
            $expected,
            $this->apiClient->pathToUrl($path, $params)
        );
    }

    public function provideRealDataForReplaceInPath()
    {
        return [
            [
                '/lol/summoner/v4/summoners/by-account/9WlrEBP3qec2NoL9VXGeRfSQYNA6D2a38TXEcI8CxV_t4_5',
                '/lol/summoner/v4/summoners/by-account/{encryptedAccountId}',
                [
                    'encryptedAccountId' => '9WlrEBP3qec2NoL9VXGeRfSQYNA6D2a38TXEcI8CxV_t4_5',
                ]
            ],
            [
                '/lol/summoner/v4/summoners/by-name/NyxWulf',
                '/lol/summoner/v4/summoners/by-name/{summonerName}',
                [
                    'summonerName' => 'NyxWulf'
                ]
            ],
            [
                '/lol/summoner/v4/summoners/by-puuid/_PSLqFcfPjjonQrGHh3umDIbh68JFWgWo4o4RRhF2swRh6LC-9htVNKDddLIzy2cg41HfSwiyBRwHA',
                '/lol/summoner/v4/summoners/by-puuid/{encryptedPUUID}',
                [
                    'encryptedPUUID' => '_PSLqFcfPjjonQrGHh3umDIbh68JFWgWo4o4RRhF2swRh6LC-9htVNKDddLIzy2cg41HfSwiyBRwHA',
                ]
            ],
            [
                '/lol/summoner/v4/summoners/9WXGeRfL9V2a38TXESQYNA6DlrEBP3qec2NocI8Cx',
                '/lol/summoner/v4/summoners/{encryptedSummonerId}',
                [
                    'encryptedSummonerId' => '9WXGeRfL9V2a38TXESQYNA6DlrEBP3qec2NocI8Cx',
                ]
            ],
            [
                '/lol/match/v4/matches/2090644923',
                '/lol/match/v4/matches/{matchId}',
                [
                    'matchId' => 2090644923,
                ]
            ],
            [
                '/lol/match/v4/matchlists/by-account/9WlrEBP3qec2NoL9VXGeRfSQYNA6D2a38TXEcI8CxV_t4_5',
                '/lol/match/v4/matchlists/by-account/{encryptedAccountId}',
                [
                    'encryptedAccountId' => '9WlrEBP3qec2NoL9VXGeRfSQYNA6D2a38TXEcI8CxV_t4_5',
                ]
            ],

        ];
    }

    public function provideDifferentCasesForReplaceInPath()
    {
        return [
            [
                '/lol/summoner/v4/summoners/by-account/9WlrEBP3qec2NoL9VXGeRfSQYNA6D2a38TXEcI8CxV_t4_5',
                '/lol/summoner/v4/summoners/by-account/{encryptedAccountId}',
                [
                    'encryptedAccountId' => '9WlrEBP3qec2NoL9VXGeRfSQYNA6D2a38TXEcI8CxV_t4_5',
                    'additionalParameterThatDoesNotExistInPath' => 'lrElrEBP3qec2NoL9lrEBP3qec2NoL9VXGeRfSQVXGeRfSQBP3qec2NoL9VXGeRfSQ',
                ]
            ],
            [
                '/lol/match/v4/matches/2090644923',
                '/lol/match/v4/matches/{integerParameter}',
                [
                    'integerParameter' => 2090644923,
                ]
            ],
            [
                '/lol/match/v4/parameter-one/parameter-two/parameter-three/something',
                '/lol/match/v4/{param1}/{param2}/{param3}/something',
                [
                    'param1' => 'parameter-one',
                    'param2' => 'parameter-two',
                    'param3' => 'parameter-three',
                ]
            ],
            [
                '/lol/match/v4/parameter-one/2/parameter-three/something',
                '/lol/match/v4/{param1}/{param2AsInteger}/{param3}/something',
                [
                    'param1' => 'parameter-one',
                    'param2AsInteger' => 2,
                    'param3' => 'parameter-three',
                ]
            ]
        ];
    }

    public function provideRealDataForPathToUrl()
    {
        return [
            [
                'https://eun1.api.riotgames.com/lol/summoner/v4/summoners/by-account/9WlrEBP3qec2NoL9VXGeRfSQYNA6D2a38TXEcI8CxV_t4_5',
                '/lol/summoner/v4/summoners/by-account/{encryptedAccountId}',
                [
                    'encryptedAccountId' => '9WlrEBP3qec2NoL9VXGeRfSQYNA6D2a38TXEcI8CxV_t4_5',
                ]
            ],
            [
                'https://eun1.api.riotgames.com/lol/summoner/v4/summoners/by-name/NyxWulf',
                '/lol/summoner/v4/summoners/by-name/{summonerName}',
                [
                    'summonerName' => 'NyxWulf'
                ]
            ],
            [
                'https://eun1.api.riotgames.com/lol/summoner/v4/summoners/by-puuid/_PSLqFcfPjjonQrGHh3umDIbh68JFWgWo4o4RRhF2swRh6LC-9htVNKDddLIzy2cg41HfSwiyBRwHA',
                '/lol/summoner/v4/summoners/by-puuid/{encryptedPUUID}',
                [
                    'encryptedPUUID' => '_PSLqFcfPjjonQrGHh3umDIbh68JFWgWo4o4RRhF2swRh6LC-9htVNKDddLIzy2cg41HfSwiyBRwHA',
                ]
            ],
            [
                'https://eun1.api.riotgames.com/lol/summoner/v4/summoners/9WXGeRfL9V2a38TXESQYNA6DlrEBP3qec2NocI8Cx',
                '/lol/summoner/v4/summoners/{encryptedSummonerId}',
                [
                    'encryptedSummonerId' => '9WXGeRfL9V2a38TXESQYNA6DlrEBP3qec2NocI8Cx',
                ]
            ],
            [
                'https://eun1.api.riotgames.com/lol/match/v4/matches/2090644923',
                '/lol/match/v4/matches/{matchId}',
                [
                    'matchId' => 2090644923,
                ]
            ],
            [
                'https://eun1.api.riotgames.com/lol/match/v4/matchlists/by-account/9WlrEBP3qec2NoL9VXGeRfSQYNA6D2a38TXEcI8CxV_t4_5',
                '/lol/match/v4/matchlists/by-account/{encryptedAccountId}',
                [
                    'encryptedAccountId' => '9WlrEBP3qec2NoL9VXGeRfSQYNA6D2a38TXEcI8CxV_t4_5',
                ]
            ],

        ];
    }
}