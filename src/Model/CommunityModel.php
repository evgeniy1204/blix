<?php

declare(strict_types=1);

namespace App\Model;

use JsonSerializable;

/**
 * Class CommunityModel
 */
final class CommunityModel implements JsonSerializable
{
    /**
     * @var GroupModel
     */
    private $group;

    /**
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $subscribe;

    /**
     * @var int
     */
    private $price;

    /**
     * CommunityModel constructor.
     *
     * @param GroupModel $groupModel
     * @param string     $description
     * @param int        $subscribe
     * @param int        $price
     */
    public function __construct(
        GroupModel $groupModel,
        string $description,
        int $subscribe,
        int $price
    ) {
        $this->group = $groupModel;
        $this->description = $description;
        $this->subscribe = $subscribe;
        $this->price = $price;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'group'       => $this->group,
            'description' => $this->description,
            'subscribe'   => $this->subscribe,
            'price'       => $this->price,
        ];
    }
}
