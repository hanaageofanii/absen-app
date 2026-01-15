<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function store(Request $r){
        $r->validate([
            'activity'=>'required',
            'date'=>'required|date'
        ]);

        $filePath = null;

        if($r->hasFile('file')) {
            $filePath = $r->file('file')->store('reports', 'public');
        }

        Report::create([
            'user_id'=>session('user_id'),
            'report_date'=>$r->date,
            'activity'=>$r->activity,
            'file'=>$filePath
        ]);

        return response()->json(['success'=>true]);
    }

    public function index(){
        return Report::where('user_id', session('user_id'))
            ->latest()
            ->get();
    }
}
