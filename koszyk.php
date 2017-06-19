<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Sklep sportowy</title>
    <link rel="icon" href="http://example.com/favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php"> Football Shirts Store</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="koszyk.php"><span class="glyphicon glyphicon-shopping-cart"></span>  Koszyk</a></li>
            <li><a href="konto.php"><span class="glyphicon glyphicon-user"></span> Konto</a></li>
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Zaloguj się</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <h2>Twój koszyk</h2>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Kod produktu</th>
                <th>Nazwa</th>
                <th>Rozmiar</th>
                <th>Ilość</th>
                <th>Cena za sztukę</th>
                <th>Koszt całkowity</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>x2137jp2</td>
                <td>WHU</td>
                <td>M</td>
                <td>1</td>
                <td>100 PLN</td>
                <td>100 PLN</td>

            </tr>
            </tbody>

        </table>


        <form>
            <div class="form-group pull-right">
                <label>Czy masz kod rabatowy? Jeśli tak wprowadź go w pole obok.</label>
                <input type="text">
            </div>
        </form>
        <br><br><br>
        <button type="button" class="btn btn-danger">Wyczyść koszyk</button>
        <button type="button" class="btn btn-success">Kontynuuj zakupy</button>
        <button type="button" class="btn btn-primary pull-right" style="text-align: right">Zamów</button>
        <br>
        <br>
    </div>
</div>
<div class="panel-footer">
    <br><br>
    <p style="text-align: center">Copyright &copy; 2017 Ernest Jędrzejczyk<p>
        <br>
</div>
</body>
</html>