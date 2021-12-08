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
    $id_produkt = null;
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


    if (isset($_POST['tryb']) && $_POST['tryb'] == 'usun') {
        $usun_produkt = true;
        $id_produkt = $_POST['id_produktu'];
    } elseif (isset($_POST['tryb']) && $_POST['tryb'] == 'dodaj') {
        $dodaj_produkt = true;


        $nazwa_produktu = $_POST['nazwa_produktu'];
        $opis = $_POST['opis'];
        $cena_brutto = $_POST['cena_brutto'];
        $cena_netto = $_POST['cena_netto'];
        $fotografia = $_POST['fotografia'];
        $kategorie = $_POST['kategoria'];
        $id_producent = $_POST['id_producenci'];
       /*if (!$numer) {
            $dodaj = false;
            echo '<div class="alert alert-danger" role="alert">Blad przy dodawaniu: nie poprawny/pusta numer!</div>';
        }
        if (!$ulica) {
            $dodaj = false;
            echo '<div class="alert alert-danger" role="alert">Blad przy dodawaniu: nie poprawna/pusty ulica!</div>';
        }
        if (!$nazwisko) {
            $dodaj = false;
            echo '<div class="alert alert-danger" role="alert">Blad przy dodawaniu: nie poprawne/puste nazwisko !</div>';
        }
        if (!$imie) {
            $dodaj = false;
            echo '<div class="alert alert-danger" role="alert">Blad przy dodawaniu: nie poprawne/puste imie !</div>';
        }
        if (!$miasto) {
            $dodaj = false;
            echo '<div class="alert alert-danger" role="alert">Blad przy dodawaniu: nie poprawne/puste miasto!</div>';
        }
        if (!$pesel) {
            $dodaj = false;
            echo '<div class="alert alert-danger" role="alert">Blad przy dodawaniu: nie poprawny/pusty pesel!</div>';
        }*/
    }elseif (isset($_POST['tryb']) && $_POST['tryb'] == 'edycja') {
        $edycja_produkt = true;

        $e_nazwa_produktu = $_POST['nazwa_produktu'];
        $e_opis = $_POST['opis'];
        $e_cena_brutto = $_POST['cena_brutto'];
        $e_cena_netto = $_POST['cena_netto'];
        $e_fotografia = $_POST['fotografia'];
        $e_kategorie = $_POST['kategoria'];
        $e_id_producent = $_POST['id_producenci'];
        $e_id_produkt = $_POST['id_produktu'];
    } elseif (isset($_POST['tryb']) && $_POST['tryb'] == 'edytuj') {
        $edytuj_produkt = true;

        $nazwa_produktu = $_POST['nazwa_produktu'];
        $opis = $_POST['opis'];
        $cena_brutto = $_POST['cena_brutto'];
        $cena_netto = $_POST['cena_netto'];
        $fotografia = $_POST['fotografia'];
        $kategorie = $_POST['kategoria'];
        $id_producent = $_POST['id_producenci'];
        $id_produkt = $_POST['id_produktu'];

        // if (!$ulica) {
        //     $edytuj = false;
        //     echo '<div class="alert alert-danger" role="alert">Blad przy edycji: nie poprawan/pusta ulica!</div>';
        // }
        // if (!$numer) {
        //     $edytuj = false;
        //     echo '<div class="alert alert-danger" role="alert">Blad przy edycji: nie poprawny/pusty numer!</div>';
        // }
        // if (!$miasto) {
        //     $edytuj = false;
        //     echo '<div class="alert alert-danger" role="alert">Blad przy edycji: nie poprawne/puste miasto!</div>';
        // }
        // if (!$pesel) {
        //     $edytuj = false;
        //     echo '<div class="alert alert-danger" role="alert">Blad przy edycji: nie poprawny/pusty pesel!</div>';
        // }
        // if (!$nazwisko) {
        //     $edytuj = false;
        //     echo '<div class="alert alert-danger" role="alert">Blad przy edycji: nie poprawne/puste nazwisko!</div>';
        // }
        // if (!$imie) {
        //     $edytuj = false;
        //     echo '<div class="alert alert-danger" role="alert">Blad przy edycji: nie poprawne/puste imie!</div>';
    }
    

    if ($dodaj_produkt) {
        $kwerenda_produkty = $conn->prepare("INSERT INTO produkty(id_producenci, nazwa_produktu, opis, fotografia, cena_netto, cena_brutto, kategoria) VALUES(?,?,?,?,?,?,?)");
        $kwerenda_produkty->execute([$id_producent, $nazwa_produktu, $opis, $fotografia, $cena_netto, $cena_brutto, $kategorie]);
    }

    if ($edytuj_produkt) {
        $kwerenda_produkty = $conn->prepare("UPDATE produkty SET id_producenci=?, nazwa_produktu=?, opis=?, fotografia=?, cena_netto=?, cena_brutto=?, kategoria=? WHERE id_produktu=?");
        $kwerenda_produkty->execute([$id_producent, $nazwa_produktu, $opis, $fotografia, $cena_netto, $cena_brutto, $kategorie, $id_produkt]);
    }
    if ($usun_produkt) {
        $kwerenda_produkty = $conn->prepare("DELETE FROM produkty WHERE id_produktu ='" . $id_produkt . "'");
        $kwerenda_produkty->execute();
    }

    // echo '<form class="card card-body p-2 gap-1" action="panel_admina.php" method="post">';
    //     echo '<span class="fs-5 fw-bold">Dodawanie</span>';

    //     echo '<div>';
    //     echo '<label class="form-label for="imie">id_producenta </label>';
    //     echo '<input type="text" id="imie" class="form-control" name="id_producenci" value="' . $id_producent . '">';
    //     echo '</div>';

    //     echo '<div>';
    //     echo '<label class="form-label for="imie">Nazwa Produktu </label>';
    //     echo '<input type="text" id="nazw" class="form-control" name="nazwa_produktu" value="' . $nazwa_produktu . '">';
    //     echo '</div>';

    //     echo '<div>';
    //     echo '<label class="form-label for="imie">opis</label>';
    //     echo '<input type="text" id="numer" class="form-control" name="opis" value="' . $opis . '">';
    //     echo '</div>';

    //     echo '<div>';
    //     echo '<label class="form-label for="imie">fotografia</label>';
    //     echo '<input type="text" id="ulica" class="form-control" name="fotografia" value="' . $fotografia . '">';
    //     echo '</div>';

    //     echo '<div>';
    //     echo '<label class="form-label for="imie">cena netto</label>';
    //     echo '<input type="text" id="miasto" class="form-control" name="cena_netto" value="' . $cena_netto . '">';
    //     echo '</div>';

    //     echo '<div>';
    //     echo '<label class="form-label for="imie">cena brutto</label>';
    //     echo '<input type="text" id="pesel" class="form-control" name="cena_brutto" value="' . $cena_brutto . '">';
    //     echo '</div>';

    //     echo '<div>';
    //     echo '<label class="form-label for="imie">kategoria</label>';
    //     echo '<input type="text" id="pesel" class="form-control" name="kategoria" value="' . $kategorie . '">';
    //     echo '</div>';

    //     echo '<div>';
    //     echo '<input type="submit" value="dodaj" class="btn btn-primary">';
    //     echo '</div>';
    //     echo '<input type="hidden" name="tryb" value="dodaj">';

    $produkty = $conn->query("SELECT * From produkty");
    $kategoria = $conn->query("SELECT * From kategorie");
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
                    echo '<td>' . $row["kategoria"] . '</td>';
                    echo '<td><form action="panel_admina.php" method="post"><td>
                    <input type="hidden" name="id_producenci" value="' . $row['id_producenci'] . '">
                    <input type="hidden" name="nazwa_produktu" value="' . $row['nazwa_produktu'] . '">
                    <input type="hidden" name="opis" value="' . $row['opis'] . '">
                    <input type="hidden" name="fotografia" value="' . $row['fotografia'] . '">
                    <input type="hidden" name="cena_netto" value="' . $row['cena_netto'] . '">
                    <input type="hidden" name="cena_brutto" value="' . $row['cena_brutto'] . '">
                    <input type="hidden" name="kategoria" value="' . $row['kategoria'] . '">
                    <input class="btn btn-primary" value="edytuj" type="submit">
                    <input type="hidden" name="tryb" value="edycja">
                    <input type="hidden" name="id_produktu" value="' . $row['id_produktu'] . '"></form>
                    <form action="panel_admina.php" method="post"><input type="submit" value="usun"> 
                    <input type="hidden" name="id_produktu" value="' . $row['id_produktu'] . '">
                    <input type="hidden" name="tryb" value="usun"></form></</td></tr>';
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
                    echo '<input type="text" id="kategoria" class="form-control" name="kategoria" value="' . $e_kategorie . '">';
                    echo '</div>';
        
                    echo '<input type="submit" value="edytuj" class="btn btn-primary">';
        
                    echo '</div>';
                    echo '<input type="hidden" name="tryb" value="edytuj">';
                    echo '<input type="hidden" name="id_produktu" value="' . $e_id_produkt . '">';
                    echo '</form>';
                }

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
                echo '<input type="text" id="kategoria" class="form-control" name="kategoria" value="' . $kategorie . '">';
                echo '</div>';

                echo '<div>';
                echo '<input type="submit" value="dodaj" class="btn btn-primary">';
                echo '</div>';
                echo '<input type="hidden" name="tryb" value="dodaj">';
                ?>
                

       
                <p>kategorie</p>
                <?php
                echo '<table>';
                echo '<tr><th>kategoria</th><th>id id kategorii</th></tr>';
                foreach ($kategoria->fetchAll() as $row) {
                    echo '<tr><td>' . $row["kategoria"] . '</td>';
                    echo '<td>' . $row["id_kategoria"] . '</td><tr>';
                }
                echo '</table>';
                ?>
                <p>producenci</p>
                <?php
                echo '<table>';
                echo '<tr><th> id producenta </th><th>nazwa</th><th>miasto</th><th>ulica</th><th>numer</th></tr>';
                foreach ($producenci->fetchAll() as $row) {

                    echo '<tr><td>' . $row["id_producenci"] . '</td>';
                    echo '<td>' . $row["nazwa"] . '</td>';
                    echo '<td>' . $row["miasto"] . '</td>';
                    echo '<td>' . $row["ulica"] . '</td>';
                    echo '<td>' . $row["numer"] . '</td></tr>';
                }
                echo '</table>';

                ?>
                <p>pracownicy</p>
                <?php
                echo '<table>';
                echo '<tr><th> id pracownika </th><th>imie</th><th>nazwisko</th><th>numer telefonu</th></tr>';
                foreach ($pracownik->fetchAll() as $row) {

                    echo '<tr><td>' . $row["id_pracownik"] . '</td>';
                    echo '<td>' . $row["imie"] . '</td>';
                    echo '<td>' . $row["nazwisko"] . '</td>';
                    echo '<td>' . $row["telefon"] . '</td></tr>';
                }
                echo '</table>';

                ?>
            </div>
        </div>
    </div>
</body>

</html>
