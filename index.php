<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';
?>
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
                <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>  Koszyk</a></li>
                <?php
                if(isset($_SESSION['username'])){

                ?>
                    <li><a href="account.php" ><span
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
    <div class="dropdown-header"><h2>Internetowy sklep sportowy</h2></div><br>
    <div class="container">

<div class="container-fluid" >
    <div class="row">

        <?php


        $i=0;
        $product_id = array();
        $product_quantity = array();

        $result = $mysqli->query('SELECT * FROM products ORDER by product_name');
        if($result === FALSE){
            die(mysql_error());
        }

        if($result){

            while($obj = $result->fetch_object()) {

                echo '
        <div class="col-sm-2">
            <h4>'.$obj->product_name.'</h4>
            <img src='."products/$obj->product_img_name".' class="img-responsive"/>

            <p>Cena: '.$obj->price."PLN".'<br>
                Opis:
                '.$obj->product_desc.'<br>
            Ilość dostępnych: '.$obj->qty.'</br>
                Kod produktu: '.$obj->product_code.'</br></br></p>
            
        
        ';
                if($obj->qty > 0){
                    echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"  style="align: center">
                      <input class="btn btn-info btn-md" type="submit" value="Dodaj do koszyka!" /></a></p>';
                }
                else {
                    echo 'Brak w magazynie!';
                }
                //echo '</div>';

                $i++;
                echo '</div>';
            }
            echo '</div>';
        }

        $_SESSION['product_id'] = $product_id;

        ?>




    </div>
</div>

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
                                <input type="email" class="form-control" id="email" placeholder="Podaj email" name="email">
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