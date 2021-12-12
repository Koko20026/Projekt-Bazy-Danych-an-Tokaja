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
    $id_pracownika = null;
    $imie = null;
    $nazwisko = null;
    $telefon = null;
    $dodaj_pracownika = false;
    $edycja_pracownika = false;
    $edytuj_pracownika = false;
    $usun_pracownika = false;


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


    if ($dodaj_pracownika) {
        $kwerenda_pracownika = $conn->prepare("INSERT INTO pracownicy(imie, nazwisko, telefon) VALUES(?,?,?)");
        $kwerenda_pracownika->execute([$imie, $nazwisko, $telefon]);
    }
    if ($edytuj_pracownika) {
        $kwerenda_pracownika = $conn->prepare("UPDATE pracownicy SET imie=?, nazwisko=?, telefon=? WHERE id_pracownik=?");
        $kwerenda_pracownika->execute([$imie, $nazwisko, $telefon, $id_pracownika]);
    }
    if ($usun_pracownika) {
        $kwerenda_pracownika = $conn->prepare("DELETE FROM pracownicy WHERE id_pracownik ='" . $id_pracownika . "'");
        $kwerenda_pracownika->execute();
    }


    $pracownik = $conn->query("SELECT * from pracownicy");
    ?>


    <div class="container">
        <div class="row">
            <div class="kategorie col-xl-12 col-lg-12 col-md-12">
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
                    echo '<td><form action="panel_admina_pracownicy.php" method="post"><td>
                        <input type="hidden" name="imie_pracownika" value="' . $row['imie'] . '">
                        <input type="hidden" name="nazwisko_pracownika" value="' . $row['nazwisko'] . '">
                        <input type="hidden" name="telefon_pracownika" value="' . $row['telefon'] . '">
                        <input class="btn btn-primary" value="edytuj" type="submit">
                        <input type="hidden" name="tryb" value="edycja_pracownika"></td><td>
                        <input type="hidden" name="id_pracownika" value="' . $row['id_pracownik'] . '"></form>
                        <form action="panel_admina_pracownicy.php" method="post"><input class="btn btn-primary" type="submit" value="usun"> 
                        <input type="hidden" name="id_pracownika" value="' . $row['id_pracownik'] . '">
                        <input type="hidden" name="tryb" value="usun_pracownika"></form></td></tr>';
                }
                echo '</table>';

                if ($edycja_pracownika) {
                    echo '<form action="panel_admina_pracownicy.php" method="post">';

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
                    echo '<input type="text" id="telefon_pracownika" class="form-control" name="telefon_pracownika" value="' . $e_telefon . '">';
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
                                echo '<form class="card card-body p-2 gap-1" action="panel_admina_pracownicy.php" method="post">';
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