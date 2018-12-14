<?php
/**
 * Created by PhpStorm.
 * User: Altz
 * Date: 14/12/2018
 * Time: 10:09
 */

namespace App\Application\Http;


use GuzzleHttp\Client;

abstract class BaseHttpClient
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getRequest(string $path, $params = [])
    {
        $response = $this->client->get(
            $this->pathToUrl($path, $params)
        )->getBody()->getContents();

        return json_decode($response);
    }

    public function pathToUrl(string $path, array $params = []): string
    {
        return sprintf('%s%s', $this->getBaseUrl(), $this->replaceInPath($path, $params));
    }

    public function replaceInPath(string $path, array $params): string
    {
        foreach ($params as $paramName => $paramValue) {
            $path = preg_replace('/{' . $paramName . '}/i', $paramValue, $path);
        }

        return $path;
    }

    abstract function getBaseUrl();

}