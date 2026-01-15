<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function clockIn(){
        // Cek apakah sudah absen hari ini
        $existing = Attendance::where('user_id', session('user_id'))
            ->whereDate('date', date('Y-m-d'))
            ->first();

        if($existing) {
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah absen masuk hari ini'
            ]);
        }

        Attendance::create([
            'user_id'=>session('user_id'),
            'date'=>date('Y-m-d'),
            'clock_in'=>date('H:i:s')
        ]);

        return response()->json(['success'=>true]);
    }

    public function clockOut(){
        $att = Attendance::where('user_id', session('user_id'))
            ->whereDate('date', date('Y-m-d'))
            ->first();

        if(!$att) {
            return response()->json([
                'success' => false,
                'message' => 'Anda belum absen masuk'
            ]);
        }

        if($att->clock_out) {
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah absen pulang'
            ]);
        }

        // Hitung jam kerja
        $clockIn = Carbon::parse($att->date . ' ' . $att->clock_in);
        $clockOut = Carbon::now();
        $workHours = $clockOut->diffInMinutes($clockIn) / 60;

        $att->update([
            'clock_out'=>date('H:i:s'),
            'work_hours'=>round($workHours, 2)
        ]);

        return response()->json(['success'=>true]);
    }

    public function history(){
        return Attendance::where('user_id', session('user_id'))
            ->latest()
            ->get();
    }
}
