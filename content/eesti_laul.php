<?php
global $yhendus;
require('config/conf.php');
//update table points

if (isset($_REQUEST["healaul"]))
{
    $kask=$yhendus ->prepare
    ("update eesti_laul
                            set punktid=punktid+1
                            where id=?"
    );
    $kask->bind_param("i",$_REQUEST["healaul"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
}
//delete table points -1

if (isset($_REQUEST["delete_1_point"]))
{
    $kask=$yhendus ->prepare
    ("update eesti_laul
                    set punktid=punktid-1
                    where id=?"
    );
    $kask->bind_param("i",$_REQUEST["delete_1_point"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
}
//delete table points ALL
if (isset($_REQUEST["delete_all_point"]))
{
    $kask=$yhendus ->prepare
    ("        update eesti_laul
                        set punktid=0
                        where id=?"
    );
    $kask->bind_param("i",$_REQUEST["delete_all_point"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
}

//update table comment

if (isset($_REQUEST["uuskomment"]))
{
    if (!empty($_REQUEST["uuskomment"]))
    {
        $kask=$yhendus ->prepare
        ("update eesti_laul
                                    set kommentaarid=CONCAT(IFNULL(kommentaarid, ''), ?)
                                    where id=?"
        );
        $lisakomment=$_REQUEST["komment"]."\n";
        $kask->bind_param("si",$lisakomment,$_REQUEST["uuskomment"]);
        $kask->execute();
        header("Location: $_SERVER[PHP_SELF]");
    }
}
//delete table comments

if (isset($_REQUEST["delete_komment"]))
{
    if (!empty($_REQUEST["delete_komment"]))
    {
        $kask=$yhendus ->prepare
        ("update eesti_laul
            set kommentaarid=''
            where id=?"
        );
        $lisakomment=$_REQUEST["deletecom"]."\n";
        $kask->bind_param("s",$_REQUEST["delete_komment"]);
        $kask->execute();
        header("Location: $_SERVER[PHP_SELF]");
    }
}

//update table comment elete last


?>
<div class="row">
<div class="col-md">
<div class="card">
<div class="card-body">
<div class="row">
    <div class="container-fluid">
            <table class="table table-bordered table-striped table-white" >
            <tr>
                <th colspan="6">Eesti TARgv22 laulukonkurss</th>
            </tr>
            <tr>
                <th>Laulunimi</th>
                <th>Laulja</th>
                <th>Punktid</th>
                <th>Seaded</th>
                <th>Komentaar</th>
                <th>Komentaari lisamaine</th>
            </tr>
            <?php
            global $yhendus;
            $kask=$yhendus->prepare('SELECT id, laulu_nimi, laulja, punktid, kommentaarid FROM eesti_laul');
            $kask->bind_result($id,$laulu_nimi,$laulja,$punktid,$kommentaarid);
            $kask->execute();

            while ($kask->fetch()) {
            echo "<tr>";
            echo "<td>" . $laulu_nimi. "</td>";
            echo "<td>" . $laulja. "</td>";
            echo "<td>" . $punktid. "</td>";
            echo "<td><p><a href='?healaul=$id' type='button' class='btn btn-success'>Lisa 1 punkt</a></p>
                        <p><a href='?delete_1_point=$id' type='button' class='btn btn-warning'>Kustuta 1 punkt</a></p>
                        <p> <a href='?delete_all_point=$id' type='button' class='btn btn-danger'>Kustuta kõik</a></p></td>";
            echo "<td>" . nl2br(htmlspecialchars($kommentaarid)). "</td>";
            echo "<td>
                    <form action='?'>
                        <input type='hidden' value='$id' name='uuskomment'></input>
                        <input type='text' name='komment'></input>
                        <input type='submit' value='Insert' class='btn btn-primary'></input>
                        <a href='?' type='button' class='btn btn-danger'>Delete last</a>
                        <a href='?delete_komment=$id' type='button' class='btn btn-danger'>Delete all</a>
                    </form>
                </td>";
            echo "</tr>";
            }
            ?>

        </table>
        <?php
        $yhendus -> close();
        ?>
    </div>
    </div>
</div>
</div>
</div>
</div>

