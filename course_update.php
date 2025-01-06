<?php  
include 'connect.php'; 
$id= $_GET['updateid'];
$sql="SELECT * FROM `courses` WHERE id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$term=$row['term'];
$course_code = $row['course_code'];  
$course_name = $row['course_name'];  
$unit=$row['unit'];
$prerequisite=$row['prerequisite'];
$co_requisite=$row['co_requisite'];
$optional = $row['optional'];  
$type = $row['type'];  

if (isset($_POST['submit'])) {  
    $term=$_POST['term'];
    $course_code = $_POST['course_code'];  
    $course_name = $_POST['course_name'];
    $unit=$_POST['unit'];
    $prerequisite=$_POST['prerequisite'];
    $co_requisite=$_POST['co_requisite'];
    $optional = $_POST['optional'];  
    $type = $_POST['type'];  

    // Correct SQL statement  
    $sql = "UPDATE `courses` SET id=$id,term=$term,course_code='$course_code',course_name='$course_name',unit='$unit',prerequisite='$prerequisite',co_requisite='$co_requisite',optional='$optional',type='$type' WHERE id=$id";
    // Execute the query  
    $result = mysqli_query($con, $sql);  
    if ($result) {  
        // echo "Data inserted successfully";  
        // echo "Updated successfully";  
        header('location:course_display.php');
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
    <title>ویرایش دروس</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container my-5">
    <form method="post">
        <div class="mb-3 text-right">
        <div class="mb-3 text-right">
            <label class="form-label" style="display: block; text-align: right;">شماره ترم</label>
            <input type="text   " class="form-control" placeholder="شماره ترم" name="term" value=<?php echo $term;?> autocomplete="off" style="direction: rtl;">
        </div>
            <label class="form-label" style="display: block; text-align: right;">کد درس</label>
            <input type="text" class="form-control" placeholder="کد درس" name="course_code" value=<?php echo $course_code;?> autocomplete="off" style="direction: rtl;">
         </div>
        <div class="mb-3 text-right">
            <label class="form-label" style="display: block; text-align: right;">اسم درس</label>
            <input type="text   " class="form-control" placeholder="اسم درس" name="course_name" value="<?php echo $course_name;?>" autocomplete="off" style="direction: rtl;">
        </div>
        <div class="mb-3 text-right">
            <label class="form-label" style="display: block; text-align: right;">تعداد واحد</label>
            <input type="text   " class="form-control" placeholder="تعداد واحد" name="unit" value=<?php echo $unit;?> autocomplete="off" style="direction: rtl;">
        </div>
        <div class="mb-3 text-right">
            <label class="form-label" style="display: block; text-align: right;">پیش نیاز</label>
            <input type="text   " class="form-control" placeholder="پیش نیاز" name="prerequisite" value="<?php echo $prerequisite;?>" autocomplete="off" style="direction: rtl;">
        </div>
        <div class="mb-3 text-right">
            <label class="form-label" style="display: block; text-align: right;">هم نیاز</label>
            <input type="text   " class="form-control" placeholder="هم نیاز" name="co_requisite" value="<?php echo $co_requisite;?>" autocomplete="off" style="direction: rtl;">
        </div>
        <div class="mb-3 text-right">
            <label class="form-label" style="display: block; text-align: right;">اختیاری</label>
            <input type="text" class="form-control" placeholder="اختیاری" name="optional" value="<?php echo $optional;?>" autocomplete="off" style="direction: rtl;">
        </div>
        <div class="mb-3 text-right">
            <label class="form-label" style="display: block; text-align: right;">نوع درس</label>
            <input type="text" class="form-control" placeholder="نوع درس" name="type" value="<?php echo $type;?>" autocomplete="off" style="direction: rtl;">
         </div>

        <button  type="submit" class="btn btn-primary " name="submit" style="float: right;">ثبت</button>
    </form>
    <br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>