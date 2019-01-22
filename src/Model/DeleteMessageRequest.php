<?php
/*
 * Copyright (c) Nate Brunette.
 * Distributed under the MIT License (http://opensource.org/licenses/MIT)
 */

declare(strict_types=1);

namespace App\Model;

/**
 * Class DeleteRequest
 *
 * @author Nate Brunette <n@tebru.net>
 */
class DeleteMessageRequest
{
    /**
     * @var string
     */
    private $channel;
    /**
     * @var string
     */
    private $timestamp;

    public function __construct(string $channel, string $timestamp)
    {
        $this->channel = $channel;
        $this->timestamp = $timestamp;
    }

    /**
     * @return string
     */
    public function getChannel(): string
    {
        return $this->channel;
    }

    /**
     * @return string
     */
    public function getTimestamp(): string
    {
        return $this->timestamp;
    }
}
