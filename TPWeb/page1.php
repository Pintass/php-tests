<html>
<head>
<title> Damier </title>
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
<h1> Damier 10x10 </h1>
<table>
<?php

echo "<form action='' method='post'>
<label for='ligne'>Ligne</label>
<input type='text' name='ligne' id='ligne'>
<label for='col'>Colonne</label>
<input type='text' name='col' id='col' id='col'>
<input type='submit' value='Valider'>
</form>";

if (isset($_POST['ligne'], $_POST['col'])) {
    $ligne = $_POST['ligne'];
    $col = $_POST['col'];
    echo $ligne."<br>".$col;
}


for ($x = 0; $x <= 10; $x++) {
    echo"<tr>";
    for ($i = 1; $i <= 5; $i++) {
        if ($x%2 == 0) {
            echo "<td bgcolor='black'></td>";
            echo "<td bgcolor='#faebd7'></td>";
        } else {
            echo "<td bgcolor='#faebd7'></td>";
            echo "<td bgcolor='black'></td>";
        }
    }
    echo "</tr>";

}
?>
</table>
</body>
</html>
