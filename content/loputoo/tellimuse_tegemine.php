<?php
require_once("../../php_files/conf.php");
session_start();
if (!isset($_SESSION["error"])) {
    $_SESSION["error"] = "";
}
if (!isset($_SESSION["admin"])) {
    $_SESSION["admin"] = true;
}


global $yhendus;
$query = "SELECT toon_id, toon FROM colorvalue";
$result = $yhendus->query($query);

if (isset($_REQUEST["sisestusnupp"])) {
    if (isset($_REQUEST["eesnimi"]) && isset($_REQUEST["perekonnanimi"])) {
        $eesnimi = $_REQUEST["eesnimi"];
        $perekonnanimi = $_REQUEST["perekonnanimi"];
        $tellimiskogus = $_REQUEST["tellimiskogus"];
        $toon_id = $_REQUEST["toon_id"];
        if (empty($eesnimi) || preg_match("/[0-9]/", $eesnimi) || empty($perekonnanimi) || preg_match("/[0-9]/", $perekonnanimi)) {
            echo "Incorrect data!";
        } else {
            global $yhendus;
            $kask = $yhendus->prepare("INSERT INTO toolivahendus (toon_id, tellimiskogus, Nimi, Perenimi, client_ID) VALUES (?, ?, ?, ?, ?)");
            $kask->bind_param("iissi", $toon_id, $tellimiskogus, $eesnimi, $perekonnanimi, $kliendi_id);
            $kask->execute();
            $yhendus->close();
            header("Location: kokkuvotte.php");
            exit();
        }
    } else {
        echo "Fields are not set!";
    }
}
?>

<!doctype html>
<html lang="et">
<?php include("header.php") ?>
<?php include("navigation.php") ?>
<head>
    <title>Теория экзамен</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/style_second_design.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
<main>
    <?php
    if (isset($_SESSION['kasutaja']) && $_SESSION['kasutaja']){

    ?>
    <div class="container">
        <div class="card">
            <div class="card-header">Регистрация</div>
            <div class="card-body">
                <div class="row-cols-4">

                    <?php if (isset($_REQUEST["lisatudeesnimi"])) {
                        echo "Добавлено: " . $_REQUEST["lisatudeesnimi"];
                    } ?>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="eesnimi">Eesnimi:</label>
                            <input type="text" class="form-control" id="eesnimi" name="eesnimi" required />
                        </div>
                        <div class="form-group">
                            <label for="perekonnanimi">Perekonnanimi:</label>
                            <input type="text" class="form-control" id="perekonnanimi" name="perekonnanimi" required />
                        </div>
                        <div class="form-group">
                            <label for="toon_id">Toon:</label>
                            <select class="form-control" id="toon_id" name="toon_id" required>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['toon_id'] . "'>" . $row['toon'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tellimiskogus">Tellimiskogus:</label>
                            <input type="text" class="form-control" id="tellimiskogus" name="tellimiskogus" required />
                        </div>
                        <button type="submit" name="sisestusnupp" class="btn btn-primary">Sisesta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>
<?php
include ("footer.php")
?>
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
</body>

</html>
