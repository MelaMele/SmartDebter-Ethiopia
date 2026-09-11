<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// 1. Landing Page
Route::get('/', function () {
    $activeAds = DB::table('advertisements')->where('is_active', true)->get();
    return view('welcome', compact('activeAds'));
});

// 2. Login Page
Route::get('/login', function () {
    return view('login');
});

// 3. Parent Login Verification
Route::post('/parent/verify', function (Request $request) {
    $phone = trim($request->input('phone'));
    $studentCode = trim($request->input('student_code'));
    $schoolCode = $request->input('school_code');

    $student = DB::table('students')
        ->join('parent_student', 'students.id', '=', 'parent_student.student_id')
        ->join('users', 'users.id', '=', 'parent_student.parent_id')
        ->where('users.phone', $phone)
        ->where('students.student_id_number', $studentCode)
        ->select('students.*', 'users.name as parent_name')
        ->first();

    if (!$student && ($phone === '0911000000' && ($studentCode === '1001' || $studentCode === 'BG-1001' || $studentCode === '123456'))) {
        $student = (object)[
            'first_name' => 'ዮናስ',
            'last_name' => 'ዳዊት',
            'classroom_id' => '7-B',
            'parent_name' => 'አቶ ዳዊት በቀለ'
        ];
    }

    if (!$student) {
        return back()->with('error', 'የተሳሳተ ስልክ ቁጥር ወይም የተማሪ መለያ ኮድ (Student ID)!');
    }

    $parent = [
        'name' => $student->parent_name,
        'children' => [
            ['name' => $student->first_name . ' ' . $student->last_name, 'grade' => 'ክፍል ' . $student->classroom_id]
        ]
    ];

    $activeAds = DB::table('advertisements')->where('is_active', true)->get();
    return view('dashboards.parent', compact('parent', 'phone', 'activeAds'));
});

Route::get('/dashboard/parent', function () {
    $parent = [
        'name' => 'የተማሪ ወላጅ',
        'children' => [['name' => 'ተማሪ', 'grade' => 'ክፍል 7-B']]
    ];
    $phone = '0911000000';
    $activeAds = DB::table('advertisements')->where('is_active', true)->get();
    return view('dashboards.parent', compact('parent', 'phone', 'activeAds'));
});

// 4. Teacher Dashboard
Route::get('/teacher/entry', function (Request $request) {
    $classCode = $request->query('class', 'ክፍል 7-B');
    $teacherName = $request->query('name', 'የክፍል ኃላፊ መምህር');
    $activeAds = DB::table('advertisements')->where('is_active', true)->get();
    return view('dashboards.teacher', compact('classCode', 'teacherName', 'activeAds'));
});

Route::get('/dashboard/teacher', function () {
    $classCode = 'ክፍል 7-B';
    $teacherName = 'የክፍል ኃላፊ መምህር';
    $activeAds = DB::table('advertisements')->where('is_active', true)->get();
    return view('dashboards.teacher', compact('classCode', 'teacherName', 'activeAds'));
});

// 5. School Admin Dashboard
Route::get('/dashboard/admin', function (Request $request) {
    $schoolCode = $request->query('school', 'BG-001');
    $school = DB::table('schools')->where('code', $schoolCode)->first();
    $activeAds = DB::table('advertisements')->where('is_active', true)->get();
    return view('dashboards.admin', compact('school', 'activeAds'));
});

// 6. Super Admin Dashboard
Route::get('/dashboard/super-admin', function () {
    $schools = DB::table('schools')->orderBy('id', 'desc')->get();
    $ads = DB::table('advertisements')->orderBy('id', 'desc')->get();
    
    $stats = [
        'schools_count' => $schools->count(),
        'students_count' => DB::table('students')->count(),
        'ads_count' => $ads->where('is_active', true)->count(),
        'views_count' => $ads->sum('impressions')
    ];

    return view('dashboards.super-admin', compact('schools', 'ads', 'stats'));
});

// 7. Store School
Route::post('/super-admin/schools/store', function (Request $request) {
    DB::table('schools')->insert([
        'name' => $request->input('name'),
        'code' => strtoupper($request->input('code')),
        'city' => $request->input('city'),
        'phone' => $request->input('phone'),
        'status' => 'active',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return back()->with('success', 'ትምህርት ቤቱ በ Clever Cloud ዳታቤዝ ላይ ተመዝግቧል!');
});

// 8. UPDATE SCHOOL (ት/ቤትን ማስተካከያ)
Route::post('/super-admin/schools/update', function (Request $request) {
    $schoolId = $request->input('id');
    DB::table('schools')->where('id', $schoolId)->update([
        'name' => $request->input('name'),
        'code' => strtoupper($request->input('code')),
        'city' => $request->input('city'),
        'phone' => $request->input('phone'),
        'updated_at' => now(),
    ]);

    return back()->with('success', 'የትምህርት ቤቱ መረጃ በተሳካ ሁኔታ ተስተካክሏል!');
});

// 9. DELETE SCHOOL (ት/ቤትን ከዳታቤዝ ማጥፊያ)
Route::post('/super-admin/schools/delete', function (Request $request) {
    DB::table('schools')->where('id', $request->input('id'))->delete();
    return back()->with('success', 'ትምህርት ቤቱ ከዳታቤዝ ተሰርዟል!');
});

// 10. Toggle School Status
Route::post('/super-admin/schools/toggle-status', function (Request $request) {
    $schoolId = $request->input('id');
    $current = DB::table('schools')->where('id', $schoolId)->first();
    $newStatus = ($current->status == 'active') ? 'suspended' : 'active';
    DB::table('schools')->where('id', $schoolId)->update(['status' => $newStatus, 'updated_at' => now()]);
    return back();
});

// 11. Store Ad
Route::post('/super-admin/ads/store', function (Request $request) {
    try {
        DB::statement('ALTER TABLE advertisements MODIFY image_url LONGTEXT');
    } catch (\Exception $e) {}

    DB::table('advertisements')->insert([
        'company_name' => $request->input('company_name'),
        'title' => $request->input('title', 'ስፖንሰር ማስታወቂያ'),
        'target_audience' => $request->input('target_audience', 'ለሁሉም ተጠቃሚዎች'),
        'duration' => $request->input('duration', 'ያልተገደበ (ቋሚ)'),
        'target_url' => $request->input('target_url', 'tel:0913064239'),
        'image_url' => $request->input('image_base64'),
        'is_active' => true,
        'impressions' => 0,
        'clicks' => 0,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return back()->with('success', 'ማስታወቂያው በዳታቤዝ ተመዝግቧል!');
});

// 12. Delete Ad
Route::post('/super-admin/ads/delete', function (Request $request) {
    DB::table('advertisements')->where('id', $request->input('id'))->delete();
    return back();
});
// 13. Official Proposal Document for Neway Challenge Academy
Route::get('/proposal/neway-challenge', function () {
    return view('documents.proposal-neway');
});
// 14. Dynamic School Proposal Generator (ለሁሉም ት/ቤቶች)
Route::get('/proposal/school', function () {
    return view('documents.proposal-school');
});

// 15. Corporate Sponsorship Proposal (ለባንኮችና አስተዋዋቂ ድርጅቶች)
Route::get('/proposal/sponsorship', function () {
    return view('documents.proposal-sponsorship');
});
