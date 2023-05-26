<div class="d-flex align-items justify-content-between">
    <div class="display-6">Datos personales de <?= $employee['nombre'] ?></div>
</div>

<?php if (isset($personalData)) : ?>
    <div class="mt-4 d-flex justify-content-between">
        <div class="border border-secondary m-2 p-3 flex-grow-1">
            <div class="mb-3 d-flex align-items-center justify-content-between">
                <p class="m-0" style="font-weight: 500;">Informacion personal</p>
                <i role="button" class="mx-3 fa-regular fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#personal-info-modal"></i>
            </div>
            <p>Rfc: <?= $personalData['rfc'] ?></p>
            <p>Curp: <?= $personalData['curp'] ?></p>
            <p>Genero: <?= $personalData['genero'] ?></p>
            <p>Fecha de nacimiento: <?= $personalData['fecha_nacimiento'] ?></p>
        </div>

        <div class="border border-secondary m-2 p-3 flex-grow-1">
            <div class="mb-3 d-flex align-items-center justify-content-between">
                <p class="m-0" style="font-weight: 500;">Informacion laboral</p>
                <i role="button" class="mx-3 fa-regular fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#labor-info-modal"></i>
            </div>
            <p>Salario inicial: $<?= $personalData['salario_inicial'] ?></p>
            <p>Salario diario integrado: $<?= $personalData['salario_diario_integrado'] ?></p>
        </div>

        <div class="border border-secondary m-2 p-3 flex-grow-1">
            <div class="mb-3 d-flex align-items-center justify-content-between">
                <p class="m-0" style="font-weight: 500;">Informacion de contacto</p>
                <i role="button" class="mx-3 fa-regular fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#contact-info-modal"></i>
            </div>
            <p>Correo: <?= $personalData['correo'] ?></p>
            <p>Telefono: <?= $personalData['numero_telefono'] ?></p>
        </div>
    </div>
    <div class="border border-secondary m-2 p-3">
        <div class="mb-3 d-flex align-items-center justify-content-between">
            <p class="m-0" style="font-weight: 500;">Informacion adicional</p>
            <i role="button" class="mx-3 fa-regular fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#additional-info-modal"></i>
        </div>
        <p>Pasaporte: <?= $personalData['pasaporte'] ?></p>
        <p>Licencia de conducir: <?= $personalData['licencia_conducir'] ?></p>
        <p>Numero de seguro social: <?= $personalData['numero_seguro_social'] ?></p>
    </div>

<?php else : ?>
    <div class="h-75 d-flex align-items-center justify-content-center">
        <div class="my-3 text-center">
            <p style="font-style: italic;">Aun no se han registrado los datos personales de <?= $employee['nombre'] ?>.</p>
            <button class="my-3 btn btn-dark" data-bs-toggle="modal" data-bs-target="#register-modal">Registrar datos personales</button>

        </div>
    </div>


    <!-- Register modal -->

    <div class="modal fade" id="register-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content" action="<?= $BASE_URL ?>/data/create" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Registrar datos personales</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input name="id" type="hidden" value="<?= $employee['id'] ?>" class="form-control" required>
                    <div class="form-group">
                        <label class="form-label">RFC</label>
                        <input name="rfc" type="text" class="form-control" required>
                    </div>
                    <br />
                    <div class="form-group">
                        <label class="form-label">Curp</label>
                        <input name="curp" type="text" class="form-control" required>
                    </div>
                    <br />
                    <div class="form-group">
                        <label class="form-label">Genero</label>

                        <select name="gender" class="form-control form-select" required>
                            <option>Masculino</option>
                            <option>Femenino</option>
                            <option>Otro</option>
                        </select>
                    </div>
                    <br />
                    <div class="form-group">
                        <label class="form-label">Correo</label>
                        <input name="email" type="email" class="form-control" required>
                    </div>
                    <br />
                    <div class="form-group">
                        <label class="form-label">Pasaporte</label>
                        <input name="passport" type="text" class="form-control" required>
                    </div>
                    <br />
                    <div class="form-group">
                        <label class="form-label">Numero de telefono</label>
                        <input name="phone" type="number" class="form-control" required>
                    </div>
                    <br />
                    <div class="form-group">
                        <label class="form-label">Fecha de nacimiento</label>
                        <input name="born-date" type="date" class="form-control" required>
                    </div>
                    <br />
                    <div class="form-group">
                        <label class="form-label">Licencia de conducir</label>
                        <input name="driver-license" type="text" class="form-control" required>
                    </div>
                    <br />
                    <div class="form-group">
                        <label class="form-label">Numero de seguro social</label>
                        <input name="social-security-number" type="number" class="form-control" required>
                    </div>
                    <br />
                    <p class="text-secondary">Datos de remuneracion:</p>
                    <br />
                    <div class="form-group">
                        <label class="form-label">Salario inicial</label>
                        <input name="starting-salary" type="number" class="form-control" required>
                    </div>
                    <br />
                    <div class="form-group">
                        <label class="form-label">Salario diario integrado</label>
                        <input name="integrated-daily-wage" type="number" class="form-control" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn text-dark border-dark" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>
    </div>
<?php endif ?>

<!-- Personal info modal -->

<div class="modal fade" id="personal-info-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" action="<?= $BASE_URL ?>/data/update" method="post">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Actualizar informacion personal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <input name="id" type="hidden" value="<?= $employee['id'] ?>" class="form-control" required>
                <div class="form-group">
                    <label class="form-label">RFC</label>
                    <input name="rfc" type="text" class="form-control" value="<?= $personalData['rfc'] ?>" required>
                </div>
                <br />
                <div class="form-group">
                    <label class="form-label">Curp</label>
                    <input name="curp" type="text" class="form-control" value="<?= $personalData['curp'] ?>" required>
                </div>
                <br />
                <div class="form-group">
                    <label class="form-label">Genero</label>
                    <select name="gender" class="form-control form-select" required>
                        <option <?= $personalData['genero'] == 'Masculino' ? 'selected' : null ?>>Masculino</option>
                        <option <?= $personalData['genero'] == 'Femenino' ? 'selected' : null ?>>Femenino</option>
                        <option <?= $personalData['genero'] == 'Otro' ? 'selected' : null ?>>Otro</option>
                    </select>
                </div>
                <br />
                <div class="form-group">
                    <label class="form-label">Fecha de nacimiento</label>
                    <input name="born-date" type="date" class="form-control" value="<?= $personalData['fecha_nacimiento'] ?>" required>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn text-dark border-dark" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                <button class="btn btn-warning" name="personal-btn">Actualizar</button>
            </div>
        </form>
    </div>
</div>

<!-- Labor info modal -->

<div class="modal fade" id="labor-info-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" action="<?= $BASE_URL ?>/data/update" method="post">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Actualizar informacion laboral</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <input name="id" type="hidden" value="<?= $employee['id'] ?>" class="form-control" required>
                <div class="form-group">
                    <label class="form-label">Salario inicial</label>
                    <input name="starting-salary" type="text" class="form-control" value="<?= $personalData['salario_inicial'] ?>" required>
                </div>
                <br />
                <div class="form-group">
                    <label class="form-label">Salario inicial integrado</label>
                    <input name="integrated-daily-wage" type="text" class="form-control" value="<?= $personalData['salario_diario_integrado'] ?>" required>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn text-dark border-dark" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                <button class="btn btn-warning" name="labor-btn">Actualizar</button>
            </div>
        </form>
    </div>
</div>

<!-- Contact info modal -->

<div class="modal fade" id="contact-info-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" action="<?= $BASE_URL ?>/data/update" method="post">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Actualizar informacion de contacto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <input name="id" type="hidden" value="<?= $employee['id'] ?>" class="form-control" required>
                <div class="form-group">
                    <label class="form-label">Correo electronico</label>
                    <input name="email" type="email" class="form-control" value="<?= $personalData['correo'] ?>" required>
                </div>
                <br />
                <div class="form-group">
                    <label class="form-label">Numero de telefono</label>
                    <input name="phone" type="text" class="form-control" value="<?= $personalData['numero_telefono'] ?>" required>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn text-dark border-dark" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                <button class="btn btn-warning" name="contact-btn">Actualizar</button>
            </div>
        </form>
    </div>
</div>

<!-- Aditional info modal -->

<div class="modal fade" id="additional-info-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" action="<?= $BASE_URL ?>/data/update" method="post">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Actualizar informacion adicional</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <input name="id" type="hidden" value="<?= $employee['id'] ?>" class="form-control" required>
                <div class="form-group">
                    <label class="form-label">Pasaporte</label>
                    <input name="passport" type="text" class="form-control" value="<?= $personalData['pasaporte'] ?>" required>
                </div>
                <br />
                <div class="form-group">
                    <label class="form-label">Licencia de conducir</label>
                    <input name="driver-license" type="text" class="form-control" value="<?= $personalData['licencia_conducir'] ?>" required>
                </div>
                <br />
                <div class="form-group">
                    <label class="form-label">Numero de seguro social</label>
                    <input name="social-security-number" type="number" class="form-control" value="<?= $personalData['numero_seguro_social'] ?>" required>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn text-dark border-dark" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                <button class="btn btn-warning" name="additional-btn">Actualizar</button>
            </div>
        </form>
    </div>
</div>