<?php
include("accueil.php");

$connect = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connect, "enregistrement");

$requete = "INSERT INTO file VALUES (?)";
$requetepropose = mysqli_prepare($connect, $requete);
$date = date("d_m_y_H_i_s");
$file_name = "file_".$date.".csv";

mysqli_stmt_bind_param($requetepropose, "s", $file_name);
mysqli_stmt_execute($requetepropose);

mysqli_close($connect);

// creation du fichier

$final_file_name = "res/file_".$date.".csv";
$fichier_final = fopen($final_file_name, "w+");
fclose($fichier_final);

$fichier_final = fopen($final_file_name, "a");
$fichier_temp = fopen("temp.csv", "rt");

while ($resultat = fgetcsv($fichier_temp)) {
    fputcsv($fichier_final, $resultat);
}

fclose($fichier_temp);
fclose($fichier_final);

file_put_contents('temp.csv', '');


header('Location: accueil.php');
?>


