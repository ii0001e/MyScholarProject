<?php
global $yhendus;
require_once("../../config/conf.php");
session_start();
if (!isset($_SESSION["error"])) {
    $_SESSION["error"] = "";
}
if (!isset($_SESSION["admin"])) {
    $_SESSION["admin"] = false;
}


if (isset($_REQUEST["kustuta"])) {
    $kustutus_id = $_REQUEST["kustuta"];
    kustutaTellimus($kustutus_id);
}

function kustutaTellimus($nimi_id)
{
    global $yhendus;
    $kask = $yhendus->prepare("DELETE FROM toolivahendus WHERE id = ?");
    $kask->bind_param("i", $nimi_id);
    $kask->execute();
    $kask->close();
}

$kask = $yhendus->prepare(
    "SELECT t.id, c.toon AS toon_name, t.tellimiskogus, t.valminudkogus_id, 
       t.Nimi, t.Perenimi, t.client_ID
FROM toolivahendus t
INNER JOIN colorvalue c ON t.toon_id = c.toon_id
;
");
$kask->bind_result($id, $toon_id, $tellimiskogus, $valminudkogus, $Nimi, $Perenimi, $client_ID);
$kask->execute();
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
    <title>Ivanenko koduleht</title>
    <meta charset="UTf-8">
    <link rel="stylesheet" type="text/css" href="../../css/style_second_design.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<main>
    <?php
    if (isset($_SESSION['kasutaja'])){

    ?>
    <div class="container-fluid">

    <h1>Lõpetamine</h1>

    <table class="table table-striped table-bordered">
        <tr>
            <th>Eesnimi</th>
            <th>Perekonnanimi</th>
            <th>Tellimiskogus</th>
            <th>Valminudkogus</th>
            <th>Toon</th>
            <?php
            if (isset($_SESSION['kasutaja']) && $_SESSION['admin'] == 1) {
                echo "<th > Kustuta</th >";
            }
            ?>
        </tr>
        <?php
        while ($kask->fetch()) {
            $asendatud_Nimi = $Nimi;
            $asendatud_Perenimi = $Perenimi;
            $asendatud_client_ID = $client_ID;
            $asendatud_tellinimiskogus = $tellimiskogus;
            $asendatud_valminudkogus = $valminudkogus;
            $asendatud_toon_id = $toon_id;
            $loalahter = ".";
            echo "
 <tr>
 <td>$asendatud_Nimi</td>
 <td>$asendatud_Perenimi</td>
 <td>$asendatud_tellinimiskogus</td>
 <td>$asendatud_valminudkogus</td>
 <td>$asendatud_toon_id</td>";

            if (isset($_SESSION['kasutaja']) && $_SESSION['admin'] == 1){

                echo "<td><a href='kokkuvotte.php?kustuta=$id' onclick=\"return confirm('Kas ikka soovid kustutada?')\">";
                echo "<button type='button' class='btn btn-danger'>Delete</button></a>";
                echo "</td></tr>";
            }
        }
        $kask->close();
        ?>
    </table>
    </div>
</main>
<?php
} else { ?>
    <div class="container">
        <div class="card">
            <div class="card-header">Регистрация</div>
            <div class="card-body">
                <div class="row">
                    See leht on nähtav ainult autoriseeritud kasutajale
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php
include ("footer.php")
?>
</body>
</html>
