<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Detalles de Producto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/Administrador/detalle_producto.css"> 
    <script src="../../js/Administrador/detalle_producto.js"></script>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    
    <!-- Sidebar -->
    <div class="col-md-3 col-lg-2 sidebar d-flex flex-column bg-dark text-white p-3 min-vh-100">
        <h4 class="text-center mb-4">Menú</h4>

        <div class="d-grid gap-3 flex-grow-1">
            <button class="btn btn-primary" onclick="mostrarSeccion('ver')">Detalles</button>
            <button class="btn btn-success" onclick="mostrarSeccion('crear')">Agregar</button>
            <button class="btn btn-warning text-white" onclick="mostrarSeccion('actualizar')">Actualizar</button>
            <button class="btn btn-danger" onclick="mostrarSeccion('eliminar')">Eliminar</button>

            <div class="mt-auto">
                <a href="index.php" class="btn btn-secondary w-100">Volver al Menú</a>
            </div>
        </div>
    </div>

    <!-- Contenido -->
    <div class="col-md-9 col-lg-10 contenido flex-grow-1 p-4">
        <?php if (!empty($mensaje)): ?>
            <div class="alert alert-info text-center"><?= $mensaje ?></div>
        <?php endif; ?>

        <!-- Ver detalles -->
        <div id="seccion-ver" class="seccion">
            <h2>Lista de Detalles de Productos</h2>

            <?php if (is_array($detalles)): ?>
                <table class="table table-striped table-bordered mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>ID Detalle</th>
                            <th>Talla</th>
                            <th>Color</th>
                            <th>Imagen</th>
                            <th>ID Producto</th>
                            <th>ID Categoría</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detalles as $d): ?>
                            <tr>
                                <td><?= $d["id_detalle_producto"] ?></td>
                                <td><?= $d["talla"] ?></td>
                                <td><?= $d["color"] ?></td>
                                <td>
                                    <?php if (!empty($d["imagen"])): ?>
                                        <a href="../../<?= htmlspecialchars($d["imagen"]) ?>" target="_blank">
                                            <img src="../../<?= htmlspecialchars($d["imagen"]) ?>" 
                                                 alt="imagen detalle" 
                                                 width="80" height="80">
                                        </a>
                                    <?php else: ?>
                                        <span>Sin imagen</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= $d["id_producto"] ?></td>
                                <td><?= $d["id_categoria"] ?></td>
                                <td>$<?= number_format($d["precio"], 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-danger">No se encontraron detalles.</p>
            <?php endif; ?>
        </div>

        <!-- Crear detalle -->
        <div id="seccion-crear" class="seccion d-none">
            <div class="card">
                <div class="card-header bg-success text-white">Agregar Detalle</div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_action" value="agregar">

                        <div class="mb-3">
                            <label class="form-label">Talla</label>
                            <input type="text" name="talla" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Color</label>
                            <input type="text" name="color" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Imagen</label>
                            <input type="file" name="imagen" class="form-control" accept="image/*" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">ID Producto</label>
                            <input type="number" name="id_producto" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">ID Categoría</label>
                            <input type="number" name="id_categoria" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Precio</label>
                            <input type="number" step="0.01" name="precio" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success">Agregar Detalle</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Actualizar detalle -->
        <div id="seccion-actualizar" class="seccion d-none">
            <div class="card">
                <div class="card-header bg-warning text-white">Actualizar Detalle</div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_action" value="actualizar">

                        <div class="mb-3">
                            <label class="form-label">ID Detalle</label>
                            <input type="number" name="id_detalle_producto" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Talla</label>
                            <input type="text" name="talla" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Color</label>
                            <input type="text" name="color" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Imagen</label>
                            <input type="file" name="imagen" class="form-control" accept="image/*">
                            <small class="text-muted">Si no seleccionas nada, se mantendrá la actual.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">ID Producto</label>
                            <input type="number" name="id_producto" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">ID Categoría</label>
                            <input type="number" name="id_categoria" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Precio</label>
                            <input type="number" step="0.01" name="precio" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-warning text-white">Actualizar Detalle</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Eliminar detalle -->
        <div id="seccion-eliminar" class="seccion d-none">
            <div class="card">
                <div class="card-header bg-danger text-white">Eliminar Detalle</div>
                <div class="card-body">
                    <form method="POST">
                        <input type="hidden" name="_action" value="eliminar">

                        <div class="mb-3">
                            <label class="form-label">ID Detalle</label>
                            <input type="number" name="id_detalle_producto" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-danger">Eliminar Detalle</button>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- cierre contenido -->
  </div> <!-- cierre row -->
</div> <!-- cierre container -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
