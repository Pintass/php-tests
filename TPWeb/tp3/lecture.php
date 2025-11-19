<?php include("fragments/headers.html"); ?>
    <title>Lecture CSV</title>

</head>
<body>
    <h1>TP LECTURE WEB</h1>

    <h2>Données</h2>
<?php
include("res/debug.php");

$filename = "data.csv";
$fp=fopen($filename,"rt");


echo "<table>";
$resultat = fgetcsv($fp);
foreach($resultat as $value){
    echo "<th>".$value."</th>";
}


while($resultat = fgetcsv($fp)){
    echo "<tr>";
    foreach($resultat as $value){
        echo "<td>".$value."</td>";
    }
    echo "</tr>";
}
echo "</table>";

fclose($fp);

display($resultat);
?>


    <hr>
    <h2>Ajouter des données au tableau</h2>
    <form action='ecriture.php' method='POST'>
        <label for='nom'>Nom : </label>
        <input type='text' name='nom' id='nom' placeholder='Jean'>

        <label for='login'>Login : </label>
        <input type='text' name='login' id='login' placeholder="logJean">
        <label for='age'>Âge : </label>
        <input type='number' name='age' id='age' placeholder='18' min='14', max='125'>
        <br>
        <br>
        <input type='submit' name='submit' value='Soumettre'>
    </form>
<hr>
</body>
</html>
