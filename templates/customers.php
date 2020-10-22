<?php require_once 'skeleton/header.php' ?>

<div class="d-flex flex-column">
    <div class="justify-content-center row my-1 mb-2 mx-1 ">

        <div class="bg-secondary col-md-4 col-12 rounded my-1 mx-1 ">
            <h3 class="bg-info mt-1 rounded text-center ">
                Nos clients
            </h3>
            <table class="table table-sm table-striped table-hover bg-secondary">
            <thead class="thead-light">
              <tr>
                <th>Id</th>
                <th>Raison Sociale</th>
                <th>#Dpt</th>
              </tr>
            </thead>
            <tbody id="clientsListe" role="button" class="text-white ">

<?php foreach ($customers as $customer): ?>

<tr>
  <th><?= $customer->getId() ?></th>
  <th><?= $customer->getCompanyName() ?></th>
  <th><?= substr($customer->getZip(),3) ?></th>
</tr>

<?php endforeach ?>

              </tbody>
            </table>
        </div>
        
        <div class="bg-secondary col-md-7 col-12 rounded my-1 mx-1">
            <h3 class="bg-info mt-1 rounded text-center ">
                Un titre aussi
            </h3>

            <div class="row">
              <div class="col-md-6 col-12">
            <form action="#">
              <table class="table text-white table-sm">
                <tbody>
                  <tr class="text-white">
                    <th scope="row">Adresse</th>
                    <td><input type="text" class="form-control-plaintext form-control editableClient" value=""
                        name="adresse" id="clientAdresse" disabled> </td>
                  </tr>
                  <tr>
                    <th scope="row">CP</th>
                    <td><input type="text" class="form-control-plaintext form-control editableClient" value=""
                        name="codePostal" id="clientCp" disabled> </td>
                  </tr>
                  <tr>
                    <th scope="row">Ville</th>
                    <td><input type="text" class="form-control-plaintext form-control editableClient" value=""
                        name="ville" id="clientVille" disabled> </td>
                  </tr>
                  <tr>

                    <th scope="row">Téléphone</th>
                    <td><input type="text" class="form-control-plaintext form-control editableClient" value=""
                        name="telephone" id="clientTelephone" disabled></td>
                  </tr>
                  <tr>
                    <th scope="row">Domaine</th>
                    <td><input type="text" class="form-control-plaintext form-control editableClient" value=""
                        data-toggle="tooltip" name="domaine" id="clientDomaine" disabled></td>
                  </tr>
                  <tr>
                    <th scope="row">Nature</th>
                    <td><input type="text" class="form-control-plaintext form-control editableClient" value=""
                        name="nature" id="clientNature" disabled></td>
                  </tr>
                  <tr>
                    <th scope="row">CA</th>
                    <td><input type="text" class="form-control-plaintext form-control editableClient" value="" name="ca"
                        id="clientCa" disabled></td>
                  </tr>
                  <tr>
                    <th scope="row">Effectif</th>
                    <td><input type="text" class="form-control-plaintext form-control editableClient" value=""
                        name="effectif" id="clientEffectif" disabled></td>
                  </tr>
                </tbody>
              </table>
              
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
              <caption class="text-info"><a href="abi_contacts.html">Voir tous les contacts</a></caption>
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
            <textarea type="text" class="form-control-plaintext form-control editableClient border px-2" value=""
              name="commentaire" id="clientCommentaire" disabled></textarea>

              </div>
            </div>
        </div>
    </div>
</div>


<div class="container text-white mt-4">
    <div class="row">
      <div class="col-md-4 ">
        <div class="row mt-5 bg-info justify-content-md-center">
          <h3>Nos Clients</h3>
        </div>
        <form action="#" method="GET" id="search_clients">
          <div class="row mt-2 mb-2">
            <div class="col-md-6">
              <div class="row">
                <input class="form-control" type="text" placeholder="Rechercher un Client" id="searchValue" autofocus>
              </div>
              <div class="form-check mt-3">
                <div class="row">
                  <input class="form-check-input" type="radio" name="tri" value="triId" checked><label
                    for="triId"></label> Trier par Id
                </div>
                <div class="row">
                  <input class="form-check-input" type="radio" name="tri" value="triRs"><label for="triRs"></label>
                  Trier par Raison Sociale
                </div>
                <div class="row">
                  <input class="form-check-input" type="radio" name="tri" value="triDpt"><label for="triDpt"></label>
                  Trier par Département
                </div>
              </div>
            </div>
            <div class="col-md-6">
              Nombre de résultats
              <div class="form-row">
                <select name="nb_resultats" id="nb_resultats_selec">
                  <option selected value="5">5</option>
                  <option value="10">10</option>
                  <option value="15">15</option>
                </select>
              </div>
              <div class="form-row my-1">
                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#editModal">Ajouter un
                  Client</button>
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
                      <form action="#" method="GET" id="formNew" name="formNew">
                        <div class="form-row form-group">
                          <label for="newRaisonSociale" class="col-sm-3 col-form-label">Raison Sociale</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control editableModal" id="newRaisonSociale"
                              placeholder="Mon entreprise">
                          </div>
                        </div>
                        <div class="form-row form-group">
                          <div class="col-sm-4">
                            Type
                          </div>
                          <div class="form-check col-sm-4">
                            <input class="form-check-input" type="radio" name="newType" id="newPrivee" value="Privée"
                              checked>
                            <label class="form-check-label" for="newPrivee">
                              Privé
                            </label>
                          </div>
                          <div class="form-check col-sm-4">
                            <input class="form-check-input" type="radio" name="newType" id="newPublique"
                              value="Publique">
                            <label class="form-check-label" for="newPublique">
                              Publique
                            </label>
                          </div>
                        </div>
                        <div class="form-row form-group">
                          <label for="newAdresse" class="col-sm-3 col-form-label">Adresse</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control editableModal" id="newAdresse"
                              placeholder="1 rue de la Paix">
                          </div>
                        </div>
                        <div class=row>
                          <div class="form-row form-group col-sm-6">
                            <label for="newCp" class="col-sm-3 col-form-label">CP</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control editableModal" id="newCp" placeholder="10100">
                            </div>
                          </div>
                          <div class="form-row form-group col-sm-6">
                            <label for="newVille" class="col-sm-3 col-form-label">Ville</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control editableModal" id="newVille" placeholder="Paris">
                            </div>
                          </div>
                        </div>
                        <div class="form-row form-group">
                          <label for="newTelephone" class="col-sm-3 col-form-label">Téléphone</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control editableModal" id="newTelephone"
                              placeholder="0123456789">
                          </div>
                        </div>
                        <div class="form-row form-group">
                          <label for="newEmail" class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="email" class="form-control editableModal" id="newEmail"
                              placeholder="nouveau@mail.com">
                          </div>
                        </div>
                        <div class="form-row form-group">
                          <label for="newDomaine" class="col-sm-3 col-form-label">Domaine</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control editableModal" id="newDomaine"
                              placeholder="Vente, artisanat...">
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
                            <input type="text" class="form-control editableModal" id="newEffectif"
                              placeholder="250 (personnes)">
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                      <button type="button" class="btn btn-primary" onclick="addClient()">Enregistrer</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END MODAL-->
            </div>
          </div>
        </form>
        <div class="row">
          <table class="table table-sm table-striped table-hover bg-secondary">
            <thead class="thead-light">
              <tr>
                <th>Id</th>
                <th>Raison Sociale</th>
                <th>#Dpt</th>
              </tr>


            </thead>
            <tbody id="clientsListe" role="button" class="text-white ">

<?php foreach ($customers as $customer): ?>

<tr>
  <th><?= $customer->getId() ?></th>
  <th><?= $customer->getCompanyName() ?></th>
  <th><?= substr($customer->getZip(),3) ?></th>
</tr>

<?php endforeach ?>
              </tbody>
            </table>
        </div>
        <nav class="row justify-content-md-center" aria-label="...">
          <ul id="paginationSearch" class="pagination">

          </ul>
        </nav>
      </div>

      <div class="col-md-8 mt-5 border justify-content-md-center info_client">
        <h2 class="border text-center bg-info" id="clientName">---</h2>
        <div class="row">
          <div class="col-lg-6">
            <form action="#">
              <table class="table text-white table-sm">
                <tbody>
                  <tr class="text-white">
                    <th scope="row">Adresse</th>
                    <td><input type="text" class="form-control-plaintext form-control editableClient" value=""
                        name="adresse" id="clientAdresse" disabled> </td>
                  </tr>
                  <tr>
                    <th scope="row">CP</th>
                    <td><input type="text" class="form-control-plaintext form-control editableClient" value=""
                        name="codePostal" id="clientCp" disabled> </td>
                  </tr>
                  <tr>
                    <th scope="row">Ville</th>
                    <td><input type="text" class="form-control-plaintext form-control editableClient" value=""
                        name="ville" id="clientVille" disabled> </td>
                  </tr>
                  <tr>

                    <th scope="row">Téléphone</th>
                    <td><input type="text" class="form-control-plaintext form-control editableClient" value=""
                        name="telephone" id="clientTelephone" disabled></td>
                  </tr>
                  <tr>
                    <th scope="row">Email</th>
                    <td>
                      <input type="email" class="form-control-plaintext form-control editableClient" value=""
                        name="mail" id="clientEmail" disabled></a>
                    </td>
                    <td>
                      <a href="" id="clientMailTo">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill"
                          fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd"
                            d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                        </svg>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Domaine</th>
                    <td><input type="text" class="form-control-plaintext form-control editableClient" value=""
                        data-toggle="tooltip" name="domaine" id="clientDomaine" disabled></td>
                  </tr>
                  <tr>
                    <th scope="row">Nature</th>
                    <td><input type="text" class="form-control-plaintext form-control editableClient" value=""
                        name="nature" id="clientNature" disabled></td>
                  </tr>
                  <tr>
                    <th scope="row">CA</th>
                    <td><input type="text" class="form-control-plaintext form-control editableClient" value="" name="ca"
                        id="clientCa" disabled></td>
                  </tr>
                  <tr>
                    <th scope="row">Effectif</th>
                    <td><input type="text" class="form-control-plaintext form-control editableClient" value=""
                        name="effectif" id="clientEffectif" disabled></td>
                  </tr>
                </tbody>
              </table>
              <button class="btn btn-danger mt-3" id="modif" onclick=" editClient()" type="button">Modifier
                Client</button>
              <button class="btn btn-info mt-3" id="annuler" style="display:none" onclick="annulation()"
                type="button">Annuler</button>
              <button class="btn btn-success mt-3" id="valider" style="display:none" onclick="validClient()"
                type="button">Enregistrer</button>
            </form>
          </div>
          <div class="col-md-6 ">
            <div class="row ">
              <table class="table text-white col-md-6">
                <tbody>
                  <tr>
                    <th scope="row">ID Client</th>
                    <td id="clientId"></td>
                  </tr>
              </table>
              <table class="table text-white col-md-6">
                <tbody>
                  <tr>
                    <th scope="row">Type</th>
                    <td id="clientType"></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <h4>Nos Contacts avec ce Client</h4>
            <table class="table table-sm table-striped">
              <caption class="text-info"><a href="abi_contacts.html">Voir tous les contacts</a></caption>
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
            <textarea type="text" class="form-control-plaintext form-control editableClient border px-2" value=""
              name="commentaire" id="clientCommentaire" disabled></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require_once 'skeleton/footer.php'?>