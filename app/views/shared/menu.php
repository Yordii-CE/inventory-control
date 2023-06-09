<div class="menu p-2 h-100 text-white p-0">
    <div class="icon-web">
        <img src="<?= $BASE_URL ?>/app/public/img/logo.png" alt="">
    </div>
    <br>
    <div class="my-2 h-75 position-relative">
        <p class="text-secondary">Personal</p>
        <a class="<?= $CONTROLLER == "employees" ? 'active-option' : '' ?> option d-flex align-items-center p-2 text-decoration-none" href="<?= $BASE_URL ?>/employees">
            <i class="fa-sharp fa-solid fa-user-tie"></i>
            <p class="p-0 my-0 mx-2">Empleados</p>
        </a>
        <a class="<?= $CONTROLLER == "history" ? 'active-option' : '' ?> option d-flex align-items-center p-2 text-decoration-none" href="<?= $BASE_URL ?>/history">
            <i class="fa-solid fa-clock-rotate-left"></i>
            <p class="p-0 my-0 mx-2">Historial</p>
        </a>
        <br>
        <p class="text-secondary">Inventario</p>
        <a class="<?= $CONTROLLER == "articles" ? 'active-option' : '' ?>  option d-flex align-items-center p-2 text-decoration-none" href="<?= $BASE_URL ?>/articles">
            <i class="fa-solid fa-newspaper"></i>
            <p class="p-0 my-0 mx-2">Articulos</p>
        </a>
        <a class="<?= $CONTROLLER == "brands" ? 'active-option' : '' ?>  option d-flex align-items-center p-2 text-decoration-none" href="<?= $BASE_URL ?>/brands">
            <i class="fa-solid fa-copyright"></i>
            <p class="p-0 my-0 mx-2">Marcas</p>
        </a>

        <a class="<?= $CONTROLLER == "types" ? 'active-option' : '' ?>  option d-flex align-items-center p-2 text-decoration-none" href="<?= $BASE_URL ?>/types">
            <i class="fa-solid fa-superscript"></i>
            <p class="p-0 my-0 mx-2">Modelos</p>
        </a>
    </div>
</div>