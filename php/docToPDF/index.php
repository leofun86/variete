<?php
    include 'conexion.php';
    $res_categorias = $mysqli->query("SELECT * FROM Categorias");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes PDF</title>
    <!-- Bootstrap && JQuery && FONTAWESOME -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <br>
        <h1>Ejemplo de reporte PDF</h1>
        <br>
        <form action="#" method="post" class="form-inline">
            <div class="form-group">
                <label for="categoria" class="my-1 mr-2">Categoría</label>
                <select name="cat" class="custom-select my-1 mr-sm-2">
                    <option value="">Seleccionar</option>
                    <?php foreach ($res_categorias as $nombre_cat): ?>
                        <option value="<?php echo $nombre_cat['IdCategoria']; ?>"><?php echo $nombre_cat['NombreC']; ?></option>
                    <?php endforeach ?>
                </select>
                <button type="submit" name="mostrar" class="btn btn-primary my-1">Mostrar</button>
            </div>
        </form>
        <?php
            if (isset($_POST['mostrar']) && $_POST['cat'] !== '') {
                $cat = $_POST['cat'];
                $result_prods = $mysqli->query("SELECT p.CodigoP, p.NombreP, p.Precio, c.IdCategoria FROM productos AS p INNER JOIN categorias AS c ON p.IdCategoria = c.IdCategoria WHERE c.IdCategoria = $cat");
            
        ?>
        <br><br>
        <table class="table table-hover">
            <h1>Lista de productos </h1>
            <thead>
                <tr>
                    <td><b>Producto</b></td>
                    <td><b>Cantidad</b></td>
                    <td><b>Precio</b></td>
                </tr>
            </thead>
            <tbody>
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
        <i class="fa fa-print"></i>&nbsp;
        <a href="reporte_general.php?id_cat=<?php echo $cat; ?>" target="_blank">Imprimir</a>
        

        <?php } else { ?>
            <table class="table table-hover">
                <h1>Lista de productos</h1>
                <thead>
                    <tr>
                        <td><b>Producto</b></td>
                        <td><b>Cantidad</b></td>
                        <td><b>Precio</b></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3">
                            <div class="alert alert-danger" role="alert">No hay información</div>
                        </td>
                    </tr> 
                </tbody>
            </table>
        <?php } ?>
    </div>
</body>
</html>