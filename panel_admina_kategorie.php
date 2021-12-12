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
    $id_kategoria = null;
    $kategoria = null;
    $dodaj_kategoria = false;
    $edytuj_kategoria = false;
    $usun_kategoria = false;
    $edycja_kategoria = false;


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


    $kategoria1 = $conn->query("SELECT * From kategorie");
    ?>


    <div class="container">
        <div class="row">
            <div class="kategorie col-xl-12 col-lg-12 col-md-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dodaj_kategorie">
                    dodaj kategorie
                </button>
                <?php
                echo '<table>';
                echo '<tr><th>id kategori</th><th>kategoria</th></tr>';
                foreach ($kategoria1->fetchAll() as $row) {
                    echo '<tr><td>' . $row["id_kategoria"] . '</td>';
                    echo '<td>' . $row["kategoria"] . '</td>';
                    echo '<td><form action="panel_admina_kategorie.php" method="post"><td>
                    <input type="hidden" name="kategoria" value="' . $row['kategoria'] . '">
                    <input class="btn btn-primary" value="edytuj" type="submit"></td><td>
                    <input type="hidden" name="tryb" value="edycja_kategoria">
                    <input type="hidden" name="id_kategoria" value="' . $row['id_kategoria'] . '"></form>
                    <form action="panel_admina_kategorie.php" method="post"><input class="btn btn-primary" type="submit" value="usun"> 
                    <input type="hidden" name="id_kategoria" value="' . $row['id_kategoria'] . '">
                    <input type="hidden" name="tryb" value="usun_kategoria"></form></td></tr>';
                }
                echo '</table>';

                if ($edycja_kategoria) {
                    echo '<form action="panel_admina_kategorie.php" method="post">';

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
                                echo '<form class="card card-body p-2 gap-1" action="panel_admina_kategorie.php" method="post">';
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
            <a class="btn btn-primary" href="panel_admina.php" role="button">Link</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>