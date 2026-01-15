<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\Company;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    public function store(Request $r){
        $company = Company::findOrFail($r->company);

        $count = Letter::where('company_id', $company->id)
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->count() + 1;

        $no = str_pad($count, 3, '0', STR_PAD_LEFT);
        $bulan = date('m');
        $tahun = date('Y');

        $number = "$no/{$company->code}/HRD/$bulan/$tahun";

        Letter::create([
            'user_id'=>session('user_id'),
            'company_id'=>$company->id,
            'letter_number'=>$number,
            'letter_date'=>$r->date,
            'subject'=>$r->subject,
            'letter_to'=>$r->to
        ]);

        return response()->json(['success'=>true]);
    }

    public function index(){
        return Letter::with('company')
            ->where('user_id', session('user_id'))
            ->latest()
            ->get();
    }
}
