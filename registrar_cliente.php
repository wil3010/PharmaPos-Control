
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$last_name=$_POST['last_name'];
	$email=$_POST['email'];
	$contactno=$_POST['contactno'];
	$shippingAddress=$_POST['shippingAddress'];
	$shippingState=$_POST['shippingState'];
	$shippingCity=$_POST['shippingCity'];

$sql=mysqli_query($con,"insert into users(name,last_name,email,contactno,shippingAddress,shippingState,shippingCity) values('$name','$last_name','$email','$contactno','$shippingAddress','$shippingState','$shippingCity')");
$_SESSION['msg']="Producto registrado exitosamente !!";

}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Administraccion Amapa Rosa | Registrar Producto</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

  	


</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Registrar cliente</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Todo bien!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh vaya!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

			<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">
			  <div class="control-group">
  <label class="control-label" for="basicinput">Nombre del Cliente</label>
<div class="controls">
<input type="text" name="name"  placeholder="Ingrese el nombre del cliente" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Apellido del cliente</label>
<div class="controls">
<input type="text" name="last_name"  placeholder="Ingrese el apellido del cliente" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Correo Electronico</label>
<div class="controls">
<input type="text"    name="email"  placeholder="Ingrese el correo electronico del cliente" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Numero de celular</label>
<div class="controls">
<input type="text"    name="contactno"  placeholder="Ingrese el numero de celular del cliente" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Direccion</label>
<div class="controls">
<input type="text" name="shippingAddress" id="" placeholder="Ingrese la direccion del cliente" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Departamento de residencia</label>
<div class="controls">
<input type="text"    name="shippingState"  placeholder="Ingres el departamento de residencia" class="span8 tip" required>
</div>
</div>
				
<div class="control-group">
<label class="control-label" for="basicinput">Municipio</label>
<div class="controls">
<input type="text"    name="shippingCity"  placeholder="Ingres el municipio de residencia" class="span8 tip" required>
</div>
</div>
<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Almacenar Informacion</button>
											</div>
										</div>
									</form>
							</div>
						</div>


	
						
						
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>