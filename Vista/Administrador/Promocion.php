<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Promociones</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/Administrador/promocion.css"> 
    <script src="../../js/Administrador/promocion.js"></script>
</head>
<body>

<div class="sidebar d-flex flex-column bg-dark text-white p-3">
    <h4 class="text-center mb-4">Menú</h4>

    <div class="d-grid gap-3 flex-grow-1">
        <button class="btn btn-primary text-white" onclick="mostrarSeccion('ver')">
            Ver Promociones
        </button>

        <button class="btn btn-success text-white" onclick="mostrarSeccion('crear')">
            Agregar Promoción
        </button>

        <button class="btn btn-warning text-black" onclick="mostrarSeccion('actualizar')">
            Actualizar Promoción
        </button>

        <button class="btn btn-danger text-black" onclick="mostrarSeccion('eliminar')">
            Eliminar Promoción
        </button>

        <div class="mt-auto">
            <a href="index.php" class="btn btn-secondary w-100">Volver al Menú</a>
        </div>
    </div>
</div>

<div class="contenido flex-grow-1 p-4">
    <?php if (!empty($mensaje)): ?>
        <div class="alert alert-info text-center"><?= $mensaje ?></div>
    <?php endif; ?>

   
    <div id="seccion-ver" class="seccion">
        <h2>Lista de Promociones</h2>
        <?php if (is_array($promociones) && count($promociones) > 0): ?>
            <table class="table table-striped table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Descuento</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>ID Producto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($promociones as $promo): ?>
                        <tr>
                            <td><?= $promo["id_promocion"] ?></td>
                            <td><?= $promo["descripcion"] ?></td>
                            <td><?= $promo["descuento"] ?></td>
                            <td><?= $promo["fecha_inicio"] ?></td>
                            <td><?= $promo["fecha_fin"] ?></td>
                            <td><?= $promo["id_producto"] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-danger">No se encontraron promociones.</p>
        <?php endif; ?>
    </div>

   
    <div id="seccion-crear" class="seccion d-none">
        <div class="card">
            <div class="card-header bg-success text-white">Agregar Promoción</div>
            <div class="card-body">
                <form method="POST">
                    <input type="hidden" name="_action" value="agregar">

                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <input type="text" name="descripcion" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descuento</label>
                        <input type="number" step="0.01" name="descuento" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fecha Inicio</label>
                        <input type="date" name="fecha_inicio" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fecha Fin</label>
                        <input type="date" name="fecha_fin" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ID Producto</label>
                        <input type="number" name="id_producto" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Agregar Promoción</button>
                </form>
            </div>
        </div>
    </div>

   
    <div id="seccion-actualizar" class="seccion d-none">
        <div class="card">
            <div class="card-header bg-warning text-white">Actualizar Promoción</div>
            <div class="card-body">
                <form method="POST">
                    <input type="hidden" name="_action" value="actualizar">

                    <div class="mb-3">
                        <label class="form-label">ID Promoción</label>
                        <input type="number" name="id_promocion" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <input type="text" name="descripcion" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descuento</label>
                        <input type="number" step="0.01" name="descuento" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fecha Inicio</label>
                        <input type="date" name="fecha_inicio" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fecha Fin</label>
                        <input type="date" name="fecha_fin" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ID Producto</label>
                        <input type="number" name="id_producto" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-warning text-white">Actualizar Promoción</button>
                </form>
            </div>
        </div>
    </div>

   
    <div id="seccion-eliminar" class="seccion d-none">
        <div class="card">
            <div class="card-header bg-danger text-white">Eliminar Promoción</div>
            <div class="card-body">
                <form method="POST">
                    <input type="hidden" name="_action" value="eliminar">

                    <div class="mb-3">
                        <label class="form-label">ID Promoción</label>
                        <input type="number" name="id_promocion" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-danger">Eliminar Promoción</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../js/Administrador/promocion.js"></script>
</body>
</html>
