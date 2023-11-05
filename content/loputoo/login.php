<?php
require_once("../../php_files/conf.php");
global $yhendus;
session_start();
// kontroll kas login vorm on täidetud?
if(isset($_REQUEST['knimi']) && isset($_REQUEST['psw'])) {
    $login = htmlspecialchars($_REQUEST['knimi']);
    $pass = htmlspecialchars($_REQUEST['psw']);

    $sool = 'vagavagatekst';
    $krypt = crypt($pass, $sool);
    // kontrollime kas andmebaasis on selline kasutaja

    $kask = $yhendus->prepare("
SELECT id, kasutaja, parool, isadmin FROM kasutajad WHERE kasutaja=?");
    $kask->bind_param("s", $login);
    $kask->bind_result($id, $kasutajanimi, $parool, $onadmin);
    $kask->execute();

    if ($kask->fetch() && $krypt == $parool) {
        $_SESSION['kasutaja'] = $login;
        if ($onadmin == 1) {
            $_SESSION['admin'] = true;
        }
        header("Location: tellimuse_tegemine.php");
        $yhendus->close();
        exit();
    }
    echo "kasutaja $login või parool $krypt on vale";
    $yhendus->close();
}

?>
<!doctype html>
<html lang="et">
<?php include("header.php") ?>
<?php include("navigation.php") ?>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/style_second_design.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
<main>
    <div class="container">
        <div class="card col-md-4">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="knimi">Kasutajanimi</label>
                        <input type="text" class="form-control" id="knimi" name="knimi" placeholder="Sisesta kasutajanimi" required>
                    </div>
                    <div class="form-group">
                        <label for="psw">Parool</label>
                        <input type="password" class="form-control" id="psw" name="psw" placeholder="Sisesta parool" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Logi sisse</button>
                </form>
            </div>
        </div>
    </div>
</main>



<?php
include ("footer.php")
?>
</body></html>