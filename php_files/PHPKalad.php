<?php
global $yhendus;
require('conf.php');

if (isset($_REQUEST["Lisamisvorm"]) && !empty($_REQUEST["kalanimi"]))
{
    $kask = $yhendus->prepare
    (
        "INSERT INTO kalad(kalanimi,pilt,varv) VALUES(?,?,?)"
    );
    $kask->bind_param
    (
        "sss",
        $_REQUEST["kalanimi"],
        $_REQUEST["pilt"],
            $_REQUEST["varv"]
    );
    $kask->execute();
}

///kustutamine
if (isset($_REQUEST["kustuta"]))
{
    $kask=$yhendus->prepare
    (
            "DELETE FROM kalad WHERE id=?"
    );
    $kask->bind_param
    (
            "i",$_REQUEST["kustuta"]
    );
    $kask->execute();
}
//aadressiribas kustutab paring
        //header("Location: $_SERVER[PHP_SELF]");
?>


<!DOCTYPE html>
<HTML lang="et">

<body>
<h1><a href="PHPKalad.php">Kalade leht</a></h1>
<div id="lingid">


<?php
global $yhendus;
$kask=$yhendus->prepare('SELECT id,kalanimi FROM kalad');
$kask->bind_result($id,$kalanimi);
$kask->execute();
echo '<ul>';

while ($kask->fetch()) {
echo "<li><a href='?id=$id'>".$kalanimi."</a></li>";
}
echo '</ul>';
echo "<a href='?lisa=jah'>Lisa..</a>";
?>


</div>
<div id="sisu">


<?php
if (isset($_REQUEST['id'])) {
    $kask = $yhendus->prepare('SELECT id,kalanimi,pilt,varv FROM kalad WHERE id=?');
    $kask->bind_param('i', $_REQUEST['id']);
    $kask->bind_result($id, $kalanimi, $pilt, $varv);
    $kask->execute();
}
if ($kask->fetch()){

echo "<div style= 'background-color: $varv; width: 600px'>";
echo "<strong>".$id. ', ' .$kalanimi. ', ' .$varv."</strong>";
echo "<img src='$pilt' alt='$kalanimi' width='600px'>";
echo "</div>";
echo "<br><a href='?kustuta=$id'>Kustuta</a>";
}
?>
</div>
<?php
if (isset($_REQUEST["lisa"])){
?>

<h2>kala lisamine</h2>
<form name="vorm" action="?">
<input type="hidden" name="Lisamisvorm" value="jah">
<label for="kalanimi">Kalanimi</label>
<input type="text" name="kalanimi" id="kalanimi">
<br>
<label for="pilt">Pilt</label>
<input type="text" name="pilt" id="pilt">
<br>
<label for="varv">Varv</label>
<input type="text" name="varv" id="varv">
<br>
<input type="submit" value="ok">

</form>

<?php
}
$yhendus->close();
?>

</body>
