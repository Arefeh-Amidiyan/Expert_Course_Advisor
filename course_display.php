<?php  
include 'connect.php';  
?>  

<!DOCTYPE html>  
<html lang="fa">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>نمایش دروس</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  
    <style>  
        .btn a {  
            text-decoration: none;  
        }  
    </style>  
</head>  
<body>  
<div class="container">  
    <button class="btn btn-primary my-5">  
        <a href="course.php" class="text-light">افزودن درس</a>  
    </button>  
    <table class="table table-bordered">  
        <thead>  
            <tr>  
                <th scope="col">ردیف</th>  
                <th scope="col">شماره ترم</th>  
                <th scope="col">کد درس</th>  
                <th scope="col">اسم درس</th>  
                <th scope="col">تعداد واحد</th>  
                <th scope="col">پیش نیاز</th>  
                <th scope="col">هم نیاز</th>  
                <th scope="col">اختیاری</th>  
                <th scope="col">نوع درس</th>  
                <th scope="col">عملیات</th>  
            </tr>  
        </thead>  
        <tbody>  
        <?php  
        $sql = "SELECT * FROM `courses`";  
        $result = mysqli_query($con, $sql);  
        if ($result) {  
            if (mysqli_num_rows($result) > 0) {  
                $row_number = 1; // شمارنده ردیف  
                while ($row = mysqli_fetch_assoc($result)) {  
                    $id = $row['id'];  
                    $term = $row['term'];  
                    $course_code = $row['course_code'];  
                    $course_name = $row['course_name'];  
                    $unit = $row['unit'];  
                    $prerequisite = $row['prerequisite'];  
                    $co_requisite = $row['co_requisite'];  
                    $optional = $row['optional'];  
                    $type = $row['type'];  
                    echo '<tr>  
                        <th scope="row">' . $row_number++ . '</th>  
                        <td>' . htmlspecialchars($term) . '</td>  
                        <td>' . htmlspecialchars($course_code) . '</td>  
                        <td>' . htmlspecialchars($course_name) . '</td>  
                        <td>' . htmlspecialchars($unit) . '</td>  
                        <td>' . htmlspecialchars($prerequisite) . '</td>  
                        <td>' . htmlspecialchars($co_requisite) . '</td>  
                        <td>' . htmlspecialchars($optional) . '</td>  
                        <td>' . htmlspecialchars($type) . '</td>  
                        <td>  
                            <button class="btn btn-primary">  
                                <a href="course_update.php?updateid=' . $id . '" class="text-light">ویرایش</a>  
                            </button>  
                            <button class="btn btn-danger">  
                                <a href="course_delete.php?deleteid=' . $id . '" class="text-light">حذف</a>  
                            </button>  
                        </td>  
                    </tr>';  
                }  
            } else {  
                echo '<tr><td colspan="10" class="text-center">هیچ درسی وجود ندارد.</td></tr>';  
            }  
        } else {  
            echo '<tr><td colspan="10" class="text-center">خطا در بارگذاری اطلاعات: ' . mysqli_error($con) . '</td></tr>';  
        }  
        ?>  
        </tbody>   
    </table>  
</div>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
</body>  
</html>