<div class="display-6">Historial de empleados</div>
<table class="table mt-4">
    <thead>
        <tr>
            <td style="width: 12.5%; font-weight: 500;">Nombre</td>
            <td style="width: 12.5%; font-weight: 500;">Fecha de contratacion</td>
            <td style="width: 12.5%; font-weight: 500;">Fecha de baja</td>
            <td style="width: 12.5%; font-weight: 500;">Acciones</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($employees as $employee) : ?>
            <tr>
                <td><?= $employee['nombre'] ?></td>
                <td><?= $employee['fecha_contratacion'] ?></td>
                <td><?= $employee['fecha_baja'] == '' ? '---------------' : $employee['fecha_baja'] ?></td>
                <td>
                    <a class="<?= $employee['fecha_baja'] == '' ? 'text-danger' : 'text-success' ?> text-decoration-none" href="<?= $CONTROLLER ?>/change/<?= $employee['idEmpleado'] ?>">
                        <?= $employee['fecha_baja'] == '' ? 'Dar de baja' : 'Dar de alta' ?></a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>