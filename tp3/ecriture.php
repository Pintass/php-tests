<?php
header('Location: lecture.php');
include("lecture.php");

if (isset($_POST["nom"], $_POST["login"], $_POST["age"])) {
    $nom = $_POST["nom"];
    $login = $_POST["login"];
    $age = $_POST["age"];
}

if(!empty($nom) && !empty($login) && !empty($age)) {
    if(filter_var($age, FILTER_VALIDATE_INT, array('min_range' => 14, 'max_range' => 125) )) {
        $fp = fopen("data.csv", "a");
        fputcsv($fp, array($nom, $login, $age));

        fclose($fp);
    }
}

?>
