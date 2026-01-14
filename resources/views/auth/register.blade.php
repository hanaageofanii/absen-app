<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register | Absensi & Laporan Karyawan</title>
<script src="https://cdn.tailwindcss.com"></script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
*{font-family:'Plus Jakarta Sans',sans-serif;}

@keyframes gradient-shift{0%{background-position:0% 50%}50%{background-position:100% 50%}100%{background-position:0% 50%}}
@keyframes float-gentle{0%,100%{transform:translateY(0) rotate(0deg)}50%{transform:translateY(-15px) rotate(2deg)}}
@keyframes slide-in{from{opacity:0;transform:translateX(-30px)}to{opacity:1;transform:translateX(0)}}

.animated-bg{
background:linear-gradient(-45deg,#667eea,#764ba2,#f093fb,#4facfe);
background-size:400% 400%;
animation:gradient-shift 15s ease infinite}

.glass-effect{
background:rgba(255,255,255,0.95);
backdrop-filter:blur(20px);
border:1px solid rgba(255,255,255,0.3)}

.input-modern{
transition:all 0.3s cubic-bezier(0.4,0,0.2,1)}
.input-modern:focus{
transform:translateY(-2px);
box-shadow:0 8px 20px rgba(99,102,241,0.15)}

.btn-gradient{
background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);
transition:all 0.4s ease;
position:relative;
overflow:hidden}
.btn-gradient::before{
content:'';
position:absolute;
top:0;left:-100%;
width:100%;height:100%;
background:linear-gradient(90deg,transparent,rgba(255,255,255,0.4),transparent);
transition:left 0.6s ease}
.btn-gradient:hover::before{left:100%}
.btn-gradient:hover{
transform:translateY(-3px);
box-shadow:0 15px 35px rgba(102,126,234,0.4)}

.label-float{
transition:all 0.3s ease;
pointer-events:none}
.input-modern:focus~.label-float,
.input-modern:not(:placeholder-shown)~.label-float{
top:-10px;left:12px;font-size:12px;font-weight:600;
color:#667eea;background:white;padding:0 8px}

.animate-in{animation:slide-in 0.6s ease-out forwards}
.float-icon{animation:float-gentle 4s ease-in-out infinite}

.decorative-circle{
position:absolute;
border-radius:50%;
background:rgba(255,255,255,0.1);
animation:float-gentle 8s ease-in-out infinite}
</style>
</head>

<body class="min-h-screen flex items-center justify-center p-4 md:p-8 animated-bg">

<div class="w-full max-w-6xl glass-effect rounded-[2rem] shadow-2xl overflow-hidden grid md:grid-cols-5">

<!-- LEFT DECORATIVE PANEL -->
<div class="relative bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 p-8 md:p-12 md:col-span-2 flex flex-col justify-between overflow-hidden">

<!-- Decorative circles -->
<div class="decorative-circle w-64 h-64 top-[-100px] right-[-100px]"></div>
<div class="decorative-circle w-48 h-48 bottom-[-50px] left-[-50px]" style="animation-delay:2s"></div>
<div class="decorative-circle w-32 h-32 top-1/2 left-1/4" style="animation-delay:4s"></div>

<div class="relative z-10 animate-in">
<div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mb-6 float-icon">
<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
</svg>
</div>

<h1 class="text-4xl font-extrabold text-white mb-4 leading-tight">
Daftar Akun Baru<br>
<span class="text-white/80 text-3xl">Bergabung Sekarang</span>
</h1>
<p class="text-white/90 text-lg leading-relaxed">
Buat akun untuk mengakses sistem absensi karyawan
</p>
</div>

<div class="relative z-10 text-white/70 text-sm">
<div class="flex items-center gap-3 mb-3">
<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
</svg>
<span>Pendaftaran Cepat</span>
</div>
<div class="flex items-center gap-3 mb-3">
<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
</svg>
<span>Akses Instan</span>
</div>
<div class="flex items-center gap-3">
<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
</svg>
<span>Data Aman Terenkripsi</span>
</div>
</div>

</div>

<!-- RIGHT REGISTER FORM -->
<div class="p-8 md:p-12 md:col-span-3 flex flex-col justify-center bg-white">

<div class="mb-8 animate-in" style="animation-delay:0.2s">
<h2 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">
Buat Akun Baru
</h2>
<p class="text-gray-500">
Isi informasi di bawah untuk mendaftar
</p>
</div>

{{-- ERROR MESSAGE --}}
@if(session('error'))
<div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-xl mb-6 animate-in flex items-start gap-3" style="animation-delay:0.3s">
<svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
</svg>
<span class="text-sm font-medium">{{ session('error') }}</span>
</div>
@endif

<form method="POST" action="/register" class="space-y-6">
@csrf

<!-- Username Field -->
<div class="relative animate-in" style="animation-delay:0.4s">
<input type="text" name="username" required
class="input-modern w-full px-5 py-4 rounded-2xl bg-gray-50 border-2 border-gray-200 focus:border-indigo-500 focus:bg-white outline-none text-gray-800"
placeholder=" ">
<label class="label-float absolute left-5 top-1/2 -translate-y-1/2 text-gray-500 text-sm bg-gray-50">
Username
</label>
</div>

<!-- Email Field -->
<div class="relative animate-in" style="animation-delay:0.5s">
<input type="email" name="email" required
class="input-modern w-full px-5 py-4 rounded-2xl bg-gray-50 border-2 border-gray-200 focus:border-indigo-500 focus:bg-white outline-none text-gray-800"
placeholder=" ">
<label class="label-float absolute left-5 top-1/2 -translate-y-1/2 text-gray-500 text-sm bg-gray-50">
Email
</label>
</div>

<!-- Password Field -->
<div class="relative animate-in" style="animation-delay:0.6s">
<input type="password" name="password" id="password" required
class="input-modern w-full px-5 py-4 pr-14 rounded-2xl bg-gray-50 border-2 border-gray-200 focus:border-indigo-500 focus:bg-white outline-none text-gray-800"
placeholder=" ">
<label class="label-float absolute left-5 top-1/2 -translate-y-1/2 text-gray-500 text-sm bg-gray-50">
Password
</label>

<button type="button" onclick="togglePassword()"
class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-indigo-600 transition-colors p-2">
<svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
</svg>
</button>
</div>

<!-- Submit Button -->
<button type="submit"
class="btn-gradient w-full py-4 rounded-2xl text-white font-bold text-lg shadow-lg animate-in"
style="animation-delay:0.7s">
DAFTAR SEKARANG
</button>

<!-- Login Link -->
<div class="text-center animate-in" style="animation-delay:0.8s">
<p class="text-gray-600 text-sm">
Sudah punya akun?
<a href="/login" class="text-indigo-600 hover:text-purple-600 font-semibold transition-colors">
Masuk di sini
</a>
</p>
</div>

</form>

<!-- Footer -->
<div class="mt-8 text-center animate-in" style="animation-delay:0.9s">
<p class="text-xs text-gray-400 flex items-center justify-center gap-2">
<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
<path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
</svg>
© {{ date('Y') }} PT Properti Sejahtera - Secure System
</p>
</div>

</div>

</div>

<script>
function togglePassword(){
let p=document.getElementById('password');
let icon=document.getElementById('eye-icon');
if(p.type==='password'){
p.type='text';
icon.innerHTML='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>';
}else{
p.type='password';
icon.innerHTML='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>';
}
}
</script>

</body>
</html>
