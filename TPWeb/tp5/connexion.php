<?php
include("accueil.php");
session_start();

if (isset($_POST["username"], $_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
}

$connect = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connect, "student");

################################################ Verfification de l'ID

$requete2 = "SELECT id FROM identifiants WHERE user=? AND password=? ";
$requete2propose = mysqli_prepare($connect, $requete2);

if(!empty($username) && !empty($password)) {
    mysqli_stmt_bind_param($requete2propose, "ss", $username, $password);
    mysqli_stmt_execute($requete2propose);
    mysqli_stmt_bind_result($requete2propose, $id);
    mysqli_stmt_fetch($requete2propose);
}

mysqli_close($connect);
################################################# LECTURE DU NOM PRENOM
$connect = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connect, "student");

$requete3 = "SELECT nom, prenom FROM users WHERE id=?";
$requete3propose = mysqli_prepare($connect, $requete3);

if(!empty($username) && !empty($password)) {
    mysqli_stmt_bind_param($requete3propose, "i", $id);
    mysqli_stmt_execute($requete3propose);
    mysqli_stmt_bind_result($requete3propose, $nom, $prenom);
    mysqli_stmt_fetch($requete3propose);
}


$_SESSION["prenom"] = $prenom;
$_SESSION["nom"] = $nom;
$_SESSION["time"] = time();
header('Location: accueil.php');
mysqli_close($connect);
exit(0);

?>
