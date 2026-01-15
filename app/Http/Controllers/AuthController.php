<?php
// ========================================
// 1. AuthController.php
// ========================================

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginPage(){
        return view('auth.login');
    }

    public function registerPage(){
        return view('auth.register');
    }

    public function register(Request $r){
        User::create([
            'username'=>$r->username,
            'email'=>$r->email,
            'password'=>Hash::make($r->password),
            'role'=>'user' // default role
        ]);

        return redirect('/login')->with('success','Akun berhasil dibuat');
    }

    public function loginProcess(Request $r)
    {
        $user = User::where('username',$r->username)->first();

        if(!$user){
            return back()->with('error','Akun tidak ditemukan');
        }

        if(!Hash::check($r->password,$user->password)){
            return back()->with('error','Password salah');
        }

        session([
            'login'=>true,
            'user'=>$user->username,
            'user_id'=>$user->id,  // TAMBAHKAN INI - PENTING!
            'role'=>$user->role
        ]);

        return $user->role=='admin'
            ? redirect('/admin')
            : redirect('/dashboard');
    }

    public function adminDashboard(){
        if(!session('login')||session('role')!='admin')
            return redirect('/login');

        return view('admin.dashboard');
    }

    public function userDashboard(){
        if(!session('login')||session('role')!='user')
            return redirect('/login');

        return view('user.dashboard');
    }

    public function logout(){
        session()->flush();
        return redirect('/login');
    }


}
