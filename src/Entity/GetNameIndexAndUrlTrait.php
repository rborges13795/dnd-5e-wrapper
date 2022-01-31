<?php
namespace Dnd5eApi\Entity;

trait GetNameIndexAndUrlTrait
{

    private string $name = "";

    private string $index = "";

    public function getIndex(): string
    {
        return $this->index;
    }

    public function setIndex(string $index)
    {
        $this->index = $index;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function getUrl(): string
    {
        try {
            $this->index;
        } catch (\Error $e) {
            return $this->uri;
        }
        return $this->uri . $this->index;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function all(): array
    {
        return $this->repository->all($this->uri);
    }

    public function allFirstCharUppercase($uri = ''): array
    {
        return $this->repository->allFirstCharUppercase();
    }
}

