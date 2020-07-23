<?php

declare(strict_types=1);

namespace App\Model;

use JsonSerializable;

/**
 * Class GroupModel
 */
final class GroupModel implements JsonSerializable
{
    /**
     * @var string
     */
    private $thumb;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $url;

    /**
     * CommunityModel constructor.
     *
     * @param string      $name
     * @param string      $type
     * @param string      $url
     * @param string|null $thumb
     */
    public function __construct(
        string $name,
        string $type,
        string $url,
        ?string $thumb = ''
    ) {
        $this->thumb = $thumb;
        $this->name = $name;
        $this->type = $type;
        $this->url = $url;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'thumb' => $this->thumb,
            'name'  => $this->name,
            'type'  => $this->type,
            'url'   => $this->url,
        ];
    }
}
