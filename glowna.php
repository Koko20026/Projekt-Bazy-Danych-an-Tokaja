<!DOCTYPE html>
<html lang="pl">

<head>
    <title>sklep z asortymentem narciarskim</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="polacz.php" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="glowna.css" rel="stylesheet" >
</head>

<body>
    <body>
    <?php
    @include "polacz.php";
    $kategorie = $conn->query("SELECT * FROM kategorie");
    $losowane = $conn->query("SELECT * FROM produkty ORDER BY RAND() limit 4");

    ?>
    
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown" >
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="glowna.php"><img src="img\logo.png" alt="Logo" ></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="produkty.php">Strona produktu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="koszyk.php">Koszyk</a>
                    </li>

                </ul>
                <?php
                    if (empty($_SESSION['user']) | !isset($_SESSION['user'])) {
                        echo '<a class="nav-link active" aria-current="page" href="logowanie.php">zaloguj</a>';
                    } else {
                        echo '<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">siema fajnie że jesteś</a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
      <li><a class="dropdown-item" href="#">twoje zamowienia</a></li>
      <li><a class="dropdown-item" href="#">panel admina jak bedzie konto admina</a></li>
      <li><a class="dropdown-item" href="wyloguj.php">wyloguj</a></li>
    </ul>
  </li>';
                    }

                    ?>
                </ul>
                </div>
            </div>
</div>
    </nav>
                         <div class="kategorie" class="col-xl-3 col-lg-12 col-md-12">
          <?php
                    echo "<ul class='kat'>kategorie";
                    foreach ($kategorie as $row) {
                        echo "<li>$row[kategoria]</li>";
                    }
                    echo "</ul>";
                    ?>     
</div>

     <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-12 col-md-12" >
                <div id="slider">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" >
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img id="sliderzdjecie" src="img\reklama1.jpg" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img id="sliderzdjecie" src="img\reklama2.jpg"  alt="...">
                        </div>
                        <div class="carousel-item">
                            <img id="sliderzdjecie" src="img\reklama3.jpeg" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
             </div>
             
             
                 <h1> Proponowane Produkty </h1>
            <div class="zawartosc" class="col-xl-9 col-lg-12 col-md-12">
                <div class="produkt-kup">
                    <div id="zdjecie">
                        <img id="produkt" src="img/narty 1.jpg"  alt="Narty" >
                    </div>
                    <div id="cena">
                        Cena
                    </div>
                    <div id="koszyk">
                        <button><img href="zdjecia/koszyk.png"> </button>
                    </div>
                </div>
                <div class="produkt-kup">
                    <div id="zdjecie">
                    <img id="produkt" src="img/buty 1.jpg"  alt="Buty" >
                    </div>
                    <div id="cena">
                        cena
                    </div>
                    <div id="koszyk">
                        <button><img href="zdjecia/koszyk.png"> </button>
                    </div>
                </div>
                <div class="produkt-kup">
                    <div id="zdjecie">
                    <img id="produkt" src="img/kije 1.jpg"  alt="Kije" >
                    </div>
                    <div id="cena">
                        cena
                    </div>
                    <div id="koszyk">
                        <button><img href="zdjecia/koszyk.png"> </button>
                    </div>
                </div>
                <div class="produkt-kup">
                    <div id="zdjecie">
                    <img id="produkt" src="img/gogle 1.jpg"  alt="gogle" >
                    </div>
                    <div id="cena">
                        cena
                    </div>
                    <div id="koszyk">
                        <button><img href="zdjecia/koszyk.png"> </button>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </div>
    <div class="container1">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
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
                        <p>Polityka<prywatności< /p>
                    </a></li>

            </ul>
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
