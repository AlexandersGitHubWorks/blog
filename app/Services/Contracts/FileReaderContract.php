<?php

namespace App\Services\Contracts;

use Illuminate\Support\Collection;

interface FileReaderContract
{
    public function read($path): Collection;
}