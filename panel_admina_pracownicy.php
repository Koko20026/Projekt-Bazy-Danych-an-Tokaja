<!DOCTYPE html>
<html lang="pl">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
    @include "polacz.php";
    $id_konta = null;
    $email = null;
    $haslo = null;
    $typ = null;
    $imie = null;
    $nazwisko = null;
    $telefon = null;
    $dodaj_uzytkownika = false;
    $edycja_uzytkownika = false;
    $edytuj_uzytkownika = false;
    $usun_uzytkownika = false;


    if (isset($_POST['tryb']) && $_POST['tryb'] == 'usun_uzytkownika') {
        $usun_uzytkownika = true;
        $id_konta = $_POST['id_konta'];
    } elseif (isset($_POST['tryb']) && $_POST['tryb'] == 'dodaj_uzytkownika') {
        $dodaj_uzytkownika = true;

        $email = $_POST['email'];
        $haslo = $_POST['haslo'];
        $typ = $_POST['typ'];
        $imie = $_POST['imie_pracownika'];
        $nazwisko = $_POST['nazwisko_pracownika'];
        $telefon = $_POST['telefon_pracownika'];
    } elseif (isset($_POST['tryb']) && $_POST['tryb'] == 'edycja_uzytkownika') {
        $edycja_uzytkownika = true;

        $e_email = $_POST['email'];
        $e_haslo = $_POST['haslo'];
        $e_typ = $_POST['typ'];
        $e_imie = $_POST['imie_pracownika'];
        $e_nazwisko = $_POST['nazwisko_pracownika'];
        $e_telefon = $_POST['telefon_pracownika'];
        $e_id_konta = $_POST['id_konta'];
    } elseif (isset($_POST['tryb']) && $_POST['tryb'] == 'edytuj_uzytkownika') {
        $edytuj_uzytkownika = true;

        $email = $_POST['email'];
        $haslo = $_POST['haslo'];
        $typ = $_POST['typ'];
        $imie = $_POST['imie_pracownika'];
        $nazwisko = $_POST['nazwisko_pracownika'];
        $telefon = $_POST['telefon_pracownika'];
        $id_konta = $_POST['id_konta'];
    }


    if ($dodaj_uzytkownika) {
        $kwerenda_uzytkownika = $conn->prepare("INSERT INTO dane_logowania(email, haslo, typ, imie, nazwisko, telefon) VALUES(?,?,?,?,?,?)");
        
        $hashPassword = password_hash($haslo, PASSWORD_BCRYPT);
        $kwerenda_uzytkownika->execute([$email, $hashPassword, $typ, $imie, $nazwisko, $telefon]);
    }
    if ($edytuj_uzytkownika) {
        $kwerenda_uzytkownika = $conn->prepare("UPDATE dane_logowania SET email=?, haslo=?, typ=?, imie=?, nazwisko=?, telefon=? WHERE id_konta=?");
        $kwerenda_uzytkownika->execute([$email, $haslo, $typ, $imie, $nazwisko, $telefon, $id_konta]);
    }
    if ($usun_uzytkownika) {
        $kwerenda_uzytkownika = $conn->prepare("DELETE FROM dane_logowania WHERE id_konta ='" . $id_konta . "'");
        $kwerenda_uzytkownika->execute();
    }


    $pracownik = $conn->query("SELECT * from dane_logowania");
    ?>


    <div class="container">
        <div class="row">
            <div class="kategorie col-xl-12 col-lg-12 col-md-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dodaj_pracownika">
                    dodaj pracownika
                </button>
                <?php
                echo '<table>';
                echo '<tr><th> id </th><th>email</th><th>haslo</th><th>typ</th><th>imie</th><th>nazwisko</th><th>numer telefonu</th></tr>';
                foreach ($pracownik->fetchAll() as $row) {

                    echo '<tr><td>' . $row["id_konta"] . '</td>';
                    echo '<td>' . $row["email"] . '</td>';
                    echo '<td>' . $row["haslo"] . '</td>';
                    echo '<td>' . $row["typ"] . '</td>';
                    echo '<td>' . $row["imie"] . '</td>';
                    echo '<td>' . $row["nazwisko"] . '</td>';
                    echo '<td>' . $row["telefon"] . '</td>';
                    echo '<td><form action="panel_admina_pracownicy.php" method="post"><td>
                    <input type="hidden" name="email" value="' . $row['email'] . '">
                    <input type="hidden" name="haslo" value="' . $row['haslo'] . '">
                    <input type="hidden" name="typ" value="' . $row['typ'] . '">
                    <input type="hidden" name="imie_pracownika" value="' . $row['imie'] . '">
                    <input type="hidden" name="nazwisko_pracownika" value="' . $row['nazwisko'] . '">
                    <input type="hidden" name="telefon_pracownika" value="' . $row['telefon'] . '">
                    <input class="btn btn-primary" value="edytuj" type="submit">
                    <input type="hidden" name="tryb" value="edycja_uzytkownika"></td><td>
                    <input type="hidden" name="id_konta" value="' . $row['id_konta'] . '"></form>
                    <form action="panel_admina_pracownicy.php" method="post"><input class="btn btn-primary" type="submit" value="usun"> 
                    <input type="hidden" name="id_konta" value="' . $row['id_konta'] . '">
                    <input type="hidden" name="tryb" value="usun_uzytkownika"></form></td></tr>';
                }
                echo '</table>';

                if ($edycja_uzytkownika) {
                    echo '<form action="panel_admina_pracownicy.php" method="post">';

                    echo '<div>';
                    echo '<label class="form-label for="imie">email  </label>';
                    echo '<input type="text" id="imie_pracownika" class="form-control" name="email" value="' . $e_email . '">';
                    echo '</div>';

                    echo '<div>';
                    echo '<label class="form-label for="imie">hasło  </label>';
                    echo '<input type="text" id="imie_pracownika" class="form-control" name="haslo" value="' . $e_haslo . '">';
                    echo '</div>';

                    echo '<div>';
                    echo '<label class="form-label for="imie">typ  </label>';
                    echo '<input type="text" id="imie_pracownika" class="form-control" name="typ" value="' . $e_typ . '">';
                    echo '</div>';

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
                    echo '<input type="hidden" name="tryb" value="edytuj_uzytkownika">';
                    echo '<input type="hidden" name="id_konta" value="' . $e_id_konta . '">';
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
                                echo '<label class="form-label for="imie">email  </label>';
                                echo '<input type="email" id="email" class="form-control" name="email" value="' . $email . '">';
                                echo '</div>';

                                echo '<div>';
                                echo '<label class="form-label for="imie">haslo  </label>';
                                echo '<input type="password" id="haslo" class="form-control" name="haslo" value="' . $haslo . '">';
                                echo '</div>';

                                echo '<div>';
                                echo '<label class="form-label for="imie">typ  </label>';
                                echo '<input type="text" id="typ" class="form-control" name="typ" value="' . $typ . '">';
                                echo '</div>';

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
                                echo '<input type="hidden" name="tryb" value="dodaj_uzytkownika">';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="btn btn-primary" href="panel_admina.php" role="button">Link</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>