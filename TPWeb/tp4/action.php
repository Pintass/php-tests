<?php

include("res/debug.php");
session_start();

if (isset($_POST["login"], $_POST["password"], $_POST["submit"])) {
    if(!empty($_POST["login"]) && !empty($_POST["password"])) {
        $login = $_POST["login"];
        $password = $_POST["password"];

        $fp = fopen("data.csv", "rt");
        $res = fgetcsv($fp);

        $verif_log = false;
        while($resultat = fgetcsv($fp)) {
            foreach ($resultat as $line) {
                if ($line == $login) {
                    $verif_log = true;
                } else {
                    $verif_log = true;
                }

                if($verif_log && $password == $line){
                    $_SESSION["login"] = $login;
                    $_SESSION["password"] = $password;
                    $_SESSION["time"] = time();
                    header('Location: admin2.php');
                    exit(0);
                }
            }
        }
        fclose($fp);
    } else {
        header('Location: login.php');
    }

    echo "<h1 style='color: darkred'> Connexion échouée</h1>";
    echo "<h2> Mauvais login et/ou mot de passe.</h2>";
    echo "<h3> Veuillez réessayer.</h3>";
    echo "<a href='login.php'> Page de connexion </a>";
    exit(0);


}
?>
