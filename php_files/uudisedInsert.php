<?php
global $yhendus;
require('conf.php');
//uudiste lisamine INSERT
if (isset($_REQUEST["teema"]))
{
    $kask=$yhendus->prepare(
            "INSERT INTO uudised(teema,kuupaev,kirjeldus,varv) 
                    VALUES(?,?,?,?)");
    $kask->bind_param(
            "ssss",$_REQUEST["teema"],
            $_REQUEST["kuupaev"],$_REQUEST["kirjeldus"],$_REQUEST["varv"]);
    $kask->execute();
}
?>
<!DOCTYPE html>
<HTML lang="et">
<head>
    <meta charset="UTF-8">
    <title>Uudiste leht</title>
</head>
<body>
<h1>Uudiste leht</h1>
<h2>Uudiste lisamine</h2>
<form name="vorm">
    <label for="teema">Teema</label>
    <input type="text" name="teema" id="teema">
    <br>
    <label for="Kirjeldus">Kirjeldus</label>
    <input type="text" name="Kirjeldus" id="Kirjeldus">
    <br>
    <label for="kuupaev">Kuupaev</label>
    <input type="date" name="kuupaev" id="kuupaev">
    <br>
    <label for="varv">Värv</label>
    <input type="text" name="varv" id="varv">
    <br>
    <input type="submit" value="ok">

</form>
<?php
$yhendus->close();
?>
</body>
</HTML>