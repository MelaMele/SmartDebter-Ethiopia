<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// 1. Landing Page (ከዳታቤዝ ንቁ ማስታወቂያዎችን ይዞ ይከፍታል)
Route::get('/', function () {
    $activeAds = DB::table('advertisements')->where('is_active', true)->get();
    return view('welcome', compact('activeAds'));
});

// 2. Login Page
Route::get('/login', function () {
    return view('login');
});

// 3. Parent Login Verification (በስልክ ቁጥር ከዳታቤዝ ተማሪውን ያጣራል)
Route::post('/parent/verify', function (Request $request) {
    $phone = $request->input('phone');

    $student = DB::table('students')
        ->join('parent_student', 'students.id', '=', 'parent_student.student_id')
        ->join('users', 'users.id', '=', 'parent_student.parent_id')
        ->where('users.phone', $phone)
        ->select('students.*', 'users.name as parent_name')
        ->first();

    if ($student) {
        $parent = [
            'name' => $student->parent_name,
            'children' => [
                ['name' => $student->first_name . ' ' . $student->last_name, 'grade' => 'ክፍል ' . $student->classroom_id]
            ]
        ];
    } else {
        $parent = [
            'name' => 'የተማሪ ወላጅ',
            'children' => [['name' => 'ተማሪ', 'grade' => 'ክፍል 7-B']]
        ];
    }

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

// 6. Super Admin Dashboard (ከ Clever Cloud ዳታቤዝ ት/ቤቶችን እና ማስታወቂያዎችን ያነባል)
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

// 7. SUPER ADMIN: አዲስ ት/ቤት መመዝገቢያ (Direct MySQL Insert)
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

// 8. SUPER ADMIN: ት/ቤት ማገድ / ማንቃት (Direct MySQL Status Update)
Route::post('/super-admin/schools/toggle-status', function (Request $request) {
    $schoolId = $request->input('id');
    $current = DB::table('schools')->where('id', $schoolId)->first();
    
    $newStatus = ($current->status == 'active') ? 'suspended' : 'active';
    DB::table('schools')->where('id', $schoolId)->update(['status' => $newStatus, 'updated_at' => now()]);

    return back();
});

// 9. SUPER ADMIN: አዲስ ማስታወቂያ መጫኛ (Direct MySQL Ad Insert)
Route::post('/super-admin/ads/store', function (Request $request) {
    DB::table('advertisements')->insert([
        'company_name' => $request->input('company_name'),
        'title' => $request->input('title'),
        'target_audience' => $request->input('target_audience', 'all'),
        'duration' => $request->input('duration', 'unlimited'),
        'target_url' => $request->input('target_url', 'tel:0913064239'),
        'image_url' => $request->input('image_url', 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=200&auto=format&fit=crop&q=60'),
        'is_active' => true,
        'impressions' => 0,
        'clicks' => 0,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return back()->with('success', 'ማስታወቂያው በዳታቤዝ ላይ ተመዝግቦ በሁሉም አንቀሳቃሽ ሰሌዳዎች ላይ ተሰራጭቷል!');
});

// 10. SUPER ADMIN: ማስታወቂያ ማጥፊያ (Direct MySQL Delete)
Route::post('/super-admin/ads/delete', function (Request $request) {
    DB::table('advertisements')->where('id', $request->input('id'))->delete();
    return back();
});
