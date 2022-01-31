<?php
namespace Dnd5eApi\Entity;

use GuzzleHttp\Client;
use Dnd5eApi\Repository\Dnd5eRepository;
use Dnd5eApi\Factory\SubclassesFactory;

class Subclasses extends Dnd5eRepository
{

    protected string $uri = 'https://www.dnd5eapi.co/api/subclasses/';

    private array $class;

    private string $subclassFlavor;

    private array $description;

    private string $subclassLevels;

    protected SubclassesFactory $factory;
    use GetNameIndexAndUrlTrait;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->uri
        ]);
        $this->factory = new SubclassesFactory();
    }

    public function __call($index, $args)
    {
        $entityFactory = $this->factory;
        return $entityFactory->create($this->get(strtolower($index)));
    }

    public function getClass(): array
    {
        return $this->class;
    }

    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }

    public function getSubclassFlavor(): string
    {
        return $this->subclassFlavor;
    }

    public function setSubclassFlavor($subclassFlavor)
    {
        $this->subclassFlavor = $subclassFlavor;
        return $this;
    }

    public function getDescription(): array
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getSubclassLevels(): string
    {
        return $this->subclassLevels;
    }

    public function setSubclassLevels($subclassLevels)
    {
        $this->subclassLevels = $subclassLevels;
        return $this;
    }

}
