<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php 
    include "polacz.php";
    session_start();
    $kwerenda1 = $conn->prepare("SELECT id_konta from dane_logowania where email = ? limit 1 ");
    $kwerenda1->execute([$_SESSION['user']]);
    $user = $kwerenda1->fetch()[0];
    $kwerenda = $conn->prepare("SELECT * from produkty where id_produktu in (SELECT id_produktu from produkty_koszyk where id_uzytkownika = ?) ");
    $kwerenda->execute([$user]);

    if(isset($_POST['user_id'])){
        $zamowienie = $conn->prepare("INSERT INTO zamowienie (id_konta, ilosc) values (?,?)");
        $zamowienie ->execute([$user, 1]);
        $id_z = $conn->lastInsertId();
        foreach($kwerenda->fetchAll() as $row){
            $kwerenda2 = $conn->prepare("INSERT INTO zamowienie_produkty (id_produktu, id_sprzedazy) values (?,?) ");
            $kwerenda2->execute([$row['id_produktu'], $id_z]);
            $kwerenda3 = $conn->prepare("DELETE from produkty_koszyk where id_produktu = ?");
            $kwerenda3->execute([$row['id_produktu']]);
        }
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
                        $rola ->execute([$_SESSION['user']]);
                        $typ = $rola->fetch()[0];
                        
                        echo '<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">fajnie że jestes </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
      <li><a class="dropdown-item" href="">twoje zamowienia</a></li>';
      if($typ){
        if($typ == 'admin'){
        echo '<li><a class="dropdown-item" href="panel_admina.php">panel administratora</a></li>';
        }else{
            echo '<li><a class="dropdown-item" href="panel_uzytkownka.php">Twój profil</a></li>';
        }}
        echo '<li><a class="dropdown-item" href="wyloguj.php">wyloguj</a></li></ul></li>';
        }

                    ?>
                </ul>


            </div>
        </div>
    </nav> 
    <div class="produkt">
<?php
    foreach($kwerenda->fetchAll() as $row){
       
        echo '<div class="nazwa">';
        echo $row['nazwa_produktu'];
        echo '</div>';
        echo '<div class="cena">';
        echo $row['cena_brutto'];
        echo '</div>';
    }
?>
<div class="przycisk">
<form action="koszyk.php" method="POST">
<input type="hidden" name="user_id" value="<?php echo $user ?>">
<input type="submit" value="zamów"> 
</form>
</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>