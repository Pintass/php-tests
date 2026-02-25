<?php
echo "Création du fichier Voiliers.xml <br/>";

// creation du document xml
$dom = new DOMDocument();
$dom -> version = '1.0';
$dom -> encoding = 'UTF-8';
$dom -> formatOutput = true;

// Création et ajout dre la racine <voiliers>
$racine = $dom->createElement("voiliers");
$racine -> setAttribute("transat", "Café 2025");
$dom->appendChild($racine);

// Ouverture en mode de lecture du fichier CSV
$fichier_csv = fopen("voiliers.csv", 'r');

// Lecture de l'en-tête du fichier csv
$delimiteur = ",";
fgetcsv($fichier_csv, 1500, $delimiteur);

//Lecture ligne par ligne des données du fichier CSV


$i = 1;
while($champs = fgetcsv($fichier_csv,1500, $delimiteur)){
    echo $i++."- ".$champs[1]."<br/>"; // affichage de contrôle
    //création d'un élément <voilier>
    $voilier = $dom->createElement("voilier");
    $voilier -> setAttribute("Classe", $champs[2]);
    $voilier -> setAttribute("Annee", $champs[3]);

    $nom = $dom->createElement("nom", $champs[1]);

    $photo = $dom->createElement("photo", $champs[4]);


    // élément regroupant tous les skippers
    $skippers = $dom->createElement("skippers");

    // 1er skipper
    $skipper1 = $dom->createElement("skipper");
    $skipper1 -> setAttribute("age", $champs[6]);
    $Nomskipper1 = $dom->createElement("nom", $champs[5]);
    $origineSkipper1 = $dom->createElement("origine", $champs[7]);
    $skipper1->appendChild($Nomskipper1); // atribution du fils
    $skipper1->appendChild($origineSkipper1); // atribution du fils

    // 2e skipper
    $skipper2 = $dom->createElement("skipper");
    $skipper2 -> setAttribute("age", $champs[9]);
    $Nomskipper2 = $dom->createElement("nom", $champs[8]);
    $origineSkipper2 = $dom->createElement("origine", $champs[10]);
    $skipper2->appendChild($Nomskipper2); // atribution du fils
    $skipper2->appendChild($origineSkipper2); // atribution du fils

    // atribution des fils skipper dans l'élément skippers
    $skippers->appendChild($skipper1);
    $skippers->appendChild($skipper2);

    // atribution des fils dans l'élément voilier
    $voilier->appendChild($nom);
    $voilier->appendChild($photo);
    $voilier->appendChild($skippers);

    // attribution de $voilier à l'élément des voiliers
    $racine -> appendChild($voilier);

}
fclose($fichier_csv);
$dom -> save("Voiliers.xml") or die ("ERREUR dans la création du fichier XML");
?>