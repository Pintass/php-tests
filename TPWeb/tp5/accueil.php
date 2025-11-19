<?php
session_start();
if ($_SESSION["nom"] & $_SESSION["prenom"]) {
    $prenom = $_SESSION["prenom"];
    $nom = $_SESSION["nom"];
    echo "<h1> Bonjour $prenom $nom </h1>";
    echo "<a href='Mysql.php'>Déconnexion</a>";
}