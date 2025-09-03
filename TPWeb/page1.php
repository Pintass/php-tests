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