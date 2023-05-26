<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?= $BASE_URL ?>/app/public/css/site.css" />
  <link rel="stylesheet" href="<?= $BASE_URL ?>/app/public/css/menu.css" />
  <link rel="stylesheet" href="<?= $BASE_URL ?>/app/public/css/table.css" />
</head>

<body>
  <div class="d-flex vh-100">
    <?php require 'menu.php'; ?>

    <div class="flex-grow-1 container-content overflow-auto mx-4">
      <!-- Header -->
      <div class="bg-white z-3 header-top shadow p-4 d-flex justify-content-end">
        <h6 class="p-0 m-0">GESTION DE INVENTARIO Y CONTROL DE PERSONAL</h6>
      </div>
      <!-- Content -->