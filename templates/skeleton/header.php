<?php if(isset($_SESSION['login'])) : ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/abi_style.css">
    <link rel="shortcut icon" href="assets/image/favicon.ico">

    <title>Active Bretagne Informatique</title>
</head>
<body>
    <nav class="vipNav rounded-bottom mx-1 navbar navbar-expand-lg navbar-dark bg-primary h4">
        <a href="/">
            <img src="assets/image/logo_abi.png" alt="Logo Abi" class="logo">
        </a>
        <div class="collapse navbar-collapse mr-auto" id="navbarCollapse">
            <ul class="navbar-nav">
            <li <?php if($_SERVER['REQUEST_URI']=="/") { ?>  class="active" <?php }  ?> class="nav-item ">
                    <a class="nav-link" href="/">Accueil </a>
                </li>
                <li <?php if($_SERVER['REQUEST_URI']=="/customers") { ?>  class="active" <?php }  ?>class="nav-item" >
                    <a class="nav-link " href="/customers">Nos Clients</a>
                </li>
                <li <?php if($_SERVER['REQUEST_URI']=="/projects") { ?>  class="active" <?php }  ?>class="nav-item">
                    <a class="nav-link" href="/projects">Nos Projets</a>
                </li>
                <li <?php if($_SERVER['REQUEST_URI']=="/employees") { ?>  class="active" <?php }  ?>class="nav-item">
                    <a class="nav-link " href="/employees">Nos Collaborateurs</a>
                </li>
            </ul>
        </div>
        <div class="lead text-white mr-2">
            Bienvenue <?= $_SESSION["login"]?> <br>
            <?= $_SESSION["role"]?>
        </div>
        <a href="/disconnect">
            <button class="btn btn-info">Déconnexion</button>
        </a>
    </nav>

<?php else : ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/abi_style.css">
    <link rel="shortcut icon" href="assets/image/favicon.ico">

    <title>Active Bretagne Informatique</title>
</head>

<body>
    <div class="">
        <header class="row mx-1 bg-info">
            <div class="col-md-3 my-4">
                <a href="/">
                    <img src="assets/image/logo_abi.png" alt="Logo ABI">
                </a>
            </div>
            <div class="col-md-6 pt-4 text-center text-white">
                <h1 class="display-4">Active Bretagne Informatique</h1>
            </div>
            <div class="col-md-3">
                <form method="POST" class="login">
                    <div class="form-group-sm mt-3">
                        <label for="inputEmail" class="sr-only"></label>
                        <input type="text" class="form-control" id="inputIdentifiant" placeholder="Identifiant" value="" required autofocus>
                    </div>
                    <div class="form-group mt-3">
                        <label for="inputPassword" class="sr-only"></label>
                        <input type="password" class="form-control" id="inputPassword" placeholder="Mot de Passe" value="" required>
                    </div>
                </form>
                <div class="form-group form-check ml-5">
                    <a href="/signup"><button role="button" class="btn btn-primary">S'enregistrer</button></a>
                    <button role="button" class="btn btn-primary" id="send" onclick="connexion()">Envoyer</button>
                    <p id="message"></p>
                </div>
            </div>
        </header>
    </div>

    <nav class="mainNav mx-1 rounded-bottom navbar navbar-expand-lg navbar-dark bg-primary h4">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="/">Actualités</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="/">F.A.Q</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="/">Recrutement</a>
                </li>
            </ul>
        </div>
    </nav>
<?php endif; ?>


    