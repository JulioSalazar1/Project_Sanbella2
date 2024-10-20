<?php
$services = ServiceData::getAll();
?>
<div class="row">
<div class="col-md-12">

<div class="card">
  <div class="card-header">
      <h4 class="title">NUEVO EMPLEADO</h4>
  </div>
<div class="card-content table-responsive">
<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addemployed" role="form">
	
<div class="col-md-6">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">SERVICIO:</label>
    <div class="col-md-8">
    <select name="service_id" class="form-control">
    <option value="">-- SELECCIONE --</option>      
    <?php foreach($services as $cat):?>
    <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>      
    <?php endforeach;?>
    </select>
    </div>
  </div>

   
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">NOMBRES:</label>
    <div class="col-md-8">
      <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  
    
   <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">APELLIDOS:</label>
    <div class="col-md-8">
      <input type="text" name="lastname"  class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">DIRECCION:</label>
    <div class="col-md-8">
      <input type="text" name="address" class="form-control"  id="address" placeholder="Direccion">
    </div>
  </div>
  
</div>
<div class="col-md-6">
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">EMAIL:</label>
    <div class="col-md-8">
      <input type="text" name="email" class="form-control" id="email" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">TELEFONO:</label>
    <div class="col-md-8">
      <input type="text" name="phone" class="form-control" id="phone" placeholder="Telefono">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-success">AGREGAR EMPLEADO</button>
    </div>
  </div>
  
</div>


</form>
</div>
</div>
</div>
</div>