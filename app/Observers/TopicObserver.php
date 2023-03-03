<?php

namespace App\Observers;

use App\Models\Topic;
use Mews\Purifier\Facades\Purifier;

class TopicObserver
{
    public function saving(Topic $topic)
    {
        $topic->body = Purifier::clean($topic->body);
        $topic->excerpt = $this->make_excerpt($topic->body);
    }

    private function make_excerpt($value, $length = 200)
    {
        $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
        return str()->limit($excerpt, $length);
    }
}
