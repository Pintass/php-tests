<?php

echo "<h1>Vérification XML</h1>";
echo "<p>En fin d'url, indiquer le nom du fichier (GET)</p>";
echo "<p>Rédaction : <pre>http://localhost/TPWeb/validation.php?xml=Voiliers.xml</pre></p>";

$dom = new DOMDocument();
$dom -> load($_GET['xml']);
if ($dom -> validate()) {
    echo "<b>Ce document est valide</b><hr/>";
}
else {
    echo "<b>Ce document n'est pas valide</b><hr/>";
}