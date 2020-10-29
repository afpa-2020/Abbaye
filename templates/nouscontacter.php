<?php require_once 'skeleton/header.php' ?>


<div class="container border border-dark">
    <h1 class="text-center m-5 "> Nous Contacter</h1>
    <form action="/sendmail" id="contact" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="firstname">Prénom</label>
                <input type="text" class="form-control" name="firstname">
            </div>
            <div class="form-group col-md-6">
                <label for="lastname">Nom</label>
                <input type="text" class="form-control" name="lastname">
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email">

            <div class="form-group">
                <label for="objet">Objet</label>
                <input type="objet" class="form-control" name="objet">

                <div class="form-group">
                     <label for="message">Message</label>
                    <textarea class="form-control" name="message" rows="5"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </div>
    </form>




    <?php require_once 'skeleton/footer.php' ?>