<?php include("fragments/headers.html"); ?>
<title>Jeu d'échecs - Daniel Rodrigues Amorim</title>

</head>
<body>
<h1>Le jeu d'échec</h1>

<navbar>
    <a href="accueil.php">Accueil</a>
    <a href="listing.php">Listing</a>
</navbar>

<h2>Formulaire</h2>
<form action='ecritureCSV.php' method='POST'>

    <div>
        <label for='col'>Choix de la colonne </label>
        <br>
        <select name="col" id="col">
            <option value="a">a</option>
            <option value="b">b</option>
            <option value="c">c</option>
            <option value="d">d</option>
            <option value="e">e</option>
            <option value="f">f</option>
            <option value="g">g</option>
            <option value="h">h</option>
        </select>
    </div>

    <div>
        <label for='ligne'>Choix de la ligne</label>
        <br>
        <select name="ligne" id="ligne">
            <option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
            <option value=5>5</option>
            <option value=6>6</option>
            <option value=7>7</option>
            <option value=8>8</option>
        </select>
    </div>

    <div>
        <label for='piece'>Choix de la pièce</label>
        <br>
        <select name="piece" id="piece">
            <option value="roi">roi</option>
            <option value="dame">dame</option>
            <option value="tour">tour</option>
            <option value="fou">fou</option>
            <option value="cavalier">cavalier</option>
            <option value="pion">pion</option>
        </select>
    </div>

    <fieldset>
        <legend>Couleur</legend>
        <div>
            <input type="radio" id="black" name="radiogroup" value="black" checked />
            <label for="black">Noir</label>
        </div>
        <div>
            <input type="radio" id="white" name="radiogroup" value="white" />
            <label for="white">Blanc</label>
        </div>
    </fieldset>
    <br>
    <br>
    <input type='submit' name='submit' value='Valider'>
</form>
<br>

<h2>Liste</h2>
<table>
<th>Colonne</th>
<th>Ligne</th>
<th>Pièce</th>
</tr>
<?php
// pour éviter les erreurs on crée le fichier
if (!file_exists("temp.csv")) {
    $creation = fopen("temp.csv", "w+");
    fclose($creation);
}
$fp = fopen("temp.csv", "rt");
$compteur = 0;
while ($resultat = fgetcsv($fp)) {
    echo "<td>$resultat[0]</td>";
    echo "<td>$resultat[1]</td>";
    echo "<td>$resultat[2]</td>";
    echo "</tr>";
}
?>
</table>

<a href="ecritureSQL.php"><input type="submit"/></a>

</body>

<footer>
    <hr>
    <p>DS PHP Alternants 2025 - Daniel Rodrigues Amorim / INF2-FA</p>
</footer>
</html>
