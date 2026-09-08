<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// 1. Landing Page
Route::get('/', function () {
    return view('welcome');
});

// 2. Login Page
Route::get('/login', function () {
    return view('login');
});

// 3. Parent Login Verification (በስልክ ቁጥር ብቻ የራሱን ልጅ መርጦ የሚያሳይ)
Route::post('/parent/verify', function (Request $request) {
    $phone = $request->input('phone');

    // የትምህርት ቤቱ የተመዘገቡ ወላጆች ዳታቤዝ (ምሳሌ)
    $parentsData = [
        '0911000000' => [
            'name' => 'አቶ ዳዊት በቀለ',
            'children' => [
                ['name' => 'ዮናስ ዳዊት', 'grade' => 'ክፍል 7-B', 'school' => 'ብስራተ ገብርኤል ት/ቤት']
            ]
        ],
        '0922000000' => [
            'name' => 'ወ/ሮ ሰላማዊት ከበደ',
            'children' => [
                ['name' => 'ሳራ ዳዊት', 'grade' => 'ክፍል 3-A', 'school' => 'ብስራተ ገብርኤል ት/ቤት']
            ]
        ]
    ];

    if (!array_key_exists($phone, $parentsData)) {
        return back()->with('error', 'ይህ ስልክ ቁጥር በትምህርት ቤቱ ዳታቤዝ አልተገኘም! እባክዎ ለት/ቤቱ ያስመዘገቡትን ስልክ ያስገቡ።');
    }

    // የተገኘውን ወላጅ ብቻ ይዞ ዳሽቦርድ ይከፍታል
    $parent = $parentsData[$phone];
    return view('dashboards.parent', compact('parent', 'phone'));
});

// 4. Parent Dashboard Direct
Route::get('/dashboard/parent', function () {
    // Default preview
    $parent = [
        'name' => 'አቶ ዳዊት በቀለ',
        'children' => [
            ['name' => 'ዮናስ ዳዊት', 'grade' => 'ክፍል 7-B', 'school' => 'ብስራተ ገብርኤል ት/ቤት']
        ]
    ];
    $phone = '0911000000';
    return view('dashboards.parent', compact('parent', 'phone'));
});

// 5. Teacher Entry with Unique Link (በአድሚኑ በተሰጠው የክፍል ሊንክ ብቻ መግቢያ)
Route::get('/teacher/entry', function (Request $request) {
    $classCode = $request->query('class', '7-B'); // በአድሚን የተመደበለት ክፍል
    $teacherName = $request->query('name', 'መምህር አለሙ ተሾመ');

    return view('dashboards.teacher', compact('classCode', 'teacherName'));
});

// 6. Teacher Dashboard Normal
Route::get('/dashboard/teacher', function () {
    $classCode = 'ክፍል 7-B';
    $teacherName = 'መምህር አለሙ ተሾመ';
    return view('dashboards.teacher', compact('classCode', 'teacherName'));
});

// 7. School Admin Dashboard
Route::get('/dashboard/admin', function () {
    return view('dashboards.admin');
});
