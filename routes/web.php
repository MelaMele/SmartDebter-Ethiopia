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

// 3. Parent Login Verification (በስልክ ቁጥር እና በ Student ID ከ Clever Cloud ያረጋግጣል)
Route::post('/parent/verify', function (Request $request) {
    $phone = trim($request->input('phone'));
    $studentCode = trim($request->input('student_code'));
    $schoolCode = $request->input('school_code');

    // 1. ከዳታቤዝ በስልክና በ Student ID መፈለግ
    $student = DB::table('students')
        ->join('parent_student', 'students.id', '=', 'parent_student.student_id')
        ->join('users', 'users.id', '=', 'parent_student.parent_id')
        ->where('users.phone', $phone)
        ->where('students.student_id_number', $studentCode)
        ->select('students.*', 'users.name as parent_name')
        ->first();

    // 2. በስልኩ ወይም በ Student ID ብቻ መፈለግ (ለተለዋዋጭ አጠቃቀም)
    if (!$student) {
        $student = DB::table('students')
            ->join('parent_student', 'students.id', '=', 'parent_student.student_id')
            ->join('users', 'users.id', '=', 'parent_student.parent_id')
            ->where('students.student_id_number', $studentCode)
            ->select('students.*', 'users.name as parent_name')
            ->first();
    }

    // 3. ምንም ተማሪ ካልተመዘገበ ለጊዜያዊ ማሳያ
    if (!$student && ($phone === '0911000000' && ($studentCode === '1001' || $studentCode === 'BG-1001' || $studentCode === '123456'))) {
        $student = (object)[
            'first_name' => 'ዮናስ',
            'last_name' => 'ዳዊት',
            'classroom_id' => '7-B',
            'parent_name' => 'አቶ ዳዊት በቀለ'
        ];
    }

    if (!$student) {
        return back()->with('error', 'የተሳሳተ ስልክ ቁጥር ወይም የተማሪ መለያ ኮድ (Student ID)! እባክዎ በትክክል ያስገቡ።');
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

// 4. Teacher Dashboard (የክፍሉን ተማሪዎች ከዳታቤዝ አውጥቶ ለመምህሩ ያሳያል)
Route::get('/teacher/entry', function (Request $request) {
    $classCode = $request->query('class', 'ክፍል 7-B');
    $teacherName = $request->query('name', 'የክፍል ኃላፊ መምህር');
    $activeAds = DB::table('advertisements')->where('is_active', true)->get();

    // ለመምህሩ የክፍሉን ተማሪዎች ዝርዝር ያወጣል
    $students = DB::table('students')
        ->leftJoin('parent_student', 'students.id', '=', 'parent_student.student_id')
        ->leftJoin('users', 'users.id', '=', 'parent_student.parent_id')
        ->where('students.classroom_id', $classCode)
        ->select('students.*', 'users.name as parent_name', 'users.phone as parent_phone')
        ->get();

    return view('dashboards.teacher', compact('classCode', 'teacherName', 'activeAds', 'students'));
});

Route::get('/dashboard/teacher', function () {
    $classCode = 'ክፍል 7-B';
    $teacherName = 'የክፍል ኃላፊ መምህር';
    $activeAds = DB::table('advertisements')->where('is_active', true)->get();
    $students = collect();
    return view('dashboards.teacher', compact('classCode', 'teacherName', 'activeAds', 'students'));
});

// 5. School Admin Dashboard (የተማሪዎች ዝርዝር ለተጠሪዎች እንዲታይ ተጨምሯል)
Route::get('/dashboard/admin', function (Request $request) {
    $schoolCode = $request->query('school', 'BG-001');
    $school = DB::table('schools')->where('code', $schoolCode)->first();

    // የታገደ ት/ቤት ከሆነ መግቢያውን ይዘጋበታል
    if ($school && ($school->status === 'suspended' || $school->status === 'inactive')) {
        return "<div style='font-family:sans-serif; text-align:center; padding:60px 20px; background:#fef2f2; min-height:100vh;'>
            <div style='max-width:500px; margin:auto; background:white; padding:40px; border-radius:20px; box-shadow:0 10px 25px rgba(0,0,0,0.1); border:1px solid #fecaca;'>
                <div style='font-size:50px; margin-bottom:15px;'>⛔</div>
                <h1 style='color:#991b1b; font-size:20px; margin-bottom:10px;'>የትምህርት ቤቱ አገልግሎት ታግዷል!</h1>
                <p style='color:#475569; font-size:14px; line-height:1.6;'>የ {$school->name} አገልግሎት በ Mela Solution Super Admin በጊዜያዊነት ታግዷል።</p>
                <div style='margin-top:25px; padding:15px; background:#fff1f2; border-radius:12px; border:1px dashed #fda4af;'>
                    <p style='color:#9f1239; font-size:12px; font-weight:bold; margin:0;'>አገልግሎቱን ለማስቀጠል እባክዎ ይደውሉ፡</p>
                    <p style='color:#be123c; font-size:16px; font-weight:900; margin:5px 0 0 0;'>0913064239 / 0703064239</p>
                </div>
            </div>
        </div>";
    }

    $activeAds = DB::table('advertisements')->where('is_active', true)->get();

    // ለዲቪዥን ተጠሪዎችና ለዋና ዳይሬክተር የሚታዩ እውነተኛ ተማሪዎች ከ MySQL
    $students = DB::table('students')
        ->leftJoin('parent_student', 'students.id', '=', 'parent_student.student_id')
        ->leftJoin('users', 'users.id', '=', 'parent_student.parent_id')
        ->select('students.*', 'users.name as parent_name', 'users.phone as parent_phone')
        ->orderBy('students.id', 'desc')
        ->get();

    return view('dashboards.admin', compact('school', 'activeAds', 'students'));
});

// ==================== [አዲስ የተጨመሩ] የተማሪዎች ምዝገባ፣ ማስተካከያና ማጥፊያ ====================

// ተማሪን በ MySQL መመዝገቢያ (ከነ ወላጅ ስልክ እና Student ID)
Route::post('/students/store', function (Request $request) {
    try {
        $parentPhone = trim($request->input('phone'));
        $parentName = trim($request->input('parent_name', 'የተማሪ ወላጅ'));
        $studentIdNumber = trim($request->input('student_id_number'));
        $firstName = trim($request->input('first_name'));
        $lastName = trim($request->input('last_name'));
        $className = trim($request->input('class_name'));

        // 1. ወላጁን users ሰንጠረዥ ላይ መመዝገብ ወይም መፈለግ
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

        // 2. ተማሪውን students ሰንጠረዥ ላይ ማስገባት
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

        // 3. ወላጅና ተማሪን ማገናኘት
        DB::table('parent_student')->insert([
            'parent_id' => $parentId,
            'student_id' => $studentId,
            'relationship' => 'Parent',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', "🎉 ተማሪ {$firstName} {$lastName} እና የወላጅ ስልክ ({$parentPhone}) በዳታቤዝ ተመዝግቧል! ወላጁ በስልኩና በኮድ ({$studentIdNumber}) መግባት ይችላል።");
    } catch (\Exception $e) {
        return back()->with('error', 'ስህተት ተፈጥሯል፡ ' . $e->getMessage());
    }
});

// ተማሪን ማስተካከያ (Update Student)
Route::post('/students/update', function (Request $request) {
    $studentId = $request->input('id');
    
    DB::table('students')->where('id', $studentId)->update([
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'classroom_id' => $request->input('class_name'),
        'student_id_number' => $request->input('student_id_number'),
        'updated_at' => now(),
    ]);

    $parentPhone = trim($request->input('phone'));
    if ($parentPhone) {
        $link = DB::table('parent_student')->where('student_id', $studentId)->first();
        if ($link) {
            DB::table('users')->where('id', $link->parent_id)->update(['phone' => $parentPhone]);
        }
    }

    return back()->with('success', 'የተማሪው መረጃ ተስተካክሏል!');
});

// ተማሪን ማጥፊያ (Delete Student)
Route::post('/students/delete', function (Request $request) {
    $studentId = $request->input('id');
    DB::table('parent_student')->where('student_id', $studentId)->delete();
    DB::table('students')->where('id', $studentId)->delete();
    return back()->with('success', 'ተማሪው ከዳታቤዝ ተሰርዟል!');
});

// =========================================================================================

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
    try {
        DB::statement("ALTER TABLE schools MODIFY status VARCHAR(50) DEFAULT 'active'");
    } catch (\Exception $e) {}

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

// 8. TOGGLE SCHOOL STATUS (ማገድ እና ማንቃት)
Route::post('/super-admin/schools/toggle-status', function (Request $request) {
    $schoolId = $request->input('id');

    try {
        DB::statement("ALTER TABLE schools MODIFY status VARCHAR(50) DEFAULT 'active'");
    } catch (\Exception $e) {}

    $current = DB::table('schools')->where('id', $schoolId)->first();
    if ($current) {
        $newStatus = ($current->status == 'active') ? 'suspended' : 'active';
        
        DB::table('schools')->where('id', $schoolId)->update([
            'status' => $newStatus,
            'updated_at' => now()
        ]);

        $msg = ($newStatus === 'suspended') ? "⚠️ '{$current->name}' አገልግሎቱ ታግዷል!" : "✅ '{$current->name}' አገልግሎቱ ነቅቷል!";
        return back()->with('success', $msg);
    }

    return back();
});

// 9. Update School
Route::post('/super-admin/schools/update', function (Request $request) {
    $schoolId = $request->input('id');
    DB::table('schools')->where('id', $schoolId)->update([
        'name' => $request->input('name'),
        'code' => strtoupper($request->input('code')),
        'city' => $request->input('city'),
        'phone' => $request->input('phone'),
        'updated_at' => now(),
    ]);

    return back()->with('success', 'የትምህርት ቤቱ መረጃ ተስተካክሏል!');
});

// 10. Delete School
Route::post('/super-admin/schools/delete', function (Request $request) {
    DB::table('schools')->where('id', $request->input('id'))->delete();
    return back()->with('success', 'ትምህርት ቤቱ ከዳታቤዝ ተሰርዟል!');
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

// 13. Proposals
Route::get('/proposal/school', function () { return view('documents.proposal-school'); });
Route::get('/proposal/sponsorship', function () { return view('documents.proposal-sponsorship'); });
Route::get('/proposal/neway-challenge', function () { return view('documents.proposal-neway'); });
