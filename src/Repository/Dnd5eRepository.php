<?php
namespace Dnd5eApi\Repository;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

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
    
    protected function get($uri = ''): array
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
    
    public function __call($index, $args)
    {
        return $this->get($index);
    }
}

