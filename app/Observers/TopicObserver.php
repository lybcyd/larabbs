<?php

namespace App\Observers;

use App\Jobs\TranslateSlug;
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
    }

    public function saved(Topic $topic)
    {
        if (!$topic->slug) {
            dispatch(new TranslateSlug($topic, $this->slugService));
        }
    }

    private function make_excerpt($value, $length = 200)
    {
        $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
        return str()->limit($excerpt, $length);
    }
}
