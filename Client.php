<?php

/*
 * (c) Jérémy Marodon <marodon.jeremy@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Th3Mouk\EventStoreClient;

use GuzzleHttp\RequestOptions;

class Client
{
    private $dsn;

    private $http;

    public function __construct($dsn)
    {
        $this->dsn = $dsn;
        $this->http = new \GuzzleHttp\Client();
    }

    /**
     * Metadata are not available with this method
     */
    public function sendEvent(string $stream, Event $event)
    {
        $this->http->post(
            $this->getUrl($stream),
            [
                RequestOptions::HEADERS => [
                    Headers::EVENT_ID => $event->getId(),
                    Headers::EVENT_TYPE => $event->getType(),
                ],
                RequestOptions::JSON => $event->getData(),
            ]
        );
    }

    public function sendCollection(string $stream, EventCollection $collection)
    {
        $this->http->post(
            $this->getUrl($stream),
            [
                RequestOptions::HEADERS => [
                    'Content-type' => 'application/vnd.eventstore.events+json',
                ],
                RequestOptions::BODY => json_encode($collection->toArray()),
            ]
        );
    }

    /**
     * @param bool $wrap This option automatically wrap an unique Event into an
     * EventCollection which allows metadata
     */
    public function send(string $stream, $payload, $wrap = true)
    {
        if (is_a($payload, 'EventCollection')) {
            $this->sendCollection($stream, $payload);
            return;
        }

        if ($wrap) {
            $this->sendCollection(
                $stream,
                (new EventCollection())->add($payload)
            );
            return;
        }

        $this->sendEvent($stream, $payload);
    }

    private function getUrl(string $stream)
    {
        return $this->dsn.'/streams/'.$stream;
    }
}
