    <?php
    $username="root";
    $host = "localhost";
    $dbname = "sklep";

    try{
        $conn = new PDO("mysql:host=$host,dbname=$dbname, $username");
    }catch(PDOException $e){
        die("blad laczenia z baza danych!");
        
    };
    ?>
    </body>
</html>