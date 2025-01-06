<?php  
include 'connect.php';  

if (isset($_POST['submit'])) {  
    $last_name = $_POST['last_name'];  
    $ethics_rating = $_POST['ethics_rating'];
    $grading_methodology = $_POST['grading_methodology'];
    $teaching_style = $_POST['teaching_style'];

    // اضافه کردن اطلاعات استاد به پایگاه داده
    $sql = "INSERT INTO `professors` (last_name, ethics_rating, grading_methodology, teaching_style) 
            VALUES ('$last_name', '$ethics_rating', '$grading_methodology', '$teaching_style')";

    $result = mysqli_query($con, $sql);  

    if ($result) {  
        header('location:professors_display.php');  
    } else {  
        die('Error: ' . mysqli_error($con));  
    }  
}  
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>افزودن استاد</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <form method="post">
            <div class="mb-3 text-right">
                <label class="form-label" style="display: block; text-align: right;">نام خانوادگی استاد</label>
                <input type="text" class="form-control" placeholder="نام استاد را وارد کنید" name="last_name" autocomplete="off" style="direction: rtl;">
            </div>
            <div class="mb-3 text-right">
                <label class="form-label" style="display: block; text-align: right;">اخلاق</label>
                <input type="number" class="form-control" placeholder="امتیاز اخلاق (1 تا 10)" name="ethics_rating" autocomplete="off" style="direction: rtl;">
            </div>
            <div class="mb-3 text-right">
                <label class="form-label" style="display: block; text-align: right;">نمره‌دهی</label>
                <input type="text" class="form-control" placeholder="روش نمره‌دهی" name="grading_methodology" autocomplete="off" style="direction: rtl;">
            </div>
            <div class="mb-3 text-right">
                <label class="form-label" style="display: block; text-align: right;">نحوه تدریس</label>
                <input type="text" class="form-control" placeholder="نحوه تدریس" name="teaching_style" autocomplete="off" style="direction: rtl;">
            </div>
            <button type="submit" class="btn btn-primary" name="submit" style="float: right;">ثبت</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
