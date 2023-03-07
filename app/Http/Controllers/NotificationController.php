<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        /** @var \App\Models\User */
        $user = Auth::user();
        $notifications = $user->notifications()->paginate(20);
        $user->markAsRead();
        return view('notifications.index', compact('notifications'));
    }
}
