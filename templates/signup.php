<?php
require_once '../templates/skeleton/header.php' ?>

<form>
<h1 class="text-center">Nous Rejoindre</h1>
    <div class="form-group ml-5 mr-5">
        <label for="identifiant">Identifiant</label>
        <input type="text" class="form-control" name="identifiant">

    </div>
    <div class="form-group ml-5 mr-5">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
    </div>
    <div class="form-group ml-5 mr-5">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password">
    </div>
    <div class="form-group ml-5 mr-5">
        <label for="password">Confirmer le mot de passe</label>
        <input type="password" class="form-control" id="password">
    </div>
    <button type="submit" class="btn btn-primary ml-5 mr-5">Envoyer</button>
</form>





<?php
require_once '../templates/skeleton/footer.php' ?>