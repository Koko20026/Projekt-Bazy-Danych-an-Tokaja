<!DOCTYPE html>
<html lang="pl">

<head>
    <title>sklep z asortymentem narciarskim</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="glowna.css" rel="stylesheet">
    <link href="polacz.php">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                        <a class="nav-link active" aria-current="page" href="produkty.php">Strona produktu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="koszyk.php">koszyk</a>
                    </li>

                </ul>
                <div class="log">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="logowanie.php">logowanie</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="..." class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="...">
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
            <div class="zawartosc" class="col-xl-12 col-lg-12 col-md-12">
                <div class="produkt">
                    <div id="zdjecie">
                        zdjecie
                    </div>
                    <div id="cena">
                        cena
                    </div>
                    <div id="koszyk">
                        <button><img href="zdjecia/koszyk.png"> </button>
                    </div>
                </div>
                <div class="produkt">
                    <div id="zdjecie">
                        zdjecie
                    </div>
                    <div id="cena">
                        cena
                    </div>
                    <div id="koszyk">
                        <button><img href="zdjecia/koszyk.png"> </button>
                    </div>
                </div>
                <div class="produkt">
                    <div id="zdjecie">
                        zdjecie
                    </div>
                    <div id="cena">
                        cena
                    </div>
                    <div id="koszyk">
                        <button><img href="zdjecia/koszyk.png"> </button>
                    </div>
                </div>
                <div class="produkt">
                    <div id="zdjecie">
                        zdjecie
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
    <div class="container1">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>
                <span class="text-muted">© 2021 Company, Inc</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted" href="#">
                        <p>regulamin<p>
                    </a></li>
                <li class="ms-3"><a class="text-muted" href="#">
                        <p>polityka<prywatności< /p>
                    </a></li>

            </ul>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
