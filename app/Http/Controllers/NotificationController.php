<?php

namespace App\Http\Controllers;

use App\Services\FirebaseService;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    protected $firebaseService;

    public function __construct(FirebaseService $firebaseService)
    {
        $this->firebaseService = $firebaseService;
    }

    public function send(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'device_token' => 'required|string',
        ]);

        $title = $request->input('title');
        $body = $request->input('body');
        $deviceToken = $request->input('device_token');

        $this->firebaseService->sendNotification($title, $body, $deviceToken);

        return response()->json(['message' => 'Notification sent successfully!']);
    }
}
