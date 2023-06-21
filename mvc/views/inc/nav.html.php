<div class="container-fluid">
    <nav class="navbar navbar-expand-sm navbar-light bg-info mt-2">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gestion Atelier Couture</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
                aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarID">
                <div class="navbar-nav">

                    <a class="nav-link active" aria-current="page" href="<?=BASE_URL?>/?page=categorie">
                        Categorie</a>

                    <?php if(Role::hasRole("Admin")):?>
                    <a class="nav-link active" aria-current="page" href="<?=BASE_URL?>/?page=article">Article</a>
                    <?php endif?>

                </div>
            </div>
            <div class="navbar navbar-expand-sm navbar-light bg-info mt-2 float-end">
                <div class="text-white " style="margin-right: 20px;">
                    <?=Session::get("userconnect")['nomComplet']." ".Session::get("userconnect")['role']?> </div>
                <a class="nav-link active" aria-current="page" href="<?=BASE_URL?>/?page=logout">Deconnexion</a>
            </div>
    </nav>

</div>