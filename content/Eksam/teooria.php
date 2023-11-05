<?php
global $yhendus;
require_once("../../config/conf.php");
session_start();

 if(!empty($_REQUEST["teooriatulemus"])){
    if(preg_match('/[a-zA-Z]/', $_REQUEST["teooriatulemus"])){
        echo "Cant contain words!";
    }
    else{
    //naita ainult need opilased kellel tulemus on sisemata
        $kask=$yhendus->prepare( 
        "UPDATE jalgrattaeksam SET teooriatulemus=? WHERE id=?"); 
        $kask->bind_param("ii", $_REQUEST["teooriatulemus"], $_REQUEST["id"]);
        $kask->execute();
    }
}
 $kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi   
FROM jalgrattaeksam WHERE teooriatulemus=-1 OR teooriatulemus=2");
 $kask->bind_result($id, $eesnimi, $perekonnanimi); 
 $kask->execute();
?>
<!doctype html>
<html lang="et">
<?php
include ("header.php")
?>
<?php
include ("navig.php")
?>

<head>
    <!-- tehniline info -->
    <title>Teooriaeksam</title>
    <meta charset="UTf-8">
    <link rel="stylesheet" type="text/css" href="../../css/style_second_design.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<main>
    <div class="container-fluid">
        <div class="card col-md-auto">
            <div class="card-header">Teooriaeksami tulemuste sissetamine</div>
            <div class="card-body">
                <div class="row">
   <?php
    if (isset($_SESSION['kasutaja'])){

    ?>
 <table class="table table-striped table-bordered">
 <?php

 while($kask->fetch()){ 
 echo " 
 <tr> 
 <td>$eesnimi</td> 
 <td>$perekonnanimi</td> 
 <td><form action='' class='form'> 
 <input type='hidden' name='id' value='$id' />";

 if(isset($_SESSION["kasutaja"])){
 echo "
 <input type='text' name='teooriatulemus' />
 <input type='submit' value='Sisesta tulemus' class='btn btn-primary'/>
 </form> 
 </td> 
</tr>
 "; 
};
 }
 ?> 
</table> 
<?php
}
?>
                </div></div></div></div></main><?php
include ("footer.php")
?>
 </body> 
</html>