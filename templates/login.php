<?php require_once 'skeleton/header.php' ?>

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


<?php require_once 'skeleton/footer.php' ?>
