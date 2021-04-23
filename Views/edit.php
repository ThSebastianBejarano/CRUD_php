<?php require RUTA_MAIN . '/Views/Layouts/Header.php'; ?>

<div class="container-fluid">
  <div class="container">
    <div class="card border-light mt-5">
      <div class="card-header">
        <h3>EDITAR ANIMALES</h3>
      </div>
      <div class="card-body">
        
        <form class="" action="<?php echo RUTA_URL; ?>Home/edit/<?php echo $data['id']; ?>" method="POST">
          <div class="row g-3 align-items-center justify-content-center">
            <div class="col-auto">
              <label for="name">Nombre del Animal:</label>
            </div>
            <div class="col-auto">
              <input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>">
            </div>
            <div class="col-auto">
              <label for="sex">Sexo del Animal:</label>
            </div>
            <div class="col-auto">
              <input type="text" name="sex" class="form-control" value="<?php echo $data['sex']; ?>">
            </div>
            <div class="col-auto">
              <label for="color">Color del Animal:</label>
            </div>
            <div class="col-auto">
              <input type="text" name="color" class="form-control" value="<?php echo $data['color']; ?>">
            </div>
          </div>
          <div class="row g-3 align-items-center my-3 justify-content-center" id="form">
            <div class="col-auto">
              <label for="bdate">Fecha Nacimiento:</label>
            </div>
            <div class="col-auto">
              <input type="date" name="bdate" class="form-control" value="<?php echo $data['bdate']; ?>">
            </div>
            <div class="col-auto">
              <label for="adate">Fecha de Ingreso:</label>
            </div>
            <div class="col-auto">
              <input type="date" name="adate" class="form-control" value="<?php echo $data['adate']; ?>">
            </div>
          </div>
          <div class="row g-3 align-items-center my-3 justify-content-center">
            <div class="col-auto">
              <label for="especie">Especie del Animal:</label>
            </div>
            <div class="col-auto">
              <select class="form-select" name="especie">
                <option >Selecionar una Especie</option>
                <?php foreach ($data['Especie'] as $key): ?>
                  <option value="<?php echo $key['id']; ?>"><?php echo $key['name']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-auto">
              <label for="raza">Raza del Animal:</label>
            </div>
            <div class="col-auto">
              <select class="form-select" name="raza">
                <option >Selecionar una Raza</option>
                <?php foreach ($data['Raza'] as $key): ?>
                  <option value="<?php echo $key['id']; ?>"><?php echo $key['name']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="row g-3 align-items-center my-3 justify-content-center">
            <div class="col-auto">
              <input type="submit" class="btn btn-success" value="EDITAR DATOS">
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>


<?php require RUTA_MAIN . '/Views/Layouts/Footer.php'; ?>
