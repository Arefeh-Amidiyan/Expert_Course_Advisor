<?php
include 'connect.php'; // اتصال به دیتابیس

// کد درس که می‌خواهید اساتید آن را پیدا کنید
$course_id = 43; 

// ابتدا باید استادانی که این درس را تدریس می‌کنند را از جدول professor_course پیدا کنیم
$sql = "SELECT professor_id FROM professor_course WHERE course_id = $course_id"; 
$result = $con->query($sql);

// بررسی نتیجه
if ($result->num_rows > 0) {
    // برای هر استاد، اطلاعات مربوط به آن استاد را از جدول professors می‌خوانیم
    while ($row = $result->fetch_assoc()) {
        $professor_id = $row['professor_id'];
        
        // اطلاعات استاد را از جدول professors می‌خوانیم
        $professor_query = "SELECT * FROM professors WHERE id = $professor_id"; 
        $professor_result = $con->query($professor_query);

        if ($professor_result->num_rows > 0) {
            // استاد را پیدا کردیم و اطلاعاتش را نمایش می‌دهیم
            $professor = $professor_result->fetch_assoc();
            // نمایش اطلاعات استاد
            echo "<div class='professor-info'>";
            echo "<h2>اطلاعات استاد</h2>";
            echo "<p><span class='label'>ID استاد:</span> " . $professor["id"] . "</p>";
            echo "<p><span class='label'>نام استاد:</span> " . $professor["last_name"] . "</p>";
            echo "<p><span class='label'>امتیاز اخلاقی:</span> " . $professor["ethics_rating"] . "</p>";
            echo "<p><span class='label'>روش ارزیابی:</span> " . $professor["grading_methodology"] . "</p>";
            echo "<p><span class='label'>سبک تدریس:</span> " . $professor["teaching_style"] . "</p>";
            echo "</div>";
        }
    }
} else {
    echo "<p>استادی برای نمایش اطلاعات پیدا نشد.</p>";
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اطلاعات استاد</title>
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
        .button {
            display: block;
            width: 200px;
            padding: 10px;
            margin: 20px auto;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <!-- دکمه برای رفتن به صفحه compare_professors2.php -->
    <a href="compare_professors3_1.php" class="button">استاد پیشنهادی</a>
</body>
</html>
