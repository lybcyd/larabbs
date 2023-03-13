<?php

namespace App\Observers;

use App\Models\Link;
use Illuminate\Support\Facades\Cache;

class LinkObserver
{
    public function saved(): void
    {
        Cache::forget(Link::$cache_key);
    }
}
