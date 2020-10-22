<?php require_once 'skeleton/header.php' ?>

<div class="container d-flex flex-column">
  <div class="row justify-content-center my-1 mb-2 mx-1">
    <div class="bg-secondary col-md-4 col-12 rounded my-1 mx-1">
      <h3 class="bg-info mt-1 rounded text-center">
        Nos Contacts
      </h3>

      <div class="row">
        <table class="table text-white table-sm table-striped affichage bg-secondary">
          <thead class="thead-light">
            <tr>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Fonction</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($contacts as $contact) : ?>

              <tr>
                <th><?= $contact->getLastname() ?></th>
                <th><?= $contact->getFirstname() ?></th>
                <th><?= $contact->getRole() ?></th>
              </tr>

            <?php endforeach ?>

          </tbody>
        </table>
      </div>
      <nav class="row justify-content-md-center" aria-label="...">
        <ul class="pagination">
          <li class="page-item disabled">
            <span class="page-link">Préc.</span>
          </li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item">
            <span class="page-link">
              2
              <span class="sr-only">(current)</span>
            </span>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Suiv.</a>
          </li>
        </ul>
      </nav>
    </div>

    <div class="bg-secondary col-md-7 col-12 rounded my-1 mx-1">
      <h3 class="bg-info mt-1 rounded text-center">Ubisoft Entertainment</h3>

      <div class="row">
        <div class="col-md-6 col-12">
          <table class="table">
            <tbody>
              <tr>
                <th>Nom</th>
                <td><input type="text" class="form-control-plaintext form-control editableClient" value="GETLASTNAME"
                        name="adresse" id="contactNom" disabled></td>
              </tr>
              <tr>
                <th>Prénom</th>
                <td><input type="text" class="form-control-plaintext form-control editableClient" value="GETFIRSTNAME"
                        name="adresse" id="contactPrenom" disabled></td>
              </tr>
              <tr>
                <th>Téléphone</th>
                <td><input type="text" class="form-control-plaintext form-control editableClient" value="GETTELEPHONE"
                        name="adresse" id="contactPhone" disabled></td>
              </tr>
              <tr>
                <th>Email</th>
                <td><input type="text" class="form-control-plaintext form-control editableClient" value="GETEMAIL"
                        name="adresse" id="contactEmail" disabled>
                  <a href="mailto:GETEMAIL"></a>
                </td>
              </tr>
            </tbody>
          </table>
          <button class="btn btn-danger mt-3">Modifier Contact</button>
        </div>
        <div class="col-md-6">
          <div class="row">
            <table class="table col-md-6">
              <tbody>
                <tr>
                  <th scope="row">ID Contact</th>
                  <td>1</td>
                </tr>
            </table>
            <table class="table col-md-6">
          </div>
          <h4>Nos Projets avec ce Contact</h4>
          <table class="table table-sm table-striped">
            <caption class="text-info"><a href="abi_projets.html">Voir tous les projets</a></caption>
            <thead>
              <tr>
                <th>ID</th>
                <th>Nom Projet</th>
                <th>Date de Début</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>1</th>
                <td>Creed Valhalla</td>
                <td>30/02/17</td>
              </tr>
              <tr>
                <th>2</th>
                <td>Tom Clank</td>
                <td> 21/02/18</td>
              </tr>
              <tr>
                <th>3</th>
                <td>Chien Legion</td>
                <td>03/03/20</td>
              </tr>
            </tbody>
          </table>
          <h4>Commentaires</h4>
          <p class="border px-2">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam, consequatur pariatur molestiae iure ab et temporibus doloribus repudiandae quas aut.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<?php require_once 'skeleton/footer.php' ?>