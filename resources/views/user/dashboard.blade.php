<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Karyawan</title>

<script src="https://cdn.tailwindcss.com"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

*{
font-family:'Plus Jakarta Sans',sans-serif;
}

.tab-active{
border-bottom:3px solid #6366f1;
color:#6366f1;
font-weight:600;
position: relative;
}

.tab-active::after {
content: '';
position: absolute;
bottom: -3px;
left: 0;
right: 0;
height: 3px;
background: linear-gradient(90deg, #6366f1, #8b5cf6);
border-radius: 3px 3px 0 0;
}

.gradient-bg {
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.card-hover {
transition: all 0.3s ease;
}

.card-hover:hover {
transform: translateY(-5px);
box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

.btn-primary {
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
transition: all 0.3s ease;
position: relative;
overflow: hidden;
}

.btn-primary::before {
content: '';
position: absolute;
top: 0;
left: -100%;
width: 100%;
height: 100%;
background: rgba(255, 255, 255, 0.2);
transition: left 0.3s ease;
}

.btn-primary:hover::before {
left: 100%;
}

.btn-primary:hover {
transform: translateY(-2px);
box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
}

.btn-primary:disabled {
opacity: 0.6;
cursor: not-allowed;
transform: none;
}

.input-modern {
transition: all 0.3s ease;
border: 2px solid #e2e8f0;
}

.input-modern:focus {
outline: none;
border-color: #6366f1;
box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
}

.stats-card {
background: white;
border-radius: 16px;
padding: 24px;
box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
border-left: 4px solid;
}

.fade-in {
animation: fadeIn 0.5s ease-in;
}

@keyframes fadeIn {
from { opacity: 0; transform: translateY(10px); }
to { opacity: 1; transform: translateY(0); }
}

.toast-animation {
animation: slideIn 0.3s ease-out;
}

@keyframes slideIn {
from { transform: translateX(100%); opacity: 0; }
to { transform: translateX(0); opacity: 1; }
}

.loading {
display: inline-block;
width: 20px;
height: 20px;
border: 3px solid rgba(255,255,255,.3);
border-radius: 50%;
border-top-color: #fff;
animation: spin 1s ease-in-out infinite;
}

@keyframes spin {
to { transform: rotate(360deg); }
}
</style>
</head>

<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen">

<!-- NAVBAR -->
<nav class="bg-white shadow-lg sticky top-0 z-50 border-b-4 border-indigo-500">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex justify-between items-center h-20">
<div class="flex items-center space-x-4">
<div class="w-12 h-12 gradient-bg rounded-xl flex items-center justify-center">
<svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
</svg>
</div>
<div>
<h1 class="text-xl font-bold text-gray-800">Dashboard Karyawan</h1>
<p class="text-xs text-gray-500 font-medium">Sistem Absensi & Pelaporan</p>
</div>
</div>

<div class="flex items-center space-x-4">
@if(session('login'))
<div class="text-right hidden sm:block">
<p class="text-sm font-semibold text-gray-700">{{ session('user') }}</p>
<p class="text-xs text-gray-500">Karyawan</p>
</div>
@endif
<a href="/logout"
class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-6 py-2.5 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
<span class="flex items-center space-x-2">
<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
</svg>
<span>Logout</span>
</span>
</a>
</div>
</div>
</div>
</nav>

<div class="max-w-7xl mx-auto mt-8 px-4 sm:px-6 lg:px-8 space-y-8 pb-8">

<!-- WELCOME CARD -->
<div class="gradient-bg text-white p-8 rounded-2xl shadow-2xl relative overflow-hidden fade-in">
<div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-32 -mt-32"></div>
<div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-5 rounded-full -ml-24 -mb-24"></div>
<div class="relative z-10 flex justify-between items-center flex-wrap gap-4">
<div>
<h2 class="text-3xl font-bold mb-2 flex items-center space-x-3">
<span>Halo, {{ session('user') ?? 'User' }}</span>
<span class="text-4xl">👋</span>
</h2>
<p class="text-indigo-100 text-lg">Kelola absensi & laporan Anda dengan mudah</p>
</div>
<div class="bg-white bg-opacity-20 backdrop-blur-sm px-6 py-3 rounded-xl">
<p id="currentDate" class="font-semibold text-lg"></p>
<p class="text-sm text-indigo-100">Hari ini</p>
</div>
</div>
</div>

<!-- ABSENSI CARDS -->
<div class="grid md:grid-cols-2 gap-6">

<!-- Clock In Card -->
<div class="stats-card card-hover border-green-500 fade-in">
<div class="flex items-center justify-between mb-4">
<h3 class="font-bold text-xl text-gray-800">Absen Masuk</h3>
<div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
<svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
</svg>
</div>
</div>
<div class="mb-6">
<p class="text-sm text-gray-500 mb-1">Waktu Masuk</p>
<p class="text-3xl font-bold text-gray-800" id="clockInTime">--:--:--</p>
</div>
<button onclick="clockIn()" id="btnClockIn"
class="btn-primary text-white w-full py-3.5 rounded-xl font-semibold shadow-lg text-lg">
<span class="relative z-10 flex items-center justify-center space-x-2">
<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
</svg>
<span>Absen Masuk</span>
</span>
</button>
</div>

<!-- Clock Out Card -->
<div class="stats-card card-hover border-red-500 fade-in">
<div class="flex items-center justify-between mb-4">
<h3 class="font-bold text-xl text-gray-800">Absen Pulang</h3>
<div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
<svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
</svg>
</div>
</div>
<div class="mb-4 grid grid-cols-2 gap-4">
<div>
<p class="text-sm text-gray-500 mb-1">Waktu Pulang</p>
<p class="text-2xl font-bold text-gray-800" id="clockOutTime">--:--:--</p>
</div>
<div>
<p class="text-sm text-gray-500 mb-1">Total Jam Kerja</p>
<p class="text-2xl font-bold text-indigo-600" id="workHours">0 jam</p>
</div>
</div>
<button onclick="clockOut()" id="btnClockOut"
class="btn-primary text-white w-full py-3.5 rounded-xl font-semibold shadow-lg text-lg">
<span class="relative z-10 flex items-center justify-center space-x-2">
<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
</svg>
<span>Absen Pulang</span>
</span>
</button>
</div>

</div>

<!-- TABS SECTION -->
<div class="bg-white p-8 rounded-2xl shadow-xl fade-in">

<!-- Tab Headers -->
<div class="flex border-b-2 border-gray-200 mb-6 overflow-x-auto">

<button onclick="tabMenu('laporan')"
id="tab-laporan"
class="tab-active px-6 py-3 font-semibold text-base transition-all duration-300 whitespace-nowrap">
<span class="flex items-center space-x-2">
<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
</svg>
<span>Laporan</span>
</span>
</button>

<button onclick="tabMenu('feedback')"
id="tab-feedback"
class="px-6 py-3 font-semibold text-base text-gray-600 hover:text-indigo-600 transition-all duration-300 whitespace-nowrap">
<span class="flex items-center space-x-2">
<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
</svg>
<span>Feedback</span>
</span>
</button>

<button onclick="tabMenu('surat')"
id="tab-surat"
class="px-6 py-3 font-semibold text-base text-gray-600 hover:text-indigo-600 transition-all duration-300 whitespace-nowrap">
<span class="flex items-center space-x-2">
<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
</svg>
<span>Surat</span>
</span>
</button>

</div>

<!-- ========== LAPORAN ========== -->
<div id="content-laporan">

<form id="reportForm" onsubmit="submitReport(event)" class="space-y-5">

<div>
<label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Laporan</label>
<input type="date" id="reportDate" required
class="input-modern w-full p-3 rounded-xl">
</div>

<div>
<label class="block text-sm font-semibold text-gray-700 mb-2">Aktivitas Hari Ini</label>
<textarea id="reportActivity" required
class="input-modern w-full p-3 rounded-xl min-h-[120px]"
placeholder="Deskripsikan aktivitas dan pencapaian hari ini..."></textarea>
</div>

<div>
<label class="block text-sm font-semibold text-gray-700 mb-2">Lampiran (Opsional)</label>
<div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-indigo-400 transition-colors">
<input type="file" id="reportFile" class="hidden" onchange="updateFileName(this, 'fileNameReport')">
<label for="reportFile" class="cursor-pointer">
<svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
</svg>
<p class="text-sm text-gray-600 font-medium" id="fileNameReport">Klik untuk upload file</p>
</label>
</div>
</div>

<button type="submit" id="btnSubmitReport"
class="btn-primary text-white w-full py-4 rounded-xl font-bold text-lg shadow-lg">
<span class="relative z-10 flex items-center justify-center space-x-2">
<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
</svg>
<span>Simpan Laporan</span>
</span>
</button>

</form>

<div class="mt-8">
<h4 class="font-bold text-lg text-gray-800 mb-4 flex items-center space-x-2">
<svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
</svg>
<span>Riwayat Laporan</span>
</h4>
<div id="reportHistory" class="space-y-3">
<div class="text-center py-8">
<div class="loading mx-auto mb-2" style="border-top-color: #6366f1;"></div>
<p class="text-gray-400">Memuat data...</p>
</div>
</div>
</div>

</div>

<!-- ========== FEEDBACK ========== -->
<div id="content-feedback" class="hidden">

<form id="feedbackForm" onsubmit="submitFeedback(event)" class="space-y-5">

<div>
<label class="block text-sm font-semibold text-gray-700 mb-2">Karyawan Tujuan</label>
<select id="feedbackEmployee" required
class="input-modern w-full p-3 rounded-xl">
<option value="">-- Pilih Karyawan --</option>
<option>Budi</option>
<option>Siti</option>
<option>Andi</option>
</select>
</div>

<div>
<label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
<select id="feedbackCategory" required
class="input-modern w-full p-3 rounded-xl">
<option value="">-- Pilih Kategori --</option>
<option>Apresiasi</option>
<option>Saran</option>
<option>Keluhan</option>
</select>
</div>

<div>
<label class="block text-sm font-semibold text-gray-700 mb-2">Pesan Feedback</label>
<textarea id="feedbackMessage" required
class="input-modern w-full p-3 rounded-xl min-h-[120px]"
placeholder="Tulis feedback Anda di sini..."></textarea>
</div>

<div class="flex items-center space-x-3 bg-gray-50 p-4 rounded-xl">
<input type="checkbox" id="anonymous" class="w-5 h-5 text-indigo-600 rounded">
<label for="anonymous" class="font-medium text-gray-700">Kirim sebagai Anonim</label>
</div>

<button type="submit" id="btnSubmitFeedback"
class="btn-primary text-white w-full py-4 rounded-xl font-bold text-lg shadow-lg">
<span class="relative z-10 flex items-center justify-center space-x-2">
<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
</svg>
<span>Kirim Feedback</span>
</span>
</button>

</form>

<div class="mt-8">
<h4 class="font-bold text-lg text-gray-800 mb-4 flex items-center space-x-2">
<svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
</svg>
<span>Riwayat Feedback</span>
</h4>
<div id="feedbackHistory" class="space-y-3">
<div class="text-center py-8">
<div class="loading mx-auto mb-2" style="border-top-color: #6366f1;"></div>
<p class="text-gray-400">Memuat data...</p>
</div>
</div>
</div>

</div>

<!-- ========== SURAT ========== -->
<div id="content-surat" class="hidden">

<form id="letterForm" onsubmit="submitLetter(event)" class="space-y-5">

<div>
<label class="block text-sm font-semibold text-gray-700 mb-2">Perusahaan</label>
<select id="letterCompany" required
class="input-modern w-full p-3 rounded-xl">
<option value="">Loading...</option>
</select>
</div>

<div>
<label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Surat</label>
<input type="date" id="letterDate" required
class="input-modern w-full p-3 rounded-xl">
</div>

<div>
<label class="block text-sm font-semibold text-gray-700 mb-2">Perihal</label>
<input type="text" id="letterSubject" required
class="input-modern w-full p-3 rounded-xl"
placeholder="Masukkan perihal surat">
</div>

<div>
<label class="block text-sm font-semibold text-gray-700 mb-2">Tujuan</label>
<input type="text" id="letterTo" required
class="input-modern w-full p-3 rounded-xl"
placeholder="Masukkan nama penerima">
</div>

<button type="submit" id="btnSubmitLetter"
class="btn-primary text-white w-full py-4 rounded-xl font-bold text-lg shadow-lg">
<span class="relative z-10 flex items-center justify-center space-x-2">
<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
</svg>
<span>Buat Surat</span>
</span>
</button>

</form>

<div class="mt-8">
<h4 class="font-bold text-lg text-gray-800 mb-4 flex items-center space-x-2">
<svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
</svg>
<span>Riwayat Surat</span>
</h4>
<div id="letterHistory" class="space-y-3">
<div class="text-center py-8">
<div class="loading mx-auto mb-2" style="border-top-color: #6366f1;"></div>
<p class="text-gray-400">Memuat data...</p>
</div>
</div>
</div>

</div>

</div>
</div>

<!-- TOAST CONTAINER -->
<div id="toastContainer" class="fixed bottom-5 right-5 space-y-2 z-50"></div>

<!-- ================= JAVASCRIPT ================= -->
<script>

/* ELEMENTS */
const currentDate = document.getElementById('currentDate');
const clockInTime = document.getElementById('clockInTime');
const clockOutTime = document.getElementById('clockOutTime');
const workHours = document.getElementById('workHours');

const reportDate = document.getElementById('reportDate');
const reportForm = document.getElementById('reportForm');
const reportActivity = document.getElementById('reportActivity');
const reportFile = document.getElementById('reportFile');
const reportHistory = document.getElementById('reportHistory');

const feedbackForm = document.getElementById('feedbackForm');
const feedbackEmployee = document.getElementById('feedbackEmployee');
const feedbackCategory = document.getElementById('feedbackCategory');
const feedbackMessage = document.getElementById('feedbackMessage');
const anonymous = document.getElementById('anonymous');
const feedbackHistory = document.getElementById('feedbackHistory');

const letterForm = document.getElementById('letterForm');
const letterCompany = document.getElementById('letterCompany');
const letterDate = document.getElementById('letterDate');
const letterSubject = document.getElementById('letterSubject');
const letterTo = document.getElementById('letterTo');
const letterHistory = document.getElementById('letterHistory');

const csrf = document.querySelector('meta[name="csrf-token"]').content;

/* INITIALIZE DATE */
currentDate.innerHTML = new Date().toLocaleDateString('id-ID',{
weekday:'long',
day:'numeric',
month:'long',
year:'numeric'
});

reportDate.valueAsDate = new Date();
letterDate.valueAsDate = new Date();

/* TOAST NOTIFICATION */
function toast(msg, type = 'success'){
let bgColor = type === 'success' ? 'from-indigo-600 to-purple-600' : 'from-red-500 to-red-600';
let d = document.createElement('div');
d.className = `toast-animation bg-gradient-to-r ${bgColor} text-white px-6 py-4 rounded-xl shadow-2xl flex items-center space-x-3`;
d.innerHTML = `
<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${type === 'success' ? 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' : 'M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'}"></path>
</svg>
<span class="font-semibold">${msg}</span>
`;
toastContainer.appendChild(d);
setTimeout(()=>{
d.style.animation = 'slideIn 0.3s ease-out reverse';
setTimeout(()=>d.remove(), 300);
}, 3000);
}

/* UPDATE FILE NAME */
function updateFileName(input, targetId) {
const fileName = input.files[0]?.name || 'Klik untuk upload file';
document.getElementById(targetId).textContent = fileName;
}

/* TAB MENU */
function tabMenu(x){
['laporan','feedback','surat'].forEach(t=>{
document.getElementById('content-'+t).classList.add('hidden');
document.getElementById('tab-'+t).classList.remove('tab-active', 'text-indigo-600');
document.getElementById('tab-'+t).classList.add('text-gray-600', 'hover:text-indigo-600');
});

document.getElementById('content-'+x).classList.remove('hidden');
document.getElementById('tab-'+x).classList.add('tab-active', 'text-indigo-600');
document.getElementById('tab-'+x).classList.remove('text-gray-600', 'hover:text-indigo-600');
}

/* ============ LOAD COMPANIES ============ */
async function loadCompanies(){
try {
let response = await fetch('/api/companies');
let data = await response.json();
let html = '<option value="">-- Pilih Perusahaan --</option>';
data.forEach(company => {
html += `<option value="${company.id}">${company.name}</option>`;
});
letterCompany.innerHTML = html;
} catch(error) {
console.error('Error loading companies:', error);
letterCompany.innerHTML = '<option>Error loading data</option>';
toast('Gagal memuat data perusahaan', 'error');
}
}

/* ============ ATTENDANCE ============ */
let clockInData = null;

// Load today's attendance
async function loadTodayAttendance(){
try {
let response = await fetch('/api/attendance/history');
let data = await response.json();

if(data.length > 0) {
let today = data.find(att => att.date === new Date().toISOString().split('T')[0]);
if(today) {
if(today.clock_in) {
clockInData = new Date(`${today.date} ${today.clock_in}`);
clockInTime.innerHTML = today.clock_in;
document.getElementById('btnClockIn').disabled = true;
document.getElementById('btnClockIn').innerHTML = '<span class="relative z-10">✓ Sudah Absen Masuk</span>';
}
if(today.clock_out) {
clockOutTime.innerHTML = today.clock_out;
document.getElementById('btnClockOut').disabled = true;
document.getElementById('btnClockOut').innerHTML = '<span class="relative z-10">✓ Sudah Absen Pulang</span>';
if(today.work_hours) {
workHours.innerHTML = today.work_hours.toFixed(1) + ' jam';
}
}
}
}
} catch(error) {
console.log('No attendance data for today');
}
}

async function clockIn(){
const btn = document.getElementById('btnClockIn');
btn.disabled = true;
btn.innerHTML = '<span class="relative z-10"><div class="loading"></div></span>';

try {
let response = await fetch('/api/attendance/clock-in', {
method: 'POST',
headers: {
'X-CSRF-TOKEN': csrf,
'Content-Type': 'application/json'
}
});
let data = await response.json();
if(data.success){
clockInData = new Date();
clockInTime.innerHTML = clockInData.toLocaleTimeString('id-ID');
toast('✓ Absen masuk berhasil dicatat');
btn.innerHTML = '<span class="relative z-10">✓ Sudah Absen Masuk</span>';
} else {
btn.disabled = false;
btn.innerHTML = '<span class="relative z-10 flex items-center justify-center space-x-2"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg><span>Absen Masuk</span></span>';
toast(data.message || 'Gagal absen masuk', 'error');
}
} catch(error) {
console.error('Error clock in:', error);
btn.disabled = false;
btn.innerHTML = '<span class="relative z-10 flex items-center justify-center space-x-2"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg><span>Absen Masuk</span></span>';
toast('❌ Gagal absen masuk', 'error');
}
}

async function clockOut(){
if(!clockInData) {
toast('⚠️ Anda belum absen masuk', 'error');
return;
}

const btn = document.getElementById('btnClockOut');
btn.disabled = true;
btn.innerHTML = '<span class="relative z-10"><div class="loading"></div></span>';

try {
let response = await fetch('/api/attendance/clock-out', {
method: 'POST',
headers: {
'X-CSRF-TOKEN': csrf,
'Content-Type': 'application/json'
}
});
let data = await response.json();
if(data.success){
let out = new Date();
clockOutTime.innerHTML = out.toLocaleTimeString('id-ID');

let diff = (out - clockInData) / 3600000;
workHours.innerHTML = diff.toFixed(1) + ' jam';

toast('✓ Absen pulang berhasil dicatat');
btn.innerHTML = '<span class="relative z-10">✓ Sudah Absen Pulang</span>';
} else {
btn.disabled = false;
btn.innerHTML = '<span class="relative z-10 flex items-center justify-center space-x-2"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg><span>Absen Pulang</span></span>';
toast(data.message || 'Gagal absen pulang', 'error');
}
} catch(error) {
console.error('Error clock out:', error);
btn.disabled = false;
btn.innerHTML = '<span class="relative z-10 flex items-center justify-center space-x-2"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg><span>Absen Pulang</span></span>';
toast('❌ Gagal absen pulang', 'error');
}
}

/* ============ REPORTS ============ */
async function submitReport(e){
e.preventDefault();

const btn = document.getElementById('btnSubmitReport');
btn.disabled = true;
btn.innerHTML = '<span class="relative z-10"><div class="loading"></div> Menyimpan...</span>';

try {
let formData = new FormData();
formData.append('date', reportDate.value);
formData.append('activity', reportActivity.value);

if(reportFile.files[0]) {
formData.append('file', reportFile.files[0]);
}

let response = await fetch('/api/reports', {
method: 'POST',
headers: {
'X-CSRF-TOKEN': csrf
},
body: formData
});
let data = await response.json();
if(data.success){
toast('✓ Laporan berhasil disimpan');
reportForm.reset();
reportDate.valueAsDate = new Date();
document.getElementById('fileNameReport').textContent = 'Klik untuk upload file';
loadReportHistory();
} else {
toast(data.message || 'Gagal menyimpan laporan', 'error');
}
} catch(error) {
console.error('Error submit report:', error);
toast('❌ Gagal menyimpan laporan', 'error');
} finally {
btn.disabled = false;
btn.innerHTML = '<span class="relative z-10 flex items-center justify-center space-x-2"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>Simpan Laporan</span></span>';
}
}

async function loadReportHistory(){
try {
let response = await fetch('/api/reports');
let data = await response.json();
reportHistory.innerHTML = '';
if(data.length > 0) {
data.reverse().forEach(report => {
reportHistory.innerHTML += `
<div class="bg-gradient-to-r from-indigo-50 to-purple-50 p-4 rounded-xl border-l-4 border-indigo-500 hover:shadow-md transition-shadow">
<div class="flex justify-between items-start mb-2">
<span class="font-bold text-indigo-700">${new Date(report.report_date).toLocaleDateString('id-ID')}</span>
<span class="text-xs text-gray-500">${new Date(report.created_at).toLocaleTimeString('id-ID', {hour: '2-digit', minute: '2-digit'})}</span>
</div>
<p class="text-gray-700">${report.activity}</p>
${report.file ? '<p class="text-xs text-indigo-600 mt-2">📎 File terlampir</p>' : ''}
</div>`;
});
} else {
reportHistory.innerHTML = '<p class="text-center text-gray-400 py-8">Belum ada laporan</p>';
}
} catch(error) {
console.error('Error loading reports:', error);
reportHistory.innerHTML = '<p class="text-center text-red-400 py-8">Gagal memuat data</p>';
}
}

/* ============ FEEDBACK ============ */
async function submitFeedback(e){
e.preventDefault();

const btn = document.getElementById('btnSubmitFeedback');
btn.disabled = true;
btn.innerHTML = '<span class="relative z-10"><div class="loading"></div> Mengirim...</span>';

try {
let response = await fetch('/api/feedbacks', {
method: 'POST',
headers: {
'Content-Type': 'application/json',
'X-CSRF-TOKEN': csrf
},
body: JSON.stringify({
to: feedbackEmployee.value,
category: feedbackCategory.value,
message: feedbackMessage.value,
anonymous: anonymous.checked
})
});
let data = await response.json();
if(data.success){
toast('✓ Feedback berhasil dikirim');
feedbackForm.reset();
loadFeedbackHistory();
} else {
toast(data.message || 'Gagal mengirim feedback', 'error');
}
} catch(error) {
console.error('Error submit feedback:', error);
toast('❌ Gagal mengirim feedback', 'error');
} finally {
btn.disabled = false;
btn.innerHTML = '<span class="relative z-10 flex items-center justify-center space-x-2"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg><span>Kirim Feedback</span></span>';
}
}

async function loadFeedbackHistory(){
try {
let response = await fetch('/api/feedbacks');
let data = await response.json();
feedbackHistory.innerHTML = '';
if(data.length > 0) {
data.reverse().forEach(feedback => {
feedbackHistory.innerHTML += `
<div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-4 rounded-xl border-l-4 border-blue-500 hover:shadow-md transition-shadow">
<div class="flex justify-between items-start mb-2">
<span class="font-bold text-blue-700">${feedback.anonymous ? '🔒 Anonim' : feedback.to_employee}</span>
<span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded-full">${feedback.category}</span>
</div>
<p class="text-gray-700">${feedback.message}</p>
<p class="text-xs text-gray-500 mt-2">${new Date(feedback.created_at).toLocaleDateString('id-ID')}</p>
</div>`;
});
} else {
feedbackHistory.innerHTML = '<p class="text-center text-gray-400 py-8">Belum ada feedback</p>';
}
} catch(error) {
console.error('Error loading feedback:', error);
feedbackHistory.innerHTML = '<p class="text-center text-red-400 py-8">Gagal memuat data</p>';
}
}

/* ============ LETTERS ============ */
async function submitLetter(e){
e.preventDefault();

const btn = document.getElementById('btnSubmitLetter');
btn.disabled = true;
btn.innerHTML = '<span class="relative z-10"><div class="loading"></div> Membuat...</span>';

try {
let response = await fetch('/api/letters', {
method: 'POST',
headers: {
'Content-Type': 'application/json',
'X-CSRF-TOKEN': csrf
},
body: JSON.stringify({
company: letterCompany.value,
date: letterDate.value,
subject: letterSubject.value,
to: letterTo.value
})
});
let data = await response.json();
if(data.success){
toast('✓ Surat berhasil dibuat');
letterForm.reset();
letterDate.valueAsDate = new Date();
letterCompany.selectedIndex = 0;
loadLetterHistory();
} else {
toast(data.message || 'Gagal membuat surat', 'error');
}
} catch(error) {
console.error('Error submit letter:', error);
toast('❌ Gagal membuat surat', 'error');
} finally {
btn.disabled = false;
btn.innerHTML = '<span class="relative z-10 flex items-center justify-center space-x-2"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg><span>Buat Surat</span></span>';
}
}

async function loadLetterHistory(){
try {
let response = await fetch('/api/letters');
let data = await response.json();
letterHistory.innerHTML = '';
if(data.length > 0) {
data.reverse().forEach(letter => {
letterHistory.innerHTML += `
<div class="bg-gradient-to-r from-green-50 to-emerald-50 p-4 rounded-xl border-l-4 border-green-500 hover:shadow-md transition-shadow">
<div class="flex justify-between items-start mb-2">
<span class="font-bold text-green-700">${letter.letter_number}</span>
<span class="text-xs text-gray-500">${new Date(letter.letter_date).toLocaleDateString('id-ID')}</span>
</div>
<p class="font-semibold text-gray-800">${letter.subject}</p>
<p class="text-sm text-gray-600">Kepada: ${letter.letter_to}</p>
${letter.company ? `<p class="text-xs text-green-600 mt-1">${letter.company.name}</p>` : ''}
</div>`;
});
} else {
letterHistory.innerHTML = '<p class="text-center text-gray-400 py-8">Belum ada surat</p>';
}
} catch(error) {
console.error('Error loading letters:', error);
letterHistory.innerHTML = '<p class="text-center text-red-400 py-8">Gagal memuat data</p>';
}
}

/* ============ INITIALIZE ON PAGE LOAD ============ */
window.addEventListener('DOMContentLoaded', function() {
loadCompanies();
loadTodayAttendance();
loadReportHistory();
loadFeedbackHistory();
loadLetterHistory();
});

</script>
</body>
</html>
