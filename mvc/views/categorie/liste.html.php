<?php
use App\Core\Session;
 if(Session::isset("errors")) {
      $errors=Session::get("errors");
      Session::unset("errors");  
 }
?>

<div class=" card w-75 mt-3 ">

    <div class=" card-body mt-2">
        <form class="d-flex my-3" style="margin-left: 10px;" method="post" action="<?=BASE_URL?>">
            <div class="row w-100">
                <div class="col-6">
                    <input type="text" class="form-control" placeholder="Libelle" name="libelle" aria-label="Libelle">
                </div>
                <div class="col-2 ml-2">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>

            <input type="hidden" name="page" value="add-categorie">

        </form>
        <div class="text-danger" style="margin-left: 10px;">
            <?= $errors['libelle']??"" ?>
        </div>
        <h5 class=" card-title " style=" margin-left: 10px;">Liste des Categorie</h4>
            <div class="container mt-3">
                <div class="table-responsive table-bordered table-light mt-3">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Libelle</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($categories as $cat): ?>

                            <tr class="">
                                <td scope="row"> <?=$cat->getId()?> </td>
                                <td><?=$cat->getLibelle()?></td>

                            </tr>

                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination float-end">
                            <?php
                              if(!$paginator->isFirst()): 
                            ?>
                            <li class="page-item"><a class="page-link"
                                    href="<?=BASE_URL.'/?page=categorie&pagination='.$paginator->getPage()-1?>">Precedent</a>
                            </li>
                            <?php
                               endif
                              ?>
                            <?php 
                                for ($i=1; $i <=$paginator->getPageCount() ; $i++): 
                             ?>
                            <li class="page-item  <?=$paginator->getPage()==$i?'active':'' ?>"><a class="page-link"
                                    href="<?=BASE_URL.'/?page=categorie&pagination='.$i?>">
                                    <?=$i?></a>
                            </li>
                            <?php endfor ?>
                            <?php
                              if(!$paginator->isLast()): 
                            ?>
                            <li class=" page-item"><a class="page-link"
                                    href="<?=BASE_URL.'/?page=categorie&pagination='.$paginator->getPage()+1?>">Suivant</a>
                            </li>
                            <?php
                               endif
                              ?>
                        </ul>
                    </nav>
                </div>
            </div>
    </div>
</div>