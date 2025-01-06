<?php
// تنظیمات اتصال به دیتابیس
$servername = "localhost";
$username = "root";
$password = "";
$database = "es";

// اتصال به دیتابیس
$conn = new mysqli($servername, $username, $password, $database);

// بررسی اتصال
if ($conn->connect_error) {
    die("اتصال به دیتابیس برقرار نشد: " . $conn->connect_error);
}

// بررسی و مقداردهی ورودی‌ها
$studentId = $_POST['studentId'] ?? null;
$selectedcourseha = $_POST['selectedcourseha'] ?? [];
$ruleCondition = $_POST['rule_condition'] ?? null;
$ruleAction = $_POST['rule_action'] ?? null;

// بررسی کامل بودن ورودی‌ها
if (!$studentId || !$ruleCondition || !$ruleAction) {
    die("تمام فیلدهای ضروری باید مقداردهی شوند.");
}

// تبدیل آرایه به رشته برای نمایش
if (is_array($selectedcourseha)) {
    $selectedcourseha = implode(", ", $selectedcourseha);
}

// نمایش اطلاعات دریافتی (برای تست)
echo "شناسه دانشجو: $studentId<br>";
echo "دروس انتخاب شده: $selectedcourseha<br>";
echo "شرط: $ruleCondition<br>";
echo "عملکرد: $ruleAction<br>";

try {
    // آماده‌سازی و اجرای کوئری SQL
    $stmt = $conn->prepare("
        SELECT CASE 
            WHEN ? THEN 1 
            ELSE 0 
        END AS result 
        FROM your_table_name
    ");
    $stmt->bind_param("s", $ruleCondition);
    $stmt->execute();

    // دریافت نتیجه
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "نتیجه: " . $row['result'] . "<br>";
        }
    } else {
        echo "هیچ نتیجه‌ای یافت نشد.";
    }
} catch (Exception $e) {
    echo "خطا در اجرای کوئری: " . $e->getMessage();
}

// بستن اتصال
$conn->close();
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فرم ارسال اطلاعات</title>
</head>
<body>
    <form method="POST" action="rules.php">
        <label for="studentId">شناسه دانشجو:</label><br>
        <input type="text" id="studentId" name="studentId" required><br><br>

        <label for="selectedcourseha">دروس انتخابی:</label><br>
        <input type="text" id="selectedcourseha" name="selectedcourseha[]" placeholder="درس 1" required><br>
        <input type="text" id="selectedcourseha" name="selectedcourseha[]" placeholder="درس 2"><br>
        <input type="text" id="selectedcourseha" name="selectedcourseha[]" placeholder="درس 3"><br><br>

        <label for="rule_condition">شرط:</label><br>
        <input type="text" id="rule_condition" name="rule_condition" required><br><br>

        <label for="rule_action">عملکرد:</label><br>
        <input type="text" id="rule_action" name="rule_action" required><br><br>

        <button type="submit">ارسال</button>
    </form>
</body>
</html>
