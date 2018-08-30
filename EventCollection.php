<?php

/*
 * (c) Jérémy Marodon <marodon.jeremy@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Th3Mouk\EventStoreClient;

class EventCollection
{
    private $collection = [];

    public function add(Event $event): EventCollection
    {
        array_push($this->collection, $event);
        return $this;
    }

    public function getCollection(): array
    {
        return $this->collection;
    }

    public function toArray(): array
    {
        return array_map(
            function (Event $event) {
                return [
                    'eventId' => $event->getId(),
                    'eventType' => $event->getType(),
                    'data' => $event->getData(),
                    'metadata' => $event->getMetadata(),
                ];
            },
            $this->collection
        );
    }
}
