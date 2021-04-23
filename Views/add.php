<?php require RUTA_MAIN . '/Views/Layouts/Header.php'; ?>

<div class="container-fluid">
  <div class="container">
    <div class="card border-light mt-5">
      <div class="card-header">
        <h3>AGREGAR ANIMALES</h3>
      </div>
      <div class="card-body">

        <form class="" action="<?php echo RUTA_URL; ?>Home/add" method="POST">
          <div class="row g-3 align-items-center justify-content-center">
            <div class="col-auto">
              <label for="name">Nombre del Animal:</label>
            </div>
            <div class="col-auto">
              <input type="text" name="name" class="form-control" value="">
            </div>
            <div class="col-auto">
              <label for="sex">Sexo del Animal:</label>
            </div>
            <div class="col-auto">
              <input type="text" name="sex" class="form-control" value="">
            </div>
            <div class="col-auto">
              <label for="color">Color del Animal:</label>
            </div>
            <div class="col-auto">
              <input type="text" name="color" class="form-control" value="">
            </div>
          </div>
          <div class="row g-3 align-items-center my-3 justify-content-center" id="form">
            <div class="col-auto">
              <label for="bdate">Fecha Nacimiento:</label>
            </div>
            <div class="col-auto">
              <input type="date" name="bdate" class="form-control" value="">
            </div>
            <div class="col-auto">
              <label for="adate">Fecha de Ingreso:</label>
            </div>
            <div class="col-auto">
              <input type="date" name="adate" class="form-control" value="">
            </div>
            <div class="col-auto">
              <label for="crias">¿Tiene Crias?</label>
            </div>
            <div class="col-auto">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="opcion1" value="" name="inlineRadio" onclick="EnabledInput()">
                <label class="form-check-label" for="opcion1">SI</label>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="opcion2" value="" name="inlineRadio" onclick="EnabledInput()">
                <label class="form-check-label" for="inlineRadio2">NO</label>
              </div>
            </div>
            <div class="col-auto">
              <input type="text" name="crias" class="form-control" value="" id="casilla" required>
            </div>
          <div class="row g-3 align-items-center my-3 justify-content-center">
            <div class="col-auto">
              <label for="especie">Especie del Animal:</label>
            </div>
            <div class="col-auto">
              <select class="form-select" name="especie">
                <option >Selecionar una Especie</option>
                <?php foreach ($data['Especie'] as $key): ?>
                  <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
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
                  <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-auto">
              <label for="cuidador">Cuidador del Animal:</label>
            </div>
            <div class="col-auto">
              <select class="form-select" name="cuidador">
                <option >Selecionar un Cuidador</option>
                <?php foreach ($data['Cuidador'] as $key): ?>
                  <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="row g-3 align-items-center my-3 justify-content-center">
            <div class="col-auto">
              <input type="submit" class="btn btn-success" value="ENVIAR DATOS">
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>


<?php require RUTA_MAIN . '/Views/Layouts/Footer.php'; ?>
