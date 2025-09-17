<html>
<head>
<title> Damier </title>
    <style>

        th, td {
            border: 1px solid black;
            text-align: center;
            width: 20px;
            height: 20px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h1> Damier </h1>
<table>
<?php

echo "<form action='' method=''>
<label for='ligne'>Ligne</label>
<input type='text' name='ligne' id='ligne' value='10' max='35' min='0'>
<br>
<label for='col'>Colonne</label>
<input type='text' name='col' id='col' value='10' max='35' min='0'>
<br>
<label for='couleur1'>Couleur 1</label>
<input type='color' name='couleur1' id='couleur1' value='#000000'>
<br>
<label for='couleur2'>Couleur 2</label>
<input type='color' name='couleur2' id='couleur2' value='#ffffff'>
<br>
<input type='submit' value='Valider'>
</form>";

$ligne = $_GET["ligne"];
$colonne = $_GET["col"];
$couleur1 = $_GET["couleur1"];
$couleur2 = $_GET["couleur2"];

if ($ligne > 35 || $colonne > 35) {
    echo"<br>";
    echo "Veuillez mettre un nombre de lignes et de colonnes inférieur à 36.";
    $ligne = 0;
    $colonne = 0;
}

if ($ligne < 0 || $colonne < 0 ) {
    echo"<br>";
    echo "Veuillez mettre un nombre de lignes et de colonnes positif.";
    $ligne = 0;
    $colonne = 0;
}


for ($x = 0; $x <= $ligne; $x++) {
    echo"<tr>";
    for ($i = 1; $i <= $colonne; $i++) {
        if ($x%2 == 0) {
            echo "<td bgcolor=$couleur1></td>";
            echo "<td bgcolor=$couleur2></td>";
        } else {
            echo "<td bgcolor=$couleur2></td>";
            echo "<td bgcolor=$couleur1></td>";
        }
    }
    echo "</tr>";

}
?>
</table>
</body>
</html>