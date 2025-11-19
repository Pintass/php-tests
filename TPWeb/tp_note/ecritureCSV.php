<?php
include("accueil.php");

$list_col = array("a", "b", "c", "d", "e", "f", "g", "h");
$list_lignes = array(1,2,3,4,5,6,7,8);
$list_n_pieces = array("roi","dame","tour", "fou", "cavalier", "pion");
$pieces_code = array(
    "roiblack" => "&#9818;",
    "roiwhite" => "&#9812;",

    "pionblack" => "&#9823;",
    "pionwhite" => "&#9817;",

    "damewhite" => "&#9813;",
    "dameblack" => "&#9819;",

    "tourwhite" => "&#9814;",
    "tourblack" => "&#9820;",

    "foublack" => "&#9821;",
    "fouwhite" => "&#9815;",

    "cavalierblack" => "&#9822;",
    "cavalierwhite" => "&#9816;",
);

if (isset($_POST["col"], $_POST["ligne"], $_POST["piece"])) {
    if(!empty($_POST["col"]) && !empty($_POST["ligne"] && !empty($_POST["piece"]))) {
        // vérification que les données sont bien dans les données acceptées afin d'éviter toute tentative de bug. On vérifie aussi que l'un d'entre blanc et noir soit valide
        if (in_array($_POST["col"], $list_col) && in_array($_POST["ligne"], $list_lignes) && in_array($_POST["piece"], $list_n_pieces) && ($_POST["radiogroup"] == "black" || $_POST["radiogroup"] == "white")) {
            $col = $_POST["col"];
            $ligne = $_POST["ligne"];
            $piece = $_POST["piece"];
            $color = $_POST["radiogroup"];

            // vérification si le fichier existe
            if (!file_exists("temp.csv")) {
                $creation = fopen("temp.csv", "w+");
                fclose($creation);
            }

            $fp = fopen("temp.csv", "rt");
            $ecriture = true;
            while ($resultat = fgetcsv($fp)) {
                if ($resultat[0] == $col && $resultat[1] == $ligne) {
                    $ecriture = false;
                }
            }
            fclose($fp);
            if ($ecriture) {
                # on écrit dans le fichier maintenant que l'on a bien vérifié
                $creation = fopen("temp.csv", "a");
                fputcsv($creation, array($col, $ligne, $pieces_code[$piece.$color]));
                fclose($creation);
                header('Location: accueil.php');

            } else {
                echo "<h3 style='color: darkred'> Case déjà saisie</h3>";
                echo "<h4> Veuillez réessayer.</h4>";
            }
        }
    }


    exit(0);


}
?>