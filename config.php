<?php
$currency = 'PLN';
$db_username = 'root';
$db_password = '';
$db_name = 'bolt';
$db_host = 'localhost';
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);
if (!mysqli_set_charset($mysqli, "utf8")) {

    exit();
} else {
    mysqli_character_set_name($mysqli);
}
?>