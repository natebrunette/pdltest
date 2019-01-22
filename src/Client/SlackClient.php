<?php
/*
 * Copyright (c) Nate Brunette.
 * Distributed under the MIT License (http://opensource.org/licenses/MIT)
 */

declare(strict_types=1);

namespace App\Client;

use App\Model\SlackRequest;
use Tebru\Retrofit\Annotation\Body;
use Tebru\Retrofit\Annotation\Headers;
use Tebru\Retrofit\Annotation\POST;
use Tebru\Retrofit\Call;

interface SlackClient
{
    /**
     * @POST("/api/chat.postMessage")
     * @Headers({"content-type: application/json; charset=UTF-8"})
     * @Body("slackRequest")
     *
     * @param SlackRequest $slackRequest
     * @return mixed
     */
    public function sendMessage(SlackRequest $slackRequest): Call;
}
