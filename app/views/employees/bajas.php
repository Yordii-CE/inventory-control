<div class="d-flex align-items justify-content-between">
    <div class="display-6">Empleados dados de baja</div>

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
                <td><?= $employee['nombre'] ?></td>
                <td><?= $employee['puesto'] ?></td>
                <td><?= $employee['departamento'] ?></td>
                <td><?= $employee['contrato_firmado'] ?></td>
                <td><?= $employee['pais'] ?></td>
                <td><?= $employee['ciudad'] ?></td>
                <td><?= $employee['direccion'] ?></td>
                <td>
                    <a class="text-decoration-none text-success" href="alta/<?= $employee['id'] ?>">Dar de alta</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>


<?php if (count($employees) == 0) : ?>
    <div class="my-5 text-center" style="font-style: italic;">
        <p>No hay empleados dados de baja.</p>
    </div>

<?php endif ?>