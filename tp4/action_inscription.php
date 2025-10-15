<?php
include("login.php");

if (isset($_POST["login"], $_POST["password"], $_POST["submit"])) {
    if(!empty($_POST["login"]) && !empty($_POST["password"])) {
        $login = $_POST["login"];
        $password = $_POST["password"];

        $fp = fopen("data.csv", "rt");
        $res = fgetcsv($fp);

        $ecriture = true;
        while($resultat = fgetcsv($fp)) {
            foreach ($resultat as $line) {
                if ($line == $login) {
                    $ecriture = false;
                }
            }
        }
        fclose($fp);
        if ($ecriture) {
            # on écrit dans le fichier maintenant que l'on a bien vérifié
            $fp = fopen("data.csv", "a");
            fputcsv($fp, array($login, $password));
            fclose($fp);
            echo "<h3 style='color: green'> Utilisateur inscrit avec succès !</h3>";
            echo "<h4> Veuillez vous connecter avec vos nouveaux identifiants.</h4>";

        } else {
            echo "<h3 style='color: darkred'> Le login que vous avez saisi, n'est pas disponible.</h3>";
            echo "<h4> Veuillez réessayer.</h4>";
        }

    }


    exit(0);


}
?>