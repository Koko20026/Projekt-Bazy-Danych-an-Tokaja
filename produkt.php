<!DOCTYPE html>
<html lang="pl">

<head>
    <title>sklep z asortymentem narciarskim</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="produkt.css" rel="stylesheet">
    <title>produkty</title>
</head>

<body>
    <?php
    session_start();
    @include "polacz.php";
    $kwerenda = $conn->prepare("SELECT * from produkty");
    if (isset($_GET['id'])) {
        $kwerenda = $conn->prepare('SELECT * FROM produkty WHERE id_produktu = ?');
        $kwerenda->execute([$_GET['id']]);
        $produkt = $kwerenda->fetch(PDO::FETCH_ASSOC);
    }

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $kwerenda2 = $conn->prepare("SELECT id_konta from dane_logowania where email = ? limit 1");
        $kwerenda2->execute([$_SESSION['user']]);
        $user = $kwerenda2->fetch()[0];
        $dodaj = $conn->prepare("INSERT INTO produkty_koszyk (id_produktu, id_uzytkownika) VALUES (?,?)");
        $dodaj->execute([$id, $user]);
        header("koszyk.php");
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="glowna.php">Strona Główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="produkty.php">Strona produktów</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="koszyk.php">Koszyk</a>
                    </li>

                    <?php
                    if (empty($_SESSION['user']) | !isset($_SESSION['user'])) {
                        echo '<a class="nav-link active" aria-current="page" href="logowanie.php">zaloguj</a>';
                    } else {
                        $rola = $conn->prepare('SELECT typ from dane_logowania where email = ?');
                        $rola->execute([$_SESSION['user']]);
                        $typ = $rola->fetch()[0];

                        echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">fajnie że jestes </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="">twoje zamowienia</a></li>';
                        if ($typ) {
                            if ($typ == 'admin') {
                                echo '<li><a class="dropdown-item" href="panel_admina.php">panel administratora</a></li>';
                            }
                        }
                        echo '<li><a class="dropdown-item" href="wyloguj.php">wyloguj</a></li></ul></li>';
                    }

                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <div id="zawartosc">
        <?php
        echo '<div id="slider">';
        echo '<div class="row">';
        echo '<div class="col-xl-12 col-lg-12 col-md-12">';
        echo '<img src="' . $produkt['fotografia'] . '" width="100%" height="100%" alt="' . $produkt['nazwa_produktu'] . '"> </a>';
        echo '<h3 class="h3 text-uppercase" style="text-align: left;">' . $produkt['nazwa_produktu'] . '</h3>';
        echo '<hr>';
        echo '<h5 style="text-align: left;">' . $produkt['kategoria'] . '</h>';
        echo '<h5><strong>' . $produkt['cena_brutto'] . 'zł</strong></h5>';
        echo ' <p style="font-size:110%; text-align: justify;">' . $produkt['opis'] . '</p>';
        echo '<form method="post" action="produkt.php">';
        echo '<input type="hidden" name="id" value="' . $produkt['id_produktu'] . '">';
        echo '<input type="submit" value="dodaj do koszyka">';
        echo '</form>';
        ?>

    </div>
    
    <footer class="justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <span class="text-muted">© 2021 Makosz Company, Inc</span>
        </div>
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-muted" href="#">
                    <p>Regulamin<p>
                </a></li>
            <li class="ms-3"><a class="text-muted" href="#">
                    <p>Polityka<prywatności</p>
                </a></li>
        </ul>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
