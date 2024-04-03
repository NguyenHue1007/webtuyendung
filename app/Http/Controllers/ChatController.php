<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Job;
use App\Models\Employer;
use App\Models\User;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class ChatController extends Controller
{
    public function indexUser(Employer $employer)
    {
        $userId = Auth::user()->id;
        $messagesSentByUser = Message::where('sender_id', $userId)
            ->where('receiver_id', $employer->id)
            ->get();

        $messagesReceivedByUser = Message::where('sender_id', $employer->id)
            ->where('receiver_id', $userId)
            ->get();

            $allMessages = $messagesSentByUser->merge($messagesReceivedByUser)->sortBy('created_at');

        return view('chats', compact('employer', 'allMessages'));
    }

    public function indexEmployer(User $user)
    {
        $employerId = Auth::guard('employer')->user()->id;
        $messagesSentByEmployer = Message::where('sender_id', $employerId)
            ->where('receiver_id', $user->id)
            ->get();

        $messagesReceivedByEmployer = Message::where('sender_id', $user->id)
            ->where('receiver_id', $employerId)
            ->get();

        $allMessages = $messagesSentByEmployer->merge($messagesReceivedByEmployer)->sortBy('created_at');

        return view('chats2', compact('user', 'allMessages'));
    }

    public function sendMessageToEmployer(Request $request)
    {

        $message = new Message();
        $message->sender_id = Auth::user()->id;
        $message->sender_type = 'user';
        $message->receiver_id = $request->input('receiver_id');
        $message->receiver_type = 'employer';
        $message->message = $request->input('message');
        $message->save();

        return redirect()->back();
    }
    public function sendMessageToUser(Request $request)
    {
        $message = new Message();
        $message->sender_id = Auth::guard('employer')->user()->id;
        $message->sender_type = 'employer';
        $message->receiver_id = $request->input('receiver_id');
        $message->receiver_type = 'user';
        $message->message = $request->input('message');
        $message->save();

        return redirect()->back();
    }

    public function fetchNewMessages()
    {
        // Code để lấy tin nhắn mới từ cơ sở dữ liệu, ví dụ:
        $newMessages = Message::where('created_at', '>', Carbon::now()->subSeconds(30))->get();

        return response()->json(['messages' => $newMessages]);
    }
}
