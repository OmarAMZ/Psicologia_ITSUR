<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>PSICOLOGIA ITSUR</b></a>
  </div>
  
  <div class="login-box-body">
    <p class="login-box-msg">Iniciar Sesion</p>

    <form method="post">

      <div class="form-group has-feedback">

        <input type="email" class="form-control" name="correo-Ing" placeholder="Correo">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">

        <input type="password" class="form-control" name="clave-Ing" placeholder="Contraseña">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

      </div>
      
      <div class="form-group has-feedback">
              
            <select class="form-control" id="tipodeusuario" name="tipodeusuario">
              <option value="Alumno">Alumno</option>
              <option value="Psicologo">Psicologo</option>
            </select>
        
      </div>

      <div class="form-group">
        <a type="button" href="http://localhost/psicologiaitsur/registro" class="btn btn-primary">Registrar</a>
        <button type="submit" class="btn btn-success pull-right">Ingresar</button>
      </div>     

      <?php
      
      $ingreso = new UsuariosC();
      $ingreso -> IngresarUsuarioC();

      ?>
    </form>

  </div>

</div>