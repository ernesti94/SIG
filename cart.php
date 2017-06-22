<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

function policz_rabat($koszt_calkowity,$kod){
    if ($kod=="test"){
        return $koszt_calkowity-(0.1*$koszt_calkowity);
    }
    else{
        $koszt_calkowity;
    }
}
?>
<html lang="pl">
<head>
    <meta  charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
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
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>  Koszyk</a></li>
            <?php
            if(isset($_SESSION['username'])){

                ?>
                <li><a href="account.php"><span
                                class="glyphicon glyphicon-user"></span> Konto</a></li>
                <li><a href="logout.php" ><span
                                class="glyphicon glyphicon-log-in"></span> Wyloguj się</a></li>
                <?php
            }
            else {
                ?>
                <li><a href="#" data-toggle="modal" data-target="#register-modal"><span
                                class="glyphicon glyphicon-user"></span> Rejestracja</a></li>
                <li><a href="#" data-toggle="modal" data-target="#login-modal"><span
                                class="glyphicon glyphicon-log-in"></span> Zaloguj się</a></li>

                <?php
            }
            ?>
        </ul>
    </div>
</nav>
<div class="container">




    </div>
</div>
<div class="container">
<?php
$total=0;
echo '<p><h3>Twój koszyk</h3></p>';

if(isset($_SESSION['cart'])) {

    //$total = 0;
    echo '<div class="table-responsive">';
    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Kod produktu</th>';
    echo '<th>Nazwa</th>';
    echo '<th>Ilość</th>';
    echo '<th>Koszt</th>';
    echo '</tr>';
    echo '</thead>';
    foreach($_SESSION['cart'] as $product_id => $quantity) {

        $result = $mysqli->query("SELECT product_code, product_name, product_desc, qty, price FROM products WHERE id = ".$product_id);


        if($result){

            while($obj = $result->fetch_object()) {
                $cost = $obj->price * $quantity; //work out the line cost
                $total = $total + $cost;
                echo '<tr>';
                echo '<td>'.$obj->product_code.'</td>';
                echo '<td>'.$obj->product_name.'</td>';
                echo '<td>'.$quantity.'&nbsp;<a class="button [secondary success alert]" style="padding:5px;" href="update-cart.php?action=add&id='.$product_id.'">+</a>&nbsp;<a class="button alert" style="padding:5px;" href="update-cart.php?action=remove&id='.$product_id.'">-</a></td>';
                echo '<td>'.$cost.'</td>';
                echo '</tr>';
            }
        }

    }


    echo '<tbody>';
    echo '<tr>';
    echo '<td colspan="3" align="right">Całkowity koszt</td>';
    echo '<td>'.$total." PLN".'</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td colspan="4" align="right"><a href="update-cart.php?action=empty"> <button type="button" class="btn btn-danger pull-left">Wyczyść koszyk</button></a>&nbsp;<a href="index.php"> <button type="button" class="btn btn-success pull-left">Kontynuuj zakupy</button></a>';
    if(isset($_SESSION['username'])) {
        echo '<a href="orders-update.php"><button type="button" class="btn btn-primary pull-right" style="text-align: right">Zamów</button></a>';
    }

    else {
        echo '<p style="color:indianred">Zaloguj się w celu dokończenia transakcji.</p>';
        //echo '<a href="login.php"><button type="button" class="btn btn-primary pull-right" style="text-align: right">Zamów</button></a>';
    }

    echo '</td>';

    echo '</tr>';
    echo '</tbody>';
    echo '</table>';
}

else {
    echo "Masz pusty kozyk.";
}





echo '</div>';
echo '</div>';
?>
</div>
<div class="modal fade" id="login-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Panel Logowania</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="verify.php" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="username" placeholder="Podaj login" name="username">
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
                <form class="form-horizontal" action="insert.php" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="imie">Imię:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="imie" placeholder="Podaj imię" name="imie">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nazwisko">Nazwisko:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nazwisko" placeholder="Podaj nazwisko" name="nazwisko">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="ulica">Ulica:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="ulica" placeholder="Podaj nazwę ulicy" name="ulica">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="miejscowosc">Miejscowość:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="miejscowosc" placeholder="Podaj nazwę miejscowości" name="miejscowosc">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="kod_pocztowy">Kod pocztowy:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="kod_pocztowy" placeholder="Podaj kod pocztowy" name="kod_pocztowy">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" placeholder="Podaj e-mail" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Hasło:</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="pwd" placeholder="Podaj hasło" name="pwd">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd2">Powtórz hasło:</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="pwd2" placeholder="Powtórz hasło" name="pwd2">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Zarejestruj się</button>
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