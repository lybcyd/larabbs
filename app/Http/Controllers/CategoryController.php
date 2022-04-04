<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;

class CategoryController extends Controller
{
    public function show(Request $request, Category $category)
    {
        $topics = Topic::withOrder($request->order)->where('category_id', $category->id)->with('user', 'category')->paginate(20);
        return view('topics.index', compact('topics', 'category'));
    }
}
