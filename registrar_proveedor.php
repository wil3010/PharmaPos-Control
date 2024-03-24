
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
	$suplierimage=$_FILES["suplierimage"]["name"];

$query=mysqli_query($con,"select max(id) as pid from supplier");
	$result=mysqli_fetch_array($query);
	 $productid=$result['pid']+1;
	$dir="supplierimages/$productid";
if(!is_dir($dir)){
		mkdir("supplierimages/".$productid);
	}

	move_uploaded_file($_FILES["suplierimage"]["tmp_name"],"supplierimages/$productid/".$_FILES["suplierimage"]["name"]);
	$sql=mysqli_query($con,"insert into supplier(nit,name,last_name,email,contacto,telephone,shippingAddress,web_page,supplierDescription,name_seller,lastname_seller,phone_seller,suplierimage) values('$nit','$name','$last_name','$email','$contacto','$telephone','$shippingAddress','$web_page','$supplierDescription','$name_seller','$lastname_seller','$phone_seller','$suplierimage')");
$_SESSION['msg']="Proveedor registrado exitosamente !!";

}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pharmapost-control | Registrar Proveedor</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

   <script>
function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "obtener_subcategoria.php",
	data:'cat_id='+val,
	success: function(data){
		$("#subcategory").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>	


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
								<h3>Insertar Proveedor</h3>
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
<label class="control-label" for="basicinput">NIT proveedor</label>
<div class="controls">
<input type="text"    name="nit"  placeholder="Ingrese NIT del proveedor" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Nombre del proveedor</label>
<div class="controls">
<input type="text"    name="name"  placeholder="Ingrese nombre del proveedor" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Apellido del proveedor</label>
<div class="controls">
<input type="text"    name="last_name"  placeholder="Ingrese el apellido del proveedor" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Email del proveedor</label>
<div class="controls">
<input type="text"    name="email"  placeholder="Ingrese email del proveedor" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Celular del proveedor</label>
<div class="controls">
<input type="text"    name="contacto"  placeholder="Ingrese el numero de celular del proveedor" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Telefono del proveedor</label>
<div class="controls">
<input type="text"    name="telephone"  placeholder="Ingrese el telefono del proveedor" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Direccion del proveedor</label>
<div class="controls">
<input type="text"    name="shippingAddress"  placeholder="Ingrese la direccion del proveedor" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Pagina web del proveedor</label>
<div class="controls">
<input type="text"    name="web_page"  placeholder="Ingrese la pagina web del proveedor" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Descripción del proveedor</label>
<div class="controls">
<textarea  name="supplierDescription"  placeholder="Ingrese descripción del proveedor" rows="6" class="span8 tip">
</textarea>  
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Nombre del vendedor</label>
<div class="controls">
<input type="text"    name="name_seller"  placeholder="Ingrese el nombre del vendedor" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Apellido del vendedor</label>
<div class="controls">
<input type="text"    name="lastname_seller"  placeholder="Ingrese el apellido del vendedor" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">celular del vendedor</label>
<div class="controls">
<input type="text"    name="phone_seller"  placeholder="Ingrese el celular del vendedor" class="span8 tip" required>
</div>
</div>


			
<div class="control-group">
<label class="control-label" for="basicinput">logo proveedor</label>
<div class="controls">
<input type="file" name="suplierimage" id="suplierimage" value="" class="span8 tip" required>
</div>
</div>



	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Publicar</button>
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