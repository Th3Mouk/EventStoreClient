<?php

/*
 * (c) Jérémy Marodon <marodon.jeremy@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Th3Mouk\EventStoreClient;

class Headers
{
    /**
     * The expected version of the stream (allows optimistic concurrency)
     */
    const EXPECTED_VERSION = 'ES-ExpectedVersion';

    /**
     * Whether to resolve linkTos in stream
     */
    const RESOLVE_LINK_TO = 'ES-ResolveLinkTo';

    /**
     * Whether this operation needs to run on the master node
     */
    const REQUIRES_MASTER = 'ES-RequiresMaster';

    /**
     * Allows a trusted intermediary to handle authentication
     */
    const TRUSTED_AUTH = 'ES-TrustedAuth';

    /**
     * Instructs the server to do a long poll operation on a stream read
     */
    const LONG_POLL = 'ES-LongPoll';

    /**
     * Instructs the server to hard delete the stream when deleting as opposed
     * to the default soft delete
     */
    const HARD_DELETE = 'ES-HardDelete';

    /**
     * Instructs the server the event type associated to a posted body
     */
    const EVENT_TYPE = 'ES-EventType';

    /**
     * Instructs the server the event id associated to a posted body
     */
    const EVENT_ID = 'ES-EventId';
}
