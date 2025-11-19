<html lang="fr">
<!DOCTYPE html>
<head>
    <title> Tableau </title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid black;
            text-align: center;
            width: 50px;
            height: 70px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h1> Tableau </h1>
<table>
    <?php
    require('res/debug.php');
    require('res/fct_stats.php');
    $x = array(1,3,4,7,9,10);
    $n = array(2,4,1,3,5,1);

    #display($x);

    #display2($n);

    echo"<tr>";
    echo "<td> x </td>";
    foreach($x as $value){
        echo "<td>$value</td>";
    }
    echo "</tr>";
    echo "<td> n </td>";
    foreach($n as $value){
        echo "<td>$value</td>";
    }
    echo "</table>";

    echo "<form action='' method='GET'>
    <h3>Calculs</h3>
    <select name='choix' id='choix'>
        <option value=''>Choisir une option</option>
        <option value='var'>Variance</option>
        <option value='moy'>Moyenne</option>
        <option value='sd2'>Ecart-type</option>
    </select>
    <input type='submit' value='Valider'>
    </form>";

    if ($_GET['choix']=="var"){
        echo"<br>";
        echo variance($x,$n);
    }
    if ($_GET['choix']=="moy"){
        echo"<br>";
        echo moy2($x,$n);
    }
    if ($_GET['choix']=="sd2"){
        echo"<br>";
        echo sd2($x,$n);
    }

?>
