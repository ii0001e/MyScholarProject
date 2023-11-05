
<header>
    <h1 id="texth1">Ivanenko PHP leht</h1>
    <h2 id="texth2">Veebirakenduste töödeleht</h2>
    <?php
    if(isset($_SESSION['kasutaja'])){
        ?>
            <div class="container">
        Tere, <?="$_SESSION[kasutaja]"?>!
        <a href="logout.php" class="btn btn-danger">Logi välja</a>
            </div>
        <?php
    } else {
        ?>
        <a href="login.php" class="btn btn-success">Logi sisse</a>
        <?php
    }
    ?>
</header>