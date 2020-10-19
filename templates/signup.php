<?php
require_once '../templates/skeleton/header.php' ?>

<form>
    <div class="form-group col-md-6">
        <label for="identifiant">Identifiant</label>
        <input type="text" class="form-control" name="identifiant">

    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password">
    </div>
    <div class="form-group">
        <label for="password">Confirmer le mot de passe

        </label>
        <input type="password" class="form-control" id="password">
    </div>

    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>



<?php
require_once '../templates/skeleton/footer.php' ?>