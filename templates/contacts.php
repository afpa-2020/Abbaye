<?php require_once 'skeleton/header.php' ?>

<div class="d-flex flex-column">
        <div class="row justify-content-center my-1 mb-2 mx-1 ">
            <div class = "col-md-4">
                <div class="row mt-5 bg-info justify-content-md-center">
                    <h3>Nos Contacts</h3>
                </div>
        <div class="group">
            <form action="#" method="GET" id="search_clients">
                <div class="row mt-2 mb-2">
                    <div class="col-md-6">
                        <div class="row">
                            <input class="form-control" type="text" placeholder="Rechercher un Client" autofocus>
                        </div>
                        <div class="form-check mt-3">
                            <div class="row">
                                <input class="form-check-input" type="radio" name="tri"><label for="tri"></label> Trier par Nom
                            </div>
                            <div class="row">
                                <input class="form-check-input" type="radio" name="tri"><label for="tri"></label> Trier par Fonction
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-row">
                            <select name="nb_resultats" id="nb_resultats_selec">
                                <option selected>Nb de résultats</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                            </select>
                        </div>
                        <div class="form-row my-1">
                            <button class="btn btn-primary">Rechercher</button>
                        </div>
                        <div class="form-row my-1">
                            <button class="btn btn-danger">Ajouter un Contact</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
                
                <div class="row">
                    <table class="table text-white table-sm table-striped affichage bg-secondary">
                        <thead class="thead-light">
                          <tr>
                            <th >Nom</th>
                            <th>Prénom</th>
                            <th>Fonction</th>
                          </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($contacts as $contact): ?>

                          <tr>
                              <th><?= $contact->getLastname() ?></th>
                              <th><?= $contact->getFirstname() ?></th>
                              <th><?= $contact->getRole() ?></th>
                          </tr>
                          
                          <?php endforeach ?>
                        </tbody>

                      </table>
                </div>
                <nav class = "row justify-content-md-center" aria-label="...">
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
            
            <div class="col-md-8 mt-5 border justify-content-md-center info_client">
              <h2 class="border text-center bg-info">Ubisoft Entertainment</h2>
                <div class="row">
                    <div class="col-lg-6">
                        <table class="table">
                            <tbody>
                              <tr>
                                <th>Nom</th>
                                <td>Mambo</td>
                              </tr>
                              <tr>
                                <th>Prénom</th>
                                <td>Jacky</td>
                              </tr>
                              <tr>
                                <th>Téléphone</th>
                                <td>07 00 87 83 41</td>
                              </tr>
                              <tr>
                                <th >Email</th>
                                <td>
                                    <a href="mailto:ubi.ubi@ubisoft.com">mambo@ubisoft.com</a>
                                </td> 
                              </tr>
                              <tr>
                                <th>Fonction</th>
                                <td>C</td>
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
                                <th >1</th>
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