<div class="d-flex align-items justify-content-between">
    <div class="display-6">Empleados</div>
    <div class="d-flex align-items-center">
        <a href="<?= $CONTROLLER ?>/bajas" class="mx-3 text-decoration-none" style="font-weight: 500;">Empleados dados de baja</a>
        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#register-modal">Registrar empleado</button>

    </div>
</div>

<table class="table mt-4">
    <thead>
        <tr>
            <td style="width: 12.5%; font-weight: 500;">Nombre</td>
            <td style="width: 12.5%; font-weight: 500;">Puesto</td>
            <td style="width: 12.5%; font-weight: 500;">Departamento</td>
            <td style="width: 12.5%; font-weight: 500;">Contrato</td>
            <td style="width: 12.5%; font-weight: 500;">Pais</td>
            <td style="width: 12.5%; font-weight: 500;">Ciudad</td>
            <td style="width: 12.5%; font-weight: 500;">Direccion</td>
            <td style="width: 12.5%; font-weight: 500;">Acciones</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($employees as $employee) : ?>
            <tr>
                <td style="font-weight: 500;">
                    <a href="<?= $CONTROLLER ?>/data/<?= $employee['id'] ?>"><?= $employee['nombre'] ?></a>
                </td>
                <td><?= $employee['puesto'] ?></td>
                <td><?= $employee['departamento'] ?></td>
                <td><?= $employee['contrato_firmado'] ?></td>
                <td><?= $employee['pais'] ?></td>
                <td><?= $employee['ciudad'] ?></td>
                <td><?= $employee['direccion'] ?></td>
                <td>
                    <i role="button" class="fa-regular fa-trash-can" data-bs-toggle="modal" data-bs-target="#delete-modal-<?= $employee['id'] ?>"></i>
                    <i role="button" class="mx-3 fa-regular fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#edit-modal-<?= $employee['id'] ?>"></i>
                </td>
            </tr>

            <div class="modal fade" id="delete-modal-<?= $employee['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Eliminar a <?= $employee['nombre'] ?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="alert alert-danger">Esta accion es irreversible.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">Cerrar</button>
                            <a href="<?= $CONTROLLER ?>/delete/<?= $employee['id'] ?>" type="submit" class="btn btn-danger">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="edit-modal-<?= $employee['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="<?= $CONTROLLER ?>/update" method="post">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Actualizar empleado</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input name="id" type="hidden" value="<?= $employee['id'] ?>">
                                <div class="form-group">
                                    <label class="form-label">Nombre</label>
                                    <input name="name" type="text" class="form-control" value="<?= $employee['nombre'] ?>" required>
                                </div>
                                <br />
                                <div class="form-group">
                                    <label class="form-label">Puesto</label>
                                    <select name="stand" type="text" class="form-select form-control" required>
                                        <option <?= $employee['puesto'] == 'Gerente' ? 'selected' : null ?>>Gerente</option>
                                        <option <?= $employee['puesto'] == 'Secretaria' ? 'selected' : null ?>>Secretaria</option>

                                    </select>
                                </div>
                                <br />
                                <div class="form-group">
                                    <label class="form-label">Departamento</label>
                                    <select name="department" type="text" class="form-select form-control" required>
                                        <option <?= $employee['departamento'] == 'Informatica' ? 'selected' : null ?>>Informatica</option>
                                        <option <?= $employee['departamento'] == 'Secretaria' ? 'selected' : null ?>>Secretaria</option>
                                        <option <?= $employee['departamento'] == 'Recursos' ? 'selected' : null ?>>Recursos</option>
                                    </select>
                                </div>
                                <br />
                                <div class="form-group">
                                    <label class="form-label">Contrato firmado</label>
                                    <select name="signed-contract" type="text" class="form-select form-control" required>
                                        <option <?= $employee['contrato_firmado'] == 'Si' ? 'selected' : null ?>>Si</option>
                                        <option <?= $employee['contrato_firmado'] == 'No' ? 'selected' : null ?>>No</option>
                                    </select>
                                </div>
                                <br />
                                <div class="form-group">
                                    <label class="form-label">Pais</label>
                                    <select name="country" type="text" class="form-select form-control" required>
                                        <option <?= $employee['pais'] == 'Mexico' ? 'selected' : null ?>>Mexico</option>
                                    </select>
                                </div>
                                <br />
                                <div class="form-group">
                                    <label class="form-label">Ciudad</label>
                                    <select name="city" type="text" class="form-select form-control" required>
                                        <option <?= $employee['ciudad'] == 'Oaxaca' ? 'selected' : null ?>>Oaxaca</option>
                                        <option <?= $employee['ciudad'] == 'Morelos' ? 'selected' : null ?>>Morelos</option>
                                        <option <?= $employee['ciudad'] == 'Reynosa' ? 'selected' : null ?>>Reynosa</option>
                                        <option <?= $employee['ciudad'] == 'Quintana Roo' ? 'selected' : null ?>>Quintana Roo</option>
                                        <option <?= $employee['ciudad'] == 'Tampico' ? 'selected' : null ?>>Tampico</option>
                                        <option <?= $employee['ciudad'] == 'Durango' ? 'selected' : null ?>>Durango</option>
                                        <option <?= $employee['ciudad'] == 'Torreon' ? 'selected' : null ?>>Torreon</option>
                                        <option <?= $employee['ciudad'] == 'Queretaro' ? 'selected' : null ?>>Queretaro</option>
                                        <option <?= $employee['ciudad'] == 'Campeche' ? 'selected' : null ?>>Campeche</option>
                                        <option <?= $employee['ciudad'] == 'CDMX' ? 'selected' : null ?>>CDMX</option>
                                    </select>
                                </div>
                                <br />
                                <div class="form-group">
                                    <label class="form-label">Direccion</label>
                                    <input name="address" type="text" class="form-control" value="<?= $employee['direccion'] ?>" required>
                                </div>
                                <br />
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn text-dark border-dark" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                                <button class="btn btn-warning">Actualizar</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </tbody>
</table>

<?php if (count($employees) == 0) : ?>
    <div class="my-5 text-center" style="font-style: italic;">
        <p>No hay empleados vigentes.</p>
    </div>

<?php endif ?>

<!-- Register modal -->

<div class="modal fade" id="register-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" action="<?= $CONTROLLER ?>/create" method="post">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Registrar empleado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <label class="form-label">Nombre</label>
                    <input name="name" type="text" class="form-control" required>
                </div>
                <br />
                <div class="form-group">
                    <label class="form-label">Puesto</label>
                    <select name="stand" type="text" class="form-select form-control" required>
                        <option>Tecnico</option>
                        <option>Loto</option>
                        <option>Irata N3</option>
                        <option>Lider</option>
                        <option>HSE</option>
                        <option>Irata N1</option>

                    </select>
                </div>
                <br />
                <div class="form-group">
                    <label class="form-label">Departamento</label>
                    <select name="department" type="text" class="form-select form-control" required>
                        <option>Administrativo</option>
                        <option>Servicios</option>
                        <option>Seguridad</option>
                    </select>
                </div>
                <br />
                <div class="form-group">
                    <label class="form-label">Contrato firmado</label>
                    <select name="signed-contract" type="text" class="form-select form-control" required>
                        <option>Si</option>
                        <option>No</option>
                    </select>
                </div>
                <br />
                <div class="form-group">
                    <label class="form-label">Pais</label>
                    <select name="country" type="text" class="form-select form-control" required>
                        <option>Mexico</option>

                    </select>
                </div>
                <br />
                <div class="form-group">
                    <label class="form-label">Ciudad</label>
                    <select name="city" type="text" class="form-select form-control" required>
                        <option>Oaxaca</option>
                        <option>Morelos</option>
                        <option>Reynosa</option>
                        <option>Quintana Roo</option>
                        <option>Tampico</option>
                        <option>Durango</option>
                        <option>Torreon</option>
                        <option>Queretaro</option>
                        <option>Campeche</option>
                        <option>CDMX</option>
                    </select>
                </div>
                <br />
                <div class="form-group">
                    <label class="form-label">Direccion</label>
                    <input name="address" type="text" class="form-control" required>
                </div>
                <br />
            </div>

            <div class="modal-footer">
                <button type="button" class="btn text-dark border-dark" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                <button class="btn btn-primary">Registrar</button>
            </div>
        </form>
    </div>
</div>