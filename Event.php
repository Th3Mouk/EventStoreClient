<?php

/*
 * (c) Jérémy Marodon <marodon.jeremy@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Th3Mouk\EventStoreClient;

class Event
{
    const DEFAULT_EVENT_TYPE = 'event_type';

    /** @var string */
    private $id;

    private $type = self::DEFAULT_EVENT_TYPE;

    private $data = [];

    private $metadata = [];

    public function getId(): string
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): Event
    {
        $this->type = $type;
        return $this;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): Event
    {
        $this->data = $data;
        return $this;
    }

    public function getMetadata(): array
    {
        return $this->metadata;
    }

    public function setMetadata(array $metadata): Event
    {
        $this->metadata = $metadata;
        return $this;
    }
}
