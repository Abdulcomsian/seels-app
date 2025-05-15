<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Events\NewCommentEvent;
use App\Events\NewCommentPosted;
use App\Models\EmailFormat;

class CommentController extends Controller
{
    public function fetchMessages($emailFormatId)
    {
        $authUserId = auth()->id();
        $messages = Comment::where('email_format_id', $emailFormatId)->with('sender')->orderBy('created_at', 'asc')->get();

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
            'emailFormatId' => 'required',
            'message' => 'required|string',
        ]);



        if(auth()->user()->hasRole('admin'))
        {
            $emailFormat = EmailFormat::find($request->emailFormatId);
            $receiverId = $emailFormat->user_id;
        }
        else
        {


        $receiver = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->first();
        $receiverId = $receiver->id;
    }

        $message = Comment::create([
            'email_format_id' => $request->emailFormatId,
            'sender_id' => auth()->id(),
            'receiver_id' => $receiverId,
            'message' => $request->message,
        ]);

        $result = Comment::with('sender','receiver')->orderBy('created_at', 'asc')->find($message->id);

        $data = [
            'email_format_id' => $message->email_format_id,
            'user' => 'You',
            'time' => $result->created_at->format('H:i A'),
            'text' => $result->message
        ];

        $broadCastData = [
            'email_format_id' => $message->email_format_id,
            'user' => $result?->sender?->first_name . ' ' . $result?->sender?->last_name ?? 'Unknown User',
            'time' => $result->created_at->format('H:i A'),
            'text' => $result->message
        ];
        broadcast(new NewCommentPosted($broadCastData))->toOthers();

        return response()->json(['message' => 'Message sent successfully', 'data' => $data]);
    }
}
