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


if (isset($_REQUEST["update"])) {
    $update_id = $_REQUEST["update"];
    addValminud($update_id);
}

function addValminud($update_id)
{
    global $yhendus;
    $kask = $yhendus->prepare("UPDATE toolivahendus
    SET valminudkogus_id = (
        SELECT SUM(t.tellimiskogus)
        FROM toolivahendus t
        WHERE t.toon_id = ?
    )
    WHERE toon_id = ?");
    $kask->bind_param("ii", $update_id, $update_id);
    $kask->execute();
    $kask->close();
}

$kask = $yhendus->prepare(
    "SELECT c.toon_id, c.toon, SUM(t.tellimiskogus), t.valminudkogus_id
FROM toolivahendus t
INNER JOIN colorvalue c ON t.toon_id = c.toon_id
GROUP BY c.toon_id, c.toon, t.valminudkogus_id
HAVING SUM(t.tellimiskogus) > t.valminudkogus_id;
");
$kask->bind_result($id, $toon, $tellimiskogus, $valminudkogus);
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
    if (isset($_SESSION['kasutaja']) && $_SESSION['admin'] == 1){

        ?>
    <div class="container-fluid">
    <h1>Lõpetamine</h1>

    <table class="table table-striped table-bordered">
        <tr>
            <th>Toon</th>
            <th>Tellitudkogus</th>
            <th>Valminudkogus</th>
            <th>Vaja teha</th>
            <th>Kustuta</th>
        </tr>
        <?php
        while ($kask->fetch()) {
            $asendatud_toon = $toon;
            $asendatud_tellinimiskogus = $tellimiskogus;
            $asendatud_valminudkogus = $valminudkogus;
            $loalahter = $tellimiskogus - $valminudkogus;
            echo "
 <tr>
 <td>$asendatud_toon</td>
 <td>$asendatud_tellinimiskogus tk.</td>
 <td>$asendatud_valminudkogus tk.</td>
 <td>$loalahter tk.</td>
 <td>";
            echo "<a href='toolide_seisund.php?update=$id' 
                onclick=\"return confirm('Kas ikka soovid uuenda?')\">
                <button type='button' class='btn btn-success'>Update to full</button></a>";
            echo "</td>
 </tr>
 ";
        }
        $kask->close();
        ?>
    </table>
    </div>
    <?php
} else { ?>
    <div class="container">
        <div class="card">
            <div class="card-header">Регистрация</div>
            <div class="card-body">
                <div class="row">
                    See leht on nähtav ainult administraatoritele.
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</main>
<?php
include ("footer.php")
?>
</body>
</html>
