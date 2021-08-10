<?php

include_once(realpath(dirname(__FILE__)) . "/include/head.php");

$qr_obj = new Qr();

$libros_obj = new Libros();
$libros = $libros_obj->getLibros($_DB_);


if (isset($_POST['guardar-qr'])){

    include_once(realpath(dirname(__FILE__)) . "/libs/phpqrcode/qrlib.php");

    $codesDir = realpath(dirname(__FILE__)) . "/img/qr/";   

    $codeFile = 'qr_'.$_POST['libro'].'_'.date('d-m-Y-h-i-s').'.png';

    $codeHash = hash('sha256', $codeFile);

    $content =  $host . "/encuesta.php?id=".$codeHash;

    QRcode::png($content, $codesDir.$codeFile, 'L', 10,5); 

    $lastId = $qr_obj->saveQr($_DB_, $codeFile, $codeHash);

    $lastIdPivot = $qr_obj->getEncuesta($_DB_, $lastId[0]['id'], $_POST['libro']);

    if ($lastIdPivot[0]['id'] > 0){ ?>

    <div class="container h-100">
        <div class="form-row align-items-center">
            <div class="col-auto my-1"> 
                <div class="alert alert-success" role="alert">
                    Código Guardado..."
                </div>

                <form action="generar.php">
                     <input type="submit" class="btn btn-primary" value="Nuevo">
                </form>
            </div>
        </div>
    </div>


    <?php } 

}else{

?>


<form method="post" enctype="multipart/form-data" name="frmGuardar">
<div class="container h-100">
  <div class="form-row align-items-center">
    <div class="col-auto my-1">     
      <select class="custom-select mr-sm-2" id="libro" name='libro'>
        <option selected>Seleccione un Libro...</option>
        <?php
        if (isset($libros)) {
            foreach ($libros as $libro) { ?>
                <option value="<?=$libro['id'];?>"><?=$libro['name'];?></option>
           <?php }
        }
        ?>
      </select>
    </div>

    <div class="col-auto my-1">
      <input type="button" class="btn btn-primary" id="generar-qr" value="Generar QR">
    </div>
  </div>

    <div class="row ml-3" >
        <div class="card" style="width: 18rem;">
            <div id="qrcode" class="mt-2 ml-5"></div>
            <div class="card-body">
                <h5 class="card-title">Código Generado</h5>
                <p class="card-text">Al guardar el Código se guardará la encuensta relacionada al Libro</p>
                <input type="submit" class="btn btn-success" name="guardar-qr" id="guardar-qr" value="Guardar QR">
            </div>
        </div>
    </div>

</div>
</form>
 <?php 
}

include_once(realpath(dirname(__FILE__)) . "/include/footer.php");
?>

<script type="text/javascript">

    var qrcode = new QRCode(document.getElementById("qrcode"), {
	    width : 150,
	    height : 150
    });

    const btn = document.querySelector('#generar-qr');
    const btn_guardar = document.querySelector('#guardar-qr');

    btn.addEventListener("click", makeCode);

   //    btn_guardar.addEventListener("click", saveCode);

    function makeCode (e) {	
        e.preventDefault();	
        var elText = document.getElementById("libro");
        qrcode.makeCode(elText.value);

        var dataURL = document.getElementById('qrcode').toDataURL();

    }

    function saveCode (e) {	
        e.preventDefault();	
        var elText = document.getElementById("libro");
        alert(elText.value);

    }

</script>