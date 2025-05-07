<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Events\NewCommentEvent;

class CommentController extends Controller
{
    public function fetchMessages()
    {
        $authUserId = auth()->id();
        $messages = Comment::with('sender')->orderBy('created_at', 'asc')->get();

        $formattedMessages = $messages->map(function ($message) use ($authUserId) {
            return [
                'user' => ($message->sender_id === $authUserId)
                    ? 'You'
                    : ($message->sender->first_name . ' ' . $message->sender->last_name ?? 'Unknown User'),
                'time' => $message->created_at->format('H:i A'),
                'text' => $message->message
            ];
        });

        return response()->json($formattedMessages);
    }

    // Send a message
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $receiverId = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->first();

        $message = Comment::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $receiverId->id,
            'message' => $request->message,
        ]);

        return response()->json(['message' => 'Message sent successfully', 'data' => $message]);
    }
}
