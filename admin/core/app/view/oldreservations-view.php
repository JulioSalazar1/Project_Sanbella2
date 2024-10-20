<div class="row">
	<div class="col-md-12">
	
	
<div class="btn-group pull-right">
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/clients-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>

</div>


<div class="card">
  <div class="card-header">
      <h4 class="title">RESERVAS ANTERIORES</h4>
  </div>
  <div class="card-content table-responsive">

		<?php

		$users = ReservationData::getOld();
		if(count($users)>0){
			// si hay usuarios
			?>

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
				<a href="index.php?view=editreservation&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?action=delreservation&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
				</td>
				</tr>
				<?php

			}?>
			</table>
			</div>
			</div>
			<?php

		}else{
			echo "<p class='alert alert-danger'>No hay RESERVAS</p>";
		}


		?>

	</div>
</div>
