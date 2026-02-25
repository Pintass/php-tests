<?php
    $chaineJSON = file_get_contents("php://input");
    $headers = getallheaders();
    if ($headers["Content-Type"] == "application/json") {
        $_POST = ["ok"];
        json_decode($chaineJSON);
        if (json_last_error() == JSON_ERROR_NONE) {
            if(file_exists("../data/abandons.json")) {
                unlink("../data/abandons.json");
            }
            file_put_contents("../data/abandons.json", $chaineJSON);
            echo "Enregistrement JSON effectué";
        }
        else echo "Erreur dans le format JSON";
    }
?>