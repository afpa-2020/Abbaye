<?php require_once 'skeleton/header.php' ?>
<div class="d-flex flex-column">
    <div class="justify-content-center row my-1 mb-2 mx-1 ">

        <div class="bg-secondary col-md-4 col-12 rounded my-1 mx-1 ">
            <h3 class="bg-info mt-1 rounded text-center ">
                Nos collaborateurs
            </h3>

            <form action="#" method="GET" id="search_employees">
                <div class="row mt-2 mb-2">
                    <div class="col-md-6">
                        <div class="row">
                            <input class="form-control" type="text" placeholder="Rechercher un Employée" name="search" autofocus>
                        </div>
                    </div>
            </form>
            <table id="table" class="table table-striped table-sm text-white bg-secondary" data-search="true" data-pagination="true" data-page-list="[5, 10, 15]">
                <thead>
                    <tr>
                        <th data-field="matricule" data-sortable="true">Matricule</th>
                        <th data-field="nomCollabo" data-sortable="true">Nom</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($employees as $employee) : ?>

                        <tr onclick="select_employee(<?= $employee->getId() ?>)">
                            <th><?= $employee->getId() ?></th>
                            <th><?= $employee->getLastname() ?></th>
                        </tr>

                    <?php endforeach ?>
                </tbody>

            </table>

            <nav class=>
      <ul class="pagination justify-content-center">
 <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
            <a href="/employees?page=<?= 1 . "&search" . $_GET['search'] ?>" class="page-link"> |< </a>
          </li> 
        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
          <a href="/employees?page=<?= ($currentPage - 1) . "&search=" . $_GET['search'] ?>" class="page-link"> < </a> 
         </li>  
         
      
        <?php for ($page = ($currentPage-2);$page < $currentPage+3; $page++) : ?>
          <?php if ($page>0 && $page <= $pages) : ?>

        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
          <a href="/employees?page=<?= $page . "&search=" . $_GET['search'] ?>" class="page-link"><?= $page ?></a>
        </li>
        <?php endif ?>
      <?php endfor ?>
      
      <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
        <a href="/employees?page=<?= ($currentPage + 1) . "&search=" . $_GET['search'] ?>" class="page-link"> > </a>
        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
          <a href="/employees?page=<?= $pages . "&search" . $_GET['search'] ?>" class="page-link"> >| </a>
      </li>
      </ul>
    </nav>

        </div>
    </div>

    <div class="bg-secondary col-md-7 col-12 rounded my-1 mx-1">
        <div class="row mt-2">
            <h3 class="bg-info mt-1 rounded text-center ">
                Informations sur le collaborateur
            </h3>
            <div class=" mt-2">

                <!--Affichage des données de chaque collaborateurs-->
                <table class="table table-striped text-white">
                    <tbody>
                        <tr>
                            <td scope="row"><strong>Nom</strong></td>
                            <td id='employeeName'>Durand</td>
                            <td><strong>Matricule</strong></td>
                            <td id="employeeId">100032</td>
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
                            <td id="employeeContract">CDI</td>
                            <td><strong>Avenant</strong></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row"><strong>École</strong></td>
                            <td></td>
                            <td><strong>Agence d'intérim</strong></th>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row" colspan="2">Date d'embauche</th>
                            <td id="employeeHire">28/03/2005</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row" colspan="2"><strong>Date de fin de contract</strong></td>
                            <td id="employeeDismissed"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row" colspan="2"><strong>Qualification principal courante</strong></td>
                            <td>Chef de service</td>
                            <td><strong>Fonction</strong></td>
                            <td id="employeeRole">Commercial</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row" colspan="2"><strong>Salaire mensuel</strong></td>
                            <td id="employeeSalary">2350 €</td>
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