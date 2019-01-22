<?php
/*
 * Copyright (c) Nate Brunette.
 * Distributed under the MIT License (http://opensource.org/licenses/MIT)
 */

declare(strict_types=1);

namespace App\Model;

class Interaction
{
    private $channelId;

    /**
     * @var string
     */
    private $callbackId;

    /**
     * @var string
     */
    private $searchText;

    /**
     * @var string
     */
    private $messageTs;

    /**
     * @return mixed
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * @param mixed $channelId
     * @return void
     */
    public function setChannelId($channelId): void
    {
        $this->channelId = $channelId;
    }

    /**
     * @return string
     */
    public function getCallbackId(): string
    {
        return $this->callbackId;
    }

    /**
     * @param string $callbackId
     * @return Interaction
     */
    public function setCallbackId(string $callbackId): Interaction
    {
        $this->callbackId = $callbackId;

        return $this;
    }

    /**
     * @return string
     */
    public function getSearchText(): string
    {
        return $this->searchText;
    }

    /**
     * @param string $userId
     * @param string $searchText
     * @return Interaction
     */
    public function setSearchText(string $userId, string $searchText): Interaction
    {
        $this->searchText = '@'.$userId.': /pdl '.$searchText;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessageTs(): string
    {
        return $this->messageTs;
    }

    /**
     * @param string $messageTs
     * @return Interaction
     */
    public function setMessageTs(string $messageTs): Interaction
    {
        $this->messageTs = $messageTs;

        return $this;
    }
}
