<!DOCTYPE html>
<html lang="pl">

<head>
    <title>logowanie</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="logowanie.css" rel="stylesheet">
    <link href="polacz.php">
</head>

<body>
<?php
include "polacz.php";
if(isset($_POST['login']))
{
    $login = $conn->query("SELECT * FROM dane_logowania WHERE email ='" . $_POST['email'] . "' LIMIT 1");
    $user = $login->fetch(PDO::FETCH_ASSOC);
    
    if ($user) {
        if (password_verify($_POST['haselko'], $user['haslo'])){
header('Location: http://localhost/projekt/glowna.php');
 }else{
 echo "<h3>Nieprawidlowe haslo</h3>";
 }
 }else{
 echo "<h3>Nie znaleziono uzytkownika</h3>";
 }

}
   
?>
 <div id="zawartosc">
        <h1>Logowanie</h1>
        <div id="formularz">
<form method="post">
 <input type="text" name="email" placeholder="Email">
 <input type="password" name="haselko" placeholder="Password">
 <button type="submit" name="login">Zaloguj</button>
</form>
            <div id="rejestrowanie">
                <p>Jeżeli nie posiadasz konta <a href="rejestracja.php">zarejestruj sie </a></p>
            </div>
        </div> 
</body>

</html>
