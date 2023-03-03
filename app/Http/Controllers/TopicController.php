<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicRequest;
use App\Models\Topic;
use App\Models\Category;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $topics = Topic::withOrder($request->order)->with('user', 'category')->paginate(20);
        return view('topics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $topic = new Topic();
        return view('topics.form', compact('topic', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTopicRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopicRequest $request)
    {
        $validated = $request->validated();
        $topic = new Topic();
        $topic->fill($validated);
        $topic->user_id = Auth::id();
        $topic->save();

        return redirect()->route('topics.show', $topic->id)->with('success', '帖子创建成功！');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTopicRequest  $request
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(TopicRequest $request, Topic $topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        //
    }

    public function uploadImage(Request $request, ImageService $service)
    {
        $data = [
            'errno' => 1,
            'message' => '上传失败!'
        ];
        if ($file = $request->file('wangeditor-uploaded-image')) {
            $result = $service->save($file, 'topics', 1024, false);
            if ($result) {
                $data = [
                    'errno' => 0,
                    'data' => [
                        'url' => $result
                    ],
                ];
            }
        }
        return $data;
    }
}
