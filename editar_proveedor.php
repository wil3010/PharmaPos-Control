
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	$pid=intval($_GET['id']);
if(isset($_POST['submit']))
{
	$nit=$_POST['nit'];
	$name=$_POST['name'];
	$last_name=$_POST['last_name'];
	$email=$_POST['email'];
	$contacto=$_POST['contacto'];
	$telephone=$_POST['telephone'];
	$shippingAddress=$_POST['shippingAddress'];
	$web_page=$_POST['web_page'];
	$supplierDescription=$_POST['supplierDescription'];
	$name_seller=$_POST['name_seller'];
	$lastname_seller=$_POST['lastname_seller'];
	$phone_seller=$_POST['phone_seller'];
		
$sql=mysqli_query($con,"update supplier set nit='$nit',name='$name',last_name='$last_name',email='$email',contacto='$contacto',telephone='$telephone',shippingAddress='$shippingAddress',name_seller='$name_seller',lastname_seller='$lastname_seller' where id='$pid' ");
$_SESSION['msg']="Proveedor actualizado correctamente !!";

}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PharmaPost-Control | Editar proveedor</title>
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
								<h3>Editar informacion del proveedor</h3>
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

		

<?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from supplier where id='$id'");
while($row=mysqli_fetch_array($query))
{
?>

<div class="control-group">
  <label class="control-label" for="basicinput">NIT proveedor</label>
<div class="controls">
<input type="text" name="nit"  placeholder="Ingrese NIT del proveedor" value="<?php echo htmlentities($row['nit']);?>" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Nombre del proveedor</label>
<div class="controls">
<input type="text" name="name"  placeholder="Ingrese nombre del proveedor" value="<?php echo htmlentities($row['name']);?>" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Apellido del proveedor</label>
<div class="controls">
<input type="text" name="last_name"  placeholder="Ingrese el apellido del proveedor" value="<?php echo htmlentities($row['last_name']);?>" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Email del proveedor</label>
<div class="controls">
<input type="text"    name="email"  placeholder="Ingrese email del proveedor" value="<?php echo htmlentities($row['email']);?>" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Celular del proveedor</label>
<div class="controls">
<input type="text"    name="contacto"  placeholder="Ingrese el numero de celular del proveedor" value="<?php echo htmlentities($row['contacto']);?>" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Telefono del proveedor</label>
<div class="controls">
<input type="text"    name="telephone"  placeholder="Ingrese el telefono del proveedor" value="<?php echo htmlentities($row['telephone']);?>" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Direccion del proveedor</label>
<div class="controls">
<input type="text"    name="shippingAddress"  placeholder="Ingrese la direccion del proveedor" value="<?php echo htmlentities($row['shippingAddress']);?>" class="span8 tip" required>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Pagina web del proveedor</label>
<div class="controls">
<input type="text"    name="web_page"  placeholder="Ingrese la pagina web del proveedor" value="<?php echo htmlentities($row['web_page']);?>" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Descripción del proveedor</label>
<div class="controls">
<textarea  name="supplierDescription"  placeholder="Ingrese descripción del proveedor" rows="6" class="span8 tip">
<?php echo htmlentities($row['supplierDescription']);?>
</textarea>  
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Nombre del vendedor</label>
<div class="controls">
<input type="text"    name="name_seller"  placeholder="Ingrese el nombre del vendedor" value="<?php echo htmlentities($row['name_seller']);?>" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Apellido del vendedor</label>
<div class="controls">
<input type="text"    name="lastname_seller"  placeholder="Ingrese el apellido del vendedor" value="<?php echo htmlentities($row['lastname_seller']);?>" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">celular del vendedor</label>
<div class="controls">
<input type="text"    name="phone_seller"  placeholder="Ingrese el celular del vendedor" value="<?php echo htmlentities($row['phone_seller']);?>" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">logo proveedor</label>
<div class="controls">
<img src="supplierimages/<?php echo htmlentities($pid);?>/<?php echo htmlentities($row['suplierimage']);?>" width="200" height="100"> <a href="cargar_imagen2.php?id=<?php echo $row['id'];?>">Cargar Imagen</a>
</div>
</div>

<?php } ?>
	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Actualizar</button>
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