<?php require_once 'skeleton/header.php'?>

<div class="container text-white mt-4">
        <div class="row justify-content-md-center">
            <div class = "col-3 pr-1">
                <div class="row mt-5 bg-info justify-content-md-center">
                    <h3>Nos Projets</h3>
                </div>
                <div class="row mt-2">
                    <!--Table BootstrapTable avec barre de recherche, tableau rempli automatiquement avec la base de donnée
                    projets, pagination, choix du nombre d'affichage, tri par ordre alphabétique-->
                    <table id="table" 
                    class="table table-sm table-striped table-hover">
                        <thead  class="thead-light">
                            <tr>
                                <th>Code</th>
                                <th>Nom du projet</th>
                            </tr>

                        </thead>
                        <tbody role="button" class="text-white ">

<?php foreach ($projects as $project): ?>

                            <tr>
                                <th>  <?=$project->getId() ?> </th>
                                <th>  <?=str_replace("é","É",$project->getShortname()) ?>  </th>
                            </tr>

<?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-8 ml-5 ">
                <div class="row mt-5 bg-info justify-content-md-center">
                    <h3>Informations du projet</h3>
                </div>
                <div class="row mt-2">
                    <!--Affichage des données de chaque projets-->
                    <table class="table text-white table-striped table-sm">
                            <tbody>
                                <tr>
                                    <td scope="row"><strong>Nom</strong></td>
                                    <td><input type="text" class="form-control-plaintext" id="nomProjet" value="" disabled></td>
                                    <td><strong>Code</strong></td>
                                    <td><input type="text" class="form-control-plaintext" id="codeProjet" value="" disabled></td>
                                    <td><strong>Type</strong></td>
                                    <td>Forfait</td>
                                </tr>
                                <tr>
                                    <td scope="row"><strong>Client</strong></td>
                                    <!--Modal affichage adresse du client et lien vers les contacts-->
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                                            Michelin
                                        </a>
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalCenterTitle">Michelin</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  23 Place des Carmes Dechaux <br>
                                                  63000 Clermont-Ferrand
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="abi_contacts.html">
                                                        <button type="button" class="btn btn-primary">Voir les contacts</button>
                                                    </a>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </td>
                                    <td><strong>Activité</strong></td>
                                    <td>Pneumatique</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row" ><strong>Dates prévues</strong></td>
                                    <td>25/03/2019</td>
                                    <td>au</td>
                                    <td>25/05/2019</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row"><strong>Dates réelles</strong></td>
                                    <td>28/03/2019</td>
                                    <td>au</td>
                                    <td>22/05/2019</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row" colspan="2"><strong>Charge global estimée</strong></td>
                                    <td>300 Heures</td>
                                    <td><strong>Remarques</strong></td>
                                    <td colspan="2">C'est pas bon</td>
                                </tr>
                                <tr>
                                    <td scope="row" colspan="2"><strong>Info générale du projet</strong></td>
                                    <td colspan="2"><strong>Personnes associées</strong></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row"><strong>Langages</strong></td>
                                    <td>HTML/CSS/JavaScript</td>
                                    <td><strong>Commercial</strong></td>
                                    <td>Mr Bernard</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row"><strong>Plateforme</strong></td>
                                    <td>Windows 10</td>
                                    <td><strong>Product Owner</strong></td>
                                    <td>Mr Dupond</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row"><strong>Outils</strong></td>
                                    <td>Visual Studio Code</td>
                                    <td><strong>Scrum Master</strong></td>
                                    <td>Mr Lapin</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td> 
                                        <!--Bouton d'accès aux tâches réalisées du projet selectionné-->
                                        <div class="btn-group-toggle text-center" data-toggle="buttons">
                                            <a href="abi_projets.html">
                                                <button type="button" class="btn btn-success mr-2" data-toggle="button" aria-pressed="false">Tâches réalisés</button>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <!--Bouton d'accès aux users storys du projet selectionné-->
                                        <div class="btn-group-toggle text-center" data-toggle="buttons">
                                            <a href="abi_projets.html">
                                                <button type="button" class="btn btn-success mr-2" data-toggle="button" aria-pressed="false"> User Story</button>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <!--Bouton de modification des données du collaborateur selectionné-->
                                        <div class="btn-group-toggle text-nowrap text-center" data-toggle="buttons">
                                            <a href="abi_projets.html">
                                                <button type="button" class="btn btn-danger mr-2 text-nowrap" data-toggle="button" aria-pressed="false">Modifier des données</button>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <form>
                                            <div class="form-group">
                                                <!--Bouton d'ajout de document au projet selectionné-->
                                                <div class="btn-group-toggle text-nowrap text-center" data-toggle="buttons">
                                                    <button type="button" class="btn btn-danger mr-2" data-toggle="button" aria-pressed="false">Ajouter un document<input type="file" class="form-control-file" id="exampleFormControlFile1"></button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="col text-center">
                                            <!--Bouton de création d'un nouveau projet-->
                                            <div class="btn-group-toggle " data-toggle="buttons">
                                                <a href="abi_projets.html">
                                                <button type="button" class="btn btn-danger mr-2" data-toggle="button" aria-pressed="false">Nouveau projet</button>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php require_once 'skeleton/footer.php'?>