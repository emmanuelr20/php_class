<?php
    session_start();
?>
   
<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="UTF-8">
        <title>test</title>
    </head>
    <body>
        <form action="" enctype="multipart/form-data" method="post">
            <div class="">
                <label>Name</label>
                <input type = "text" name="name"><br>
            </div>
            <div class="">
                <label>Age</label>
                <input type = "text" name="age"><br>
            </div>
            <div class="">
                <label>File</label>
                <input type = "file" name="image"><br>
            </div>
            <button>Submit</button>
        </form>
    </body>
</html>
<?php 
//    echo $_SERVER['PHP_SELF'];
//    echo "<br>";
//    echo $_SERVER['SERVER_NAME'];
//    echo "<br>";
//    echo $_SERVER['HTTP_HOST'];
//    echo "<br>";
//    echo $_SERVER['HTTP_REFERER'];
//    echo "<br>";
//    echo $_SERVER['HTTP_USER_AGENT'];
//    echo "<br>";
//    echo $_SERVER['SCRIPT_NAME'];

    if(!empty($_POST)){
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['age'] = $_POST['age'];    
        if (!empty($_FILES)){
            var_dump($_FILES);
        } else {
            echo 'Put file now!';
        }
//        $_SESSION['file'] = var_dump($_FILES['file']);
        //echo var_dump($_POST);
//        header('location: next_page.php');
        
    }
    
?>