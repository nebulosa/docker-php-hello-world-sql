<?php

include_once(realpath(dirname(__FILE__)) . "/include/head.php");

$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$encuesta_obj = new Qr();

$encuesta = $encuesta_obj->getQrGeneradoById($_DB_, $id);

if ($encuesta) {
    if ($encuesta[0]['condicion'] == 0) { ?>

        <div class="container h-100">
            <div class="card">
                <div class="card-body ml-2">
                    Bienvenido
                </div>

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong><?=$encuesta[0]['encuesta'];?></strong> <?=$encuesta[0]['name'];?>
                </div>
            </div>
        </div>
        
        <div class="container h-100 mt-3">
            <div class="form-row align-items-center col-12">
            <form action="validar.php" method="post">
                <div class="col-12">
                    <div class="form-group row">
                        <div class='col-6'>
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" placeholder="Enter Name" id="name">
                        </div>
                        <div class='col-6'>
                            <label for="pwd">Date:</label>
                            <input type="date" class="form-control" placeholder="Enter Date" id="date">
                        </div>
                    
                    </div>

                    
                    <div class="form-group row">
                        <div class='col-6'>
                            <label for="teacher">Teacher's:</label>
                            <input type="text" class="form-control" placeholder="Enter Teacher's" id="teacher">
                        </div>
                        <div class='col-6'>
                            <label for="pwd">Group:</label>
                            <input type="text" class="form-control" placeholder="Enter Group" id="group">
                        </div>    
                    </div>
                </div>
                <hr>

                <?php
                foreach ($encuesta as $clave => $value) {  
                   
                   $respuestas = $encuesta_obj->getRespuestasById($_DB_, $value['pregunta_id']);

                    
                    ?>
                    <div class="form-group row">
                        <label for="staticPregunta" class="col-sm-12 col-form-label"><?=($clave + 1).". ".$value['pregunta'];?></label>
                    </div>

                    <?php
                    foreach ($respuestas as $respuesta) {  ?>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="<?=$value['pregunta_id'];?>" id="<?=$value['pregunta_id'];?>" value="<?=$respuesta['id'];?>">
                            <label class="form-check-label" for="exampleRadios1"><?=$respuesta['opcion'].$respuesta['respuesta'];?></label>
                        </div>
                    <?php } ?>
                    <hr>

                <?php } ?>

                <input type="hidden" name="id" value="<?=$encuesta[0]['id'];?>">    
                <input type="submit" class="btn btn-primary" value="Enviar">
            </form>
            </div>
        </div>

    <?php }else{ ?>

        <div class="card">
            <div class="card-body">
                <div class="alert alert-info" role="alert">
                    La encuesta ya fue llenada.
                </div>
            </div>
        </div>


    <?php }
}else{ ?>
<div class="card">
    <div class="card-body">
        <div class="alert alert-danger" role="alert">
            La encuesta no existe.
        </div>
    </div>
</div>
<?php }
include_once(realpath(dirname(__FILE__)) . "/include/footer.php");