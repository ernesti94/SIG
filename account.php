<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';
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
            <?php
            if($_SESSION['type']!='admin'){
            ?>
            <a class="navbar-brand" href="index.php"> Football Shirts Store</a>
            <?php
            }
            else{
                echo'<a class="navbar-brand" href="index.php" style="color: #2b669a"> Football Shirts Store || Admin</a>';
            }
            ?>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <?php
            if( isset($_SESSION['type']) && $_SESSION['type']=='admin'){

            }
            else{


            ?>
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>  Koszyk</a></li>
            <?php
            }
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




    <div class="container">
      <div class="small-12">
        <p><?php echo '<h3>Witaj ' .$_SESSION['fname'] .'</h3>'; ?></p>

        <p><h4>Szczegóły twojego konta</h4></p>
      </div>

        <form class="form-horizontal" action="update.php" method="post">
            <div class="row">
                <div class="small-12">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="fname">Imię:</label>
                        <div class="col-sm-8">

                            <?php

                            $result = $mysqli->query('SELECT * FROM users WHERE id='.$_SESSION['id']);

                            if($result === FALSE){
                                die(mysql_error());
                            }

                            if($result) {
                                $obj = $result->fetch_object();
                                echo '<input type="text" class="form-control" id="fname" placeholder="'.$obj->fname.'" name="fname">
                        </div>
                    </div>';

                              echo '  <div class="form-group">
                <label class="control-label col-sm-2" for="lname">Nazwisko:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="lname" placeholder="'.$obj->lname.'" name="lname">
                </div>
            </div>';

                                echo '  <div class="form-group">
                <label class="control-label col-sm-2" for="address">Ulica:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="address" placeholder="'.$obj->address.'" name="address">
                </div>
            </div>';

                                echo '  <div class="form-group">
                <label class="control-label col-sm-2" for="city">Miejscowość:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="city" placeholder="'.$obj->city.'" name="city">
                </div>
            </div>';

                                echo '  <div class="form-group">
                <label class="control-label col-sm-2" for="pin">Kod pocztowy:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="pin" placeholder="'.$obj->pin.'" name="pin">
                </div>
            </div>';

                                echo '  <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" placeholder="'.$obj->email.'" name="email">
                </div>
            </div>';
                            }



                            echo '  <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Hasło:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="pwd" name="pwd">
                </div>
            </div>';
                            ?>

                            <div class="form-group">
                                <div class="small-8 columns">
                                    <input class="btn btn-success" type="submit" id="right-label" value="Zmień" >
                                    <input class="btn btn-danger" type="reset" id="right-label" value="Reset" >
                                </div>
                            </div>
                        </div>
                    </div>
        </form>

<?php
if($_SESSION['type']!='admin') {
    ?>

    <div class="large-12">
        <h3>Zamówienia</h3>
        <hr>

        <?php
        $user = $_SESSION["username"];
        $result = $mysqli->query("SELECT * from orders where email='" . $user . "'");
        if ($result) {
            while ($obj = $result->fetch_object()) {
                //echo '<div class="large-6">';
                echo '<p><h4>Zamówienie id ->' . $obj->id . '</h4></p>';
                echo '<p><strong>Data zamówienia</strong>: ' . $obj->date . '</p>';
                echo '<p><strong>Kod produktu</strong>: ' . $obj->product_code . '</p>';
                echo '<p><strong>Nazwa</strong>: ' . $obj->product_name . '</p>';
                echo '<p><strong>Cena za sztukę</strong>: ' . $obj->price . '</p>';
                echo '<p><strong>Ilość sztuk</strong>: ' . $obj->units . '</p>';
                echo '<p><strong>Całkowity koszt</strong>: ' . $currency . $obj->total . '</p>';
                //echo '</div>';
                //echo '<div class="large-6">';
                //echo '<img src="images/products/sports_band.jpg">';
                //echo '</div>';
                echo '<p><hr></p>';

            }
        }
        ?>
    </div>

    <?php
}
        ?>
    </div>



<div class="panel-footer">
    <br><br>
    <p style="text-align: center">Copyright &copy; 2017 Ernest Jędrzejczyk<p>
        <br>
</div>
</body>
</html>
