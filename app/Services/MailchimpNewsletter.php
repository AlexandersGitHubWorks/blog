<?php

namespace App\Services;

use App\Services\Contracts\Newsletter;
use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter
{
    protected $client;

    public function __construct(ApiClient $apiClient)
    {
        $this->client = $apiClient->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => config('services.mailchimp.prefix'),
        ]);
    }

    public function subscribe(string $email, string $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers');

        $this->client->lists->addListMember($list, [
            "email_address" => $email,
            "status"        => "subscribed",
        ]);
    }
}
