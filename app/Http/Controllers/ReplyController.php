<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReplyRequest;
use App\Models\Reply;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Reply::class, 'reply');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReplyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReplyRequest $request)
    {
        $reply = new Reply;
        $reply->content = $request->content;
        $reply->user_id = Auth::id();
        $reply->topic_id = $request->topic_id;
        $reply->save();

        return redirect()->to($reply->topic->link())->with('success', '评论创建成功！');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        $reply->delete();
        return redirect()->to($reply->topic->link())->with('success', '评论删除成功！');
    }
}
