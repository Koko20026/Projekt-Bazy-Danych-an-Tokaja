<!DOCTYPE html>
<html lang="pl">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    @include "polacz.php";
    $id_producenta = null;
    $nazwa = null;
    $miasto = null;
    $ulica = null;
    $numer = null;
    $dodaj_producenta = false;
    $edycja_producenta = false;
    $edytuj_producenta = false;
    $usun_producenta = false;


    if (isset($_POST['tryb']) && $_POST['tryb'] == 'usun_producenta') {
        $usun_producenta = true;
        $id_producenta = $_POST['id_producenta'];
    } elseif (isset($_POST['tryb']) && $_POST['tryb'] == 'dodaj_producenta') {
        $dodaj_producenta = true;

        $nazwa = $_POST['nazwa'];
        $miasto = $_POST['miasto'];
        $ulica = $_POST['ulica'];
        $numer = $_POST['numer'];
    } elseif (isset($_POST['tryb']) && $_POST['tryb'] == 'edycja_producenta') {
        $edycja_producenta = true;

        $e_nazwa = $_POST['nazwa'];
        $e_miasto = $_POST['miasto'];
        $e_ulica = $_POST['ulica'];
        $e_numer = $_POST['numer'];
        $e_id_producenta = $_POST['id_producenta'];
    } elseif (isset($_POST['tryb']) && $_POST['tryb'] == 'edytuj_producenta') {
        $edytuj_producenta = true;

        $nazwa = $_POST['nazwa'];
        $miasto = $_POST['miasto'];
        $ulica = $_POST['ulica'];
        $numer = $_POST['numer'];
        $id_producenta = $_POST['id_producenta'];
    }


    if ($dodaj_producenta) {
        $kwerenda_producent = $conn->prepare("INSERT INTO producenci(nazwa, miasto, ulica, numer) VALUES(?,?,?,?)");
        $kwerenda_producent->execute([$nazwa, $miasto, $ulica, $numer]);
    }
    if ($edytuj_producenta) {
        $kwerenda_producent = $conn->prepare("UPDATE producenci SET nazwa=?, miasto=?, ulica=?, numer=? WHERE id_producenci=?");
        $kwerenda_producent->execute([$nazwa, $miasto, $ulica, $numer, $id_producenta]);
    }
    if ($usun_producenta) {
        $kwerenda_producent = $conn->prepare("DELETE FROM producenci WHERE id_producenci ='" . $id_producenta . "'");
        $kwerenda_producent->execute();
    }


    $producenci = $conn->query("SELECT * from producenci");
    ?>


    <div class="container">
        <div class="row">
            <div class="kategorie col-xl-12 col-lg-12 col-md-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dodaj_producenta">
                    dodaj producenta
                </button>
                <?php
                echo '<table>';
                echo '<tr><th> id producenta </th><th>nazwa</th><th>miasto</th><th>ulica</th><th>numer</th></tr>';
                foreach ($producenci->fetchAll() as $row) {

                    echo '<tr><td>' . $row["id_producenci"] . '</td>';
                    echo '<td>' . $row["nazwa"] . '</td>';
                    echo '<td>' . $row["miasto"] . '</td>';
                    echo '<td>' . $row["ulica"] . '</td>';
                    echo '<td>' . $row["numer"] . '</td>';
                    echo '<td><form action="panel_admina_producent.php" method="post"><td>
                        <input type="hidden" name="nazwa" value="' . $row['nazwa'] . '">
                        <input type="hidden" name="miasto" value="' . $row['miasto'] . '">
                        <input type="hidden" name="ulica" value="' . $row['ulica'] . '">
                        <input type="hidden" name="numer" value="' . $row['numer'] . '">
                        <input class="btn btn-primary" value="edytuj" type="submit">
                        <input type="hidden" name="tryb" value="edycja_producenta"></td><td>
                        <input type="hidden" name="id_producenta" value="' . $row['id_producenci'] . '"></form>
                        <form action="panel_admina_producent.php" method="post"><input class="btn btn-primary" type="submit" value="usun"> 
                        <input type="hidden" name="id_producenta" value="' . $row['id_producenci'] . '">
                        <input type="hidden" name="tryb" value="usun_producenta"></form></td></tr>';
                }
                echo '</table>';

                if ($edycja_producenta) {
                    echo '<form action="panel_admina_producent.php" method="post">';

                    echo '<div>';
                    echo '<label class="form-label for="imie">Nazwa  </label>';
                    echo '<input type="text" id="nazwa" class="form-control" name="nazwa" value="' . $e_nazwa . '">';
                    echo '</div>';

                    echo '<div>';
                    echo '<label class="form-label for="imie">miasto</label>';
                    echo '<input type="text" id="miasto" class="form-control" name="miasto" value="' . $e_miasto . '">';
                    echo '</div>';

                    echo '<div>';
                    echo '<label class="form-label for="imie">ulica</label>';
                    echo '<input type="text" id="ulica" class="form-control" name="ulica" value="' . $e_ulica . '">';
                    echo '</div>';

                    echo '<div>';
                    echo '<label class="form-label for="imie">numer</label>';
                    echo '<input type="text" id="numer" class="form-control" name="numer" value="' . $e_numer . '">';
                    echo '</div>';

                    echo '<input type="submit" value="edytuj" class="btn btn-primary">';

                    echo '</div>';
                    echo '<input type="hidden" name="tryb" value="edytuj_producenta">';
                    echo '<input type="hidden" name="id_producenta" value="' . $e_id_producenta . '">';
                    echo '</form>';
                }
                ?>
                <div class="modal fade" id="dodaj_producenta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">dodawanie producenta</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php
                                echo '<form class="card card-body p-2 gap-1" action="panel_admina_producent.php" method="post">';
                                echo '<span class="fs-5 fw-bold">Dodawanie</span>';

                                echo '<div>';
                                echo '<label class="form-label for="imie">Nazwa  </label>';
                                echo '<input type="text" id="nazwa" class="form-control" name="nazwa" value="' . $nazwa . '">';
                                echo '</div>';

                                echo '<div>';
                                echo '<label class="form-label for="imie">miasto</label>';
                                echo '<input type="text" id="miasto" class="form-control" name="miasto" value="' . $miasto . '">';
                                echo '</div>';

                                echo '<div>';
                                echo '<label class="form-label for="imie">ulica</label>';
                                echo '<input type="text" id="ulica" class="form-control" name="ulica" value="' . $ulica . '">';
                                echo '</div>';

                                echo '<div>';
                                echo '<label class="form-label for="imie">numer</label>';
                                echo '<input type="text" id="numer" class="form-control" name="numer" value="' . $numer . '">';
                                echo '</div>';

                                ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <?php
                                echo '<div>';
                                echo '<input type="submit" value="dodaj producenta" class="btn btn-primary">';
                                echo '</div>';
                                echo '<input type="hidden" name="tryb" value="dodaj_producenta">';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>