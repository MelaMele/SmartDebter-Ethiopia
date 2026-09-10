<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// 1. Landing Page
Route::get('/', function () {
    return view('welcome');
});

// 2. Login Page
Route::get('/login', function () {
    return view('login');
});

// 3. Parent Login Verification
Route::post('/parent/verify', function (Request $request) {
    $phone = $request->input('phone');

    // ከዳታቤዝ ተማሪውን መፈለግ
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
        // Fallback preview
        $parent = [
            'name' => 'የተማሪ ወላጅ',
            'children' => [
                ['name' => 'የተመዘገበ ተማሪ', 'grade' => 'ክፍል 7-B']
            ]
        ];
    }

    return view('dashboards.parent', compact('parent', 'phone'));
});

// 4. Dashboards
Route::get('/dashboard/parent', function () {
    $parent = [
        'name' => 'የተማሪ ወላጅ',
        'children' => [['name' => 'ተማሪ', 'grade' => 'ክፍል 7-B']]
    ];
    $phone = '0911000000';
    return view('dashboards.parent', compact('parent', 'phone'));
});

Route::get('/teacher/entry', function (Request $request) {
    $classCode = $request->query('class', 'ክፍል 7-B');
    $teacherName = $request->query('name', 'የክፍል ኃላፊ መምህር');
    return view('dashboards.teacher', compact('classCode', 'teacherName'));
});

Route::get('/dashboard/teacher', function () {
    $classCode = 'ክፍል 7-B';
    $teacherName = 'የክፍል ኃላፊ መምህር';
    return view('dashboards.teacher', compact('classCode', 'teacherName'));
});

Route::get('/dashboard/admin', function () {
    return view('dashboards.admin');
});

Route::get('/dashboard/super-admin', function () {
    return view('dashboards.super-admin');
});

// 5. ONE-CLICK DATABASE INSTALLER ROUTE FOR CLEVER CLOUD
Route::get('/install-database', function () {
    try {
        // Test connection
        DB::connection()->getPdo();

        // 1. Schools
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->enum('status', ['active', 'suspended'])->default('active');
            $table->timestamps();
        });

        // 2. Users
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->nullable();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('password')->default(bcrypt('123456'));
            $table->enum('role', ['super_admin', 'school_admin', 'teacher', 'parent'])->default('parent');
            $table->timestamps();
        });

        // 3. Classrooms
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id');
            $table->string('name');
            $table->string('grade_level');
            $table->string('section')->nullable();
            $table->timestamps();
        });

        // 4. Students
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id');
            $table->foreignId('classroom_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->string('student_id_number')->nullable();
            $table->timestamps();
        });

        // 5. Parent-Student Pivot
        Schema::create('parent_student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id');
            $table->foreignId('student_id');
            $table->string('relationship')->default('Parent');
            $table->timestamps();
        });

        // 6. Communications (የግንኙነት ደብተር)
        Schema::create('communications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id');
            $table->foreignId('sender_id');
            $table->foreignId('classroom_id')->nullable();
            $table->foreignId('student_id')->nullable();
            $table->string('category')->default('homework');
            $table->string('title');
            $table->text('message');
            $table->string('attachment')->nullable();
            $table->date('due_date')->nullable();
            $table->timestamps();
        });

        // 7. Communication Reads (የወላጅ ፊርማ)
        Schema::create('communication_reads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('communication_id');
            $table->foreignId('parent_id');
            $table->timestamp('read_at')->nullable();
            $table->boolean('acknowledged')->default(false);
            $table->timestamp('acknowledged_at')->nullable();
            $table->timestamps();
        });

        // 8. Advertisements (የማስታወቂያ ሰሌዳ)
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('title');
            $table->string('image_url')->nullable();
            $table->string('target_url')->nullable();
            $table->string('target_audience')->default('all');
            $table->string('duration')->default('unlimited');
            $table->boolean('is_active')->default(true);
            $table->integer('impressions')->default(0);
            $table->integer('clicks')->default(0);
            $table->timestamps();
        });

        return "<div style='font-family:sans-serif; text-align:center; padding:40px;'>
                    <h1 style='color:#059669;'>🎉 እንኳን ደስ አለዎት!</h1>
                    <h2>የ Clever Cloud MySQL ዳታቤዝዎ በተሳካ ሁኔታ ተገናኝቷል!</h2>
                    <p>ሁሉም 8ቱ ሰንጠረዦች (schools, users, classrooms, students, parent_student, communications, communication_reads, advertisements) በ Clever Cloud ላይ ተፈጥረዋል።</p>
                    <br>
                    <a href='/' style='background:#4f46e5; color:white; padding:10px 20px; border-radius:8px; text-decoration:none; font-weight:bold;'>ወደ ዋናው መነሻ ተመለስ</a>
                </div>";

    } catch (\Exception $e) {
        return "<div style='font-family:sans-serif; text-align:center; padding:40px;'>
                    <h1 style='color:#e11d48;'>⚠️ የዳታቤዝ ግንኙነት ስህተት!</h1>
                    <p style='color:#334155;'>" . $e->getMessage() . "</p>
                    <p>እባክዎ በ vercel.json ላይ የይለፍ ቃልዎን በትክክል ማስገባትዎን ያረጋግጡ።</p>
                </div>";
    }
});
