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
    <main>
        <div class="container mt-3">
            <div class="table table-bordered table-light mt-3">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Libelle</th>
                            <th scope="col">Type</th>
                            <th scope="col">Qte</th>
                            <th scope="col">Prix Achat</th>
                            <th scope="col">Fournisseur</th>
                            <th scope="col">Date Production</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($articles as $cat): ?>

                        <tr class="">
                            <td scope="row"> <?=$cat->getId()?> </td>
                            <td><?=$cat->getLibelle()?></td>
                            <td><?=$cat->getType()?></td>
                            <td><?=$cat->getQteStock()?></td>
                            <td><?=$cat->getPrixAchat()?></td>
                            <td><?=$cat->getType()=="ArticleConfection"?$cat->getFournisseur():"-"?></td>
                            <td><?=$cat->getType()=="ArticleVente"?$cat->getDateProduction():"-"?></td>
                        </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
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