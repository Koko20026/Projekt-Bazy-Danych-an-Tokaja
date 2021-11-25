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
    <div id="zawartosc">
        <div id="formularz">
            <form>
                <div class="row mb-3">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">login</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputlogin">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3">
                    </div>
                </div>

            </form>
        </div>
        <div id="przycisk" class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary">zaloguj sie</button>
        </div>
    </div>
</body>

</html>
