<?php require_once 'skeleton/header.php' ?>

<div class="d-flex flex-column">
    <div class="justify-content-center row m-1 mb-2 ">

        <div class="bg-secondary col-md-4 col-12 rounded m-1 ">
            <h3 class="bg-info mt-1 rounded text-center ">
                Nos Projets
            </h3>

            <div class="col-12">

                <form action="#" method="GET" id="search_projects">
                    <div class="row mt-2 mb-2">
                        <input class="form-control" type="text" placeholder="Rechercher un Client" name="search" autofocus>
                </form>

            </div>
        </div>
        <table id="table" class="table bg-secondary table-sm table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Code</th>
                    <th>Nom du projet</th>
                </tr>

            </thead>
            <tbody role="button" class="text-white" onclick="">

                <?php foreach ($projects as $project) : ?>

                    <tr onclick="select_project(<?= $project->getId() ?>)">
                        <th> <?= $project->getId() ?> </th>
                        <th> <?= str_replace("é", "É", $project->getShortname()) ?> </th>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <nav class=>
            <ul class="pagination justify-content-center">
                <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                    <a href="/projects?page=<?= 1 . "&search" . $_GET['search'] ?>" class="page-link"> |< </a> </li> <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a href="/projects?page=<?= ($currentPage - 1) . "&search=" . $_GET['search'] ?>" class="page-link">
                                < </a> </li> <?php for ($page = ($currentPage - 2); $page < $currentPage + 3; $page++) : ?> <?php if ($page > 0 && $page <= $pages) : ?> <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                    <a href="/projects?page=<?= $page . "&search=" . $_GET['search'] ?>" class="page-link"><?= $page ?></a>
                </li>
            <?php endif ?>
        <?php endfor ?>

        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
            <a href="/projects?page=<?= ($currentPage + 1) . "&search=" . $_GET['search'] ?>" class="page-link"> > </a>
        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
            <a href="/projects?page=<?= $pages . "&search" . $_GET['search'] ?>" class="page-link"> >| </a>
        </li>
            </ul>
        </nav>
    </div>
    <div class="bg-secondary col-md-7 col-12 rounded m-1">
        <h3 class="bg-info mt-1 rounded text-center " id="projectName">
            Informations du projet
        </h3>
        <div class="mt-8">
            <!--Affichage des données de chaque projets-->
            <table class="table text-white table-striped table">
                <tbody>
                    <tr>
                        <td scope="row"><strong>Client</strong></td>
                        <!--Modal affichage adresse du client et lien vers les contacts-->
                        <td id="projectClient"></td>
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

<?php require_once 'skeleton/footer.php' ?>