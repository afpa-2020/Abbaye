<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/abi_style.css">
    <link rel="shortcut icon" href="assets/image/favicon.ico">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!--<script src="assets/js/jquery-3.5.1.slim.min.js"></script>-->
    <script src="assets/js/bootstrap.bundle.min.js" defer></script>
    <script src="assets/js/bootstrap.min.js" defer ></script>
    <script src="assets/js/database.js" defer></script>
    <script src="assets/js/abi_client_form.js" defer></script>
    <script src="assets/js/abi_client_search.js" defer></script>
    <script src="assets/js/connexion.js" defer></script>

    <title>Active Bretagne Informatique</title>
</head>
<body>
    <div class="container">
        <header class="row mt-1 bg-info">
            <div class="col-md-3 my-4">
                <a href="abi_accueil.html">
                    <img src="assets/image/logo_abi.png" alt="Logo ABI">
                </a>
            </div>
            <div class="col-md-6 pt-4 text-center text-white">
                <h1 class="display-4">Active Bretagne Informatique</h1>
            </div>
            <div class="col-md-3">
                <form method="GET" class="login">
                    <div class="form-group-sm mt-3">
                        <label for="inputEmail" class="sr-only"></label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="Adresse email" value="" required autofocus>
                    </div>
                    <div class="form-group mt-3">
                        <label for="inputPassword" class="sr-only"></label>
                        <input type="password" class="form-control" id="inputPassword" placeholder="Mot de Passe" value="" required>
                    </div>
                </form>
                <div class="form-group form-check ml-5">
                    <button type="reset" class="btn btn-primary" id="refresh">Annuler</button>
                    <button role="button" class="btn btn-primary" id="send" onclick="connexion()">Envoyer</button>
                </div>
            </div>
        </header>
    </div>
    <nav class="mainNav container navbar navbar-expand-lg navbar-dark bg-primary h4">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Actualités</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">F.A.Q</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Recrutement</a>
                </li>
            </ul>
        </div>
    </nav>