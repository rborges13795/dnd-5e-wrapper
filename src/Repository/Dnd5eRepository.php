<?php
namespace Dnd5eApi\Repository;

use GuzzleHttp\Client;

abstract class Dnd5eRepository
{
    private string $uri = 'https://www.dnd5eapi.co/api/';
    protected $client;
    protected string $name;
    protected string $index;
    
    public function __construct() {
        $this->client = new Client(['base_uri' => $this->uri]);
    }
    
    public function getIndex()
    {
        return $this->index;
    }
    
    public function setIndex($index)
    {
        $this->index = $index;
        return $this;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
        return $this;
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

