<?php
include 'connect.php'; // اتصال به دیتابیس

// بررسی اینکه آیا پارامتر professor_id و course_id ارسال شده است یا خیر
if (isset($_GET['professor_id']) && isset($_GET['course_id'])) {
    $professor_id = $_GET['professor_id']; // دریافت professor_id
    $course_id = $_GET['course_id']; // دریافت course_id
    
    // ابتدا باید اطلاعات استاد را از جدول professors بگیریم
    $professor_query = "SELECT * FROM professors WHERE id = $professor_id"; 
    $professor_result = $con->query($professor_query);

    if ($professor_result->num_rows > 0) {
        $professor = $professor_result->fetch_assoc();

        // نمایش اطلاعات استاد و درس
        echo "<div class='professor-info'>";
        echo "<h2>نام استاد و درس پیشنهادی</h2>";
        echo "<p><span class='label'>نام استاد:</span> " . $professor["last_name"] . "</p>";
        echo "<p><span class='label'>نام درس:</span> درس با کد " . $course_id . "</p>";
        echo "</div>";
    } else {
        echo "<p>استادی پیدا نشد.</p>";
    }
} else {
    echo "<p>اطلاعات کافی برای نمایش موجود نیست.</p>";
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نام استاد و درس پیشنهادی</title>
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
    <!-- اطلاعات استاد و درس پیشنهادی در اینجا نمایش داده خواهد شد -->
</body>
</html>
