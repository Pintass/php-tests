<?php include("fragments/headers.html"); ?>
    <title>MYSQL</title>

    </head>
    <body>
    <h1>TP MYSQL</h1>

    <h2>Données</h2>
<?php
$connect = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connect, "student");

$requete = "SELECT * FROM users";
$result = mysqli_query($connect, $requete);

echo "<table>";
echo "<th>"."id"."</th>";
echo "<th>"."nom"."</th>";
echo "<th>"."prénom"."</th>";
echo "</tr>";
while ($row = mysqli_fetch_row($result)) {
    echo "<td>".$row[0]."</td>";
    echo "<td>".$row[1]."</td>";
    echo "<td>".$row[2]."</td>";
    echo "</tr>";
}
echo "</table>";
echo "<br>";

mysqli_close($connect);
?>

    <hr>
    <h2>Ajouter des données au tableau</h2>
    <h4>Informations personnelles</h4>
    <form action='ecritureSQL.php' method='POST'>
        <label for='nom'>Nom : </label>
        <input type='text' name='nom' id='nom' placeholder='Peyronnet'>

        <label for='prenom'>Prénom : </label>
        <input type='text' name='prenom' id='prenom' placeholder="Théo">
        <br>
        <br>
        <h4>Création des identifiants de connexion</h4>
        <label for='username'>User : </label>
        <input type='text' name='username' id='username' placeholder='peyroTheo'>

        <label for='password'>password : </label>
        <input type='text' name='password' id='password' placeholder="motDePasse">
        <br>
        <br>
        <input type='submit' name='submit' value='Soumettre'>
    </form>
    <br>
    <hr>

    <h2>Connexion</h2>
    <form action='connexion.php' method='POST'>
        <label for='username'>login : </label>
        <input type='text' name='username' id='username' placeholder='peyroTheo'>

        <label for='password'>password : </label>
        <input type='text' name='password' id='password' placeholder="motDePasse">
        <br>
        <br>
        <input type='submit' name='submit' value='Connexion'>
    </form>
    <hr>
    </body>
</html>
