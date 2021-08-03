<?php

namespace App\Services\Contracts;

interface Newsletter
{
    public function subscribe(string $email, string $list = null);
}
