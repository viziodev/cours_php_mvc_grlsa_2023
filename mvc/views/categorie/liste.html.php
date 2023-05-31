<?php
 if(Session::isset("errors")) {
      $errors=Session::get("errors");
      Session::unset("errors");
      
 }
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <?php require_once "./../views/inc/nav.html.php"; ?>
    </header>
    <main class="d-flex justify-content-center">
        <div class=" card w-75 mt-3 ">

            <div class=" card-body mt-2">
                <form class="d-flex my-3" style="margin-left: 10px;" method="post" action="<?=BASE_URL?>">
                    <div class="row w-100">
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="Libelle" name="libelle"
                                aria-label="Libelle">
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
                        </div>
                    </div>
            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>