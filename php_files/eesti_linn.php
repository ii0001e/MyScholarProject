<!DOCTYPE html>
<html lang="et">
    <?php
    function clearVarsExcept($varname)
    {
        $result = array($varname => $_REQUEST[$varname]);
        echo json_encode($result);
    }

    if (isset($_REQUEST["n1"])) {
        clearVarsExcept("n1");
        header("Location: $_SERVER[PHP_SELF]");
        exit;
    }

    function kontrolliSona($sisestatudSona, $oletatudSona)
    {
    if ($sisestatudSona === '') {
        echo "Palun sisestage sõna!";
        echo "<body style='background-color : lightsalmon'>";
    }
        else if ($sisestatudSona == $oletatudSona) {
            echo "Õige!";
            echo "<body style='background-color: lightgreen'>";
        } else {
            echo "<body style='background-color: lightsalmon'>";
        }
    }

    $tekst = 'Reedel on tore ilm';
    echo "    <div class='container-fluid'>
            <div class='row'>
                <div class='card'>
                    <div class='card-body'>";
    echo $tekst . "<br>";

    echo strtolower($tekst) . "<br>";
    echo strtoupper($tekst) . "<br>";
    echo ucfirst(strtolower($tekst)) . "<br>";

    echo strlen($tekst) . "<br>";
    echo str_word_count($tekst) . "<br>";

    echo "<pre>$tekst</pre>";
    echo "<pre>" . trim($tekst) . "</pre>";
    echo "<pre>" . ltrim($tekst) . "</pre>";
    echo "<pre>" . rtrim($tekst) . "</pre><br>";

    echo $tekst[0] . "<br>";
    echo $tekst[4] . "<br>";

    echo substr($tekst, 3, 5) . "<br>";
    echo substr($tekst, 4, -13) . "<br>";
    echo substr($tekst, -8, 7) . "<br>";

    echo "<br>";
    echo strpos($tekst, " ") . "<br>";

    $otsitav = 'on';
    echo strpos($tekst, $otsitav, 00) . "<br>";

    echo substr($tekst, strpos($tekst, " "), strlen($tekst) - strpos($tekst, " ")) . "<br></div></div></div></div>";

    $linn = 'Tartu';
    $linn1 = 'Narva';
    $linn2 = 'Valga';
    $linn3 = 'Mustvee';
    $otsitav = 'Mustvee';
    $asenda = 'evetusvM';

    echo "<div class='container-fluid'>
<div class='row'>
            <div class='card'>
                <div class='card-body'>
                <h2>Mõistatus. Eesti linn</h2>";
    echo "<ol><li>Linnanimi pikkus on " . strlen($linn) . " tähte, asub lõunal ja see linn loetakse tudengilinn</li>";
    echo "<li>Kõige lähem linn Venemaa piirkonna juurde on " . substr($linn1, 0, 2) . "***</li>";
    echo "<li>Selle linna nimil on olemas täht ***" . $linn2[3] . "* ja meie naaberriigis on olemas sama linn ja vahet nende vahel ainult tähes, sest naaberriigis " . $linn2[3] . " asemel linnanimis on 'k' </li>";
    echo "<li>Pepsi-järvel asub see linn, mis nimi tähed on segaduses:  " . str_replace($otsitav, $asenda, $linn3) . " </li></ol>";
    echo"
                </div>
            </div>
    </div>
    </div>";

    ?>
    <div class='container-fluid'>
        <div class='row'>
            <div class='card'>
                <div class='card-body'>
                    <h2>Kontrollimiseks sisesta sõna</h2>
                    <ol>
                        <li>
                            <form name="kontroll1" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" name="n1" class="form-control-sm" placeholder="Sisesta sõna" aria-label="Sisesta sõna" aria-describedby="basic-addon1" data-oodatud-sona="<?= $linn ?>" required>
                                    <div class="input-group-append">
                                        <button type="submit" name="submit_n1" class="btn btn-outline-secondary">Kontrolli</button>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <li>
                            <form name="kontroll2" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" name="n2" class="form-control-sm" placeholder="Sisesta sõna" aria-label="Sisesta sõna" aria-describedby="basic-addon2" data-oodatud-sona="<?= $linn1 ?>" required>
                                    <div class="input-group-append">
                                        <button type="submit" name="submit_n2" class="btn btn-outline-secondary">Kontrolli</button>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <li>
                            <form name="kontroll3" method="post">
                                <div class="input-group">
                                    <input type="text" name="n3" class="form-control-sm" placeholder="Sisesta sõna" aria-label="Sisesta sõna" aria-describedby="basic-addon3" data-oodatud-sona="<?= $linn2 ?>" required>
                                    <div class="input-group-append">
                                        <button type="submit" name="submit_n3" class="btn btn-outline-secondary">Kontrolli</button>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <li>
                            <form name="kontroll4" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" name="n4" class="form-control-sm" placeholder="Sisesta sõna" aria-label="Sisesta sõna" aria-describedby="basic-addon4" data-oodatud-sona="<?= $linn3 ?>" required>
                                    <div class="input-group-append">
                                        <button type="submit" name="submit_n4" class="btn btn-outline-secondary">Kontrolli</button>
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ol>
                    <?php
                    if (isset($_POST["submit_n1"])) {
                        kontrolliSona($_POST["n1"], $linn);
                    } else if (isset($_POST["submit_n2"])) {
                        kontrolliSona($_POST["n2"], $linn1);
                    } else if (isset($_POST["submit_n3"])) {
                        kontrolliSona($_POST["n3"], $linn2);
                    } else if (isset($_POST["submit_n4"])) {
                        kontrolliSona($_POST["n4"], $linn3);
                    }
                    else {
                        echo "Sisestage sõna!";
                    }
                    ?>
                    <script>
                        // Ждем, пока документ загрузится
                        document.addEventListener('DOMContentLoaded', function() {
                            const forms = document.querySelectorAll('form[name^="kontroll"]');

                            forms.forEach(function(form) {
                                form.addEventListener('submit', function(event) {
                                    event.preventDefault(); // Предотвращаем стандартное действие отправки формы
                                    checkForm(form); // Вызываем функцию для обработки формы
                                });
                            });
                        });

                        // Определяем функцию для обработки отправки формы
                        function checkForm(form) {
                            const input = form.querySelector('input'); // Получаем элемент ввода
                            const sisestatudSona = input.value.trim(); // Убираем пробелы с начала и конца введенного слова
                            const oodatudSona = input.getAttribute('data-oodatud-sona'); // Получаем ожидаемое слово

                            const resultDiv = document.createElement('div'); // Создаем элемент для результата

                            if (sisestatudSona === '') {
                                resultDiv.textContent = 'Palun sisestage sõna!';
                                resultDiv.style.backgroundColor = 'lightsalmon';
                            } else if (sisestatudSona === oodatudSona) {
                                resultDiv.textContent = 'Õige!';
                                resultDiv.style.backgroundColor = 'lightgreen';
                            } else {
                                resultDiv.textContent = 'Vale! Sisestatud sõna: ' + sisestatudSona + ', oodatud: ' + oodatudSona;
                                resultDiv.style.backgroundColor = 'lightsalmon';
                            }

                            // Удаляем предыдущий результат, если есть
                            const previousResult = form.querySelector('.result');
                            if (previousResult) {
                                previousResult.remove();
                            }

                            resultDiv.classList.add('result');
                            form.appendChild(resultDiv); // Добавляем результат под форму
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <div class='container-fluid'>
        <div class='row'>
            <div class="card">
                <div class="card-body" style="max-height: 300px; overflow-y: scroll;">
                    <?php
                    highlight_file('eesti_linn.php');
                    ?>
                </div>
            </div>
        </div>
    </div>
</html>
