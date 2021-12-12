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
    $dodaj_produkt = false;
    $usun_produkt = false;
    $edytuj_produkt = false;
    $edycja_produkt = false;
    $id_produkt = null;
    $nazwa_produktu = null;
    $opis = null;
    $cena_netto = null;
    $cena_brutto = null;
    $fotografia = null;
    $id_producent = null;
    $kategorie = null;


    if (isset($_POST['tryb']) && $_POST['tryb'] == 'usun_produkt') {
        $usun_produkt = true;
        $id_produkt = $_POST['id_produktu'];
    } elseif (isset($_POST['tryb']) && $_POST['tryb'] == 'dodaj_produkt') {
        $dodaj_produkt = true;


        $id_producent = $_POST['id_producenci'];
        $nazwa_produktu = $_POST['nazwa_produktu'];
        $opis = $_POST['opis'];
        $cena_brutto = $_POST['cena_brutto'];
        $cena_netto = $_POST['cena_netto'];
        $fotografia = $_POST['fotografia'];
        $kategorie = $_POST['kat'];
    } elseif (isset($_POST['tryb']) && $_POST['tryb'] == 'edycja_produkt') {
        $edycja_produkt = true;

        $e_nazwa_produktu = $_POST['nazwa_produktu'];
        $e_opis = $_POST['opis'];
        $e_cena_brutto = $_POST['cena_brutto'];
        $e_cena_netto = $_POST['cena_netto'];
        $e_fotografia = $_POST['fotografia'];
        $e_kategorie = $_POST['kat'];
        $e_id_producent = $_POST['id_producenci'];
        $e_id_produkt = $_POST['id_produktu'];
    } elseif (isset($_POST['tryb']) && $_POST['tryb'] == 'edytuj_produkt') {
        $edytuj_produkt = true;

        $nazwa_produktu = $_POST['nazwa_produktu'];
        $opis = $_POST['opis'];
        $cena_brutto = $_POST['cena_brutto'];
        $cena_netto = $_POST['cena_netto'];
        $fotografia = $_POST['fotografia'];
        $kategorie = $_POST['kat'];
        $id_producent = $_POST['id_producenci'];
        $id_produkt = $_POST['id_produktu'];
    }


    if ($dodaj_produkt) {
        $kwerenda_produkty = $conn->prepare("INSERT INTO produkty(id_producenci, nazwa_produktu, opis, fotografia, cena_netto, cena_brutto, kategorie) VALUES(?,?,?,?,?,?,?)");
        $kwerenda_produkty->execute([$id_producent, $nazwa_produktu, $opis, $fotografia, $cena_netto, $cena_brutto, $kategorie]);
    }

    if ($edytuj_produkt) {
        $kwerenda_produkty = $conn->prepare("UPDATE produkty SET id_producenci=?, nazwa_produktu=?, opis=?, fotografia=?, cena_netto=?, cena_brutto=?, kategorie=? WHERE id_produktu=?");
        $kwerenda_produkty->execute([$id_producent, $nazwa_produktu, $opis, $fotografia, $cena_netto, $cena_brutto, $kategorie, $id_produkt]);
    }
    if ($usun_produkt) {
        $kwerenda_produkty = $conn->prepare("DELETE FROM produkty WHERE id_produktu ='" . $id_produkt . "'");
        $kwerenda_produkty->execute();
    }


    $produkty = $conn->query("SELECT * From produkty");
    ?>


    <div class="container">
        <div class="row">
            <div class="produkty col-xl-12 col-lg-12 col-md-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dodaj_produkty">
                    dodaj produkt
                </button>

                <?php
                echo '<table>';
                echo '<tr><th> id produktu </th><th>id producenta</th><th>nazwa produktu</th><th>opis</th><th>fotografia</th><th>cena netto</th><th>cena_brutto</th><th>kategoria</th></tr>';
                foreach ($produkty->fetchAll() as $row) {
                    echo '<tr><td>' . $row["id_produktu"] . '</td>';
                    echo '<td>' . $row["id_producenci"] . '</td>';
                    echo '<td>' . $row["nazwa_produktu"] . '</td>';
                    echo '<td>' . $row["opis"] . '</td>';
                    echo '<td>' . $row["fotografia"] . '</td>';
                    echo '<td>' . $row["cena_netto"] . '</td>';
                    echo '<td>' . $row["cena_brutto"] . '</td>';
                    echo '<td>' . $row["kategoria"] . '</td>';
                    echo '<td><form action="panel_admina_produkty.php" method="post"><td>
                    <input type="hidden" name="id_producenci" value="' . $row['id_producenci'] . '">
                    <input type="hidden" name="nazwa_produktu" value="' . $row['nazwa_produktu'] . '">
                    <input type="hidden" name="opis" value="' . $row['opis'] . '">
                    <input type="hidden" name="fotografia" value="' . $row['fotografia'] . '">
                    <input type="hidden" name="cena_netto" value="' . $row['cena_netto'] . '">
                    <input type="hidden" name="cena_brutto" value="' . $row['cena_brutto'] . '">
                    <input type="hidden" name="kat" value="' . $row['kategoria'] . '">
                    <input class="btn btn-primary" value="edytuj" type="submit"></td><td>
                    <input type="hidden" name="tryb" value="edycja_produkt">
                    <input type="hidden" name="id_produktu" value="' . $row['id_produktu'] . '"></form>
                    <form action="panel_admina_produkty.php" method="post"><input class="btn btn-primary" type="submit" value="usun"> 
                    <input type="hidden" name="id_produktu" value="' . $row['id_produktu'] . '">
                    <input type="hidden" name="tryb" value="usun_produkt"></form></td></tr>';
                }
                echo '</table>';

                if ($edycja_produkt) {
                    echo '<form action="panel_admina_produkty.php" method="post">';

                    echo '<div>';
                    echo '<label class="form-label for="imie">id_producenta </label>';
                    echo '<input type="text" id="id_producenci" class="form-control" name="id_producenci" value="' . $e_id_producent . '">';
                    echo '</div>';

                    echo '<div>';
                    echo '<label class="form-label for="imie">Nazwa Produktu </label>';
                    echo '<input type="text" id="nazwa_produktu" class="form-control" name="nazwa_produktu" value="' . $e_nazwa_produktu . '">';
                    echo '</div>';

                    echo '<div>';
                    echo '<label class="form-label for="imie">opis</label>';
                    echo '<input type="text" id="opis" class="form-control" name="opis" value="' . $e_opis . '">';
                    echo '</div>';

                    echo '<div>';
                    echo '<label class="form-label for="imie">fotografia</label>';
                    echo '<input type="file" id="fotografia" class="form-control" name="fotografia" value="' . $e_fotografia . '">';
                    echo '</div>';

                    echo '<div>';
                    echo '<label class="form-label for="imie">cena netto</label>';
                    echo '<input type="text" id="cena_netto" class="form-control" name="cena_netto" value="' . $e_cena_netto . '">';
                    echo '</div>';

                    echo '<div>';
                    echo '<label class="form-label for="imie">cena brutto</label>';
                    echo '<input type="text" id="cena_brutto" class="form-control" name="cena_brutto" value="' . $e_cena_brutto . '">';
                    echo '</div>';

                    echo '<div>';
                    echo '<label class="form-label for="imie">kategoria</label>';
                    echo '<input type="text" id="kategoria" class="form-control" name="kat" value="' . $e_kategorie . '">';
                    echo '</div>';

                    echo '<input type="submit" value="edytuj" class="btn btn-primary">';

                    echo '</div>';
                    echo '<input type="hidden" name="tryb" value="edytuj_produkt">';
                    echo '<input type="hidden" name="id_produktu" value="' . $e_id_produkt . '">';
                    echo '</form>';
                }

                ?>
                <div class="modal fade" id="dodaj_produkty" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">dodawanie produktów</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php

                                echo '<form class="card card-body p-2 gap-1" action="panel_admina_produkty.php" method="post">';
                                echo '<span class="fs-5 fw-bold">Dodawanie</span>';

                                echo '<div>';
                                echo '<label class="form-label for="imie">id_producenta </label>';
                                echo '<input type="text" id="id_producenci" class="form-control" name="id_producenci" value="' . $id_producent . '">';
                                echo '</div>';

                                echo '<div>';
                                echo '<label class="form-label for="imie">Nazwa Produktu </label>';
                                echo '<input type="text" id="nazwa_produktu" class="form-control" name="nazwa_produktu" value="' . $nazwa_produktu . '">';
                                echo '</div>';

                                echo '<div>';
                                echo '<label class="form-label for="imie">opis</label>';
                                echo '<input type="text" id="opis" class="form-control" name="opis" value="' . $opis . '">';
                                echo '</div>';

                                echo '<div>';
                                echo '<label class="form-label for="imie">fotografia</label>';
                                echo '<input type="file" id="fotografia" class="form-control" name="fotografia" value="' . $fotografia . '">';
                                echo '</div>';

                                echo '<div>';
                                echo '<label class="form-label for="imie">cena netto</label>';
                                echo '<input type="text" id="cena_netto" class="form-control" name="cena_netto" value="' . $cena_netto . '">';
                                echo '</div>';

                                echo '<div>';
                                echo '<label class="form-label for="imie">cena brutto</label>';
                                echo '<input type="text" id="cena_brutto" class="form-control" name="cena_brutto" value="' . $cena_brutto . '">';
                                echo '</div>';

                                echo '<div>';
                                echo '<label class="form-label for="imie">kategoria</label>';
                                echo '<input type="text" id="kategorie" class="form-control" name="kat" value="' . $kategorie . '">';
                                echo '</div>';
                                ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <?php
                                echo '<div>';
                                echo '<input type="submit" value="dodaj produkt" class="btn btn-primary">';
                                echo '</div>';
                                echo '<input type="hidden" name="tryb" value="dodaj_produkt">';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="btn btn-primary" href="panel_admina.php" role="button">wróć</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>