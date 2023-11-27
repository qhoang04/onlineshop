<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>onlineshop</title>
    <link rel="stylesheet" href="./css/index.css">

    <link rel="stylesheet" href="./css/pe.css">
</head>
<body>
    
    <?php
        include './inc/function.php'; 
        include './inc/header.php'; 
        include './inc/navbar.php'; 
        include './inc/bodyleft.php'; 
        include './inc/bodyRight.php';
        include './inc/footer.php';
        echo  add_cart();
    ?>


</body>

</html>