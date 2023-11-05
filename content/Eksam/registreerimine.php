<?php
global $yhendus;
require_once("../../config/conf.php");
 session_start(); 
 if(isSet($_REQUEST["sisestusnupp"])){
    if(preg_match('#[0-9]#', $_REQUEST["perekonnanimi"]) || preg_match('#[0-9]#', $_REQUEST["eesnimi"]) || empty($_REQUEST["perekonnanimi"]) || empty($_REQUEST["eesnimi"])){
        echo "!";
    }else{
        $kask=$yhendus->prepare(
        "INSERT INTO jalgrattaeksam(eesnimi, perekonnanimi) VALUES (?, ?)"); $kask->bind_param("ss", $_REQUEST["eesnimi"], $_REQUEST["perekonnanimi"]); $kask->execute(); 
        $yhendus->close();
        header("Location: $_SERVER[PHP_SELF]?lisatudeesnimi=$_REQUEST[eesnimi]");
        header("Location: teooria.php");
        exit(); 
 }
}
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
        <div class="card col-md-4">
            <div class="card-header">Registreerimine</div>
            <div class="card-body">
                <div class="row">
 <!-- <?php 
 if(isSet($_REQUEST["lisatudeesnimi"])){ 
 echo "Lisati $_REQUEST[lisatudeesnimi]"; 
 } 
 ?>  -->
<form action="?"> 
 <dl> 
 <dt>Eesnimi:</dt> 
<dd><input type="text" name="eesnimi" /></dd> 
 <dt>Perekonnanimi:</dt> 
<dd><input type="text" name="perekonnanimi" /></dd> 
 <dt><input type="submit" name="sisestusnupp" value="sisesta" /></dt>  </dl> 
</form>
                </div></div></div></div></main><?php
include ("footer.php")
?></body></html>

