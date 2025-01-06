<?php
include 'connect.php'; // اتصال به دیتابیس

// کد درس که می‌خواهید اساتید آن را پیدا کنید
$course_id = 60; 

// ابتدا باید استادانی که این درس را تدریس می‌کنند را از جدول professor_course پیدا کنیم
$sql = "SELECT professor_id FROM professor_course WHERE course_id = $course_id"; 
$result = $con->query($sql);

// بررسی نتیجه
if ($result->num_rows > 0) {
    $best_professor = null; // متغیری برای ذخیره بهترین استاد
    $highest_average = 0;  // متغیری برای ذخیره بیشترین میانگین

    // برای هر استاد، اطلاعات مربوط به آن استاد را از جدول professors می‌خوانیم
    while ($row = $result->fetch_assoc()) {
        $professor_id = $row['professor_id'];
        
        // اطلاعات استاد را از جدول professors می‌خوانیم
        $professor_query = "SELECT * FROM professors WHERE id = $professor_id"; 
        $professor_result = $con->query($professor_query);

        if ($professor_result->num_rows > 0) {
            // استاد را پیدا کردیم و اطلاعاتش را می‌خوانیم
            $professor = $professor_result->fetch_assoc();

            // محاسبه میانگین امتیازها
            $average_rating = ($professor["ethics_rating"] + $professor["grading_methodology"] + $professor["teaching_style"]) / 3;

            // مقایسه میانگین‌ها
            if ($average_rating > $highest_average) {
                $highest_average = $average_rating;
                $best_professor = $professor;
            }
        }
    }

    // نمایش استاد با بهترین میانگین
    if ($best_professor) {
        echo "<div class='professor-info'>";
        echo "<h2>پیشنهاد استاد</h2>";
        echo "<p><span class='label'>ID استاد:</span> " . $best_professor["id"] . "</p>";
        echo "<p><span class='label'>نام استاد:</span> " . $best_professor["last_name"] . "</p>";
        echo "<p><span class='label'>امتیاز اخلاقی:</span> " . $best_professor["ethics_rating"] . "</p>";
        echo "<p><span class='label'>روش ارزیابی:</span> " . $best_professor["grading_methodology"] . "</p>";
        echo "<p><span class='label'>سبک تدریس:</span> " . $best_professor["teaching_style"] . "</p>";
        echo "<p><span class='label'>میانگین امتیاز:</span> " . $highest_average . "</p>";
        echo "</div>";
    } else {
        echo "<p>استادی برای نمایش اطلاعات پیدا نشد.</p>";
    }
} else {
    echo "<p>استادی برای درس با کد $course_id پیدا نشد.</p>";
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پیشنهاد استاد</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            text-align: right;
            margin: 20px;
        }
        .professor-info {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
        }
        .professor-info h2 {
            text-align: center;
            color: #333;
        }
        .professor-info p {
            font-size: 16px;
            margin: 10px 0;
        }
        .professor-info .label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- اطلاعات استاد با بهترین میانگین در اینجا نمایش داده خواهد شد -->
</body>
</html>
