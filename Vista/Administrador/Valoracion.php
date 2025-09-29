<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Valoraciones</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/Administrador/valoracion.css"> 
    <script src="../../js/Administrador/valoracion.js"></script>
</head>
<body>

<div class="container-fluid">
  <div class="row">
    
    
    <div class="col-md-3 col-lg-2 sidebar d-flex flex-column bg-dark text-white p-3 min-vh-100">
        <h4 class="text-center mb-4">Menú</h4>

        <div class="d-grid gap-3 flex-grow-1">
            <button class="btn btn-primary" onclick="mostrarSeccion('ver')">Ver Valoraciones</button>
            <button class="btn btn-danger" onclick="mostrarSeccion('eliminar')">Eliminar Valoración</button>

            <div class="mt-auto">
                <a href="index.php" class="btn btn-secondary w-100">Volver al Menú</a>
            </div>
        </div>
    </div>

    <div class="col-md-9 col-lg-10 contenido flex-grow-1 p-4">
        <?php if (!empty($mensaje)): ?>
            <div class="alert alert-info text-center"><?= $mensaje ?></div>
        <?php endif; ?>

      
        <div id="seccion-ver" class="seccion">
            <h2>Lista de Valoraciones</h2>

            <?php if (is_array($valoraciones) && count($valoraciones) > 0): ?>
                <table class="table table-striped table-bordered mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>ID Cliente</th>
                            <th>ID Producto</th>
                            <th>Calificación</th>
                            <th>Comentario</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($valoraciones as $v): ?>
                            <tr>
                                <td><?= $v["id_valoracion"] ?></td>
                                <td><?= $v["id_cliente"] ?></td>
                                <td><?= $v["id_producto"] ?></td>
                                <td><?= $v["calificacion"] ?></td>
                                <td><?= $v["comentario"] ?></td>
                                <td><?= $v["fecha_valoracion"] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-danger">No se encontraron valoraciones.</p>
            <?php endif; ?>
        </div>

        
        <div id="seccion-eliminar" class="seccion d-none">
            <div class="card">
                <div class="card-header bg-danger text-white">Eliminar Valoración</div>
                <div class="card-body">
                    <form method="POST">
                        <input type="hidden" name="_action" value="eliminar">

                        <div class="mb-3">
                            <label class="form-label">ID de la Valoración</label>
                            <input type="number" name="id_valoracion" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-danger">Eliminar Valoración</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
