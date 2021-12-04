<?php
namespace Dnd5eApi\Repository;

use GuzzleHttp\Client;

abstract class Dnd5eRepository
{
    private string $uri = 'https://www.dnd5eapi.co/api/';
    protected $client; 
    
    public function __construct() {
        $this->client = new Client(['base_uri' => $this->uri]);
    }
    
    public function get($uri = ''): array
    {
        $response = $this->client->get($uri)->getBody()->getContents();
        return json_decode($response, true);
    }
    
    public function all(): array
    {
        $results = $this->get();
        foreach ($results['results'] as $value) {
            $response[] = $value['index'];
        }
        return $response;
    }
    
    //take care of '-' in index
    public function __call($index, $args)
    {
        return $this->get(strtolower($index));
    }
}

