<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

<div class="flex min-h-screen">
    <!-- SIDEBAR -->
    <aside class="w-64 bg-gradient-to-b from-blue-600 to-blue-800 text-white shadow-xl">
        <div class="p-6">
            <h1 class="text-2xl font-bold mb-2">ADMIN PANEL</h1>
            <p class="text-blue-200 text-sm">Sistem Manajemen</p>
        </div>

        <nav class="mt-6">
            <a onclick="showPage('dashboard')" class="nav-link flex items-center px-6 py-3 hover:bg-blue-700 transition-colors border-l-4 cursor-pointer" id="nav-dashboard">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span class="font-medium">Dashboard</span>
            </a>

            <a onclick="showPage('attendance')" class="nav-link flex items-center px-6 py-3 hover:bg-blue-700 transition-colors border-l-4 border-transparent cursor-pointer" id="nav-attendance">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="font-medium">Attendance</span>
            </a>

            <a onclick="showPage('reports')" class="nav-link flex items-center px-6 py-3 hover:bg-blue-700 transition-colors border-l-4 border-transparent cursor-pointer" id="nav-reports">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span class="font-medium">Reports</span>
            </a>

            <a onclick="showPage('users')" class="nav-link flex items-center px-6 py-3 hover:bg-blue-700 transition-colors border-l-4 border-transparent cursor-pointer" id="nav-users">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <span class="font-medium">Users</span>
            </a>
        </nav>

        <div class="absolute bottom-0 w-64 p-6 border-t border-blue-700">
            <div class="flex items-center mb-3">
                <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                    <span class="font-bold">{{ substr(session('user'), 0, 1) }}</span>
                </div>
                <div>
                    <p class="font-medium text-sm">{{ session('user') }}</p>
                    <p class="text-xs text-blue-200">Administrator</p>
                </div>
            </div>
            <a href="/logout" class="flex items-center justify-center w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Logout
            </a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-8 overflow-y-auto">
        <!-- DASHBOARD PAGE -->
        <div id="page-dashboard" class="page-content">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Dashboard</h2>
                <p class="text-gray-600 mt-1">Selamat datang di panel administrasi</p>
            </div>

            <!-- STATISTICS CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-blue-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total Attendance</p>
                            <p class="text-2xl font-bold text-gray-800 mt-1">{{ count($attendances) }}</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-green-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total Reports</p>
                            <p class="text-2xl font-bold text-gray-800 mt-1">{{ count($reports) }}</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-purple-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total Users</p>
                            <p class="text-2xl font-bold text-gray-800 mt-1">{{ count($users) }}</p>
                        </div>
                        <div class="bg-purple-100 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- QUICK ACCESS -->
            <div class="mt-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Quick Access</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <button onclick="showPage('attendance')" class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-all text-left border-2 border-transparent hover:border-blue-500">
                        <div class="flex items-center">
                            <div class="bg-blue-100 p-3 rounded-lg mr-4">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">View Attendance</p>
                                <p class="text-sm text-gray-600">Check attendance records</p>
                            </div>
                        </div>
                    </button>

                    <button onclick="showPage('reports')" class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-all text-left border-2 border-transparent hover:border-green-500">
                        <div class="flex items-center">
                            <div class="bg-green-100 p-3 rounded-lg mr-4">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">View Reports</p>
                                <p class="text-sm text-gray-600">Check activity reports</p>
                            </div>
                        </div>
                    </button>

                    <button onclick="showPage('users')" class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-all text-left border-2 border-transparent hover:border-purple-500">
                        <div class="flex items-center">
                            <div class="bg-purple-100 p-3 rounded-lg mr-4">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Manage Users</p>
                                <p class="text-sm text-gray-600">View and manage users</p>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
        </div>

        <!-- ATTENDANCE PAGE -->
        <div id="page-attendance" class="page-content hidden">
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-gray-800">Attendance Records</h2>
                <p class="text-gray-600 mt-1">Manage attendance and calculate meal allowance</p>
            </div>

            <!-- FILTER SECTION -->
            <div class="bg-white p-4 rounded-xl shadow-md mb-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Select User</label>
                        <select id="attendanceUserFilter" onchange="filterAttendance()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">All Users</option>
                            @foreach($users as $u)
                                <option value="{{ $u->id }}">{{ $u->username }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Select Week</label>
                        <input type="week" id="attendanceWeekFilter" onchange="filterAttendance()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="flex items-end">
                        <button onclick="resetAttendanceFilter()" class="w-full px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg transition-colors">
                            Reset Filter
                        </button>
                    </div>
                </div>
            </div>

            <!-- WEEKLY SUMMARY -->
            <div id="weeklySummary" class="bg-gradient-to-r from-green-500 to-green-600 p-6 rounded-xl shadow-md mb-6 hidden">
                <h3 class="text-xl font-bold text-white mb-4">Weekly Summary - Meal Allowance</h3>
                <div id="summaryContent" class="grid grid-cols-1 md:grid-cols-3 gap-4"></div>
            </div>

            <!-- ATTENDANCE TABLE -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4">
                    <h3 class="text-xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        All Attendance
                    </h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full" id="attendanceTable">
                        <thead class="bg-gray-50 border-b-2 border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">User</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Clock In</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Clock Out</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Work Hours</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Meal</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($attendances as $a)
                                <tr class="hover:bg-gray-50 transition-colors attendance-row"
                                    data-user-id="{{ $a->user->id ?? '' }}"
                                    data-date="{{ $a->date }}"
                                    data-username="{{ $a->user->username ?? '-' }}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $a->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                                <span class="text-blue-600 font-semibold text-xs">{{ substr($a->user->username ?? '-', 0, 1) }}</span>
                                            </div>
                                            <span class="text-sm font-medium text-gray-900">{{ $a->user->username ?? '-' }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $a->date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-medium">{{ $a->clock_in ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600 font-medium">{{ $a->clock_out ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            {{ $a->work_hours ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            $hasMeal = $a->clock_in && $a->clock_out;
                                        @endphp
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $hasMeal ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $hasMeal ? 'Yes' : 'No' }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- REPORTS PAGE -->
        <div id="page-reports" class="page-content hidden">
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-gray-800">Activity Reports</h2>
                <p class="text-gray-600 mt-1">View all submitted activity reports with filters</p>
            </div>

            <!-- FILTER SECTION -->
            <div class="bg-white p-4 rounded-xl shadow-md mb-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Select User</label>
                        <select id="reportUserFilter" onchange="filterReports()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                            <option value="">All Users</option>
                            @foreach($users as $u)
                                <option value="{{ $u->id }}">{{ $u->username }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Period Type</label>
                        <select id="reportPeriodType" onchange="updateReportDateFilter()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Select Period</label>
                        <input type="date" id="reportDateFilter" onchange="filterReports()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div class="flex items-end">
                        <button onclick="resetReportFilter()" class="w-full px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg transition-colors">
                            Reset Filter
                        </button>
                    </div>
                </div>
            </div>

            <!-- REPORTS SUMMARY -->
            <div id="reportsSummary" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="bg-white p-4 rounded-xl shadow-md border-l-4 border-green-500">
                    <p class="text-gray-500 text-sm font-medium">Total Reports</p>
                    <p id="totalReports" class="text-2xl font-bold text-gray-800 mt-1">0</p>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-md border-l-4 border-blue-500">
                    <p class="text-gray-500 text-sm font-medium">With Files</p>
                    <p id="reportsWithFiles" class="text-2xl font-bold text-gray-800 mt-1">0</p>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-md border-l-4 border-purple-500">
                    <p class="text-gray-500 text-sm font-medium">Selected User</p>
                    <p id="selectedUser" class="text-lg font-bold text-gray-800 mt-1">All Users</p>
                </div>
            </div>

            <!-- REPORTS TABLE -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-4">
                    <h3 class="text-xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        All Reports
                    </h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full" id="reportsTable">
                        <thead class="bg-gray-50 border-b-2 border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">User</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Activity</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">File</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($reports as $r)
                                <tr class="hover:bg-gray-50 transition-colors report-row"
                                    data-user-id="{{ $r->user->id ?? '' }}"
                                    data-username="{{ $r->user->username ?? '-' }}"
                                    data-date="{{ $r->report_date }}"
                                    data-has-file="{{ $r->file ? 'yes' : 'no' }}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $r->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                                <span class="text-green-600 font-semibold text-xs">{{ substr($r->user->username ?? '-', 0, 1) }}</span>
                                            </div>
                                            <span class="text-sm font-medium text-gray-900">{{ $r->user->username ?? '-' }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $r->report_date }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $r->activity }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        @if($r->file)
                                            <a href="{{ asset('storage/'.$r->file) }}"
                                               class="inline-flex items-center px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors"
                                               target="_blank">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                </svg>
                                                Download
                                            </a>
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- USERS PAGE -->
        <div id="page-users" class="page-content hidden">
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-gray-800">User Management</h2>
                <p class="text-gray-600 mt-1">Manage all system users</p>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 px-6 py-4">
                    <h3 class="text-xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        All Users
                    </h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b-2 border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Username</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Role</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Created</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($users as $u)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $u->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                                                <span class="text-purple-600 font-semibold text-xs">{{ substr($u->username, 0, 1) }}</span>
                                            </div>
                                            <span class="text-sm font-medium text-gray-900">{{ $u->username }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $u->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                            {{ $u->role == 'admin' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800' }}">
                                            {{ $u->role }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $u->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    const MEAL_ALLOWANCE = 25000; // Uang makan per hari (Rp 25,000)

    function showPage(pageName) {
        const pages = document.querySelectorAll('.page-content');
        pages.forEach(page => page.classList.add('hidden'));

        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.classList.remove('border-white', 'bg-blue-700');
            link.classList.add('border-transparent');
        });

        const selectedPage = document.getElementById('page-' + pageName);
        if (selectedPage) selectedPage.classList.remove('hidden');

        const selectedNav = document.getElementById('nav-' + pageName);
        if (selectedNav) {
            selectedNav.classList.add('border-white', 'bg-blue-700');
            selectedNav.classList.remove('border-transparent');
        }
    }

    // ATTENDANCE FILTER FUNCTIONS
    function getWeekBounds(weekString) {
        if (!weekString) return null;
        const [year, week] = weekString.split('-W');
        const jan4 = new Date(year, 0, 4);
        const firstMonday = new Date(jan4);
        firstMonday.setDate(jan4.getDate() - (jan4.getDay() || 7) + 1);
        const weekStart = new Date(firstMonday);
        weekStart.setDate(firstMonday.getDate() + (parseInt(week) - 1) * 7);
        const weekEnd = new Date(weekStart);
        weekEnd.setDate(weekStart.getDate() + 6);
        return { start: weekStart, end: weekEnd };
    }

    function filterAttendance() {
        const userId = document.getElementById('attendanceUserFilter').value;
        const weekValue = document.getElementById('attendanceWeekFilter').value;
        const rows = document.querySelectorAll('.attendance-row');
        const weekBounds = getWeekBounds(weekValue);

        let userAttendance = {};
        let visibleCount = 0;

        rows.forEach(row => {
            const rowUserId = row.getAttribute('data-user-id');
            const rowDate = new Date(row.getAttribute('data-date'));
            const rowUsername = row.getAttribute('data-username');
            let show = true;

            if (userId && rowUserId !== userId) show = false;

            if (weekBounds) {
                if (rowDate < weekBounds.start || rowDate > weekBounds.end) {
                    show = false;
                }
            }

            row.style.display = show ? '' : 'none';

            if (show) {
                visibleCount++;
                if (!userAttendance[rowUserId]) {
                    userAttendance[rowUserId] = {
                        username: rowUsername,
                        days: 0
                    };
                }
                userAttendance[rowUserId].days++;
            }
        });

        // Show weekly summary if week is selected
        const summaryDiv = document.getElementById('weeklySummary');
        const summaryContent = document.getElementById('summaryContent');

        if (weekValue && visibleCount > 0) {
            summaryDiv.classList.remove('hidden');
            summaryContent.innerHTML = '';

            Object.keys(userAttendance).forEach(uid => {
                const data = userAttendance[uid];
                const totalAllowance = data.days * MEAL_ALLOWANCE;

                summaryContent.innerHTML += `
                    <div class="bg-white p-4 rounded-lg">
                        <p class="text-gray-700 font-semibold">${data.username}</p>
                        <p class="text-sm text-gray-600 mt-1">Days: ${data.days}</p>
                        <p class="text-2xl font-bold text-green-700 mt-2">Rp ${totalAllowance.toLocaleString('id-ID')}</p>
                        <p class="text-xs text-gray-500">Meal Allowance</p>
                    </div>
                `;
            });
        } else {
            summaryDiv.classList.add('hidden');
        }
    }

    function resetAttendanceFilter() {
        document.getElementById('attendanceUserFilter').value = '';
        document.getElementById('attendanceWeekFilter').value = '';
        filterAttendance();
    }

    // REPORTS FILTER FUNCTIONS
    function updateReportDateFilter() {
        const periodType = document.getElementById('reportPeriodType').value;
        const dateFilter = document.getElementById('reportDateFilter');

        if (periodType === 'weekly') {
            dateFilter.type = 'week';
        } else if (periodType === 'monthly') {
            dateFilter.type = 'month';
        } else {
            dateFilter.type = 'date';
        }
        dateFilter.value = '';
        filterReports();
    }

    function filterReports() {
        const userId = document.getElementById('reportUserFilter').value;
        const periodType = document.getElementById('reportPeriodType').value;
        const periodValue = document.getElementById('reportDateFilter').value;
        const rows = document.querySelectorAll('.report-row');

        let visibleCount = 0;
        let withFilesCount = 0;
        let selectedUsername = 'All Users';

        rows.forEach(row => {
            const rowUserId = row.getAttribute('data-user-id');
            const rowDate = new Date(row.getAttribute('data-date'));
            const rowUsername = row.getAttribute('data-username');
            const hasFile = row.getAttribute('data-has-file');
            let show = true;

            if (userId && rowUserId !== userId) {
                show = false;
            } else if (userId) {
                selectedUsername = rowUsername;
            }

            if (periodValue) {
                if (periodType === 'daily') {
                    const selectedDate = new Date(periodValue);
                    if (rowDate.toDateString() !== selectedDate.toDateString()) {
                        show = false;
                    }
                } else if (periodType === 'weekly') {
                    const weekBounds = getWeekBounds(periodValue);
                    if (weekBounds && (rowDate < weekBounds.start || rowDate > weekBounds.end)) {
                        show = false;
                    }
                } else if (periodType === 'monthly') {
                    const [year, month] = periodValue.split('-');
                    if (rowDate.getFullYear() !== parseInt(year) ||
                        rowDate.getMonth() !== parseInt(month) - 1) {
                        show = false;
                    }
                }
            }

            row.style.display = show ? '' : 'none';

            if (show) {
                visibleCount++;
                if (hasFile === 'yes') withFilesCount++;
            }
        });

        document.getElementById('totalReports').textContent = visibleCount;
        document.getElementById('reportsWithFiles').textContent = withFilesCount;
        document.getElementById('selectedUser').textContent = selectedUsername;
    }

    function resetReportFilter() {
        document.getElementById('reportUserFilter').value = '';
        document.getElementById('reportPeriodType').value = 'daily';
        document.getElementById('reportDateFilter').type = 'date';
        document.getElementById('reportDateFilter').value = '';
        filterReports();
    }

    window.addEventListener('DOMContentLoaded', function() {
        showPage('dashboard');
        filterReports();
    });
</script>

</body>
</html>
