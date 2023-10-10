<?php
global $yhendus;
require_once("../../php_files/conf.php");
$error_message = '';
$teooriatulemus = '';
if (!empty($_REQUEST['teooriatulemus']))
{
    $teooriatulemus = $_REQUEST['teooriatulemus'];

    if (!is_numeric($teooriatulemus)
        || $teooriatulemus > 10
        || $teooriatulemus < 0)
    {
        $error_message = "Incorrect data!";
    }
    else
    {
        $kask = $yhendus->prepare("UPDATE jalgrattaeksam SET teooriatulemus=? WHERE id=?");
        $kask->bind_param("ii", $teooriatulemus, $_REQUEST['id']);
        $kask->execute();
        header("Location: Slaloom.php");
    }
}

$kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi   
FROM jalgrattaeksam WHERE teooriatulemus=-1");
$kask->bind_result($id, $eesnimi, $perekonnanimi);
$kask->execute();

?>
<!doctype html>
<html lang="et">
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
<header>
    <h1>Eksam...</h1>
    <?php
    if (isset($_SESSION['kasutaja'])){

    ?>
    <h2>
        <?=$_SESSION['kasutaja']?> on sisse logitud
        <a href="07_logout.php">Logout</a>
    </h2>

    <?php
    }
    ?>




</header>
<?php
include ("navigation.php")
?>
<main>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Teooriaeksam</div>
            <div class="card-body">
                <div class="row">

                    <table class="table table-bordered">
                        <?php
                        while($kask->fetch()){
                            echo " 
                             <tr> 
                             <td>$eesnimi</td> 
                             <td>$perekonnanimi</td> 
                             <td><form action=''> 
                             <input type='hidden' name='id' value='$id' /> 
                             <input type='text' name='teooriatulemus' value='$teooriatulemus'/>
                             <input type='submit' value='Sisesta tulemus' /> 
                             <span class='error' style='color: red'>$error_message</span>
                             </form> 
                             </td> 
                            </tr> 
                             ";
                        }
                        ?>
                    </table>

                </div>
            </div>
        </div>
    </div>

</main>
</body>
</html>
