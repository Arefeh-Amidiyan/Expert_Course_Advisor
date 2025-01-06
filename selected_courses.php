<?php  
include 'connect.php'; // اتصال به دیتابیس  

// کوئری برای خواندن دروس با selected = 1 از جدول courses  
$sql = "SELECT id, course_name FROM courses WHERE selected = 1";  
$result = mysqli_query($con, $sql);  

?>

<!DOCTYPE html>  
<html lang="fa">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>دروس انتخاب شده</title>  
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
            دروس انتخاب شده  
        </div>  

        <div class="course-list">  
    <ul class="list-group">
        <?php  
        if ($result && mysqli_num_rows($result) > 0) {  
            while ($row = mysqli_fetch_assoc($result)) {  
                $course_name = htmlspecialchars($row['course_name']);  
                echo "<li class='list-group-item'>$course_name</li>";  
            }  
        } else {  
            echo "<li class='list-group-item text-center'>هیچ درسی انتخاب نشده است.</li>";  
        }  
        ?>  
    </ul>
</div>

    </div>  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
</body>  
</html>
