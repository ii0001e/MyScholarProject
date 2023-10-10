<?php require_once("../../config/conf.php"); ?>
<?php
global $yhendus;
session_start();
if (isset($_SESSION['tuvastamine'])) {
    header('Location: Teooriaeksam.php');
    exit();
}
//kontrollime kas väljad on täidetud
if (!empty($_POST['login']) && !empty($_POST['pass'])) {
    //eemaldame kasutaja sisestusest kahtlase pahna
    $login = htmlspecialchars(trim($_POST['login']));
    $pass = htmlspecialchars(trim($_POST['pass']));
    //SIIA UUS KONTROLL
    $sool = 'taiestisuvalinetekst';
    $kryp = crypt($pass, $sool);
    //kontrollime kas andmebaasis on selline kasutaja ja parool
    $kask=$yhendus->prepare("SELECT kasutaja FROM kasutajad WHERE kasutaja=? AND password=?");
    $kask->bind_param("ss", $login, $kryp);
    $kask->bind_result($kasutaja);
    $kask->execute();
    //kui on, siis loome sessiooni ja suuname
    if ($kask -> fetch()) {
        $_SESSION['tuvastamine'] = 'misiganes';
        $_SESSION["kasutaja"] = $kasutaja;
        header('Location: Teooriaeksam.php');
        exit();
    } else {
        echo "kasutaja $login või parool $kryp pn vale";
    }
}
?>
<h1>Login</h1>
<form action="" method="post">
    Login: <input type="text" name="login"><br>
    Password: <input type="password" name="pass"><br>
    <input type="submit" value="Logi sisse">
</form>
