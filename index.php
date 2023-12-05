<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>onlineshop</title>
    <link rel="stylesheet" href="./css/index.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/js.js"></script>
    <link rel="stylesheet" href="./css/pe.css">
</head>
<body>
    
    <?php
        include './inc/function.php'; 
        include './inc/header.php'; 
        include './inc/navbar.php';
        include './inc/bodyright.php'; 
        include './inc/bodyleft.php'; 

        if (isset($_SESSION['user_id'])) {
            add_cart($_SESSION['user_id']);
        }
    ?>


</body>

</html>