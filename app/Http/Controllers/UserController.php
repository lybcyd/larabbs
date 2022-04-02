<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Services\ImageService;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, ImageService $imageService, User $user)
    {
        $this->authorize('update', $user);
        $validated = $request->validated();
        if ($request->avatar) {
            $validated['avatar'] = $imageService->save($request->avatar, 'avatars', 400);
        }
        $user->update($validated);
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }
}
