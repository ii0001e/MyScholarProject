<!DOCTYPE html>
<html lang="et">
<head>
    <!-- tehniline info -->
    <title>Ivanenko koduleht</title>
    <meta charset="UTf-8">
    <link rel="stylesheet" type="text/css" href="css/style_second_design.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include("php_files/header.php")
?>
<?php
include("php_files/navigation.php")
?>
<main>
    <div id="content-container">

    </div>
    <?php
    if(isset($_GET["leht"])){
        include('content/'.$_GET["leht"]);
    } else {
        echo "Tere tulemast, .....";
    }
    ?>


</main>
<?php
include("php_files/footer.php")
?>
</body>
</html>

