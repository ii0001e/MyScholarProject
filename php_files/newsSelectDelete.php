<?php
global $yhendus;
require('conf.php');
///kustutamine
if (isset($_REQUEST["kustuta"]))
{
    $kask=$yhendus->prepare("DELETE FROM uudised WHERE id=?");
    $kask->bind_param("i",$_REQUEST["kustuta"]);
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
<table>
    <tr>
        <td>Teema</td>
        <td>Kirjeldus</td>
        <td>Kuupaev</td>
        <th>XXX</th>
    </tr>
    <?php
    global $yhendus;
    $kask=$yhendus->prepare('SELECT id,Teema,Kirjeldus,kuupaev,varv FROM uudised');
    $kask->bind_result($id,$teema,$kirjeldus,$kuupaev,$varv);
    $kask->execute();

    while ($kask->fetch()){
        echo '<tr>';
        echo "<td bgcolor='$varv'>".htmlspecialchars($teema)."</td>";
        echo "<td>".htmlspecialchars($kirjeldus)."</td>";
        echo "<td>".htmlspecialchars($kuupaev)."</td>";
        echo "<td><a href='?kustuta=$id'>Delete</a></td>";
        echo '</tr></span>';
    }
    ?>
</table>
<?php
$yhendus->close()
?>
</body>

</HTML>
