<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNotificationRequest;
use App\Models\Notification as NotificationModel;
use App\Models\User;
use App\Notifications\SendNotifyToUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{

    public $notifyType = ['marketing', 'invoices', 'system'];

    public function index()
    {
        $data = NotificationModel::with('users')->select('data', 'read_at', 'notifiable_id')->get()->toArray();
        return view('notifications.index', compact('data'));
    }

    /**
     * post create page 
     */

    public function create()
    {
        $userlist = User::get();
        $notifyType = $this->notifyType;
        return view('notifications.create', compact('userlist', 'notifyType'));
    }

    public function sendNotification(StoreNotificationRequest $req)
    {
        try {
            $usewrSchema = User::whereIn('id', $req->user_ids)->where('notification', 1)->get();
            $offerData = [
                'notification_type' => $req->notification_type,
                'content' => $req->content,
                'exp_time' => $req->exp_time
            ];
            Notification::send($usewrSchema, new SendNotifyToUser($offerData));
            return redirect()->route('notifications.index')->with('success', 'Notification send successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function markAsRead(Request $request, $id)
    {
        try {
            $notification = $request->user()->notifications()->where('id', $id)->first();
            if ($notification) {
                $notification->markAsRead();
                return redirect()->route('notifications.index')->with('success', 'Thanks for the Read');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }


    /**
     * chsnge status
     *
     */
    public function changeStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->notification = $request->status;
        $user->save();
        return response()->json(['success' => 'Notification status change successfully.']);
    }
}
