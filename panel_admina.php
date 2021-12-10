<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>panel administratora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="panel_admina.css">
</head>

<body>
    <?php
    @include "polacz.php";
    $id_kategoria = null;
    $id_producenta = null;
    $id_produkt = null;
    $id_pracownika = null;
    $dodaj_produkt = false;
    $usun_produkt = false;
    $edytuj_produkt = false;
    $edycja_produkt = false;
    $nazwa_produktu = null;
    $opis = null;
    $cena_netto = null;
    $cena_brutto = null;
    $fotografia = null;
    $id_producent = null;
    $kategorie = null;
    $kategoria = null;
    $nazwa = null;
    $miasto = null;
    $ulica = null;
    $numer = null;
    $imie = null;
    $nazwisko = null;
    $telefon = null;
    $dodaj_kategoria = false;
    $edytuj_kategoria = false;
    $usun_kategoria = false;
    $edycja_kategoria = false;
    $dodaj_producenta = false;
    $edycja_producenta = false;
    $edytuj_producenta = false;
    $usun_producenta = false;
    $dodaj_pracownika = false;
    $edycja_pracownika = false;
    $edytuj_pracownika = false;
    $usun_pracownika = false;



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

    if (isset($_POST['tryb']) && $_POST['tryb'] == 'usun_kategoria') {
        $usun_kategoria = true;
        $id_kategoria = $_POST['id_kategoria'];
    } elseif (isset($_POST['tryb']) && $_POST['tryb'] == 'dodaj_kategoria') {
        $dodaj_kategoria = true;

        $kategoria = $_POST['kategoria'];
    } elseif (isset($_POST['tryb']) && $_POST['tryb'] == 'edycja_kategoria') {
        $edycja_kategoria = true;


        $e_kategoria = $_POST['kategoria'];
        $e_id_kategoria = $_POST['id_kategoria'];
    } elseif (isset($_POST['tryb']) && $_POST['tryb'] == 'edytuj_kategoria') {
        $edytuj_kategoria = true;


        $kategoria = $_POST['kategoria'];
        $id_kategoria = $_POST['id_kategoria'];
    }


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

    if (isset($_POST['tryb']) && $_POST['tryb'] == 'usun_pracownika') {
        $usun_pracownika = true;
        $id_pracownika = $_POST['id_pracownika'];
    } elseif (isset($_POST['tryb']) && $_POST['tryb'] == 'dodaj_pracownika') {
        $dodaj_pracownika = true;

        $imie = $_POST['imie_pracownika'];
        $nazwisko = $_POST['nazwisko_pracownika'];
        $telefon = $_POST['telefon_pracownika'];
    } elseif (isset($_POST['tryb']) && $_POST['tryb'] == 'edycja_pracownika') {
        $edycja_pracownika = true;

        $e_imie = $_POST['imie_pracownika'];
        $e_nazwisko = $_POST['nazwisko_pracownika'];
        $e_telefon = $_POST['telefon_pracownika'];
        $e_id_pracownika = $_POST['id_pracownika'];
    } elseif (isset($_POST['tryb']) && $_POST['tryb'] == 'edytuj_pracownika') {
        $edytuj_pracownika = true;

        $imie = $_POST['imie_pracownika'];
        $nazwisko = $_POST['nazwisko_pracownika'];
        $telefon = $_POST['telefon_pracownika'];
        $id_pracownika = $_POST['id_pracownika'];
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

    if ($dodaj_kategoria) {
        $kwerenda_kategoria = $conn->prepare("INSERT INTO kategorie(kategoria) VALUES(?)");
        $kwerenda_kategoria->execute([$kategoria]);
    }

    if ($edytuj_kategoria) {
        $kwerenda_kategoria = $conn->prepare("UPDATE kategorie SET kategoria=? WHERE id_kategoria=?");
        $kwerenda_kategoria->execute([$kategoria, $id_kategoria]);
    }
    if ($usun_kategoria) {
        $kwerenda_kategoria = $conn->prepare("DELETE FROM kategorie WHERE id_kategoria ='" . $id_kategoria . "'");
        $kwerenda_kategoria->execute();
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

    if ($dodaj_pracownika) {
        $kwerenda_pracownika = $conn->prepare("INSERT INTO pracownicy(imie, nazwisko, telefon) VALUES(?,?,?)");
        $kwerenda_pracownika->execute([$imie, $nazwisko, $telefon]);
    }
    if ($edytuj_producenta) {
        $kwerenda_pracownika = $conn->prepare("UPDATE pracownicy SET imie=?, nazwisko=?, telefon=? WHERE id_pracownik=?");
        $kwerenda_pracownika->execute([$imie, $nazwisko, $telefon, $id_pracownika]);
    }
    if ($usun_producenta) {
        $kwerenda_pracownika = $conn->prepare("DELETE FROM producenci WHERE id_pracownik ='" . $id_pracownika . "'");
        $kwerenda_pracownika->execute();
    }

    $produkty = $conn->query("SELECT * From produkty");
    $kategoria1 = $conn->query("SELECT * From kategorie");
    $pracownik = $conn->query("SELECT * from pracownicy");
    $producenci = $conn->query("SELECT * from producenci");
    ?>

    <div class="container">
        <div class="row">
            <div class="kolumna col-xl-4 col-lg-12 col-md-12">
                <p> produkty</p> <br>
                <p> kategorie</p> <br>
                <p> producenci</p> <br>
                <p> pracownicy</p> <br>

            </div>
            <div class="formularz col-xl-8 col-lg-12 col-md-12">
                <div class="produkty">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dodaj_produkty">
                        dodaj produkt
                    </button>
                    <?php
                    echo '<table>';
                    echo '<tr><th> id produktu </th><th>id producenta</th><th>nazwa produktu</th><th>opis</th><th>cena netto</th><th>cena_brutto</th><th>kategoria</th></tr>';
                    foreach ($produkty->fetchAll() as $row) {
                        echo '<tr><td>' . $row["id_produktu"] . '</td>';
                        echo '<td>' . $row["id_producenci"] . '</td>';
                        echo '<td>' . $row["nazwa_produktu"] . '</td>';
                        echo '<td>' . $row["opis"] . '</td>';
                        echo '<td>' . $row["cena_netto"] . '</td>';
                        echo '<td>' . $row["cena_brutto"] . '</td>';
                        echo '<td>' . $row["kategorie"] . '</td>';
                        echo '<td><form action="panel_admina.php" method="post"><td>
                    <input type="hidden" name="id_producenci" value="' . $row['id_producenci'] . '">
                    <input type="hidden" name="nazwa_produktu" value="' . $row['nazwa_produktu'] . '">
                    <input type="hidden" name="opis" value="' . $row['opis'] . '">
                    <input type="hidden" name="fotografia" value="' . $row['fotografia'] . '">
                    <input type="hidden" name="cena_netto" value="' . $row['cena_netto'] . '">
                    <input type="hidden" name="cena_brutto" value="' . $row['cena_brutto'] . '">
                    <input type="hidden" name="kat" value="' . $row['kategorie'] . '">
                    <input class="btn btn-primary" value="edytuj" type="submit"></td><td>
                    <input type="hidden" name="tryb" value="edycja_produkt">
                    <input type="hidden" name="id_produktu" value="' . $row['id_produktu'] . '"></form>
                    <form action="panel_admina.php" method="post"><input class="btn btn-primary" type="submit" value="usun"> 
                    <input type="hidden" name="id_produktu" value="' . $row['id_produktu'] . '">
                    <input type="hidden" name="tryb" value="usun_produkt"></form></td></tr>';
                    }
                    echo '</table>';

                    if ($edycja_produkt) {
                        echo '<form action="panel_admina.php" method="post">';

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

                                    echo '<form class="card card-body p-2 gap-1" action="panel_admina.php" method="post">';
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

                <div class="kategorie">
                    <p>kategorie</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dodaj_kategorie">
                        dodaj kategorie
                    </button>
                    <?php
                    echo '<table>';
                    echo '<tr><th>id kategori</th><th>kategoria</th></tr>';
                    foreach ($kategoria1->fetchAll() as $row) {
                        echo '<tr><td>' . $row["id_kategoria"] . '</td>';
                        echo '<td>' . $row["kategoria"] . '</td>';
                        echo '<td><form action="panel_admina.php" method="post"><td>
                    <input type="hidden" name="kategoria" value="' . $row['kategoria'] . '">
                    <input class="btn btn-primary" value="edytuj" type="submit"></td><td>
                    <input type="hidden" name="tryb" value="edycja_kategoria">
                    <input type="hidden" name="id_kategoria" value="' . $row['id_kategoria'] . '"></form>
                    <form action="panel_admina.php" method="post"><input class="btn btn-primary" type="submit" value="usun"> 
                    <input type="hidden" name="id_kategoria" value="' . $row['id_kategoria'] . '">
                    <input type="hidden" name="tryb" value="usun_kategoria"></form></td></tr>';
                    }
                    echo '</table>';

                    if ($edycja_kategoria) {
                        echo '<form action="panel_admina.php" method="post">';

                        echo '<div>';
                        echo '<label class="form-label for="imie">kategoria</label>';
                        echo '<input type="text" id="kategoria" class="form-control" name="kategoria" value="' . $e_kategoria . '">';
                        echo '</div>';

                        echo '<input type="submit" value="edytuj" class="btn btn-primary">';

                        echo '</div>';
                        echo '<input type="hidden" name="tryb" value="edytuj_kategoria">';
                        echo '<input type="hidden" name="id_kategoria" value="' . $e_id_kategoria . '">';
                        echo '</form>';
                    }
                    ?>


                    <div class="modal fade" id="dodaj_kategorie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">dodawanie kategori</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    echo '<form class="card card-body p-2 gap-1" action="panel_admina.php" method="post">';
                                    echo '<span class="fs-5 fw-bold">Dodawanie</span>';

                                    echo '<div>';
                                    echo '<label class="form-label for="imie">kategoria</label>';
                                    echo '<input type="text" id="kategoria" class="form-control" name="kategoria" value="' . $kategoria . '">';
                                    echo '</div>';

                                    ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <?php
                                    echo '<div>';
                                    echo '<input type="submit" value="dodaj kategorie" class="btn btn-primary">';
                                    echo '</div>';
                                    echo '<input type="hidden" name="tryb" value="dodaj_kategoria">';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>

                <div class="producenci">
                    <p>producenci</p>
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
                        echo '<td><form action="panel_admina.php" method="post"><td>
                        <input type="hidden" name="nazwa" value="' . $row['nazwa'] . '">
                        <input type="hidden" name="miasto" value="' . $row['miasto'] . '">
                        <input type="hidden" name="ulica" value="' . $row['ulica'] . '">
                        <input type="hidden" name="numer" value="' . $row['numer'] . '">
                        <input class="btn btn-primary" value="edytuj" type="submit">
                        <input type="hidden" name="tryb" value="edycja_producenta"></td><td>
                        <input type="hidden" name="id_producenta" value="' . $row['id_producenci'] . '"></form>
                        <form action="panel_admina.php" method="post"><input class="btn btn-primary" type="submit" value="usun"> 
                        <input type="hidden" name="id_producenta" value="' . $row['id_producenci'] . '">
                        <input type="hidden" name="tryb" value="usun_producenta"></form></td></tr>';
                    }
                    echo '</table>';

                    if ($edycja_producenta) {
                        echo '<form action="panel_admina.php" method="post">';

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
                                    echo '<form class="card card-body p-2 gap-1" action="panel_admina.php" method="post">';
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
                <div class="pracownik">
                    <p>pracownicy</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dodaj_pracownika">
                        dodaj pracownika
                    </button>
                    <?php
                    echo '<table>';
                    echo '<tr><th> id pracownika </th><th>imie</th><th>nazwisko</th><th>numer telefonu</th></tr>';
                    foreach ($pracownik->fetchAll() as $row) {

                        echo '<tr><td>' . $row["id_pracownik"] . '</td>';
                        echo '<td>' . $row["imie"] . '</td>';
                        echo '<td>' . $row["nazwisko"] . '</td>';
                        echo '<td>' . $row["telefon"] . '</td>';
                        echo '<td><form action="panel_admina.php" method="post"><td>
                        <input type="hidden" name="imie_pracownika" value="' . $row['imie'] . '">
                        <input type="hidden" name="nazwisko_pracownika" value="' . $row['nazwisko'] . '">
                        <input type="hidden" name="telefon_pracownika" value="' . $row['telefon'] . '">
                        <input class="btn btn-primary" value="edytuj" type="submit">
                        <input type="hidden" name="tryb" value="edycja_pracownika"></td><td>
                        <input type="hidden" name="id_pracownika" value="' . $row['id_pracownik'] . '"></form>
                        <form action="panel_admina.php" method="post"><input class="btn btn-primary" type="submit" value="usun"> 
                        <input type="hidden" name="id_pracownika" value="' . $row['id_pracownik'] . '">
                        <input type="hidden" name="tryb" value="usun_pracownika"></form></td></tr>';
                    }
                    echo '</table>';

                    if ($edycja_pracownika) {
                        echo '<form action="panel_admina.php" method="post">';

                        echo '<div>';
                        echo '<label class="form-label for="imie">imie  </label>';
                        echo '<input type="text" id="imie_pracownika" class="form-control" name="imie_pracownika" value="' . $e_imie . '">';
                        echo '</div>';

                        echo '<div>';
                        echo '<label class="form-label for="imie">nazwisko</label>';
                        echo '<input type="text" id="nazwisko_pracownika" class="form-control" name="nazwisko_pracownika" value="' . $e_nazwisko . '">';
                        echo '</div>';

                        echo '<div>';
                        echo '<label class="form-label for="imie">telefon</label>';
                        echo '<input type="text" id="telefon_pracownika" class="form-control" name="ulica" value="' . $e_telefon . '">';
                        echo '</div>';


                        echo '<input type="submit" value="edytuj" class="btn btn-primary">';

                        echo '</div>';
                        echo '<input type="hidden" name="tryb" value="edytuj_pracownika">';
                        echo '<input type="hidden" name="id_pracownika" value="' . $e_id_pracownika . '">';
                        echo '</form>';
                    }

                    ?>
                    <div class="modal fade" id="dodaj_pracownika" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">dodawanie producenta</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    echo '<form class="card card-body p-2 gap-1" action="panel_admina.php" method="post">';
                                    echo '<span class="fs-5 fw-bold">Dodawanie</span>';

                                    echo '<div>';
                        echo '<label class="form-label for="imie">imie  </label>';
                        echo '<input type="text" id="imie_pracownika" class="form-control" name="imie_pracownika" value="' . $imie . '">';
                        echo '</div>';

                        echo '<div>';
                        echo '<label class="form-label for="imie">nazwisko</label>';
                        echo '<input type="text" id="nazwisko_pracownika" class="form-control" name="nazwisko_pracownika" value="' . $nazwisko . '">';
                        echo '</div>';

                        echo '<div>';
                        echo '<label class="form-label for="imie">telefon</label>';
                        echo '<input type="text" id="telefon_pracownika" class="form-control" name="telefon_pracownika" value="' . $telefon . '">';
                        echo '</div>';

                                    ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <?php
                                    echo '<div>';
                                    echo '<input type="submit" value="dodaj pracownika" class="btn btn-primary">';
                                    echo '</div>';
                                    echo '<input type="hidden" name="tryb" value="dodaj_pracownika">';
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
