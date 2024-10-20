<div class="row">
	<div class="col-md-12">
<!--<div class="btn-group pull-right">
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/clients-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>

</div>-->


<div class="card">
  <div class="card-header">
      <h4 class="title">RESERVACIÓN DE CITAS</h4>
  </div>
  <div class="card-content table-responsive">
<a href="./index.php?view=newreservation" class="btn btn-primary"><i class='fa fa-book'></i> NUEVA RESERVA</a>
<a href="./index.php?view=oldreservations" class="btn btn-default"><i class='fa fa-list'></i> RESERVAS ANTERIORES</a>
<br><br>
<form class="form-horizontal" role="form">
<input type="hidden" name="view" value="reservations">
        <?php
$clients = ClientData::getAll();
$employeds = EmployedData::getAll();
        ?>

  <div class="form-group">
    <div class="col-lg-2">
		<div class="input-group">
		  <span class="input-group-addon"><i class="fa fa-search"></i></span>
		  <input type="text" name="q" value="<?php if(isset($_GET["q"]) && $_GET["q"]!=""){ echo $_GET["q"]; } ?>" class="form-control" placeholder="Palabra clave">
		</div>
    </div>
    <div class="col-lg-3">
		<div class="input-group">
		  <span class="input-group-addon"><i class="fa fa-male"></i></span>
<select name="client_id" class="form-control">
<option value="">CLIENTE</option>
  <?php foreach($clients as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if(isset($_GET["client_id"]) && $_GET["client_id"]==$p->id){ echo "selected"; } ?>><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
  <?php endforeach; ?>
</select>
		</div>
    </div>
    <div class="col-lg-3">
		<div class="input-group">
		  <span class="input-group-addon"><i class="fa fa-support"></i></span>
<select name="employed_id" class="form-control">
<option value="">EMPLEADO</option>
  <?php foreach($employeds as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if(isset($_GET["employed_id"]) && $_GET["employed_id"]==$p->id){ echo "selected"; } ?>><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
  <?php endforeach; ?>
</select>
		</div>
    </div>
    <div class="col-lg-2">
		<div class="input-group">
		  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		  <input type="date" name="date_at" value="<?php if(isset($_GET["date_at"]) && $_GET["date_at"]!=""){ echo $_GET["date_at"]; } ?>" class="form-control" placeholder="Palabra clave">
		</div>
    </div>

    <div class="col-lg-2">
    <button class="btn btn-success btn-block">Buscar</button>
    </div>

  </div>
</form>

		<?php
$users= array();
if((isset($_GET["q"]) && isset($_GET["client_id"]) && isset($_GET["employed_id"]) && isset($_GET["date_at"])) && ($_GET["q"]!="" || $_GET["client_id"]!="" || $_GET["employed_id"]!="" || $_GET["date_at"]!="") ) {
$sql = "select * from reservation where ";
if($_GET["q"]!=""){
	$sql .= " title like '%$_GET[q]%' or note like '%$_GET[q]%' ";
}

if($_GET["client_id"]!=""){
if($_GET["q"]!=""){
	$sql .= " and ";
}
	$sql .= " client_id = ".$_GET["client_id"];
}

if($_GET["employed_id"]!=""){
if($_GET["q"]!=""||$_GET["client_id"]!=""){
	$sql .= " and ";
}

	$sql .= " employed_id = ".$_GET["employed_id"];
}



if($_GET["date_at"]!=""){
if($_GET["q"]!=""||$_GET["client_id"]!="" ||$_GET["employed_id"]!="" ){
	$sql .= " and ";
}

	$sql .= " date_at = \"".$_GET["date_at"]."\"";
}

		$users = ReservationData::getBySQL($sql);

}else{
		$users = ReservationData::getAll();

}
		if(count($users)>0){
			// si hay usuarios
			?>
			<!--<table class="table table-bordered table-hover">-->
			<table id="example1" class="table table-bordered ">
			<thead>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">ASUNTO</th>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">CLIENTE</th>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">EMPLEADO</th>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">REGISTRO</th>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">OPCIONES</th>
			</thead>
			<?php
			foreach($users as $user){
				$client  = $user->getClient();
				$employed = $user->getEmployed();
				?>
				<tr>
				<td style="border: 1px solid black;"><?php echo $user->title; ?></td>
				<td style="border: 1px solid black;"><?php echo $client->name." ".$client->lastname; ?></td>
				<td style="border: 1px solid black;"><?php echo $employed->name." ".$employed->lastname; ?></td>
				<td style="border: 1px solid black;"><?php echo $user->date_at." ".$user->time_at; ?></td>
				<td style="border: 1px solid black;width:180px;">
				<a href="index.php?view=editreservation&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">EDITAR</a>
				<a href="index.php?action=delreservation&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">ELIMINAR</a>
				</td>
				</tr>
				<?php

			}
			?>
			</table>
			</div>
			</div>
			<?php



		}else{
			echo "<p class='alert alert-danger'>No hay clientes</p>";
		}


		?>


	</div>
</div>