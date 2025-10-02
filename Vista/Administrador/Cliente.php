<?php

$clientes = $clientes ?? [];
$mensaje = $mensaje ?? "";
?>

<div class="container">
    <?php if (!empty($mensaje)) echo $mensaje; ?>

    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Listado de Clientes</h5>
            <div>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregar">
                    <i class="fas fa-plus"></i> Agregar
                </button>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalActualizar">
                    <i class="fas fa-edit"></i> Actualizar
                </button>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminar">
                    <i class="fas fa-trash"></i> Eliminar
                </button>
            </div>

        </div>

        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($clientes)): ?>
                        <?php foreach ($clientes as $cliente): ?>
                            <tr>
                                <td><?= htmlspecialchars($cliente['id_cliente']) ?></td>
                                <td><?= htmlspecialchars($cliente['nombre']) ?></td>
                                <td><?= htmlspecialchars($cliente['apellido']) ?></td>
                                <td><?= htmlspecialchars($cliente['correo_electronico']) ?></td>
                                <td><?= htmlspecialchars($cliente['telefono'] ?? '') ?></td>
                                <td><?= htmlspecialchars($cliente['direccion'] ?? '') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6" class="text-center">No hay clientes registrados.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="modalAgregar" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="index.php?opcion=cliente">
        <input type="hidden" name="_action" value="agregar">
        <div class="modal-header">
          <h5 class="modal-title">Agregar Cliente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-2">
            <label class="form-label">Nombre</label>
            <input class="form-control" type="text" name="nombre" placeholder="Ingrese nombre" required>
          </div>
          <div class="mb-2">
            <label class="form-label">Apellido</label>
            <input class="form-control" type="text" name="apellido" placeholder="Ingrese apellido" required>
          </div>
          <div class="mb-2">
            <label class="form-label">Contraseña</label>
            <input class="form-control" type="password" name="contrasena" placeholder="Ingrese contraseña" required>
          </div>
          <div class="mb-2">
            <label class="form-label">Dirección</label>
            <input class="form-control" type="text" name="direccion" placeholder="Ingrese dirección" required>
          </div>
          <div class="mb-2">
            <label class="form-label">Teléfono</label>
            <input class="form-control" type="tel" name="telefono" placeholder="Ingrese teléfono" required>
          </div>
          <div class="mb-2">
            <label class="form-label">Correo electrónico</label>
            <input class="form-control" type="email" name="correo_electronico" placeholder="ejemplo@correo.com" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Agregar</button>
        </div>
      </form>
    </div>
  </div>
</div>




<div class="modal fade" id="modalActualizar" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="index.php?opcion=cliente">
        <input type="hidden" name="_action" value="actualizar">
        <div class="modal-header">
          <h5 class="modal-title">Actualizar Cliente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-2">
            <label class="form-label">ID Cliente</label>
            <input class="form-control" type="number" name="id_cliente" placeholder="ID del cliente" required>
          </div>
          <div class="mb-2">
            <label class="form-label">Nombre</label>
            <input class="form-control" type="text" name="nombre" placeholder="Ingrese nombre" required>
          </div>
          <div class="mb-2">
            <label class="form-label">Apellido</label>
            <input class="form-control" type="text" name="apellido" placeholder="Ingrese apellido" required>
          </div>
          <div class="mb-2">
            <label class="form-label">Contraseña</label>
            <input class="form-control" type="password" name="contrasena" placeholder="Ingrese contraseña" required>
          </div>
          <div class="mb-2">
            <label class="form-label">Dirección</label>
            <input class="form-control" type="text" name="direccion" placeholder="Ingrese dirección" required>
          </div>
          <div class="mb-2">
            <label class="form-label">Teléfono</label>
            <input class="form-control" type="tel" name="telefono" placeholder="Ingrese teléfono" required>
          </div>
          <div class="mb-2">
            <label class="form-label">Correo electrónico</label>
            <input class="form-control" type="email" name="correo_electronico" placeholder="ejemplo@correo.com" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-warning">Actualizar</button>
        </div>
      </form>
    </div>
  </div>
</div>

     



<div class="modal fade" id="modalEliminar" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="index.php?opcion=cliente">
        <input type="hidden" name="_action" value="eliminar">
        <div class="modal-header">
          <h5 class="modal-title">Eliminar Cliente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-2">
            <label class="form-label">ID Cliente</label>
            <input class="form-control" name="id_cliente" type="number" required>
          </div>
          <p class="text-danger"> Esta acción no se puede deshacer</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </div>
      </form>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

