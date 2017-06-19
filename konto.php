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
            <li><a href="#" ><span class="glyphicon glyphicon-user" ></span> Konto</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-out" ></span> Wyloguj się</a></li>
        </ul>
    </div>
</nav>


<div class="modal fade" id="login-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Panel Logowania</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/action_page.php">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Login:</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Hasło:</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Zaloguj się</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="register-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Rejestracja</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/action_page.php">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Login:</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Hasło:</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Zaloguj się</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>

    </div>
</div>
<div class="panel-footer">
    <br><br>
    <p style="text-align: center">Copyright &copy; 2017 Ernest Jędrzejczyk<p>
        <br>
</div>
</body>
</html>