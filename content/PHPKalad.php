<?php
global $yhendus;
require('../config/conf.php');

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

<!--komment-->

<html lang="et">
<head>
    <!-- tehniline info -->
    <title>Ivanenko koduleht</title>
    <meta charset="UTf-8">
    <link rel="stylesheet" type="text/css" href="../css/style_second_design.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<header>
    <h1>Ivanenko leht</h1>
    <h2>Veebirakenduste töödeleht</h2>
</header>
<?php include("../php_files/navigation.php")?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="container-fluid">
<h1><a href="PHPKalad.php">Kalade leht</a></h1>
<div id="lingid">


<?php
global $yhendus;
$kask=$yhendus->prepare('SELECT id,kalanimi FROM kalad');
$kask->bind_result($id,$kalanimi);
$kask->execute();
echo '<ul>';

while ($kask->fetch()) {
echo "<li><a href='PHPKalad.php?id=$id'>".$kalanimi."</a></li>";
}
echo '</ul>';
echo "<a href='PHPKalad.php?lisa=jah'>Lisa..</a>";
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
echo "<br><a href='PHPKalad.php?kustuta=$id'>Kustuta</a>";
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include("../php_files/footer.php")?>
</body>
</html>
