<!DOCTYPE html>
<html lang="pl">

<head>
<title>sklep z asortymentem narciarskim</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="produkt.css" rel="stylesheet" >
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
<script>
        $(document).ready(function(){
        $(".galImg").click(function(){
        var obraz = $(this).attr("rel");
        $('#glowny').fadeOut('slow',function(){
        $("img.glowny").attr('src',obraz);
        $('#glowny').fadeIn('slow');
        });
        });
        });
</script>

  <title>produkty</title>
</head>

<body>
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
                <div class="log">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="logowanie.php">Logowanie</a>
                        </li>
                    </ul>
                </div>
            </div>
      </div>
</nav>
  

      <div id="zawartosc">
         <div id="galeria">
               <div id="glowny">
               <img src="img\buty 1.jpg" border="0" class="glowny"/>
                </div>

               <div class="miniaturki">
               <a href="#" rel="img\buty 1.jpg"     class="galImg"><img src="img\buty 1.jpg" class="maly" /></a>
               <a href="#" rel="img\buty 1-2.jpg"     class="galImg"><img src="img\buty 1-2.jpg" class="maly" /></a>
               <a href="#" rel="img\buty 1-3.jpg"    class="galImg"><img src="img\buty 1-3.jpg" class="maly" /></a>
               <a href="#" rel="img\buty 1-4.jpg"    class="galImg"><img src="img\buty 1-4.jpg" class="maly" /></a>
             </div>
         </div>
         <div id="produkt">
            <h1>Podgrzewane buty narciarskie </h1>
                <h1> męskie Salomon QST ACCESS 90 Custom Heat 2022</h1>
         </div>
      </div>



  <footer class="justify-content-between align-items-center py-3 my-4 border-top">
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
          <p>Regulamin<p>
        </a></li>
      <li class="ms-3"><a class="text-muted" href="#">
          <p>Polityka<prywatności< /p>
        </a></li>

    </ul>
  </footer>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
