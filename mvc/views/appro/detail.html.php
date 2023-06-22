<div class="d-flex flex-column  w-100" style="margin-left: 13%;">
    <div class="card w-75 mt-3 ">
        <div class="card-body d-flex ">
            <div scope="col-4">Date : <span class='fs-5 fw-bold'>
                    <?=dateToFr($appro->date)?></span> </div>
            <div scope="col-4">Payement : <span class=' text-danger fs-5 fw-bold'>
                    <?=$appro->payer?'Payer':"Impayer"?></span></div>
        </div>
    </div>
    <div class=" card w-75 mt-3 ">

        <div class=" card-body ">
            <h5 class=" card-title " style=" margin-left: 10px;">Liste des Articles a approvisionnes</h4>
                <div class="container mt-3">
                    <div class="table-responsive table-bordered table-light mt-1">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">Article</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Qte Appro</th>
                                    <th scope="col">Montant</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $total=0;
                             if(Session::isset("detailsAppro")):?>

                                <?php
                                   $detailsAppro=Session::get("detailsAppro");
                                   $total=Session::get("total");
                                  foreach($detailsAppro as $detail):?>
                                <tr>
                                    <td> <?=$detail['article']?> </td>
                                    <td> <?=$detail['prix']?> </td>
                                    <td> <?=$detail['qteAppro']?> </td>
                                    <td> <?=$detail['montant']?></td>
                                    <td>
                                        <a class="btn btn-danger btn-sm mr-2" href="#" role="button">-</a>
                                        <a class="btn btn-success btn-sm " href="#" role="button">+</a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                    <form class="my-3 d-flex flex-column " style="margin-left: 10px;" method="post"
                        action="<?=BASE_URL?>">
                        <div class="col-8 row ml-2  mb-2 ">
                            <div class="fw-bold fs-4">Total : <span class="text-danger ">
                                    <?=$total?> CFA
                                </span>
                            </div>

                        </div>
                        <div class="col-3  offset-md-9 float-end">
                            <button type="submit" class="form-control btn btn-primary ">Enregister</button>
                            <input type="hidden" name="page" value="save-appro">
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>