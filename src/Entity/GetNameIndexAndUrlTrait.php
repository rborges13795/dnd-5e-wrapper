<?php
namespace Dnd5eApi\Entity;

trait GetNameIndexAndUrlTrait
{
    private string $name;
    private string $index;
    
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
    
    public function getUrl()
    {
        return $this->uri . $this->getIndex();
    }
    
}

