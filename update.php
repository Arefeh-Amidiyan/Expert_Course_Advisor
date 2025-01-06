<?php  
include 'connect.php'; 
$id= $_GET['updateid'];
$sql="SELECT * FROM `crud` WHERE id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$last_name=$row['last_name'];
$student_id=$row['student_id'];
$term=$row['term'];
$total_avg=$row['total_avg'];
$living_conditions=$row['living_conditions'];
$academic_conditions=$row['academic_conditions'];
$password=$row['password'];

if (isset($_POST['submit'])) {  
    $name = $_POST['name'];  
    $last_name = $_POST['last_name'];  
    $student_id = $_POST['student_id'];  
    $term = $_POST['term'];  
    $total_avg = $_POST['total_avg'];  
    $living_conditions = $_POST['living_conditions'];  
    $academic_conditions = $_POST['academic_conditions'];  
    $career_goal = $_POST['career_goal'];  
    $password = $_POST['password']; 
    // Correct SQL statement  
    $sql = "UPDATE `crud` SET id=$id,name='$name',last_name='$last_name',student_id='$student_id',term='$term',total_avg='$total_avg',living_conditions='$living_conditions',academic_conditions='$academic_conditions',career_goal='$career_goal',password='$password' WHERE id=$id";
    // Execute the query  
    $result = mysqli_query($con, $sql);  
    if ($result) {  
        // echo "Data inserted successfully";  
        // echo "Updated successfully";  
        header('location:display.php');
    } else {  
        die(mysqli_error($con));  
    }  
}  

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ویرایش دانشجویان</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container my-5">
    <form method="post">
        <div class="mb-3 text-right">  
        <label class="form-label" style="display: block; text-align: right;">:نام</label>  
        <input type="text" class="form-control text-right" placeholder="نام خود را وارد کنید" name="name" value="<?php echo $name;?>" autocomplete="off" style="direction: rtl;">  
    </div>
    <div class="mb-3 text-right">  
        <label class="form-label" style="display: block; text-align: right;">: نام خانوادگی</label>  
        <input type="text" class="form-control text-right" placeholder="نام خانوادگی خود را وارد کنید" name="last_name" value="<?php echo $last_name;?>" autocomplete="off" style="direction: rtl;">  
    </div>
    <div class="mb-3 text-right">  
        <label class="form-label" style="display: block; text-align: right;">:شماره دانشجویی</label>  
        <input type="text" class="form-control text-right" placeholder="شماره دانشجویی خود را وارد کنید" name="student_id" value="<?php echo $student_id;?>" autocomplete="off" style="direction: rtl;">  
    </div>
    <div class="mb-3 text-right">  
                <label class="form-label" style="display: block; text-align: right;">: ترم‌ </label>  
                <select class="form-select text-right" name="term" value=<?php echo $term;?> id="termSelect" onchange="showCourses()" style="direction: rtl;">  
                    <option value="">ترم خود را انتخاب کنید</option>  
                    <option value="1">ترم 1</option>  
                    <option value="2">ترم 2</option>  
                    <option value="3">ترم 3</option>  
                    <option value="4">ترم 4</option>  
                    <option value="5">ترم 5</option>  
                    <option value="5">ترم6</option>  
                    <option value="5">ترم7</option>  
                    <option value="5">ترم8 یا بیشتر</option>  
                    
                </select>  
            </div>  

            <div class="mb-3 text-right" id="coursesSection" style="display: none;">  
                <label class="form-label" style="display: block; text-align: right;">: دروس پاس‌شده </label>  
                <select class="form-select text-right" name="passed_courses" style="direction: rtl;">  
                    <!-- دروس بر اساس ترم انتخاب شده بارگذاری می‌شود -->  
                </select>  
            </div>  
    <div class="mb-3 text-right">  
        <label class="form-label" style="display: block; text-align: right;">:معدل کل</label>  
        <input type="text" class="form-control text-right" placeholder="معدل کل خود را وارد کنید" name="total_avg" value="<?php echo $total_avg; ?>" autocomplete="off" style="direction: rtl;">  
    </div>
    <div class="mb-3 text-right">  
        <label class="form-label" style="display: block; text-align: right;">: شرایط زندگی </label>  
        <select class="form-select text-right" name="living_conditions" style="direction: rtl;">  
            <option value="عالی">عالی</option>  
            <option value="مریض جسمی">مریض جسمی</option>  
            <option value="ناراحتی روحی">ناراحتی روحی</option>  
        </select>  
    </div>
    <div class="mb-3 text-right">  
        <label class="form-label" style="display: block; text-align: right;">: شرایط تحصیلی </label>  
        <select class="form-select text-right" name="academic_conditions" style="direction: rtl;">  
            <option value="معدل ممتاز">معدل ممتاز</option>  
            <option value="معمولی">معمولی</option>  
            <option value="مشروط">مشروط</option>  
        </select>  
    </div> 
    <div class="mb-3 text-right">  
        <label class="form-label" style="display: block; text-align: right;">: هدف شغلی </label>  
        <select class="form-select text-right" name="career_goal" style="direction: rtl;">  
            <option value="هوش مصنوعی">هوش مصنوعی</option>  
            <option value="شبکه">شبکه</option>  
            <option value="برنامه نویسی فرانت">برنامه نویسی فرانت</option>  
            <option value="برنامه نویسی بک">برنامه نویسی بک </option>  
            <option value="یادگیری عمیق">یادگیری عمیق</option>  
            <option value="یادگیری ماشین">یادگیری ماشین</option>  
            <option value="امنیت">امنیت</option>  
        </select>  
    </div>

    <div class="mb-3 text-right">  
        <label class="form-label" style="display: block; text-align: right;">: پسورد </label>  
        <input type="password" class="form-control text-right" placeholder="پسورد خود را وارد کنید" name="password" value="<?php echo $password; ?>" autocomplete="off" style="direction: rtl;">  
    </div>

        <button type="submit" class="btn btn-primary" style="float: right;" name="submit">ویرایش</button>
    </form>
    <br><br>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>