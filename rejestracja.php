<!DOCTYPE html>
<html lang="PL">

<head>
    <title>rejestracja</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="logowanie.css" rel="stylesheet">
    <link href="polacz.php">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <?php
    include "polacz.php";
    if (isset($_POST['register'])) {
        $email = $_POST['email'];
        $haslo = $_POST['haslo'];
        $hashPassword = password_hash($haslo, PASSWORD_BCRYPT);
        $sth = $conn->prepare('INSERT INTO dane_logowania (haslo,email) VALUE(:haslo, :email)');
        $sth->bindValue(':email', $email, PDO::PARAM_STR);
        $sth->bindValue(':haslo', $hashPassword, PDO::PARAM_STR);
        $sth->execute();
    }
    ?>


    <div id="zawartosc">
        <div id="formularz">
            <h1>Rejestracja</h1>
            <form method="post">
                <input type="text" name="email" placeholder="Email">
                <input type="password" name="haslo" placeholder="Password">
                <button type="submit" name="register">Zarejestruj</button>
            </form>
        </div>
</body>

</html>
