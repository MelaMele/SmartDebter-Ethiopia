<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

if (!function_exists('ensureCommunicationColumnsExist')) {
    function ensureCommunicationColumnsExist() {
        try {
            DB::statement("ALTER TABLE students MODIFY classroom_id VARCHAR(100) NULL");
            DB::statement("ALTER TABLE communications MODIFY classroom_id VARCHAR(100) NULL");

            if (!Schema::hasColumn('students', 'age')) {
                DB::statement("ALTER TABLE students ADD COLUMN age VARCHAR(10) NULL");
            }
            if (!Schema::hasColumn('communications', 'sender_type')) {
                DB::statement("ALTER TABLE communications ADD COLUMN sender_type VARCHAR(30) DEFAULT 'teacher'");
                DB::statement("ALTER TABLE communications ADD COLUMN sender_phone VARCHAR(30) NULL");
                DB::statement("ALTER TABLE communications ADD COLUMN recipient VARCHAR(30) DEFAULT 'parent'");
            }
            if (!Schema::hasColumn('communications', 'student_id')) {
                DB::statement("ALTER TABLE communications ADD COLUMN student_id BIGINT NULL");
            }
            if (!Schema::hasTable('teacher_assignments')) {
                Schema::create('teacher_assignments', function (Blueprint $table) {
                    $table->id();
                    $table->string('teacher_name');
                    $table->string('classroom_id');
                    $table->string('division')->default('all');
                    $table->string('campus')->default('all');
                    $table->timestamps();
                });
            }
        } catch (\Exception $e) {}
    }
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
Route::match(['get', 'post'], '/parent/verify', function (Request $request) {
    ensureCommunicationColumnsExist();

    $phone = trim($request->input('phone', $request->query('phone', '')));
    $studentCode = trim($request->input('student_code', $request->query('student_code', '')));
    $schoolCode = $request->input('school_code', $request->query('school', ''));

    if (empty($phone) || empty($studentCode)) {
        return redirect('/login')->with('error', 'እባክዎ ስልክ ቁጥርዎን እና የተማሪውን መለያ ቁጥር (ID) ያስገቡ።');
    }

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

    if (!$student) {
        return redirect('/login')->with('error', 'ይህ ስልክ ቁጥር ወይም የተማሪ መለያ ኮድ በትምህርት ቤቱ ዳታቤዝ አልተገኘም!');
    }

    $childClass = $student->classroom_id;
    $studentId = $student->id;
    $parent = [
        'name' => $student->parent_name,
        'children' => [
            ['name' => $student->first_name . ' ' . $student->last_name, 'grade' => $childClass]
        ]
    ];

    try {
        $teacherNotes = DB::table('communications')
            ->where(function($q) use ($childClass) {
                $q->where('classroom_id', $childClass)->orWhere('classroom_id', 'all');
            })
            ->where(function($q) use ($studentId) {
                $q->whereNull('student_id')->orWhere('student_id', 0)->orWhere('student_id', $studentId);
            })
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
    return redirect('/login');
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
            ->where(function($q) {
                $q->where('recipient', 'መምህር')->orWhere('recipient', 'parent')->orWhereNull('recipient');
            })
            ->orderBy('id', 'desc')
            ->get();
    } catch (\Exception $e) {
        $sentNotes = collect();
        $parentMessages = collect();
    }

    return view('dashboards.teacher', compact('classCode', 'teacherName', 'activeAds', 'students', 'sentNotes', 'parentMessages'));
});

Route::get('/dashboard/teacher', function () {
    return redirect('/teacher/entry');
});

// 5. School Admin Dashboard
Route::get('/dashboard/admin', function (Request $request) {
    ensureCommunicationColumnsExist();

    $schoolCode = $request->query('school', 'NCA-001');
    $division = $request->query('division', 'all');
    $campus = $request->query('campus', 'all');
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

    try {
        $assignedTeachers = DB::table('teacher_assignments')->orderBy('id', 'desc')->get();
    } catch (\Exception $e) {
        $assignedTeachers = collect();
    }

    try {
        $parentInquiries = DB::table('communications')
            ->where('sender_type', 'parent')
            ->where('recipient', 'ዲቪዥን ተጠሪ')
            ->orderBy('id', 'desc')
            ->get();
    } catch (\Exception $e) {
        $parentInquiries = collect();
    }

    return view('dashboards.admin', compact('school', 'activeAds', 'students', 'parentInquiries', 'assignedTeachers'));
});

// ==================== [እውነተኛ የ EXCEL/CSV በጅምላ መጫኛ (REAL BULK IMPORTER)] ====================

Route::post('/students/bulk-import', function (Request $request) {
    ensureCommunicationColumnsExist();

    if (!$request->hasFile('csv_file')) {
        return back()->with('error', 'እባክዎ መጀመሪያ የ CSV ፋይል ይምረጡ!');
    }

    try {
        $file = $request->file('csv_file');
        $handle = fopen($file->getRealPath(), 'r');

        // Skip UTF-8 BOM if present
        $bom = fread($handle, 3);
        if ($bom !== "\xEF\xBB\xBF") {
            rewind($handle);
        }

        // Read header row
        $header = fgetcsv($handle);

        $importedCount = 0;
        $now = now();

        while (($row = fgetcsv($handle)) !== false) {
            if (empty($row) || count($row) < 3 || empty($row[0])) {
                continue;
            }

            // 7 Columns: [0]ሙሉ ስም, [1]ጾታ, [2]እድሜ, [3]የተማሪ ID, [4]የወላጅ ስልክ, [5]ክፍል, [6]ሴክሽን
            $fullName = trim($row[0]);
            $gender = isset($row[1]) ? trim($row[1]) : 'ወንድ';
            $age = isset($row[2]) ? trim($row[2]) : null;
            $studentIdNumber = isset($row[3]) && !empty(trim($row[3])) ? trim($row[3]) : rand(1000, 9999);
            $parentPhone = isset($row[4]) && !empty(trim($row[4])) ? trim($row[4]) : '09' . rand(10000000, 99999999);
            $grade = isset($row[5]) ? trim($row[5]) : 'ክፍል';
            $section = isset($row[6]) ? trim($row[6]) : 'A';
            $className = $grade . ' - ' . $section;

            $parts = explode(' ', $fullName, 2);
            $firstName = $parts[0] ?? $fullName;
            $lastName = $parts[1] ?? '';

            // 1. ወላጅ በ MySQL ውስጥ
            $parent = DB::table('users')->where('phone', $parentPhone)->first();
            if (!$parent) {
                $parentId = DB::table('users')->insertGetId([
                    'name' => $lastName ? 'የ' . $fullName . ' ወላጅ' : 'የተማሪ ወላጅ',
                    'phone' => $parentPhone,
                    'role' => 'parent',
                    'password' => bcrypt($studentIdNumber),
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            } else {
                $parentId = $parent->id;
            }

            // 2. ተማሪ በ MySQL ውስጥ
            $studentId = DB::table('students')->insertGetId([
                'school_id' => 1,
                'classroom_id' => $className,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'gender' => ($gender == 'ሴት' || $gender == 'female') ? 'female' : 'male',
                'age' => $age,
                'student_id_number' => $studentIdNumber,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            // 3. ማገናኛ
            DB::table('parent_student')->insert([
                'parent_id' => $parentId,
                'student_id' => $studentId,
                'relationship' => 'Parent',
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $importedCount++;
        }

        fclose($handle);

        return back()->with('success', "🎉 እሰይ! {$importedCount} ተማሪዎች እና የወላጆቻቸው ስልክ ቁጥር በቀጥታ ወደ Clever Cloud MySQL ዳታቤዝ ተጭነዋል!");
    } catch (\Exception $e) {
        return back()->with('error', 'የፋይል መጫን ስህተት፡ ' . $e->getMessage());
    }
});

// ==================== [የተማሪ ነጠላ ምዝገባ፣ ማስተካከያና ማጥፊያ] ====================

Route::post('/students/store', function (Request $request) {
    ensureCommunicationColumnsExist();

    try {
        $fullName = trim($request->input('full_name'));
        $parts = explode(' ', $fullName, 2);
        $firstName = $parts[0] ?? $fullName;
        $lastName = $parts[1] ?? '';

        $gender = $request->input('gender', 'ወንድ');
        $age = $request->input('age');
        $studentIdNumber = trim($request->input('student_id_number'));
        $parentPhone = trim($request->input('phone'));
        $gradeLevel = trim($request->input('grade_level'));
        $section = trim($request->input('section', 'A'));
        $className = $gradeLevel . ' - ' . $section;

        $parent = DB::table('users')->where('phone', $parentPhone)->first();
        if (!$parent) {
            $parentId = DB::table('users')->insertGetId([
                'name' => $lastName ? 'የ' . $fullName . ' ወላጅ' : 'የተማሪ ወላጅ',
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
            'gender' => ($gender == 'ሴት' || $gender == 'female') ? 'female' : 'male',
            'age' => $age,
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

        return back()->with('success', "🎉 ተማሪ {$fullName} (ክፍል: {$className}) በዳታቤዝ ተመዝግቧል!");
    } catch (\Exception $e) {
        return back()->with('error', 'ስህተት፡ ' . $e->getMessage());
    }
});

Route::post('/students/update', function (Request $request) {
    ensureCommunicationColumnsExist();

    try {
        $studentId = $request->input('id');
        $fullName = trim($request->input('full_name'));
        $parts = explode(' ', $fullName, 2);
        $firstName = $parts[0] ?? $fullName;
        $lastName = $parts[1] ?? '';
        $gender = $request->input('gender', 'ወንድ');
        $className = trim($request->input('class_name'));
        
        DB::table('students')->where('id', $studentId)->update([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'gender' => ($gender == 'ሴት' || $gender == 'female') ? 'female' : 'male',
            'age' => $request->input('age'),
            'classroom_id' => $className,
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
    } catch (\Exception $e) {
        return back()->with('error', 'ስህተት፡ ' . $e->getMessage());
    }
});

Route::post('/students/delete', function (Request $request) {
    $studentId = $request->input('id');
    DB::table('parent_student')->where('student_id', $studentId)->delete();
    DB::table('students')->where('id', $studentId)->delete();
    return back()->with('success', 'ተማሪው ከዳታቤዝ ተሰርዟል!');
});

// Teachers CRUD
Route::post('/teachers/store', function (Request $request) {
    ensureCommunicationColumnsExist();

    DB::table('teacher_assignments')->insert([
        'teacher_name' => $request->input('teacher_name'),
        'classroom_id' => $request->input('classroom_id'),
        'division' => $request->input('division', 'all'),
        'campus' => $request->input('campus', 'all'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return back()->with('success', 'መምህሩ በቋሚነት ተመዝግቧል!');
});

Route::post('/teachers/delete', function (Request $request) {
    DB::table('teacher_assignments')->where('id', $request->input('id'))->delete();
    return back()->with('success', 'መምህሩ ከዝርዝር ተሰርዟል!');
});

// Communications
Route::post('/communications/leader-send', function (Request $request) {
    ensureCommunicationColumnsExist();

    $targetType = $request->input('target_type', 'all');
    $classCode = ($targetType === 'all') ? 'all' : $request->input('classroom_id');

    DB::table('communications')->insert([
        'school_id' => 1,
        'sender_id' => 999,
        'classroom_id' => $classCode,
        'category' => $request->input('category', 'የፈተና ፕሮግራም'),
        'title' => $request->input('title'),
        'message' => $request->input('message'),
        'due_date' => now(),
        'sender_type' => 'leader',
        'recipient' => 'parent',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return back()->with('success', 'ማስታወቂያው ለወላጆች ተሰራጭቷል!');
});

Route::post('/communications/reply-parent', function (Request $request) {
    ensureCommunicationColumnsExist();

    $parentPhone = $request->input('parent_phone');
    $replyMsg = $request->input('reply_message');
    $origTitle = $request->input('original_title');

    DB::table('communications')->insert([
        'school_id' => 1,
        'sender_id' => 999,
        'classroom_id' => 'all',
        'category' => 'ከተጠሪው የተሰጠ መልስ',
        'title' => 'የተጠሪው ምላሽ፡ ' . $origTitle,
        'message' => $replyMsg,
        'due_date' => now(),
        'sender_type' => 'leader',
        'sender_phone' => $parentPhone,
        'recipient' => 'parent',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return back()->with('success', 'ምላሽዎ ለወላጁ ደብተር ላይ ተልኳል!');
});

Route::post('/communications/teacher-send', function (Request $request) {
    ensureCommunicationColumnsExist();

    $recipientType = $request->input('recipient_type', 'all');
    $studentId = ($recipientType === 'individual') ? $request->input('student_id') : null;

    DB::table('communications')->insert([
        'school_id' => 1,
        'sender_id' => 1,
        'classroom_id' => $request->input('class_code'),
        'student_id' => $studentId,
        'category' => $request->input('category'),
        'title' => $request->input('title'),
        'message' => $request->input('message'),
        'due_date' => now(),
        'sender_type' => 'teacher',
        'recipient' => 'parent',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return back()->with('success', 'መልእክቱ ለወላጆች ተልኳል!');
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

    return back()->with('success', "ማስታወሻዎ ተልኳል!");
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

    $targetUrl = trim($request->input('target_url', 'tel:0913064239'));
    if (!empty($targetUrl)) {
        $clean = str_replace(' ', '', $targetUrl);
        if (preg_match('/^(09|07|\+251)[0-9]{8}$/', $clean)) {
            $targetUrl = 'tel:' . $clean;
        } elseif (!preg_match('/^(https?:\/\/|tel:|mailto:)/i', $targetUrl)) {
            $targetUrl = 'https://' . $targetUrl;
        }
    }

    DB::table('advertisements')->insert([
        'company_name' => $request->input('company_name'),
        'title' => $request->input('title', 'ስፖንሰር ማስታወቂያ'),
        'target_audience' => $request->input('target_audience', 'ለሁሉም ተጠቃሚዎች'),
        'duration' => $request->input('duration', 'ያልተገደበ (ቋሚ)'),
        'target_url' => $targetUrl,
        'image_url' => $request->input('image_base64'),
        'is_active' => true,
        'impressions' => 0,
        'clicks' => 0,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return back()->with('success', 'ማስታወቂያው በዳታቤዝ ተመዝግቧል!');
});

Route::post('/super-admin/ads/delete', function (Request $request) {
    DB::table('advertisements')->where('id', $request->input('id'))->delete();
    return back();
});

// Proposals
Route::get('/proposal/neway-challenge', function () {
    return view('documents.proposal-neway');
});

Route::get('/proposal/school', function () {
    return view('documents.proposal-school');
});

Route::get('/proposal/sponsorship', function () {
    return view('documents.proposal-sponsorship');
});
