<?php

namespace App\Observers;

use App\Models\Topic;
use App\Services\SlugService;
use Mews\Purifier\Facades\Purifier;

class TopicObserver
{
    private $slugService;

    public function __construct(SlugService $slugService)
    {
        $this->slugService = $slugService;
    }

    public function saving(Topic $topic)
    {
        $topic->body = Purifier::clean($topic->body);
        $topic->excerpt = $this->make_excerpt($topic->body);

        if (!$topic->slug) {
            $topic->slug = $this->slugService->translate($topic->title);
        }
    }

    private function make_excerpt($value, $length = 200)
    {
        $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
        return str()->limit($excerpt, $length);
    }
}
