<?php $user = ClientData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">

<div class="card">
  <div class="card-header" >
      <h4 class="title">EDITAR CLIENTE</h4>
  </div>
  <div class="card-content table-responsive">
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateclient" role="form">
  
   <div class="col-md-6">
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">NOMBRES:</label>
    <div class="col-md-8">
      <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">APELLIDOS:</label>
    <div class="col-md-8">
      <input type="text" name="lastname" value="<?php echo $user->lastname;?>" required class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">GENERO:</label>
    <div class="col-md-8">
<label class="checkbox-inline">
  <input type="radio" id="inlineCheckbox1" name="gender" required <?php if($user->gender=="h"){ echo "checked"; }?> value="h"> HOMBRE
</label>
<label class="checkbox-inline">
  <input type="radio" id="inlineCheckbox2" name="gender" required <?php if($user->gender=="m"){ echo "checked"; }?> value="m"> MUJER
</label>

    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">FECHA DE NACIMIENTO:</label>
    <div class="col-md-8">
      <input type="date" name="day_of_birth" class="form-control" value="<?php echo $user->day_of_birth; ?>"  id="address1" placeholder="Fecha de Nacimiento">
    </div>
  </div>
  
 </div>
   <div class="col-md-6">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">DIRECCIÓN:</label>
    <div class="col-md-8">
      <input type="text" name="address" value="<?php echo $user->address;?>" class="form-control" required id="username" placeholder="Direccion">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">EMAIL:</label>
    <div class="col-md-8">
      <input type="text" name="email" value="<?php echo $user->email;?>" class="form-control" id="email" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">TELEFONO:</label>
    <div class="col-md-8">
      <input type="text" name="phone"  value="<?php echo $user->phone;?>"  class="form-control" id="inputEmail1" placeholder="Telefono">
    </div>
  </div>
 
  

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-success">ACTUALIZAR CLIENTE</button>
    </div>
  </div>
  
  </div>
</form>
</div>
</div>
	</div>
</div>