<?php
namespace Dnd5eApi\Repository;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class Dnd5eRepository
{
    private $client;
    
    public function __construct(string $uri = 'https://www.dnd5eapi.co/api/') {
        $this->client = new Client(['base_uri' => $uri]);
    }
    
    public function get($uri = ''): array
    {
        if (strpos($uri, '_')) {
            $uri = str_replace('_', '-', $uri);
        }
        try {
            $response = $this->client->get(strtolower($uri))->getBody()->getContents();
        } catch (ClientException $e) {
            throw new ClientException("Information on '" . $uri . "' not found.", $e->getRequest(), $e->getResponse());
        }
        return json_decode($response, true);
    }
    
    public function all($uri = ''): array
    {
        $results = $this->get($uri);
        foreach ($results['results'] as $value) {
            $response[] = $value['index'];
        }
        return $response;
    }
    
    public function allFirstCharUppercase($uri = ''): array
    {
        $results = $this->get($uri);
        foreach ($results['results'] as $value) {
            $response[] = $value['name'];
        }
        return $response;
    }
    
}

