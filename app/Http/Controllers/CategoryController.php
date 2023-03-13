<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;

class CategoryController extends Controller
{
    public function show(Request $request, Category $category, User $user)
    {
        $topics = Topic::withOrder($request->order)->where('category_id', $category->id)
            ->with('user', 'category')->paginate(20);
        $active_users = $user->getActiveUsers();
        $links = Link::getAllCached();
        return view('topics.index', compact('topics', 'category', 'active_users', 'links'));
    }
}
