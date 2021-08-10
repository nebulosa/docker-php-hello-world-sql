<?php

include_once(realpath(dirname(__FILE__)) . "/include/head.php");

$id = (isset($_POST['id'])) ? $_POST['id'] : null;

if ($id){
    $encuesta_obj = new Qr();
    $encuesta = $encuesta_obj->setEncuestaById($_DB_, $id);
}

?>
<div class="container h-100">
    <div class="form-row align-items-center">
        <div class="col-auto my-1"> 
            <div class="alert alert-success" role="alert">
                Gracias, La encuesta fue enviada..."
            </div>
        </div>
    </div>
</div>

<?php
include_once(realpath(dirname(__FILE__)) . "/include/footer.php");