<?php

require_once("../../php_files/conf.php");

if (isset($_REQUEST["sisestusnupp"])) {
    if (isset($_REQUEST["eesnimi"]) && isset($_REQUEST["perekonnanimi"])) {
        $eesnimi = $_REQUEST["eesnimi"];
        $perekonnanimi = $_REQUEST["perekonnanimi"];
        if (empty($eesnimi) || preg_match("/[0-9]/", $eesnimi) || empty($perekonnanimi) || preg_match("/[0-9]/", $perekonnanimi)) {
            echo "Incorrect data!";
        } else {
            global $yhendus;
            $kask = $yhendus->prepare("INSERT INTO jalgrattaeksam(eesnimi, perekonnanimi) VALUES (?, ?)");
            $kask->bind_param("ss", $eesnimi, $perekonnanimi);
            $kask->execute();
            $yhendus->close();
            header("Location: $_SERVER[PHP_SELF]?lisatudeesnimi=$_REQUEST[eesnimi]");
            header("Location: teooriaeksam.php");
            exit();
        }
    } else {
        echo "Fields are not set!";
    }
}
?>
<!doctype html>
<html lang="et">
<?php
include ("header.php")
?>
<?php
include ("navigation.php")
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
        <div class="card">
            <div class="card-header">Registreerimine</div>
            <div class="card-body">
                <div class="row">
<?php
if(isSet($_REQUEST["lisatudeesnimi"])){
    echo "Lisati $_REQUEST[lisatudeesnimi]";
}
?>
<form action="?">
    <dl>
        <dt>Eesnimi:</dt>
        <dd>
            <label>
                <input type="text" name="eesnimi" />
            </label>
        </dd>
        <dt>Perekonnanimi:</dt>
        <dd>
            <label>
                <input type="text" name="perekonnanimi" required/>
            </label>
        </dd>
        <dt><input type="submit" name="sisestusnupp" value="sisesta" required/></dt>
    </dl>
</form>