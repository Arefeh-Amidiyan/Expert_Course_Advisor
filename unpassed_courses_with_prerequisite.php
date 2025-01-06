<?php  
include 'connect.php'; // اتصال به دیتابیس  

// کوئری برای یافتن دروس پاس نشده به همراه نام پیش‌نیاز و نام دروسی که نیاز به این پیش‌نیاز دارند  
$sql = "
    SELECT c1.id AS course_id, 
           c1.course_name AS course_name, 
           c2.course_name AS prerequisite_name,
           c3.course_name AS dependent_course_name 
    FROM courses c1 
    LEFT JOIN courses c2 ON c1.prerequisite = c2.id 
    LEFT JOIN courses c3 ON c3.prerequisite = c1.id 
    WHERE c1.pass = 0 AND (c2.pass = 1 OR c1.prerequisite IS NULL)
";  

$result = mysqli_query($con, $sql);  
?>  

<!DOCTYPE html>  
<html lang="fa">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>دروس با پیش‌نیازها و دروس مرتبط</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  
</head>  
<body>  
    <div class="container mt-5">  
        <h1 class="text-center mb-4">دروس پاس نشده به همراه اطلاعات پیش‌نیاز و دروس وابسته</h1>  
        <table class="table table-bordered table-striped">  
            <thead>  
                <tr>  
                    <th>شناسه درس</th>  
                    <th>نام درس</th>  
                    <th>نام پیش‌نیاز</th>  
                    <th>نام درس‌های وابسته</th>  
                </tr>  
            </thead>  
            <tbody>  
                <?php  
                if ($result && mysqli_num_rows($result) > 0) {  
                    while ($row = mysqli_fetch_assoc($result)) {  
                        echo "<tr>";  
                        echo "<td>" . htmlspecialchars($row['course_id']) . "</td>";  
                        echo "<td>" . htmlspecialchars($row['course_name']) . "</td>";  
                        echo "<td>" . htmlspecialchars($row['prerequisite_name'] ?? 'ندارد') . "</td>";  
                        echo "<td>" . htmlspecialchars($row['dependent_course_name'] ?? 'ندارد') . "</td>";  
                        echo "</tr>";  
                    }  
                } else {  
                    echo "<tr><td colspan='4' class='text-center'>هیچ داده‌ای یافت نشد.</td></tr>";  
                }  
                ?>  
            </tbody>  
        </table>  
    </div>  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
</body>  
</html>
