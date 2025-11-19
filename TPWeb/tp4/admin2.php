<?php
session_start();
if ($_SESSION["login"]) {
    $log = $_SESSION["login"];
    echo "<h1> Bonjour $log </h1>";
        echo "<a href='out.php'>Déconnexion</a>";
}