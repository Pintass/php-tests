<?php include("fragments/headers.html"); ?>
    <title>Cookies TP</title>

</head>
<body>
    <h1>TP Cookies et Sessions</h1>

    <hr>
    <h2>Connexion</h2>
    <form action='action.php' method='POST'>
        <label for='login'>Login : </label>
        <input type='text' name='login' id='login' placeholder="log">
        <label for='password'>Mot de passe : </label>
        <input type='password' name='password' id='password' placeholder="MotDePasse">
        <br>
        <br>
        <input type='submit' name='submit' id="submit" value='Valider'>
    </form>
<hr>
    <h2> Inscription </h2>
    <form action='action_inscription.php' method='POST'>
        <label for='login'>Login : </label>
        <input type='text' name='login' id='login' placeholder="log">
        <label for='password'>Mot de passe : </label>
        <input type='password' name='password' id='password' placeholder="MotDePasse">
        <br>
        <br>
        <input type='submit' name='submit' id="submit" value='Valider'>
        <br>
    </form>
</body>
</html>
