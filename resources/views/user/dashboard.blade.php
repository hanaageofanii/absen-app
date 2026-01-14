<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Karyawan</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
*{font-family:'Plus Jakarta Sans',sans-serif;}

@keyframes slideDown{from{opacity:0;transform:translateY(-20px)}to{opacity:1;transform:translateY(0)}}
@keyframes fadeIn{from{opacity:0}to{opacity:1}}
@keyframes pulse{0%,100%{opacity:1}50%{opacity:.8}}

.animate-slide{animation:slideDown 0.5s ease-out}
.animate-fade{animation:fadeIn 0.5s ease-out}
.status-active{animation:pulse 2s ease-in-out infinite}

.card-hover{transition:all 0.3s ease}
.card-hover:hover{transform:translateY(-5px);box-shadow:0 20px 40px rgba(0,0,0,0.1)}

.btn-primary{
background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);
transition:all 0.3s ease}
.btn-primary:hover{transform:translateY(-2px);box-shadow:0 10px 25px rgba(102,126,234,0.4)}

.tab-active{
border-bottom:3px solid #667eea;
color:#667eea;
font-weight:600}

/* Toast */
#toastContainer div {
    transition: all 0.4s ease;
}
</style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen">

<!-- NAVBAR -->
<nav class="bg-white shadow-lg sticky top-0 z-50 animate-slide">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex justify-between items-center h-16">
<div class="flex items-center gap-3">
<div class="w-10 h-10 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-xl flex items-center justify-center">
<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
</svg>
</div>
<div>
<h1 class="text-lg font-bold text-gray-800">Dashboard Karyawan</h1>
<p class="text-xs text-gray-500">PT Properti Sejahtera</p>
</div>
</div>
<div class="flex items-center gap-4">
<div class="text-right hidden sm:block">
<p class="text-sm font-semibold text-gray-800">{{ session('user') }}</p>
<p class="text-xs text-gray-500">Karyawan Aktif</p>
</div>
<a href="/logout" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors text-sm font-medium">
Logout
</a>
</div>
</div>
</div>
</nav>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

<!-- WELCOME CARD -->
<div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl p-6 md:p-8 text-white mb-8 animate-fade">
<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
<div>
<h2 class="text-2xl md:text-3xl font-bold mb-2">Selamat Datang, <span id="welcomeUser">Demo User</span>! 👋</h2>
<p class="text-indigo-100">Kelola absensi dan laporan harian Anda dengan mudah</p>
</div>
<div class="bg-white/20 backdrop-blur-sm rounded-xl px-6 py-3">
<p class="text-sm text-indigo-100">Tanggal Hari Ini</p>
<p class="text-xl font-bold" id="currentDate">-</p>
</div>
</div>
</div>

<!-- ABSENSI CARD -->
<div class="grid md:grid-cols-2 gap-6 mb-8">
<!-- Absen Masuk -->
<div class="bg-white rounded-2xl shadow-lg p-6 card-hover">
<div class="flex items-start justify-between mb-4">
<div>
<h3 class="text-xl font-bold text-gray-800 mb-1">Absen Masuk</h3>
<p class="text-sm text-gray-500">Catat waktu kedatangan Anda</p>
</div>
<div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
<svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
</svg>
</div>
</div>
<div class="mb-4">
<p class="text-sm text-gray-600 mb-2">Waktu Masuk: <span id="clockInTime" class="font-semibold text-green-600">Belum Absen</span></p>
</div>
<button onclick="clockIn()" class="w-full btn-primary text-white py-3 rounded-xl font-semibold">
Absen Masuk
</button>
</div>

<!-- Absen Pulang -->
<div class="bg-white rounded-2xl shadow-lg p-6 card-hover">
<div class="flex items-start justify-between mb-4">
<div>
<h3 class="text-xl font-bold text-gray-800 mb-1">Absen Pulang</h3>
<p class="text-sm text-gray-500">Catat waktu kepulangan Anda</p>
</div>
<div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
<svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
</svg>
</div>
</div>
<div class="mb-4">
<p class="text-sm text-gray-600 mb-2">Waktu Pulang: <span id="clockOutTime" class="font-semibold text-orange-600">Belum Absen</span></p>
<p class="text-sm text-gray-600">Jam Kerja: <span id="workHours" class="font-semibold text-indigo-600">0 jam</span></p>
</div>
<button onclick="clockOut()" class="w-full btn-primary text-white py-3 rounded-xl font-semibold">
Absen Pulang
</button>
</div>
</div>

<!-- UANG MAKAN SUMMARY -->
<div class="bg-white rounded-2xl shadow-lg p-6 mb-8 card-hover">
<div class="flex items-center justify-between mb-6">
<h3 class="text-xl font-bold text-gray-800">Ringkasan Uang Makan</h3>
<div class="px-4 py-2 bg-indigo-100 rounded-lg">
<span class="text-sm text-indigo-600 font-semibold">Rp 25.000 / 7 jam kerja</span>
</div>
</div>
<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
<div class="text-center p-4 bg-green-50 rounded-xl">
<p class="text-sm text-gray-600 mb-1">Hari Ini</p>
<p class="text-2xl font-bold text-green-600" id="todayMeal">Rp 0</p>
</div>
<div class="text-center p-4 bg-blue-50 rounded-xl">
<p class="text-sm text-gray-600 mb-1">Minggu Ini</p>
<p class="text-2xl font-bold text-blue-600" id="weekMeal">Rp 0</p>
</div>
<div class="text-center p-4 bg-purple-50 rounded-xl">
<p class="text-sm text-gray-600 mb-1">Bulan Ini</p>
<p class="text-2xl font-bold text-purple-600" id="monthMeal">Rp 0</p>
</div>
<div class="text-center p-4 bg-indigo-50 rounded-xl">
<p class="text-sm text-gray-600 mb-1">Total Hari</p>
<p class="text-2xl font-bold text-indigo-600" id="totalDays">0 hari</p>
</div>
</div>
</div>

<!-- TABS -->
<div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
<div class="flex border-b border-gray-200 mb-6 overflow-x-auto">
<button onclick="switchTab('laporan')" id="tab-laporan" class="tab-active px-6 py-3 text-sm whitespace-nowrap">Laporan Kerja</button>
<button onclick="switchTab('feedback')" id="tab-feedback" class="px-6 py-3 text-sm text-gray-600 hover:text-indigo-600 whitespace-nowrap">Feedback Karyawan</button>
<button onclick="switchTab('surat')" id="tab-surat" class="px-6 py-3 text-sm text-gray-600 hover:text-indigo-600 whitespace-nowrap">Nomor Surat</button>
</div>

<!-- TAB CONTENT LAPORAN -->
<div id="content-laporan">
<div class="flex justify-between items-center mb-6">
<h3 class="text-xl font-bold text-gray-800">Laporan Kerja Saya</h3>
<div class="flex gap-2">
<button onclick="showReportType('daily')" id="btn-daily" class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium">Harian</button>
<button onclick="showReportType('weekly')" id="btn-weekly" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm font-medium">Mingguan</button>
<button onclick="showReportType('monthly')" id="btn-monthly" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm font-medium">Bulanan</button>
</div>
</div>

<form id="reportForm" class="space-y-4 mb-6" onsubmit="submitReport(event)">
<div>
<label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal</label>
<input type="date" id="reportDate" required class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-indigo-500 outline-none">
</div>
<div>
<label class="block text-sm font-semibold text-gray-700 mb-2">Aktivitas Pekerjaan</label>
<textarea id="reportActivity" rows="4" required placeholder="Jelaskan aktivitas yang Anda kerjakan hari ini..." class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-indigo-500 outline-none resize-none"></textarea>
</div>
<div>
<label class="block text-sm font-semibold text-gray-700 mb-2">Upload Bukti (Screenshot/Foto/Dokumen)</label>
<div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-indigo-500 transition-colors cursor-pointer">
<input type="file" id="reportFile" accept="image/*,.pdf" class="hidden" onchange="handleFileSelect(event)">
<label for="reportFile" class="cursor-pointer">
<svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
</svg>
<p class="text-sm text-gray-600">Klik untuk upload atau drag & drop</p>
<p class="text-xs text-gray-400 mt-1">PNG, JPG, PDF hingga 10MB</p>
<p id="fileName" class="text-xs text-indigo-600 mt-2 font-semibold"></p>
</label>
</div>
</div>
<button type="submit" class="w-full btn-primary text-white py-3 rounded-xl font-semibold">Simpan Laporan</button>
</form>

<div class="bg-gray-50 rounded-xl p-4">
<h4 class="font-semibold text-gray-800 mb-3">Riwayat Laporan Saya</h4>
<p class="text-xs text-gray-500 mb-3">💡 Hanya Anda yang bisa melihat laporan ini. Admin dapat melihat untuk evaluasi.</p>
<div id="reportHistory" class="space-y-2"></div>
</div>
</div>

<!-- TAB CONTENT FEEDBACK -->
<div id="content-feedback" class="hidden">
<h3 class="text-xl font-bold text-gray-800 mb-6">Feedback untuk Karyawan</h3>
<form id="feedbackForm" class="space-y-4" onsubmit="submitFeedback(event)">
<div>
<label class="block text-sm font-semibold text-gray-700 mb-2">Pilih Karyawan</label>
<select id="feedbackEmployee" required class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-indigo-500 outline-none">
<option value="">-- Pilih Karyawan --</option>
<option>Budi Santoso</option>
<option>Siti Aminah</option>
<option>Andi Wijaya</option>
<option>Dewi Lestari</option>
</select>
</div>
<div>
<label class="block text-sm font-semibold text-gray-700 mb-2">Kategori Feedback</label>
<select id="feedbackCategory" required class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-indigo-500 outline-none">
<option value="">-- Pilih Kategori --</option>
<option>👍 Apresiasi</option>
<option>💡 Saran</option>
<option>⚠️ Keluhan</option>
<option>📊 Evaluasi Kinerja</option>
</select>
</div>
<div>
<label class="block text-sm font-semibold text-gray-700 mb-2">Pesan Feedback</label>
<textarea id="feedbackMessage" rows="5" required placeholder="Tulis feedback Anda di sini..." class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-indigo-500 outline-none resize-none"></textarea>
</div>
<div class="flex items-center gap-2">
<input type="checkbox" id="anonymous" class="w-4 h-4 text-indigo-600 rounded">
<label for="anonymous" class="text-sm text-gray-600">Kirim sebagai anonim</label>
</div>
<button type="submit" class="w-full btn-primary text-white py-3 rounded-xl font-semibold">Kirim Feedback</button>
</form>

<div class="mt-6 bg-gray-50 rounded-xl p-4">
<h4 class="font-semibold text-gray-800 mb-3">Feedback yang Saya Kirim</h4>
<p class="text-xs text-gray-500 mb-3">💡 Hanya Anda yang bisa melihat feedback ini. Admin dapat melihat untuk tindak lanjut.</p>
<div id="feedbackHistory" class="space-y-2"></div>
</div>
</div>

<!-- TAB CONTENT SURAT -->
<div id="content-surat" class="hidden">
<h3 class="text-xl font-bold text-gray-800 mb-4">Pencatatan Nomor Surat Menyurat</h3>
<div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6 rounded-lg">
<div class="flex">
<div class="flex-shrink-0">
<svg class="h-5 w-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
</svg>
</div>
<div class="ml-3">
<p class="text-sm text-blue-700"><strong>Info:</strong> Nomor surat akan digenerate otomatis oleh sistem. Anda hanya perlu mengisi detail surat.</p>
</div>
</div>
</div>

<form id="letterForm" class="space-y-4" onsubmit="submitLetter(event)">
<div>
<label class="block text-sm font-semibold text-gray-700 mb-2">Pilih PT</label>
<select id="letterCompany" required class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-indigo-500 outline-none">
<option value="">-- Pilih PT --</option>
<option value="PSJ">PT Properti Sejahtera</option>
<option value="MBJ">PT Maju Bersama</option>
<option value="SG">PT Sukses Gemilang</option>
<option value="BJ">PT Berkah Jaya</option>
</select>
</div>
<div>
<label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Surat</label>
<input type="date" id="letterDate" required class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-indigo-500 outline-none">
</div>
<div>
<label class="block text-sm font-semibold text-gray-700 mb-2">Perihal</label>
<input type="text" id="letterSubject" required placeholder="Contoh: Permohonan Cuti" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-indigo-500 outline-none">
</div>
<div>
<label class="block text-sm font-semibold text-gray-700 mb-2">Tujuan</label>
<input type="text" id="letterTo" required placeholder="Kepada Yth. HRD / Manager" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-indigo-500 outline-none">
</div>
<button type="submit" class="w-full btn-primary text-white py-3 rounded-xl font-semibold">Buat Surat</button>
</form>

<div class="mt-6 bg-gray-50 rounded-xl p-4">
<h4 class="font-semibold text-gray-800 mb-3">Riwayat Surat Saya</h4>
<p class="text-xs text-gray-500 mb-3">💡 Hanya Anda yang bisa melihat surat ini. Admin dapat melihat untuk arsip resmi.</p>
<div id="letterHistory" class="space-y-2"></div>
</div>
</div>
</div>

</div>

<!-- Toast Notification Container -->
<div id="toastContainer" class="fixed bottom-5 right-5 space-y-2 z-50"></div>

<script>
// ===== Current User =====
// Ini akan ambil dari backend session nanti
let currentUser = "Demo User";

document.getElementById('userName').textContent = currentUser;
document.getElementById('welcomeUser').textContent = currentUser;
document.getElementById('currentDate').textContent = new Date().toLocaleDateString('id-ID',{
    weekday:'long', year:'numeric', month:'long', day:'numeric'
});
document.getElementById('reportDate').valueAsDate = new Date();
document.getElementById('letterDate').valueAsDate = new Date();

// ===== Toast =====
function showToast(message, type='success'){
    const container = document.getElementById('toastContainer');
    const colors = {
        success: 'bg-green-500 text-white',
        error: 'bg-red-500 text-white',
        info: 'bg-blue-500 text-white'
    };
    const toast = document.createElement('div');
    toast.className = `px-4 py-3 rounded shadow ${colors[type]} opacity-0 translate-y-6`;
    toast.textContent = message;
    container.appendChild(toast);
    setTimeout(()=>{
        toast.style.transition = "all 0.4s ease";
        toast.style.opacity = "1";
        toast.style.transform = "translateY(0)";
    },50);
    setTimeout(()=>{
        toast.style.opacity = "0";
        toast.style.transform = "translateY(20px)";
        setTimeout(()=>container.removeChild(toast),400);
    },3000);
}

// ===== Absensi =====
let clockInData=null, clockOutData=null;

async function clockIn(){
    const now = new Date();
    clockInData = now;
    document.getElementById('clockInTime').textContent = now.toLocaleTimeString('id-ID');

    try{
        const res = await fetch('/api/attendance/clock-in', {
            method: 'POST',
            headers: {'Content-Type':'application/json'},
            body: JSON.stringify({time: now.toISOString()})
        });
        const data = await res.json();
        if(data.success){
            showToast('✅ Absen masuk berhasil dicatat!');
        } else showToast('⚠️ Gagal absen masuk','error');
    }catch(e){showToast('⚠️ Terjadi kesalahan jaringan','error');}

    calculateWorkHours();
}

async function clockOut(){
    if(!clockInData){showToast('⚠️ Anda belum absen masuk!','error'); return;}
    const now = new Date();
    clockOutData = now;
    document.getElementById('clockOutTime').textContent = now.toLocaleTimeString('id-ID');

    try{
        const res = await fetch('/api/attendance/clock-out', {
            method: 'POST',
            headers: {'Content-Type':'application/json'},
            body: JSON.stringify({time: now.toISOString()})
        });
        const data = await res.json();
        if(data.success){
            showToast('✅ Absen pulang berhasil dicatat!');
        } else showToast('⚠️ Gagal absen pulang','error');
    }catch(e){showToast('⚠️ Terjadi kesalahan jaringan','error');}

    calculateWorkHours();
}

function calculateWorkHours(){
    if(clockInData && clockOutData){
        const diff = clockOutData - clockInData;
        const hours = (diff/(1000*60*60)).toFixed(1);
        document.getElementById('workHours').textContent = hours+' jam';
        if(hours>=7){
            document.getElementById('todayMeal').textContent='Rp 25.000';
            document.getElementById('weekMeal').textContent='Rp 125.000';
            document.getElementById('monthMeal').textContent='Rp 500.000';
            document.getElementById('totalDays').textContent='20 hari';
        } else { document.getElementById('todayMeal').textContent='Rp 0'; }
    }
}

// ===== Tabs =====
function switchTab(tab){
    ['laporan','feedback','surat'].forEach(t=>{
        document.getElementById('content-'+t).classList.add('hidden');
        document.getElementById('tab-'+t).classList.remove('tab-active');
    });
    document.getElementById('content-'+tab).classList.remove('hidden');
    document.getElementById('tab-'+tab).classList.add('tab-active');
}

// ===== Report Type Switch =====
function showReportType(type){
    ['daily','weekly','monthly'].forEach(t=>{
        const btn=document.getElementById('btn-'+t);
        if(t===type){btn.classList.remove('bg-gray-200','text-gray-700'); btn.classList.add('bg-indigo-600','text-white');}
        else{btn.classList.remove('bg-indigo-600','text-white'); btn.classList.add('bg-gray-200','text-gray-700');}
    });
}

// ===== Submit Report =====
async function submitReport(e){
    e.preventDefault();
    const date = document.getElementById('reportDate').value;
    const activity = document.getElementById('reportActivity').value;
    const fileInput = document.getElementById('reportFile');
    const formData = new FormData();
    formData.append('date', date);
    formData.append('activity', activity);
    if(fileInput.files[0]) formData.append('file', fileInput.files[0]);

    try{
        const res = await fetch('/api/reports', {method:'POST', body: formData});
        const data = await res.json();
        if(data.success){
            showToast('✅ Laporan berhasil disimpan!');
            document.getElementById('reportForm').reset();
            loadReportHistory();
        } else showToast('⚠️ Gagal menyimpan laporan','error');
    }catch(e){showToast('⚠️ Terjadi kesalahan jaringan','error');}
}

// ===== Submit Feedback =====
async function submitFeedback(e){
    e.preventDefault();
    const employee = document.getElementById('feedbackEmployee').value;
    const category = document.getElementById('feedbackCategory').value;
    const message = document.getElementById('feedbackMessage').value;
    const anonymous = document.getElementById('anonymous').checked;

    try{
        const res = await fetch('/api/feedbacks', {
            method: 'POST',
            headers: {'Content-Type':'application/json'},
            body: JSON.stringify({employee, category, message, anonymous})
        });
        const data = await res.json();
        if(data.success){
            showToast('✅ Feedback berhasil dikirim!');
            document.getElementById('feedbackForm').reset();
            loadFeedbackHistory();
        } else showToast('⚠️ Gagal mengirim feedback','error');
    }catch(e){showToast('⚠️ Terjadi kesalahan jaringan','error');}
}

// ===== Submit Letter =====
async function submitLetter(e){
    e.preventDefault();
    const company = document.getElementById('letterCompany').value;
    const date = document.getElementById('letterDate').value;
    const subject = document.getElementById('letterSubject').value;
    const to = document.getElementById('letterTo').value;

    try{
        const res = await fetch('/api/letters', {
            method:'POST',
            headers:{'Content-Type':'application/json'},
            body: JSON.stringify({company,date,subject,to})
        });
        const data = await res.json();
        if(data.success){
            showToast('✅ Surat berhasil dibuat!');
            document.getElementById('letterForm').reset();
            loadLetterHistory();
        } else showToast('⚠️ Gagal membuat surat','error');
    }catch(e){showToast('⚠️ Terjadi kesalahan jaringan','error');}
}

// ===== Load Histories =====
async function loadReportHistory(){
    try{
        const res = await fetch('/api/reports');
        const reports = await res.json();
        const container = document.getElementById('reportHistory');
        container.innerHTML='';
        reports.reverse().forEach(r=>{
            const div=document.createElement('div');
            div.className='p-3 bg-white rounded-lg shadow-sm';
            div.innerHTML=`<p class="text-sm font-semibold">${r.date}</p><p class="text-gray-600">${r.activity}</p><p class="text-xs text-indigo-600 mt-1">Bukti: ${r.file||'Tidak ada'}</p>`;
            container.appendChild(div);
        });
    }catch(e){showToast('⚠️ Gagal memuat laporan','error');}
}

async function loadFeedbackHistory(){
    try{
        const res = await fetch('/api/feedbacks');
        const feedbacks = await res.json();
        const container = document.getElementById('feedbackHistory');
        container.innerHTML='';
        feedbacks.reverse().forEach(f=>{
            const div=document.createElement('div');
            div.className='p-3 bg-white rounded-lg shadow-sm';
            div.innerHTML=`<p class="text-sm font-semibold">${f.anonymous?'Anonim':f.employee} - ${f.category}</p><p class="text-gray-600">${f.message}</p>`;
            container.appendChild(div);
        });
    }catch(e){showToast('⚠️ Gagal memuat feedback','error');}
}

async function loadLetterHistory(){
    try{
        const res = await fetch('/api/letters');
        const letters = await res.json();
        const container = document.getElementById('letterHistory');
        container.innerHTML='';
        letters.reverse().forEach(l=>{
            const div=document.createElement('div');
            div.className='p-3 bg-white rounded-lg shadow-sm';
            div.innerHTML=`<p class="text-sm font-semibold">${l.date} - ${l.number}</p><p class="text-gray-600">Tujuan: ${l.to} | Perihal: ${l.subject}</p>`;
            container.appendChild(div);
        });
    }catch(e){showToast('⚠️ Gagal memuat surat','error');}
}

// ===== Init =====
loadReportHistory();
loadFeedbackHistory();
loadLetterHistory();
</script>

</body>
</html>
