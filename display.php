<?php  
include 'connect.php';  
?>  

<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>لیست دانشجویان</title>  
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
        <a href="user.php" class="text-light">افزودن دانشجو</a>  
    </button>  
    <table class="table">  
        <thead>  
            <tr>  
                <th scope="col">Sl no</th>  
                <th scope="col">نام</th>  
                <th scope="col">نام خانوادگی</th>  
                <th scope="col">شماره دانشجویی</th>  
                <th scope="col">ترم</th>  
                <th scope="col">معدل کل</th>  
                <th scope="col">شرایط زندگی</th>  
                <th scope="col">شرایط تحصیلی</th>  
                <th scope="col">هدف شغلی</th>  
                <th scope="col">عملیات</th>  
            </tr>  
        </thead>  
        <tbody>  
        <?php  

        $sql = "SELECT * FROM `crud`";  
        $result = mysqli_query($con, $sql);  
        if ($result) {  
            $sl_no = 1; // شمارنده برای شماره ردیف  
            while ($row = mysqli_fetch_assoc($result)) {  
                $id = $row['id'];  
                $name = $row['name'];  
                $last_name = $row['last_name'];  
                $student_id = $row['student_id'];  
                $term = $row['term'];  
                $total_avg = $row['total_avg'];  
                $living_conditions = $row['living_conditions'];  
                $academic_conditions = $row['academic_conditions'];  
                $career_goal = $row['career_goal'];  

                echo '<tr>  
                    <th scope="row">' . $sl_no++ . '</th>  
                    <td>' . $name . '</td>  
                    <td>' . $last_name . '</td>  
                    <td>' . $student_id . '</td>  
                    <td>' . $term . '</td>  
                    <td>' . $total_avg . '</td>  
                    <td>' . $living_conditions . '</td>  
                    <td>' . $academic_conditions . '</td>  
                    <td>' . $career_goal . '</td>  
                    <td>  
                        <button class="btn btn-primary">  
                            <a href="update.php?updateid=' . $id . '" class="text-light">ویرایش</a>  
                        </button>  
                        <button class="btn btn-danger">  
                            <a href="delete.php?deleteid=' . $id . '" class="text-light">حذف</a>  
                        </button>  
                    </td>  
                </tr>';  
            }  
        }  

        ?>  
        </tbody>   
    </table>  
</div>  
</body>  
</html>