<?php
require_once("../../config/conf.php");
 session_start();

 global $yhendus;
 if(isset($_REQUEST["kustuta"])){
     $kask = $yhendus->prepare("DELETE FROM jalgrattaeksam WHERE id=?");
     $kask->bind_param("i", $_REQUEST["kustuta"]);
     $kask->execute();
 } 

 if(!empty($_REQUEST["vormistamine_id"])){ 
 $kask=$yhendus->prepare( 
 "UPDATE jalgrattaeksam SET luba=1 WHERE id=?"); 
$kask->bind_param("i", $_REQUEST["vormistamine_id"]); 
$kask->execute(); 
 } 
 $kask=$yhendus->prepare( 
 "SELECT id, eesnimi, perekonnanimi, teooriatulemus,  
 slaalom, ringtee, t2nav, luba FROM jalgrattaeksam;"); 
 $kask->bind_result($id, $eesnimi, $perekonnanimi, $teooriatulemus,   $slaalom, $ringtee, $t2nav, $luba); 
 $kask->execute(); 
   
 function asenda($nr){ 
 if($nr==-1){return ".";} //tegemata 
 if($nr== 1){return "korras";} 
 if($nr== 2){return "ebaõnnestunud";}
return "Tundmatu number"; 
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
        <div class="card">
            <div class="card-header">Lõpetamine</div>
            <div class="card-body">
                <div class="row">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>Eesnimi</th>
                            <th>Perekonnanimi</th>
                            <th>Teooriaeksam</th>
                            <th>Slaalom</th>
                            <th>Ringtee</th>
                            <th>Tänavasõit</th>
                            <th>Lubade väljastus</th>
                            <?php if (isset($_SESSION["kasutaja"])) { ?>
                                <th>Action</th>
                            <?php } ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while ($kask->fetch()) {
                            $asendatud_slaalom = asenda($slaalom);
                            $asendatud_ringtee = asenda($ringtee);
                            $asendatud_t2nav = asenda($t2nav);
                            $loalahter = ".";
                            if ($luba == 1) {
                                $loalahter = "Väljastatud";
                            }
                            if ($luba == -1 && $t2nav == 1) {
                                if (isset($_SESSION["kasutaja"])) {
                                    $loalahter = "<a href='?vormistamine_id=$id' class='btn btn-dark'>Vormista load</a>";
                                }
                            }
                            echo "
            <tr>
                <td>$eesnimi</td>
                <td>$perekonnanimi</td>
                <td>$teooriatulemus</td>
                <td>$asendatud_slaalom</td>
                <td>$asendatud_ringtee</td>
                <td>$asendatud_t2nav</td>
                <td>$loalahter</td>";
                            if (isset($_SESSION["kasutaja"])) {
                                echo "
                <td><a href='?kustuta=$id' class='btn btn-danger'>Delete</a></td>";
                            }
                            echo "</tr>";
                        } ?>
                        </tbody>
                    </table>

                </div></div></div></div></main><?php
include ("footer.php")
?>
 </body> 
</html>