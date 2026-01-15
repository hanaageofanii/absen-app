<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $r){
        Feedback::create([
            'from_user'=>session('user_id'),
            'to_employee'=>$r->to,
            'category'=>$r->category,
            'message'=>$r->message,
            'anonymous'=>$r->anonymous ?? false
        ]);

        return response()->json(['success'=>true]);
    }

    public function index(){
        return Feedback::where('from_user', session('user_id'))
            ->latest()
            ->get();
    }
}