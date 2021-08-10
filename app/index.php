<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once(realpath(dirname(__FILE__)) . "/include/head.php");

$qr_obj = new Qr();
$qrs = $qr_obj->getQrGenerados($_DB_);

?>

<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center mt-3">
    <div class="row">
    <div class="col-md-8">
        <h1 class="page-header">CÓDIGOS</h1>
    </div>

    <div class="col-lg-12">
        <div class="ibox ">
            <form action="generar.php">
                <input type="submit" class="btn btn-primary" value="Nuevo">
            </form>
            <div class="ibox-content">
                <table class="table table-bordered table-hover">
                    <thead>
                        <th class="text-center">ID</th>
                        <th class="text-center">Libro</th>
                        <th class="text-center">Codigo</th>
                        <th class="text-center">Condición</th>
                        <th class="text-center"></th>
                    </thead>
                    <tbody>
                    <?php
                        if ($qrs) {
                            $codesDir = "./img/qr/";  
                            foreach ($qrs as $qr) { 

                                ?>
                                <tr>
                                    <td class="align-middle"><?= $qr['id']; ?></td>
                                    <td class="align-middle"><?= $qr['name']; ?></td>
                                    <td class="text-center">
                                        <img src="<?= $codesDir . $qr['image']; ?>" width="100" class='imgQr' id=<?=$qr['image'];?> alt='<?=$qr['name'];?>'>
                                    </td>
                                    <td class="align-middle">
                                        <?php
                                        echo $condicion = ($qr['condicion'] == 1) ? 'Usado' : '';
                                        ?>
                                    </td>
                            </tr>


                          <?php  }
                        }else{ ?>
                            <tr>
                                <td>No hay registros</td>
                            </tr>
                       <?php }
                       
                    ?>
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="imgQr">
    <div id="caption"></div>
</div>

<?php
include_once(realpath(dirname(__FILE__)) . "/include/footer.php");
?>

<script src="./assets/js/app.js"></script>