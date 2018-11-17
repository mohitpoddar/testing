<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NotificationsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($filter){
        switch ($filter) {
            case 'unread':
                $title= __('Unread notifications');
                return view('notifications', ['filterread' => 'unread', 'title' => $title]);
                break;
            case 'all':
                $title= __('All notifications');
                return view('notifications', ['filterread' => 'all', 'title' => $title]);
                break;
        }
    }

    public function delete($id){
        $notification = Auth::user()->notifications()->findOrFail($id);
        $notification->delete();
        return back();
    }

    public function markasread($id){
        $notification = Auth::user()->notifications()->findOrFail($id);
        $notification->markAsRead();
        return back();
    }

    public function markasunread($id){
        $notification = Auth::user()->notifications()->findOrFail($id);
        $notification->markAsUnread();
        return back();
    }
}
