<?php

namespace App\Model;

use JsonSerializable;

/**
 * Class CategoryModel
 */
class CategoryModel implements JsonSerializable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $key;

    /**
     * @var CategoryModel[]
     */
    private $items;

    /**
     * CategoryModel constructor.
     *
     * @param string $name
     * @param string $key
     * @param array  $items
     */
    public function __construct(string $name, string $key, array $items)
    {
        $this->name = $name;
        $this->key = $key;
        $this->items = $items;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'name'  => $this->name,
            'key'   => $this->key,
            'items' => $this->items,
        ];
    }
}
