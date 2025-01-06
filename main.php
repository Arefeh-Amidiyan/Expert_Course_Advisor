<!DOCTYPE html>  
<html lang="fa">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>صفحه اصلی</title>  
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
            margin: 10px 0; /* تنظیم فاصله عمودی */  
        }  
        .main-text {  
            font-size: 2rem;  
            font-weight: bold;  
            margin-bottom: 30px;  
        }  
    </style>  
</head>  
<body>  
    <div class="container center-container">  
        <div class="main-text">  
            به سیستم مشاور هوشمند انتخاب واحد خوش آمدید  
        </div>  

        <div class="main-text">  
            :لطفا یکی از گزینه‌ها را انتخاب کنید  
        </div>  

        <button class="btn btn-primary btn-lg" onclick="location.href='display.php'">  
            مشاهده کاربرها  
        </button>  
        <button class="btn btn-success btn-lg" onclick="location.href='course_display.php'">  
            مشاهده دروس  
        </button>  
        <button class="btn btn-warning btn-lg" onclick="location.href='professors_display.php'">  
            مشاهده اساتید  
        </button>  
        <button class="btn btn-danger btn-lg" onclick="location.href='consulting.php'">  
            مشاوره  
        </button>   
    </div>  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
</body>  
</html>