<?php
// اتصال به دیتابیس
include 'connect.php'; 

// تعریف داده‌های اولیه دانشجو
$student = [
    'gpa' => 14.5,  // معدل دانشجو
    'total_credits' => 15,  // تعداد واحدهای اخذ شده
    'completed_courses' => ['ریاضیات پایه', 'فیزیک 1'], // دروس تکمیل شده
    'course_level' => ['پایه'],  // سطح دروس (پایه، تخصصی)
    'semester' => 4,  // ترم جاری
    'is_scholarship' => false,  // آیا دانشجو بورس است؟
    'has_internship' => true,  // آیا دانشجو دوره کارآموزی دارد؟
    'is_conditional' => false,  // آیا دانشجو در شرایط مشروط است؟
    'has_final_project' => false  // آیا دانشجو پروژه نهایی دارد؟
];

// قوانین انتخاب واحد
$rules = [
    // قانون اول: اگر معدل بیشتر از 16 باشد، دروس پیشرفته پیشنهاد بده
    [
        'condition' => function($student) {
            return $student['gpa'] >= 16;
        },
        'result' => function($student) {
            return "شما می‌توانید دروس پیشرفته انتخاب کنید.";
        }
    ],
    
    // قانون دوم: اگر معدل زیر 12 باشد، 14 واحد پیشنهاد بده
    [
        'condition' => function($student) {
            return $student['gpa'] < 12;
        },
        'result' => function($student) {
            return "شما باید 14 واحد انتخاب کنید.";
        }
    ],

    // قانون سوم: اگر تعداد واحدها کمتر از 12 باشد، دروس عمومی پیشنهاد بده
    [
        'condition' => function($student) {
            return $student['total_credits'] < 12;
        },
        'result' => function($student) {
            return "شما باید دروس عمومی و یا جبرانی انتخاب کنید.";
        }
    ],

    // قانون چهارم: اگر دانشجو در حال گذراندن دوره‌های پایه است، دروس پایه پیشنهاد بده
    [
        'condition' => function($student) {
            return in_array('پایه', $student['course_level']);
        },
        'result' => function($student) {
            return "شما باید دروس پایه را انتخاب کنید.";
        }
    ],

    // قانون پنجم: اگر دانشجو بورس باشد، دروس پیشرفته و پژوهشی پیشنهاد بده
    [
        'condition' => function($student) {
            return $student['is_scholarship'];
        },
        'result' => function($student) {
            return "شما می‌توانید دروس پیشرفته و پژوهشی انتخاب کنید.";
        }
    ],

    // قانون ششم: اگر دانشجو در حال گذراندن کارآموزی است، دروس تخصصی مرتبط پیشنهاد بده
    [
        'condition' => function($student) {
            return $student['has_internship'];
        },
        'result' => function($student) {
            return "شما باید دروس تخصصی و مرتبط با کارآموزی انتخاب کنید.";
        }
    ],

    // قانون هفتم: اگر دانشجو در شرایط مشروط است، دروس سبک‌تر پیشنهاد بده
    [
        'condition' => function($student) {
            return $student['is_conditional'];
        },
        'result' => function($student) {
            return "شما باید دروس سبک‌تر و با بار آموزشی کم‌تر انتخاب کنید.";
        }
    ],

    // قانون هشتم: اگر دانشجو پروژه نهایی دارد، دروس تخصصی و پروژه‌ای پیشنهاد بده
    [
        'condition' => function($student) {
            return $student['has_final_project'];
        },
        'result' => function($student) {
            return "شما باید دروس تخصصی و پروژه‌ای را انتخاب کنید.";
        }
    ],

    // قانون نهم: اگر ترم 4 باشد، دروس سطح پیشرفته پیشنهاد می‌شود
    [
        'condition' => function($student) {
            return $student['semester'] == 4;
        },
        'result' => function($student) {
            return "شما می‌توانید دروس پیشرفته انتخاب کنید.";
        }
    ],

    // قانون دهم: اگر معدل بین 12 تا 14 باشد، دروس عمومی انتخاب شود
    [
        'condition' => function($student) {
            return $student['gpa'] >= 12 && $student['gpa'] < 14;
        },
        'result' => function($student) {
            return "شما می‌توانید دروس عمومی انتخاب کنید.";
        }
    ],

    // قانون یازدهم: اگر تعداد واحدها بیشتر از 20 باشد، دروس فشرده پیشنهاد داده نشود
    [
        'condition' => function($student) {
            return $student['total_credits'] > 20;
        },
        'result' => function($student) {
            return "شما نباید دروس فشرده و سنگین انتخاب کنید.";
        }
    ],

    // قانون دوازدهم: اگر دانشجو دوره‌های تخصصی را گذرانده باشد، دروس مرتبط با تخصص پیشنهاد شود
    [
        'condition' => function($student) {
            return in_array('تخصصی', $student['course_level']);
        },
        'result' => function($student) {
            return "شما باید دروس تخصصی مرتبط با رشته خود انتخاب کنید.";
        }
    ]
];

// موتور استنتاج
foreach ($rules as $rule) {
    if ($rule['condition']($student)) {
        // اگر شرط برآورده شد، نتیجه را نمایش بده
        echo $rule['result']($student) . "<br>";
        break;  // توقف در صورت پیدا کردن نتیجه
    }
}

?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پیشنهادات انتخاب واحد</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            text-align: right;
            margin: 20px;
        }
        .result {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
        }
        .result h2 {
            text-align: center;
            color: #333;
        }
        .result p {
            font-size: 16px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="result">
        <h2>نتایج پیشنهادات انتخاب واحد</h2>
        <p>
            <?php
            // اجرای موتور استنتاج و نمایش پیشنهادات
            foreach ($rules as $rule) {
                if ($rule['condition']($student)) {
                    echo $rule['result']($student);
                    break;  // توقف در صورت پیدا کردن نتیجه
                }
            }
            ?>
        </p>
    </div>
</body>
</html>
<?php
// اتصال به دیتابیس
include 'connect.php'; 

// تعریف داده‌های اولیه دانشجو
$student = [
    'gpa' => 14.5,  // معدل دانشجو
    'total_credits' => 15,  // تعداد واحدهای اخذ شده
    'completed_courses' => ['ریاضیات پایه', 'فیزیک 1'], // دروس تکمیل شده
    'course_level' => ['پایه'],  // سطح دروس (پایه، تخصصی)
    'semester' => 4,  // ترم جاری
    'is_scholarship' => false,  // آیا دانشجو بورس است؟
    'has_internship' => true,  // آیا دانشجو دوره کارآموزی دارد؟
    'is_conditional' => false,  // آیا دانشجو در شرایط مشروط است؟
    'has_final_project' => false  // آیا دانشجو پروژه نهایی دارد؟
];

// قوانین انتخاب واحد
$rules = [
    // قانون اول: اگر معدل بیشتر از 16 باشد، دروس پیشرفته پیشنهاد بده
    [
        'condition' => function($student) {
            return $student['gpa'] >= 16;
        },
        'result' => function($student) {
            return "شما می‌توانید دروس پیشرفته انتخاب کنید.";
        }
    ],
    
    // قانون دوم: اگر معدل زیر 12 باشد، دروس جبرانی پیشنهاد بده
    [
        'condition' => function($student) {
            return $student['gpa'] < 12;
        },
        'result' => function($student) {
            return "شما باید دروس جبرانی انتخاب کنید.";
        }
    ],

    // قانون سوم: اگر تعداد واحدها کمتر از 12 باشد، دروس عمومی پیشنهاد بده
    [
        'condition' => function($student) {
            return $student['total_credits'] < 12;
        },
        'result' => function($student) {
            return "شما باید دروس عمومی و یا جبرانی انتخاب کنید.";
        }
    ],

    // قانون چهارم: اگر دانشجو در حال گذراندن دوره‌های پایه است، دروس پایه پیشنهاد بده
    [
        'condition' => function($student) {
            return in_array('پایه', $student['course_level']);
        },
        'result' => function($student) {
            return "شما باید دروس پایه را انتخاب کنید.";
        }
    ],

    // قانون پنجم: اگر دانشجو بورس باشد، دروس پیشرفته و پژوهشی پیشنهاد بده
    [
        'condition' => function($student) {
            return $student['is_scholarship'];
        },
        'result' => function($student) {
            return "شما می‌توانید دروس پیشرفته و پژوهشی انتخاب کنید.";
        }
    ],

    // قانون ششم: اگر دانشجو در حال گذراندن کارآموزی است، دروس تخصصی مرتبط پیشنهاد بده
    [
        'condition' => function($student) {
            return $student['has_internship'];
        },
        'result' => function($student) {
            return "شما باید دروس تخصصی و مرتبط با کارآموزی انتخاب کنید.";
        }
    ],

    // قانون هفتم: اگر دانشجو در شرایط مشروط است، دروس سبک‌تر پیشنهاد بده
    [
        'condition' => function($student) {
            return $student['is_conditional'];
        },
        'result' => function($student) {
            return "شما باید دروس سبک‌تر و با بار آموزشی کم‌تر انتخاب کنید.";
        }
    ],

    // قانون هشتم: اگر دانشجو پروژه نهایی دارد، دروس تخصصی و پروژه‌ای پیشنهاد بده
    [
        'condition' => function($student) {
            return $student['has_final_project'];
        },
        'result' => function($student) {
            return "شما باید دروس تخصصی و پروژه‌ای را انتخاب کنید.";
        }
    ],

    // قانون نهم: اگر ترم 4 باشد، دروس سطح پیشرفته پیشنهاد می‌شود
    [
        'condition' => function($student) {
            return $student['semester'] == 4;
        },
        'result' => function($student) {
            return "شما می‌توانید دروس پیشرفته انتخاب کنید.";
        }
    ],

    // قانون دهم: اگر معدل بین 12 تا 14 باشد، دروس عمومی انتخاب شود
    [
        'condition' => function($student) {
            return $student['gpa'] >= 12 && $student['gpa'] < 14;
        },
        'result' => function($student) {
            return "شما می‌توانید دروس عمومی انتخاب کنید.";
        }
    ],

    // قانون یازدهم: اگر تعداد واحدها بیشتر از 20 باشد، دروس فشرده پیشنهاد داده نشود
    [
        'condition' => function($student) {
            return $student['total_credits'] > 20;
        },
        'result' => function($student) {
            return "شما نباید دروس فشرده و سنگین انتخاب کنید.";
        }
    ],

    // قانون دوازدهم: اگر دانشجو دوره‌های تخصصی را گذرانده باشد، دروس مرتبط با تخصص پیشنهاد شود
    [
        'condition' => function($student) {
            return in_array('تخصصی', $student['course_level']);
        },
        'result' => function($student) {
            return "شما باید دروس تخصصی مرتبط با رشته خود انتخاب کنید.";
        }
    ]
];

// موتور استنتاج
foreach ($rules as $rule) {
    if ($rule['condition']($student)) {
        // اگر شرط برآورده شد، نتیجه را نمایش بده
        echo $rule['result']($student) . "<br>";
        break;  // توقف در صورت پیدا کردن نتیجه
    }
}

?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پیشنهادات انتخاب واحد</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            text-align: right;
            margin: 20px;
        }
        .result {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
        }
        .result h2 {
            text-align: center;
            color: #333;
        }
        .result p {
            font-size: 16px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="result">
        <h2>نتایج پیشنهادات انتخاب واحد</h2>
        <p>
            <?php
            // اجرای موتور استنتاج و نمایش پیشنهادات
            foreach ($rules as $rule) {
                if ($rule['condition']($student)) {
                    echo $rule['result']($student);
                    break;  // توقف در صورت پیدا کردن نتیجه
                }
            }
            ?>
        </p>
    </div>
</body>
</html>
