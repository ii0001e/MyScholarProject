<?php
global $yhendus;
require_once("../../config/conf.php");
 session_start();
 if(!empty($_REQUEST["korras_id"])){ 
 $kask=$yhendus->prepare( 
 "UPDATE jalgrattaeksam SET t2nav=1 WHERE id=?"); 
$kask->bind_param("i", $_REQUEST["korras_id"]); 
$kask->execute(); 
 } 
 if(!empty($_REQUEST["vigane_id"])){ 
 $kask=$yhendus->prepare( 
 "UPDATE jalgrattaeksam SET t2nav=2 WHERE id=?"); 
$kask->bind_param("i", $_REQUEST["vigane_id"]); 
$kask->execute(); 
 } 
 $kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi   FROM jalgrattaeksam WHERE slaalom=1 AND ringtee=1 AND t2nav=-1");  $kask->bind_result($id, $eesnimi, $perekonnanimi); 
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
            <div class="card-header">Tänavasõit</div>
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
 <td> 
 <a href='?korras_id=$id' class='btn btn-success'>Korras</a>
 <a href='?vigane_id=$id' class='btn btn-warning'>Ebaõnnestunud</a> 
 </td> 
</tr>
 "; 
} 
 ?> 
</table> 

<?php } ?>
                </div></div></div></div></main></body></html><?php
include ("footer.php")
?>
 </body> 
</html> 