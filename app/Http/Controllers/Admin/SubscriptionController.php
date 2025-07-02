<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $user = Auth::user();
        $topicId = $request->input('topic_id');

        $subscription = new Subscription();
        $subscription->user_id = $user->id;
        $subscription->topic_id = $topicId;
        $subscription->save();

        return redirect()->back()->with('success', 'Subscribed successfully!');
    }

    public function unsubscribe(Request $request)
    {
        $user = Auth::user();
        $topicId = $request->input('topic_id');

        Subscription::where('user_id', $user->id)->where('topic_id', $topicId)->delete();

        return redirect()->back()->with('success', 'Unsubscribed successfully!');
    }
}
