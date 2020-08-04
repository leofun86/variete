<?php
    require 'conexion.php';
    $res_categorias = $mysqli->query("SELECT * FROM categorias");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/favicon.png" sizes="64x64">
    <title>Conversor de datos a PDF</title>
    <!-- Bootstrap && JQuery && FONTAWESOME -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">    
</head>
<body>
    <div class="container">
        <br>
        <div class="text-center text-white mb-3">
            <h2>Data to PDF v1.0</h2>
            <h3 class="mb-0" style="font-size:1.5rem;">
                <i class="fa fa-database"></i>
                    <i class="fa fa-long-arrow-right"></i>
                <i class="fa fa-table"></i>
                    <i class="fa fa-long-arrow-right"></i>
                <i class="fa fa-file-pdf-o"></i>
            </h3>
            
            <br>
            <form action="#" method="post" class="form-inline" style="display:inline-block;">
                <div class="form-group">
                    <select name="cat" class="custom-select my-1 mr-sm-2">
                        <option value="">Seleccionar categoría</option>
                        <?php foreach ($res_categorias as $nombre_cat): ?>
                            <option value="<?php echo $nombre_cat['IdCategoria']; ?>"><?php echo $nombre_cat['NombreC']; ?></option>
                        <?php endforeach ?>
                    </select>
                    <button type="submit" name="mostrar" id="btn_submit" class="btn btn-primary my-1">Buscar productos</button>
                </div>
            </form>
            <?php
                if (isset($_POST['mostrar']) && $_POST['cat'] !== '') {
                    sleep(2);
                    $cat = $_POST['cat'];
                    $result_prods = $mysqli->query("SELECT p.CodigoP, p.NombreP, p.Precio, c.IdCategoria FROM productos AS p INNER JOIN categorias AS c ON p.IdCategoria = c.IdCategoria WHERE c.IdCategoria=$cat");
            ?>
        </div>
        <h1 class="bg-primary text-white pt-2 pb-3 px-1 text-center mb-0 head-table">Lista de productos </h1>
        <table class="table table-primary my-0 table_result">
            <thead>
                <tr>
                    <td><b>Id</b></td>
                    <td><b>Producto</b></td>
                    <td><b>Precio</b></td>
                </tr>
            </thead>
            <tbody>
                <center>
                    <img class="gif_loading mt-4"/>
                </center>
                <?php            
                    while($reg = $result_prods->fetch_array(MYSQLI_BOTH)) {
                        echo "
                            <tr>
                                <td>".$reg['CodigoP']."</td>
                                <td>".$reg['NombreP']."</td>
                                <td>$ ".$reg['Precio']."</td>
                            </tr>
                        ";
                    }
                    $mysqli->close();
                ?> 
            </tbody>
        </table>
        <div class="text-white py-2 text-center">
            <a class="btn btn-danger text-white" id="btn_print" href="reporte_general.php?id_cat=<?php echo $cat; ?>" target="_blank">
                <i class="fa fa-file-pdf-o"></i>&nbsp;
                Convertir a PDF
            </a>
        </div>

        <?php } else { sleep(2); ?>
            <h1 class="bg-primary text-white pt-2 pb-3 px-1 text-center mb-0 head-table mt-3">Lista de productos</h1>
            <table class="table table-primary my-0 table_result">
                <thead>
                    <tr>
                        <td><b>Producto</b></td>
                        <td><b>Cantidad</b></td>
                        <td><b>Precio</b></td>
                    </tr>
                </thead>
                <tbody>
                    <center>
                       <img class="gif_loading mt-4" />
                    </center>
                    <tr>
                        <td colspan="3">
                            <div class="alert alert-danger" role="alert">No hay información</div>
                        </td>
                    </tr> 
                </tbody>
            </table>
        <?php } ?>
    </div>
    <div id="footer" class="text-center text-white mt-2">Made with&nbsp;&nbsp;<i class="fa fa-heart"></i>&nbsp;&nbsp;by <a href="https://proyect1.000webhostapp.com/" target="_blank">Leo Funes</a> - <?php echo date('Y'); ?></div>
    <script>
        const btn_submit = document.getElementById('btn_submit');
        const btn_print = document.getElementById('btn_print');
        const loading = document.querySelector('.gif_loading');
        const table = document.querySelector('.table_result');
        loading.style.display='none'; loading.style.width='50px';
        loading.setAttribute('src', 'assets/cargando_gif.gif');
        btn_submit.addEventListener('click', ()=>{
            loading.style.display='block';
            table.style.display='none';
            btn_print.style.display='none';
        });
    </script>
</body>
</html>