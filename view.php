<!-- course_selection_view.php -->
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>انتخاب واحد</title>
</head>
<body>
    <h1>انتخاب واحد</h1>
    
    <?php if (isset($errors) && !empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li style="color: red;"><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="course_selection/register" method="post">
        <label for="student_id">شناسه دانشجو:</label><br>
        <input type="text" id="student_id" name="student_id" required><br><br>

        <label for="courseha">دروس انتخابی:</label><br>
        <?php foreach ($courseha as $course): ?>
            <input type="checkbox" name="selected_courseha[]" value="<?php echo $course['id']; ?>"> 
            <?php echo $course['name']; ?><br>
        <?php endforeach; ?>
        
        <br><br>
        <button type="submit">ثبت نام</button>
    </form>
</body>
</html>

