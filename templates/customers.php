<?php require_once 'skeleton/header.php' ?>

<div class="d-flex flex-column">
  <div class="justify-content-center row m-1 mb-2 ">
    <div class="bg-secondary col-md-4 col-12 rounded m-1 ">

      <h3 class="bg-info mt-1 rounded text-center ">
        Nos clients
      </h3>

      <div class="col-12">
        <form action="#" method="GET" id="search_clients">
        <div class="row mt-2 mb-2">
          <div class=<?=($_SESSION['role'] === 'Commercial' || $_SESSION['role'] === 'RC') ? "col-md-6" : "col-12" ?>>
            <div class="row">
                <input class="form-control" type="text" placeholder="Rechercher un Client" name="search" autofocus>
              </form>
              </div>
            </div>


        <div class="col-md-6">

            <?php if ($_SESSION['role'] === "Commercial" || $_SESSION['role'] === "RC") : ?>
              <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#editModal">Ajouter un
                Client</button>
            <?php endif; ?>
        </div>

      </div>

    </div>


    <table class="table table-sm table-striped table-hover bg-secondary">
      <thead class="thead-light">
        <tr>
          <th>Id</th>
          <th>Raison Sociale</th>
          <th>#Dpt</th>
        </tr>
      </thead>
      <tbody id="clientsListe" role="button" class="text-white ">

        <?php foreach ($customers as $customer) : ?>

          <tr onclick="select_customer(<?= $customer->getId() ?>)">
            <th><?= $customer->getId() ?></th>
            <th><?= $customer->getCompanyName() ?></th>
            <th><?= substr($customer->getZip(), 3) ?></th>
          </tr>

        <?php endforeach ?>



      </tbody>
    </table>

    <nav class=>
      <ul class="pagination justify-content-center">
 <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
            <a href="/customers?page=<?= 1 . "&search" . $_GET['search'] ?>" class="page-link"> |< </a>
          </li> 
        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
          <a href="/customers?page=<?= ($currentPage - 1) . "&search=" . $_GET['search'] ?>" class="page-link"> < </a> 
         </li>  
         
      
        <?php for ($page = ($currentPage-2);$page < $currentPage+3; $page++) : ?>
          <?php if ($page>0 && $page <= $pages) : ?>

        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
          <a href="/customers?page=<?= $page . "&search=" . $_GET['search'] ?>" class="page-link"><?= $page ?></a>
        </li>
        <?php endif ?>
      <?php endfor ?>
      
      <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
        <a href="/customers?page=<?= ($currentPage + 1) . "&search=" . $_GET['search'] ?>" class="page-link"> > </a>
        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
          <a href="/customers?page=<?= $pages . "&search" . $_GET['search'] ?>" class="page-link"> >| </a>
      </li>
      </ul>
    </nav>

  </div>
<!-- ///////////////////////////////////////////////////////// -->
  <div class="bg-secondary col-md-7 col-12 rounded m-1">
    <h3 class="bg-info mt-1 rounded text-center" id="clientName">
      Informations sur le client
    </h3>

    <div class="row">
      <div class="col-md-6 col-12">
        <form action="#">
          <table class="table text-white table-sm">
            <tbody>
              <tr class="text-white">
                <th scope="row">Adresse</th>
                <td><input type="text" class="form-control-plaintext form-control editableClient" value="" name="adresse" id="clientAdresse" disabled> </td>
              </tr>
              <tr>
                <th scope="row">CP</th>
                <td><input type="text" class="form-control-plaintext form-control editableClient" value="" name="codePostal" id="clientCp" disabled> </td>
              </tr>
              <tr>
                <th scope="row">Ville</th>
                <td><input type="text" class="form-control-plaintext form-control editableClient" value="" name="ville" id="clientVille" disabled> </td>
              </tr>
              <tr>

                <th scope="row">Téléphone</th>
                <td><input type="text" class="form-control-plaintext form-control editableClient" value="" name="telephone" id="clientTelephone" disabled></td>
              </tr>
              <tr>
                <th scope="row">Domaine</th>
                <td><input type="text" class="form-control-plaintext form-control editableClient" value="" data-toggle="tooltip" name="domaine" id="clientDomaine" disabled></td>
              </tr>
              <tr>
                <th scope="row">Nature</th>
                <td><input type="text" class="form-control-plaintext form-control editableClient" value="" name="nature" id="clientNature" disabled></td>
              </tr>
              <tr>
                <th scope="row">CA</th>
                <td><input type="text" class="form-control-plaintext form-control editableClient" value="" name="ca" id="clientCa" disabled></td>
              </tr>
              <tr>
                <th scope="row">Effectif</th>
                <td><input type="text" class="form-control-plaintext form-control editableClient" value="" name="effectif" id="clientEffectif" disabled></td>
              </tr>
            </tbody>
          </table>
          <?php if ($_SESSION['role'] === "Commercial" || $_SESSION['role'] === "RC") : ?>
            <button class="btn btn-danger" id="modif" onclick="editClient()" type="button">Modifier
              Client</button>
            <button class="btn btn-info mt-3" id="annuler" style="display:none" onclick="annulation()" type="button">Annuler</button>
            <button class="btn btn-success mt-3" id="valider" style="display:none" onclick="validClient()" type="button">Enregistrer</button>
            <button class="btn btn-warning mt-3" id="delete" style="display:none" onclick="deleteClient()" type="button">Supprimer</button>
          <?php endif; ?>
        </form>
      </div>
      <div class="col-md-6 col-12">
        <table class="table text-white">
          <tbody>
            <tr>
              <th scope="row">ID Client</th>
              <td id="clientId"></td>
            </tr>
        </table>
        <table class="table text-white">
          <tbody>
            <tr>
              <th scope="row">Type</th>
              <td id="clientType"></td>
            </tr>
          </tbody>
        </table>

        <h4>Nos Contacts avec ce Client</h4>
        <table class="table table-sm table-striped">
          <caption class="text-info"><a href="/contacts">Voir tous les contacts</a></caption>
          <thead class="text-white">
            <tr>
              <th scope="col">Nom</th>
              <th scope="col">Prénom</th>
              <th scope="col">Email</th>
            </tr>
          </thead>
          <tbody id="contactsListe">

          </tbody>
        </table>
        <h4>Commentaires</h4>
        <textarea type="text" class="form-control-plaintext form-control editableClient border px-2" value="" name="commentaire" id="clientCommentaire" disabled></textarea>

      </div>
    </div>
  </div>
</div>
</div>


<!--MODAL     -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un Nouveau Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/addCustomer" method="POST" id="formNewCustomer" name="formNewCustomer">
          <div class="form-row form-group">
            <label for="newRaisonSociale" class="col-sm-3 col-form-label">Raison Sociale</label>
            <div class="col-sm-9">
              <input type="text" class="form-control editableModal" id="newRaisonSociale" name="newRaisonSociale" placeholder="Mon entreprise">
            </div>
          </div>
          <div class="form-row form-group">
            <div class="col-sm-4">
              Type
            </div>
            <div class="form-check col-sm-4">
              <input class="form-check-input" type="radio" name="newType" id="newPrivee" value="Privée" checked>
              <label class="form-check-label" for="newPrivee">
                Privé
              </label>
            </div>
            <div class="form-check col-sm-4">
              <input class="form-check-input" type="radio" name="newType" id="newPublique" value="Publique">
              <label class="form-check-label" for="newPublique">
                Publique
              </label>
            </div>
          </div>
          <div class="form-row form-group">
            <label for="newAdresse" class="col-sm-3 col-form-label">Adresse</label>
            <div class="col-sm-9">
              <input type="text" class="form-control editableModal" id="newAdresse" name="newAdresse" placeholder="1 rue de la Paix">
            </div>
          </div>
          <div class=row>
            <div class="form-row form-group col-sm-6">
              <label for="newCp" class="col-sm-3 col-form-label">CP</label>
              <div class="col-sm-9">
                <input type="text" class="form-control editableModal" id="newCp" name="newCp" placeholder="10100">
              </div>
            </div>
            <div class="form-row form-group col-sm-6">
              <label for="newVille" class="col-sm-3 col-form-label">Ville</label>
              <div class="col-sm-9">
                <input type="text" class="form-control editableModal" id="newVille" name="newVille" placeholder="Paris">
              </div>
            </div>
          </div>
          <div class="form-row form-group">
            <label for="newTelephone" class="col-sm-3 col-form-label">Téléphone</label>
            <div class="col-sm-9">
              <input type="text" class="form-control editableModal" id="newTelephone" name="newTelephone" placeholder="0123456789">
            </div>
          </div>

          <div class="form-row form-group">
            <label for="newDomaine" class="col-sm-3 col-form-label">Domaine</label>
            <div class="col-sm-9">
              <input type="text" class="form-control editableModal" id="newDomaine" name="newDomaine" placeholder="Vente, artisanat...">
            </div>
          </div>
          <div class="form-group form-row">
            <label for="newNature" class="col-sm-3">Nature</label>
            <select id="newNature" class="form-control col-sm-9">
              <option value="Principale" selected>Principale</option>
              <option value="Secondaire">Secondaire</option>
              <option value="Ancienne">Ancienne</option>
            </select>
          </div>
          <div class="form-row form-group">
            <label for="newCa" class="col-sm-3 col-form-label">CA</label>
            <div class="col-sm-9">
              <input type="text" class="form-control editableModal" id="newCa" placeholder="100 (k €)">
            </div>
          </div>
          <div class="form-row form-group">
            <label for="newEffectif" class="col-sm-3 col-form-label">Effectif</label>
            <div class="col-sm-9">
              <input type="text" class="form-control editableModal" id="newEffectif" name="newEffectif" placeholder="250 (personnes)">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL-->



<?php require_once 'skeleton/footer.php' ?>