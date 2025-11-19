<?php
include("fragments/headers.html"); ?>
<title>Listing - jeu d'échecs</title>

</head>
<body>
<h1>Le jeu d'échec</h1>

<navbar>
    <a href="accueil.php">Accueil</a>
    <a href="listing.php">Listing</a>
</navbar>

<h2>Listing des fichiers disponibles</h2>
<?php
$connect = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connect, "enregistrement");

$requete = "SELECT * FROM file";
$result = mysqli_query($connect, $requete);

echo "<table>";
echo "<th>Fichier</th>";
echo "</tr>";
while ($row = mysqli_fetch_row($result)) {
    echo "<td>".$row[0]."</td>";
    echo "<td><button name='button' value=$row[0]><a href='contenu_sql.php'>Contenu</button></td>";

    echo "</tr>";

}
echo "</table>";
echo "<br>";

mysqli_close($connect);
?>
