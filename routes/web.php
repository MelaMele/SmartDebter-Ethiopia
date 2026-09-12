<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// ዳታቤዙን በራስ-ሰር የሚያስተካክል ፈንክሽን (Auto-Migrate Columns)
function ensureCommunicationColumnsExist() {
    try {
        if (!Schema::hasColumn('communications', 'sender_type')) {
            DB::statement("ALTER TABLE communications ADD COLUMN sender_type VARCHAR(30) DEFAULT 'teacher'");
            DB::statement("ALTER TABLE communications ADD COLUMN sender_phone VARCHAR(30) NULL");
            DB::statement("ALTER TABLE communications ADD COLUMN recipient VARCHAR(30) DEFAULT 'parent'");
        }
    } catch (\Exception $e) {}
}

// 1. Landing Page
Route::get('/', function () {
    $activeAds = DB::table('advertisements')->where('is_active', true)->get();
    return view('welcome', compact('activeAds'));
});

// 2. Login Page
Route::get('/login', function () {
    return view('login');
});

// 3. Parent Login & Verification
Route::post('/parent/verify', function (Request $request) {
    ensureCommunicationColumnsExist();

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

    if (!$student) {
        $student = DB::table('students')
            ->join('parent_student', 'students.id', '=', 'parent_student.student_id')
            ->join('users', 'users.id', '=', 'parent_student.parent_id')
            ->where('students.student_id_number', $studentCode)
            ->select('students.*', 'users.name as parent_name')
            ->first();
    }

    if (!$student && ($phone === '0911000000' && ($studentCode === '1001' || $studentCode === 'BG-1001'))) {
        $student = (object)[
            'first_name' => 'ዮናስ',
            'last_name' => 'ዳዊት',
            'classroom_id' => 'ክፍል 7-B',
            'parent_name' => 'አቶ ዳዊት በቀለ'
        ];
    }

    if (!$student) {
        return back()->with('error', 'የተሳሳተ ስልክ ቁጥር ወይም የተማሪ መለያ ኮድ (Student ID)!');
    }

    $childClass = $student->classroom_id;
    $parent = [
        'name' => $student->parent_name,
        'children' => [
            ['name' => $student->first_name . ' ' . $student->last_name, 'grade' => $childClass]
        ]
    ];

    try {
        $teacherNotes = DB::table('communications')
            ->where('classroom_id', $childClass)
            ->where('sender_type', 'teacher')
            ->orderBy('id', 'desc')
            ->get();

        $parentSentNotes = DB::table('communications')
            ->where('sender_phone', $phone)
            ->where('sender_type', 'parent')
            ->orderBy('id', 'desc')
            ->get();
    } catch (\Exception $e) {
        $teacherNotes = collect();
        $parentSentNotes = collect();
    }

    $activeAds = DB::table('advertisements')->where('is_active', true)->get();
    return view('dashboards.parent', compact('parent', 'phone', 'childClass', 'activeAds', 'teacherNotes', 'parentSentNotes'));
});

Route::get('/dashboard/parent', function () {
    ensureCommunicationColumnsExist();

    $parent = [
        'name' => 'አቶ ዳዊት በቀለ',
        'children' => [['name' => 'ዮናስ ዳዊት', 'grade' => 'ክፍል 7-B']]
    ];
    $phone = '0911000000';
    $childClass = 'ክፍል 7-B';

    try {
        $teacherNotes = DB::table('communications')->where('classroom_id', $childClass)->where('sender_type', 'teacher')->orderBy('id', 'desc')->get();
        $parentSentNotes = DB::table('communications')->where('sender_phone', $phone)->where('sender_type', 'parent')->orderBy('id', 'desc')->get();
    } catch (\Exception $e) {
        $teacherNotes = collect();
        $parentSentNotes = collect();
    }

    $activeAds = DB::table('advertisements')->where('is_active', true)->get();
    return view('dashboards.parent', compact('parent', 'phone', 'childClass', 'activeAds', 'teacherNotes', 'parentSentNotes'));
});

// 4. Teacher Dashboard
Route::get('/teacher/entry', function (Request $request) {
    ensureCommunicationColumnsExist();

    $classCode = $request->query('class', 'ክፍል 7-B');
    $teacherName = $request->query('name', 'የክፍል ኃላፊ መምህር');
    $activeAds = DB::table('advertisements')->where('is_active', true)->get();

    $students = DB::table('students')
        ->leftJoin('parent_student', 'students.id', '=', 'parent_student.student_id')
        ->leftJoin('users', 'users.id', '=', 'parent_student.parent_id')
        ->where('students.classroom_id', $classCode)
        ->select('students.*', 'users.name as parent_name', 'users.phone as parent_phone')
        ->get();

    try {
        $sentNotes = DB::table('communications')
            ->where('classroom_id', $classCode)
            ->where('sender_type', 'teacher')
            ->orderBy('id', 'desc')
            ->get();

        $parentMessages = DB::table('communications')
            ->where('classroom_id', $classCode)
            ->where('sender_type', 'parent')
            ->orderBy('id', 'desc')
            ->get();
    } catch (\Exception $e) {
        $sentNotes = collect();
        $parentMessages = collect();
    }

    return view('dashboards.teacher', compact('classCode', 'teacherName', 'activeAds', 'students', 'sentNotes', 'parentMessages'));
});

Route::get('/dashboard/teacher', function () {
    ensureCommunicationColumnsExist();

    $classCode = 'ክፍል 7-B';
    $teacherName = 'የክፍል ኃላፊ መምህር';
    $activeAds = DB::table('advertisements')->where('is_active', true)->get();
    $students = collect();
    $sentNotes = collect();
    $parentMessages = collect();
    return view('dashboards.teacher', compact('classCode', 'teacherName', 'activeAds', 'students', 'sentNotes', 'parentMessages'));
});

// ==================== [የመልእክት መላኪያ መንገዶች] ====================

Route::post('/communications/teacher-send', function (Request $request) {
    ensureCommunicationColumnsExist();

    DB::table('communications')->insert([
        'school_id' => 1,
        'sender_id' => 1,
        'classroom_id' => $request->input('class_code'),
        'category' => $request->input('category'),
        'title' => $request->input('title'),
        'message' => $request->input('message'),
        'due_date' => now(),
        'sender_type' => 'teacher',
        'recipient' => 'parent',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return back()->with('success', 'የቤት ስራው በዳታቤዝ ተመዝግቦ ለወላጆች ደርሷል!');
});

Route::post('/communications/parent-send', function (Request $request) {
    ensureCommunicationColumnsExist();

    $rec = $request->input('recipient', 'መምህር');
    $topic = $request->input('topic');
    $msg = $request->input('message');
    $phone = $request->input('parent_phone');
    $classCode = $request->input('class_code');

    DB::table('communications')->insert([
        'school_id' => 1,
        'sender_id' => 0,
        'classroom_id' => $classCode,
        'category' => $topic,
        'title' => $topic . ' (' . $rec . ')',
        'message' => $msg,
        'sender_type' => 'parent',
        'sender_phone' => $phone,
        'recipient' => $rec,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return back()->with('success', 'ማስታወሻዎ በዳታቤዝ ተመዝግቦ ደርሷል!');
});

// ====================================================================

// 5. School Admin Dashboard
Route::get('/dashboard/admin', function (Request $request) {
    ensureCommunicationColumnsExist();

    $schoolCode = $request->query('school', 'BG-001');
    $school = DB::table('schools')->where('code', $schoolCode)->first();

    if ($school && ($school->status === 'suspended' || $school->status === 'inactive')) {
        return "<div style='font-family:sans-serif; text-align:center; padding:60px 20px; background:#fef2f2; min-height:100vh;'>
            <div style='max-width:500px; margin:auto; background:white; padding:40px; border-radius:20px; box-shadow:0 10px 25px rgba(0,0,0,0.1); border:1px solid #fecaca;'>
                <div style='font-size:50px; margin-bottom:15px;'>⛔</div>
                <h1 style='color:#991b1b; font-size:20px;'>የትምህርት ቤቱ አገልግሎት ታግዷል!</h1>
                <p style='color:#be123c; font-size:16px; font-weight:900;'>0913064239 / 0703064239</p>
            </div>
        </div>";
    }

    $activeAds = DB::table('advertisements')->where('is_active', true)->get();
    $students = DB::table('students')
        ->leftJoin('parent_student', 'students.id', '=', 'parent_student.student_id')
        ->leftJoin('users', 'users.id', '=', 'parent_student.parent_id')
        ->select('students.*', 'users.name as parent_name', 'users.phone as parent_phone')
        ->orderBy('students.id', 'desc')
        ->get();

    return view('dashboards.admin', compact('school', 'activeAds', 'students'));
});

// Student Actions
Route::post('/students/store', function (Request $request) {
    try {
        $parentPhone = trim($request->input('phone'));
        $parentName = trim($request->input('parent_name', 'የተማሪ ወላጅ'));
        $studentIdNumber = trim($request->input('student_id_number'));
        $firstName = trim($request->input('first_name'));
        $lastName = trim($request->input('last_name'));
        $className = trim($request->input('class_name'));

        $parent = DB::table('users')->where('phone', $parentPhone)->first();
        if (!$parent) {
            $parentId = DB::table('users')->insertGetId([
                'name' => $parentName,
                'phone' => $parentPhone,
                'role' => 'parent',
                'password' => bcrypt($studentIdNumber),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            $parentId = $parent->id;
        }

        $studentId = DB::table('students')->insertGetId([
            'school_id' => 1,
            'classroom_id' => $className,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'gender' => $request->input('gender', 'male'),
            'student_id_number' => $studentIdNumber,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('parent_student')->insert([
            'parent_id' => $parentId,
            'student_id' => $studentId,
            'relationship' => 'Parent',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', "🎉 ተማሪ {$firstName} {$lastName} እና የወላጅ ስልክ ({$parentPhone}) ተመዝግቧል!");
    } catch (\Exception $e) {
        return back()->with('error', 'ስህተት፡ ' . $e->getMessage());
    }
});

Route::post('/students/update', function (Request $request) {
    $studentId = $request->input('id');
    DB::table('students')->where('id', $studentId)->update([
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'classroom_id' => $request->input('class_name'),
        'student_id_number' => $request->input('student_id_number'),
        'updated_at' => now(),
    ]);
    return back()->with('success', 'የተማሪው መረጃ ተስተካክሏል!');
});

Route::post('/students/delete', function (Request $request) {
    $studentId = $request->input('id');
    DB::table('parent_student')->where('student_id', $studentId)->delete();
    DB::table('students')->where('id', $studentId)->delete();
    return back()->with('success', 'ተማሪው ተሰርዟል!');
});

// Super Admin
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

Route::post('/super-admin/schools/store', function (Request $request) {
    try { DB::statement("ALTER TABLE schools MODIFY status VARCHAR(50) DEFAULT 'active'"); } catch (\Exception $e) {}
    DB::table('schools')->insert([
        'name' => $request->input('name'),
        'code' => strtoupper($request->input('code')),
        'city' => $request->input('city'),
        'phone' => $request->input('phone'),
        'status' => 'active',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    return back()->with('success', 'ትምህርት ቤቱ ተመዝግቧል!');
});

Route::post('/super-admin/schools/toggle-status', function (Request $request) {
    $schoolId = $request->input('id');
    $current = DB::table('schools')->where('id', $schoolId)->first();
    if ($current) {
        $newStatus = ($current->status == 'active') ? 'suspended' : 'active';
        DB::table('schools')->where('id', $schoolId)->update(['status' => $newStatus, 'updated_at' => now()]);
        return back()->with('success', "ሁኔታው ተቀይሯል!");
    }
    return back();
});

Route::post('/super-admin/schools/update', function (Request $request) {
    DB::table('schools')->where('id', $request->input('id'))->update([
        'name' => $request->input('name'),
        'code' => strtoupper($request->input('code')),
        'city' => $request->input('city'),
        'phone' => $request->input('phone'),
        'updated_at' => now(),
    ]);
    return back()->with('success', 'ተስተካክሏል!');
});

Route::post('/super-admin/schools/delete', function (Request $request) {
    DB::table('schools')->where('id', $request->input('id'))->delete();
    return back()->with('success', 'ተሰርዟል!');
});

Route::post('/super-admin/ads/store', function (Request $request) {
    try { DB::statement('ALTER TABLE advertisements MODIFY image_url LONGTEXT'); } catch (\Exception $e) {}
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
    return back()->with('success', 'ማስታወቂያው ተመዝግቧል!');
});

Route::post('/super-admin/ads/delete', function (Request $request) {
    DB::table('advertisements')->where('id', $request->input('id'))->delete();
    return back();
});

Route::get('/proposal/neway-challenge', function () {
    return view('documents.proposal-neway');
});
