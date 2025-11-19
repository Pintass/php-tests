<?php
include("Mysql.php");

if (isset($_POST["nom"], $_POST["prenom"], $_POST["username"], $_POST["password"])) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $username = $_POST["username"];
    $password = $_POST["password"];
}

$connect = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connect, "student");

$requete = "INSERT INTO users(nom,prenom) VALUES (?, ?)";
$requetepropose = mysqli_prepare($connect, $requete);

if(!empty($nom) && !empty($prenom)) {
    mysqli_stmt_bind_param($requetepropose, "ss", $nom, $prenom);
    mysqli_stmt_execute($requetepropose);
}

################################################ Verfification de l'ID

$requete2 = "SELECT id FROM users WHERE nom=? AND prenom=? ";
$requete2propose = mysqli_prepare($connect, $requete2);

if(!empty($nom) && !empty($prenom)) {
    mysqli_stmt_bind_param($requete2propose, "ss", $nom, $prenom);
    mysqli_stmt_execute($requete2propose);
    mysqli_stmt_bind_result($requete2propose, $id);
    mysqli_stmt_fetch($requete2propose);

}

mysqli_close($connect);

################################################ Création identifiants dans la base
$connect = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connect, "student");

$requete3 = "INSERT INTO identifiants(id,user,password) VALUES (?, ?, ?)";
$requete3propose = mysqli_prepare($connect, $requete3);

if(!empty($username) && !empty($password)) {
    mysqli_stmt_bind_param($requete3propose, "iss", $id, $username, $password);
    mysqli_stmt_execute($requete3propose);
}


header('Location: Mysql.php');
?>


