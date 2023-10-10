<?php
global $yhendus;
require_once("../../config/conf.php");
if (!empty($_REQUEST["vormistamine_id"])) {
    $vormistamine_id = $_REQUEST["vormistamine_id"];
    $kask = $yhendus->prepare("UPDATE jalgrattaeksam SET luba=1 WHERE id = ?");
    $kask->bind_param("i", $vormistamine_id);
    $kask->execute();
    $kask->close();
}

function asenda($nr){
    if ($nr == -1) {
        return ".";
    } elseif ($nr == 1) {
        return "korras";
    } elseif ($nr == 2) {
        return "ebaõnnestunud";
    } else {
        return "Tundmatu number";
    }
}

if (isset($_REQUEST["kustuta"])) {
    $kustutus_id = $_REQUEST["kustuta"];
    kustutaKaup($kustutus_id);
}

function kustutaKaup($nimi_id)
{
    global $yhendus;
    $kask = $yhendus->prepare("DELETE FROM jalgrattaeksam WHERE id = ?");
    $kask->bind_param("i", $nimi_id);
    $kask->execute();
    $kask->close();
}

$kask = $yhendus->prepare(
    "SELECT id, eesnimi, perekonnanimi, teooriatulemus, slaalom, ringtee, t2nav, luba FROM jalgrattaeksam");
$kask->bind_result($id, $eesnimi, $perekonnanimi, $teooriatulemus, $slaalom, $ringtee, $t2nav, $luba);
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
    <div class="container-fluid">
    <h1>Lõpetamine</h1>

    <table>
        <tr>
            <th>Eesnimi</th>
            <th>Perekonnanimi</th>
            <th>Teooriaeksam</th>
            <th>Slaalom</th>
            <th>Ringtee</th>
            <th>Tänavasõit</th>
            <th>Lubade väljastus</th>
            <th>Kustuta</th>
        </tr>
        <?php
        while ($kask->fetch()) {
            $asendatud_slaalom = asenda($slaalom);
            $asendatud_ringtee = asenda($ringtee);
            $asendatud_t2nav = asenda($t2nav);
            $loalahter = ".";
            if ($luba == 1) {
                $loalahter = "Väljastatud";
            }
            if ($luba == -1 && $t2nav == 1) {
                $loalahter = "<a href='?vormistamine_id=$id'>Vormista load</a>";
            }
            echo "
 <tr>
 <td>$eesnimi</td>
 <td>$perekonnanimi</td>
 <td>$teooriatulemus</td>
 <td>$asendatud_slaalom</td>
 <td>$asendatud_ringtee</td>
 <td>$asendatud_t2nav</td>
 <td>$loalahter</td>
 <td>";
            echo "<a href='lubadeleht.php?kustuta=$id' 
                onclick=\"return confirm('Kas ikka soovid kustutada?')\">
                <button type='button' class='btn btn-danger'>Delete</button></a>";
            echo "</td>
 </tr>
 ";
        }
        $kask->close();
        ?>
    </table>
    </div>
</main>
<?php
include ("footer.php")
?>
</body>
</html>
