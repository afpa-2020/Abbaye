<?php require_once 'skeleton/header.php' ?>

<div class="container text-white mt-4">
        <div class="row justify-content-md-center">
            <div class = "col-md-3 pr-1">
                <div class="row mt-5 bg-info justify-content-md-center">
                    <h3>Nos Collaborateurs</h3>
                </div>
                <div class="row mt-2">
                    <!--Table BootstrapTable avec barre de recherche, tableau rempli automatiquement avec la base de donnée
                    collaborateurs, pagination, choix du nombre d'affichage, tri par ordre alphabétique-->
                    <table id="table" 
                    class="table table-striped table-sm text-white" 
                    data-search="true" 
                    data-pagination="true"
                    data-page-list="[5, 10, 15]">
                        <thead>
                            <tr>
                                <th data-field = "matricule" data-sortable="true">Matricule</th>
                                <th data-field = "nomCollabo" data-sortable="true">Nom</th>
                            </tr>
                        </thead>

                        <?php foreach ($employees as $employee): ?>

                        <tbody >
                            <tr>
                                <th><?= $employee->getId() ?></th>
                                <th><?= $employee->getLastname() ?></th>
                            </tr>
                        </tbody>

                        <?php endforeach ?>

                    </table>
                </div>
            </div>
            <div class="col-md-8 ml-5 ">
                <div class="row mt-5 bg-info justify-content-md-center">
                    <h3>Informations du collaborateur</h3>
                </div>
                <div class="row mt-2">
                    <!--Affichage des données de chaque collaborateurs-->
                    <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td scope="row"><strong>Nom</strong></td>
                                    <td>Durand</td>
                                    <td><strong>Matricule</strong></td>
                                    <td>100032</td>
                                    <td colspan="2">
                                        <!--Affichage en modal de la photo du collaborateur-->
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                                            Photo
                                        </button>
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <img src="./assets/image/photo.jpg" alt="Photo employé">
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row"><strong>Contrat</strong></td>
                                    <td>CDI</td>
                                    <td><strong>Avenant</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row" ><strong>École</strong></td>
                                    <td></td>
                                    <td><strong>Agence d'intérim</strong></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="2">Date d'embauche</th>
                                    <td>28/03/2005</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row" colspan="2"><strong>Date de fin de contract</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row" colspan="2"><strong>Qualification principal courante</strong></td>
                                    <td>Chef de service</td>
                                    <td><strong>Fonction</strong></td>
                                    <td>Commercial</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row" colspan="2"><strong>Salaire mensuel</strong></td>
                                    <td>2350 €</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <!--Boton de modification des données du collaborateur selectionné-->
                                        <div class="btn-group-toggle text-nowrap text-center" data-toggle="buttons">
                                            <a href="abi_projets.html">
                                                <button type="button" class="btn btn-danger mr-2 text-nowrap" data-toggle="button" aria-pressed="false">Modifier des données</button>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <!--Boton d'ajout d'un collaborateur-->
                                        <div class="btn-group-toggle" data-toggle="buttons">
                                            <a href="abi_projets.html">
                                            <button type="button" class="btn btn-danger mr-2" data-toggle="button" aria-pressed="false">Ajouter un collaborateur</button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php require_once 'skeleton/footer.php' ?>