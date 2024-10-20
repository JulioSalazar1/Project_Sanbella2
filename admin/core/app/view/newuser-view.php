<div class="row">
	<div class="col-md-12">
<div class="card">
  <div class="card-header">
      <h4 class="title">NUEVO USUARIO</h4>
  </div>
  <div class="card-content table-responsive">

		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=adduser" role="form">
<div class="col-md-6">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">NOMBRES:</label>
    <div class="col-md-8">
      <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">APELLIDOS:</label>
    <div class="col-md-8">
      <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">USUARIO:</label>
    <div class="col-md-8">
      <input type="text" name="username" class="form-control" required id="username" placeholder="Nombre de usuario">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">EMAIL:</label>
    <div class="col-md-8">
      <input type="text" name="email" class="form-control" id="email" placeholder="Email">
    </div>
  </div>
   </div>
<div class="col-md-6">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">CONTRASE&ntilde;A</label>
    <div class="col-md-8">
      <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contrase&ntilde;a">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">¿ADMINISTRADOR?</label>
    <div class="col-md-8">
<div class="checkbox">
    <label>
      <input type="checkbox" name="is_admin"> 
    </label>
  </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-success">AGREGAR USUARIO</button>
    </div>
  </div>
  
    </div>  
  
</form>
	</div>
</div>
</div>
</div>