<?php
 if(Session::isset("errors")) {
      $errors=Session::get("errors");
      //Recuperer les donnees du Formulaire
      $data=Session::get("data");
      Session::unset("errors");  
      Session::unset("data"); 
 }
?>
<div class="card mt-5" style="width:40rem; ">
    <div class="card-body">
        <h5 class="card-title">Formulaire de Connexion</h5>
        <form action="<?=BASE_URL?>" method="POST">
            <div class=" mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="login">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Connexion</button>
            <input type="hidden" name="page" value="login">
        </form>
    </div>
</div>