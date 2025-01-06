<?php  
include 'connect.php'; // اتصال به دیتابیس  

// بررسی ارسال فرم  
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['courses'])) {  
    $selected_courses = $_POST['courses']; // دریافت دروس انتخابی  

    // پردازش دروس انتخابی (آپدیت فیلد selected در جدول courses)  
    foreach ($selected_courses as $course_id) {  
        // کوئری برای آپدیت وضعیت درس به "انتخاب شده"  
        $sql = "UPDATE courses SET selected = 1 WHERE id = ?";  

        // آماده کردن و اجرای کوئری  
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "i", $course_id);  // "i" برای نوع داده عددی
        if (mysqli_stmt_execute($stmt)) {
            // پس از آپدیت موفق، هدایت به صفحه جدید
            header("Location: selected_courses.php"); 
            exit; // جلوگیری از ادامه اجرای کد بعد از هدایت
        } else {
            echo "<script>alert('خطا در به روزرسانی وضعیت درس');</script>";
        }
        mysqli_stmt_close($stmt);
    }
}  

// کوئری برای خواندن دروس انتخابی که پیشنیاز دارند و پاس نکرده‌اند
$selected_courses = $_POST['courses'];  
$recommended_courses = [];

foreach ($selected_courses as $course_id) {
    // کوئری برای پیدا کردن پیشنیازهای هر درس
    $sql = "SELECT prerequisite_id 
            FROM course_prerequisites 
            WHERE course_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $course_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $prerequisite_id);
    
    // بررسی اینکه آیا پیشنیازهای این درس پاس شده‌اند
    while (mysqli_stmt_fetch($stmt)) {
        // بررسی پاس شدن پیشنیاز
        $check_passed_sql = "SELECT id FROM courses WHERE id = ? AND selected = 1";
        $check_stmt = mysqli_prepare($con, $check_passed_sql);
        mysqli_stmt_bind_param($check_stmt, "i", $prerequisite_id);
        mysqli_stmt_execute($check_stmt);
        mysqli_stmt_store_result($check_stmt);

        if (mysqli_stmt_num_rows($check_stmt) > 0) {
            // اگر پیشنیاز پاس شده باشد، پیشنهاد می‌دهیم این درس را
            $recommended_courses[] = $course_id;
        }
        mysqli_stmt_close($check_stmt);
    }
    mysqli_stmt_close($stmt);
}

// نمایش دروس پیشنهادی
if (!empty($recommended_courses)) {
    echo "<h3>درست‌هایی که می‌توانید انتخاب کنید:</h3>";
    foreach ($recommended_courses as $course) {
        // کوئری برای نمایش نام دروس پیشنهادی
        $sql = "SELECT course_name FROM courses WHERE id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "i", $course);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $course_name);

        while (mysqli_stmt_fetch($stmt)) {
            echo "<p>$course_name</p>";
        }
        mysqli_stmt_close($stmt);
    }
} else {
    echo "<p>هیچ درسی برای پیشنهاد وجود ندارد.</p>";
}
?>

