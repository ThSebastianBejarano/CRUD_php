
<?php require RUTA_MAIN . '/Views/Layouts/Header.php'; ?>

<div class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col"></div>
      <div class="col-6">
        <h1 class="px-5 my-5">LISTA DEL ZOOLOGICO 2021</h1>
      </div>
      <div class="col"></div>
    </div>


    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>SEX</th>
          <th>COLOR</th>
          <th>BIRTH DATE</th>
          <th>DATE ASIGN</th>
          <th>ESPECIE</th>
          <th>RAZA</th>
          <th>CRIAS</th>
          <th>CUIDADOR</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data['Datos'] as $one) : ?>
          <tr>
            <td><?php echo $one['id']; ?></td>
            <td><?php echo $one['name']; ?></td>
            <td><?php echo $one['sex']; ?></td>
            <td><?php echo $one['color']; ?></td>
            <td><?php echo $one['bdate']; ?></td>
            <td><?php echo $one['adate']; ?></td>
            <td><?php echo $one['especie']; ?></td>
            <td><?php echo $one['raza']; ?></td>
            <td><?php echo $one['crias']; ?></td>
            <td><?php echo $one['cuidador']; ?></td>
            <td>
              <a href="<?php echo RUTA_URL;?>Home/edit/<?php echo $one['id'];?>" class="btn btn-outline-primary">Editar</a>
              <input type="button" class="btn btn-outline-danger" name="" value="Eliminar" onclick="deleteConfirm('<?php echo RUTA_URL;?>', <?php echo $one['id']; ?>)">

            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>


<?php require RUTA_MAIN . '/Views/Layouts/Footer.php'; ?>
