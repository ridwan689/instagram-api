<?php

namespace Instagram\SDK\Requests\Traits;

use Instagram\SDK\Client\Client;
use Instagram\SDK\DTO\Messages\Feed\FeedMessage;
use Instagram\SDK\Support\Promise;

/**
 * Trait MakeFeedRequestsAccessible
 *
 * @package Instagram\SDK\Requests\Traits
 */
trait MakeFeedRequestsAccessible
{

    /**
     * @var int The hashtag feed type
     */
    public static $TYPE_FEED_HASHTAG = 1;

    /**
     * @var int The user feed type
     */
    public static $TYPE_FEED_USER = 2;

    /**
     * Retrieves feed by hashtag.
     *
     * @param string $tag
     * @return FeedMessage|Promise
     * @throws \Exception
     */
    public function feedByHashtag(string $tag)
    {
        return $this->feed(self::$TYPE_FEED_HASHTAG, $tag);
    }

    /**
     * Retrieves feed by user.
     *
     * @param string $user
     * @return FeedMessage|Promise
     * @throws \Exception
     */
    public function feedByUser(string $user)
    {
        return $this->feed(self::$TYPE_FEED_USER, $user);
    }

    /**
     * Retrieves feed by type.
     *
     * @param int         $type
     * @param string      $query
     * @param string|null $maxId
     * @return FeedMessage|Promise<FeedMessage>
     * @throws \Exception
     */
    public function feed(int $type, string $query, ?string $maxId = null)
    {
        return $this->getClient()->feed($type, $query, $maxId);
    }

    /**
     * Returns the client.
     *
     * @return Client
     */
    abstract protected function getClient(): Client;
}