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
?>  

<!DOCTYPE html>  
<html lang="fa">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>صفحه مشاوره</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  
    <style>  
        .center-container {  
            height: 100vh;  
            display: flex;  
            justify-content: center;  
            align-items: center;  
            text-align: center;  
            flex-direction: column;  
        }  
        .btn-lg {  
            margin: 10px;  
        }  
        .main-text {  
            font-size: 2rem;  
            font-weight: bold;  
            margin-bottom: 30px;  
        }  
        .course-list {  
            margin-top: 30px;  
            text-align: right;  
            max-height: 400px;  
            overflow-y: auto;  
        }  
    </style>  
</head>  
<body>  
    <div class="container center-container">  
        <div class="main-text">  
            لطفا دروسی که پاس نکردید را تیک بزنید  
        </div>  

        <div class="course-list">  
            <form method="post">  
                <?php  
                // کوئری برای خواندن دروس با pass = 0 از جدول courses  
                $sql = "SELECT id, course_name FROM courses WHERE pass = 0";  
                $result = mysqli_query($con, $sql);  

                if ($result) {  
                    while ($row = mysqli_fetch_assoc($result)) {  
                        $course_id = htmlspecialchars($row['id']);  
                        $course_name = htmlspecialchars($row['course_name']);  
                        echo "  
                        <div class='form-check'>  
                            <input class='form-check-input' type='checkbox' name='courses[]' value='$course_id' id='course_$course_id'>  
                            <label class='form-check-label' for='course_$course_id'>  
                                $course_name  
                            </label>  
                        </div>";  
                    }  
                } else {  
                    echo "<p>دروس موجود نیست.</p>";  
                }  
                ?>  
                <button type="submit" class="btn btn-primary mt-3">ثبت دروس انتخابی</button>  
            </form>  
        </div>  
    </div>  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
</body>  
</html>
