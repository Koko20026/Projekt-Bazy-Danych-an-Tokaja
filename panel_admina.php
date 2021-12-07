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
    $produkty = $conn->query("SELECT * From produkty");
    $kategorie = $conn->query("SELECT * From kategorie");
    $pracownik = $conn->query("SELECT * from pracownicy");
    $producenci = $conn->query("SELECT * from producenci");
    ?>

    <div class="container">
        <div class="row">
            <div class="kolumna col-xl-4 col-lg-12 col-md-12">
            <?php
                foreach($kategorie->fetchAll() as $row){
                    echo '<tr><td>'.$row["kategoria"].'</td></tr>';
                }
                ?>
            </div>
            <div class="formularz col-xl-8 col-lg-12 col-md-12">
                <table>
                <?php
                foreach($produkty->fetchAll() as $row){
                    echo '<tr><td>'.$row["nazwa_produktu"].'</td>';
                    echo '<td>'.$row["opis"].'</td>';
                    echo '<td>'.$row["cena_netto"].'</td>';
                    echo '<td>'.$row["cena_brutto"].'</td>';
                    echo '<td>'.$row["kategoria"].'</td></tr>';

                }
                ?>
                </tabvle>
            </div>
        </div>
    </div>
</body>

</html>