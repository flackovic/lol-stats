<?php
/**
 * Created by PhpStorm.
 * User: Altz
 * Date: 14/12/2018
 * Time: 10:14
 */

namespace App\Application\Http;

use GuzzleHttp\Client;

class RiotApiClient extends BaseHttpClient
{
    const BASE_URL = 'https://eun1.api.riotgames.com';

    const GET_SUMMONER_BY_ENCRYPTED_ACCOUNT_ID = '/lol/summoner/v4/summoners/by-account/{encryptedAccountId}';
    const GET_SUMMONER_BY_NAME = '/lol/summoner/v4/summoners/by-name/{summonerName}';
    const GET_SUMMONER_BY_ENCRYPTED_PUUID = '/lol/summoner/v4/summoners/by-puuid/{encryptedPUUID}';
    const GET_SUMMONER_BY_ENCRYPTED_SUMMONER_ID = '/lol/summoner/v4/summoners/{encryptedSummonerId}';

    const GET_MATCH_BY_ID = '/lol/match/v4/matches/{matchId}';
    const GET_MATCHES_BY_ENCRYPTED_ACCOUNT_ID = '/lol/match/v4/matchlists/by-account/{encryptedAccountId}';

    public function __construct(Client $client)
    {
        parent::__construct($client);
    }

    public function getSummoner(string $summonerName)
    {
        $this->getRequest(self::GET_SUMMONER_BY_NAME, ['summonerName' => $summonerName]);
    }

    public function getBaseUrl()
    {
        return self::BASE_URL;
    }
}