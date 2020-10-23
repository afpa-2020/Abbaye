<?php

use App\Repository\ProjectRepository;

require_once 'skeleton/header.php'?>

<div class="container text-white mt-4">
        <div class="row justify-content-md-center">
            <div class = "col-3 pr-1">
                <div class="row mt-5 bg-info justify-content-md-center ">
                    <h3>Nos Projets</h3>
                </div>
                <div class="row mt-2">
                    <!--Table BootstrapTable avec barre de recherche, tableau rempli automatiquement avec la base de donnée
                    projets, pagination, choix du nombre d'affichage, tri par ordre alphabétique-->
                    <table id="table" 
                    class="table bg-secondary table-sm table-striped table-hover">
                        <thead  class="thead-light">
                            <tr>
                                <th>Code</th>
                                <th>Nom du projet</th>
                            </tr>

                        </thead>
                        <tbody role="button" class="text-white" onclick="">

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
                                    <td scope="row" ><strong>Client</strong></td>
                                    <!--Modal affichage adresse du client et lien vers les contacts-->
                                    <td id="projectClient"></td>
                                </tr>
                                <tr>
                                    <td scope="row"><strong>Projet</strong></td>
                                    <td id="project"></td>
                                </tr>
                                <tr>
                                    <td scope="row"><strong>Contact</strong></td>
                                    <td id="projectContact"></td>
                                </tr>
                                <tr>
                                    <td scope="row"><strong>Type de contract</strong></td>
                                    <td id="projectContract"></td>
                                </tr>
                                <tr>
                                    <td scope="row"><strong>Date de début</strong></td>
                                    <td id="projectStart"></td>
                                </tr>
                                <tr>
                                    <td> 
                                        <!--Bouton d'accès aux tâches réalisées du projet selectionné-->
                                        <div class="btn-group-toggle text-center" data-toggle="buttons">
                                            <a href="/projects">
                                                <button type="button" class="btn btn-success mr-2" data-toggle="button" aria-pressed="false">Tâches réalisés</button>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <!--Bouton d'accès aux users storys du projet selectionné-->
                                        <div class="btn-group-toggle text-center" data-toggle="buttons">
                                        <a href="/projects">
                                                <button type="button" class="btn btn-success mr-2" data-toggle="button" aria-pressed="false"> User Story</button>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <!--Bouton de modification des données du collaborateur selectionné-->
                                        <div class="btn-group-toggle text-nowrap text-center" data-toggle="buttons">
                                        <a href="/projects">
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
                                            <a href="/projects">
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