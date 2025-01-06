<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="fa">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>اساتید</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  
    <style>  
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2;
        }
        .text-right {
            text-align: right;
        }
    </style>  
</head>  
<body>  
<div class="container my-5">  
    <div class="text-right mb-4">
        <button class="btn btn-primary">  
            <a href="professors.php" class="text-light text-decoration-none">افزودن استاد</a>  
        </button>
    </div>
    <table class="table table-striped table-bordered text-right">
        <thead class="table-primary">
            <tr>
                <th scope="col">ردیف</th>
                <th scope="col">نام خانوادگی استاد</th>
                <th scope="col">اخلاق</th>
                <th scope="col">روش نمره‌دهی</th>
                <th scope="col">سبک تدریس</th>
                <th scope="col">عملیات</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT id, last_name, ethics_rating, grading_methodology, teaching_style FROM professors";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $index = 1; // شمارنده ردیف
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $last_name = $row['last_name'];
                    $ethics_rating = $row['ethics_rating'] !== NULL ? $row['ethics_rating'] : 'نامشخص';
                    $grading_methodology = $row['grading_methodology'] !== NULL ? $row['grading_methodology'] : 'نامشخص';
                    $teaching_style = $row['teaching_style'] !== NULL ? $row['teaching_style'] : 'نامشخص';

                    echo "<tr>
                        <th scope='row'>$index</th>
                        <td>$last_name</td>
                        <td>$ethics_rating</td>
                        <td>$grading_methodology</td>
                        <td>$teaching_style</td>
                        <td>
                            <button class='btn btn-primary btn-sm'><a href='professors_update.php?updateid=$id' class='text-light text-decoration-none'>ویرایش</a></button>
                            <button class='btn btn-danger btn-sm'><a href='professors_delete.php?deleteid=$id' class='text-light text-decoration-none'>حذف</a></button>
                        </td>
                    </tr>";
                    $index++;
                }
            } else {
                echo "<tr><td colspan='6' class='text-center'>هیچ داده‌ای یافت نشد</td></tr>";
            }
            ?>
        </tbody> 
    </table>  
</div>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>  
</html>
