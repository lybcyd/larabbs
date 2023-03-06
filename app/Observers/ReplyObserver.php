<?php

namespace App\Observers;

use App\Models\Reply;
use Mews\Purifier\Facades\Purifier;

class ReplyObserver
{
    /**
     * Handle the Reply "created" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function created(Reply $reply)
    {
        $reply->topic->reply_count = $reply->topic->replies->count();
        $reply->topic->save();
    }

    public function saving(Reply $reply)
    {
        $reply->content = Purifier::clean($reply->content);
    }
}
