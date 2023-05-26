<div class="d-flex align-items justify-content-between">
    <div class="display-6">Articulos</div>
    <div class="d-flex align-items-center">
        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#register-modal">Registrar articulo</button>

    </div>
</div>

<table class="table mt-4">
    <thead>
        <tr>
            <td style="width: 12.5%; font-weight: 500;">Numero de serie</td>
            <td style="width: 12.5%; font-weight: 500;">Nombre</td>
            <td style="width: 12.5%; font-weight: 500;">Stock</td>
            <td style="width: 12.5%; font-weight: 500;">Descripcion</td>
            <td style="width: 12.5%; font-weight: 500;">Marca</td>
            <td style="width: 12.5%; font-weight: 500;">Modelo</td>
            <td style="width: 12.5%; font-weight: 500;">Nombre del responsable</td>
            <td style="width: 12.5%; font-weight: 500;">Acciones</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article) : ?>
            <tr>
                <td><?= $article['numero_serie'] ?></td>
                <td><?= $article['nombre'] ?></td>
                <td><?= $article['stock'] ?></td>
                <td><?= $article['descripcion'] ?></td>
                <td><?= $article['marca'] ?></td>
                <td><?= $article['modelo'] ?></td>
                <td><?= $article['nombre_responsable'] ?></td>
                <td>
                    <i role="button" class="fa-regular fa-trash-can" data-bs-toggle="modal" data-bs-target="#delete-modal-<?= $article['id'] ?>"></i>
                    <i role="button" class="mx-3 fa-regular fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#edit-modal-<?= $article['id'] ?>"></i>
                </td>
            </tr>
            <div class="modal fade" id="delete-modal-<?= $article['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Eliminar al articulo <?= $article['nombre'] ?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="alert alert-danger">Esta accion es irreversible.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">Cerrar</button>
                            <a href="<?= $CONTROLLER ?>/delete/<?= $article['id'] ?>" type="submit" class="btn btn-danger">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="edit-modal-<?= $article['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="<?= $CONTROLLER ?>/update" method="post">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Registrar articulo</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <input type="hidden" name="id" value="<?= $article['id'] ?>">
                                <div class="form-group">
                                    <label class="form-label">Numero de serie</label>
                                    <input name="serial" type="text" value="<?= $article['numero_serie'] ?>" class="form-control" required>
                                </div>
                                <br />
                                <div class="form-group">
                                    <label class="form-label">Nombre</label>
                                    <input name="name" type="text" value="<?= $article['nombre'] ?>" class="form-control" required>
                                </div>
                                <br />
                                <div class="form-group">
                                    <label class="form-label">Stock</label>
                                    <input name="stock" type="number" value="<?= $article['stock'] ?>" class="form-control" required>
                                </div>
                                <br />
                                <div class="form-group">
                                    <label class="form-label">Nombre del responsable</label>
                                    <input name="responsible-name" type="text" value="<?= $article['nombre_responsable'] ?>" class="form-control" required>
                                </div>
                                <br />
                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <input name="description" type="text" value="<?= $article['descripcion'] ?>" class="form-control" required>
                                </div>
                                <br />
                                <div class="form-group">
                                    <label class="form-label">Marca</label>
                                    <select name="brand-id" class="form-control select-control" required>
                                        <?php foreach ($brands as $brand) : ?>
                                            <option <?= $article['marca'] == $brand['nombre'] ? 'selected' : null ?> value="<?= $brand['id'] ?>"><?= $brand['nombre'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <br />
                                <div class="form-group">
                                    <label class="form-label">Modelo</label>
                                    <select name="model-id" class="form-control select-control" required>
                                        <?php foreach ($models as $model) : ?>
                                            <option <?= $article['modelo'] == $model['nombre'] ? 'selected' : null ?> value="<?= $model['id'] ?>"><?= $model['nombre'] ?></option>
                                        <?php endforeach ?>
                                    </select>
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

<?php if (count($articles) == 0) : ?>
    <div class="my-5 text-center" style="font-style: italic;">
        <p>No hay articulos.</p>
    </div>

<?php endif ?>

<!-- Register modal -->

<div class="modal fade" id="register-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" action="<?= $CONTROLLER ?>/create" method="post">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Registrar articulo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Numero de serie</label>
                    <input name="serial" type="text" class="form-control" required>
                </div>
                <br />
                <div class="form-group">
                    <label class="form-label">Nombre</label>
                    <input name="name" type="text" class="form-control" required>
                </div>
                <br />
                <div class="form-group">
                    <label class="form-label">Stock</label>
                    <input name="stock" type="number" class="form-control" required>
                </div>
                <br />
                <div class="form-group">
                    <label class="form-label">Nombre del responsable</label>
                    <input name="responsible-name" type="text" class="form-control" required>
                </div>
                <br />
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <input name="description" type="text" class="form-control" required>
                </div>
                <br />
                <div class="form-group">
                    <label class="form-label">Marca</label>
                    <select name="brand-id" class="form-control select-control" required>
                        <?php foreach ($brands as $brand) : ?>
                            <option value="<?= $brand['id'] ?>"><?= $brand['nombre'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <br />
                <div class="form-group">
                    <label class="form-label">Modelo</label>
                    <select name="model-id" class="form-control select-control" required>
                        <?php foreach ($models as $model) : ?>
                            <option value="<?= $model['id'] ?>"><?= $model['nombre'] ?></option>
                        <?php endforeach ?>
                    </select>
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