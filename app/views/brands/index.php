<div class="d-flex align-items justify-content-between">
    <div class="display-6">Marcas</div>
    <div class="d-flex align-items-center">
        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#register-modal">Registrar marca</button>

    </div>
</div>

<table class="table w-25 mt-4">
    <thead>
        <tr>
            <td style="font-weight: 500;">Nombre</td>
            <td style="font-weight: 500;">Acciones</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($brands as $brand) : ?>
            <tr>
                <td><?= $brand['nombre'] ?></td>
                <td>
                    <i role="button" class="mx-3 fa-regular fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#edit-modal-<?= $brand['id'] ?>"></i>
                </td>
            </tr>
            <div class="modal fade" id="edit-modal-<?= $brand['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="<?= $CONTROLLER ?>/update" method="post">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Actualizar marca</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input name="id" type="hidden" value="<?= $brand['id'] ?>">
                                <div class="form-group">
                                    <label class="form-label">Nombre</label>
                                    <input name="name" type="text" class="form-control" value="<?= $brand['nombre'] ?>" required>
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

<?php if (count($brands) == 0) : ?>
    <div class="my-5 text-center" style="font-style: italic;">
        <p>No hay marcas para articulos.</p>
    </div>

<?php endif ?>

<!-- Register modal -->

<div class="modal fade" id="register-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" action="<?= $CONTROLLER ?>/create" method="post">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Registrar marca</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <label class="form-label">Nombre</label>
                    <input name="name" type="text" class="form-control" required>
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